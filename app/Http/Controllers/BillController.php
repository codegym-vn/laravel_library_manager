<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BillController extends Controller
{
    public function authentication (Request $request)
    {
        try {
            $studentCode = $request->input('student_code');
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', "https://andy.agileadglobal.com/api/student/$studentCode");
            $student = json_decode($res->getBody());
            $status = $student->status;

            if ($status === "Đang học") {
                $books = Book::all();
                return view('bills.bill', compact('student', 'books', 'studentCode'));
            } else {
                //dung session de dua ra thong bao
                Session::flash('error', 'Học viên này đã nghỉ học không được phép mượn sách!');
            }
        } catch (\Exception $exception) {
            //dung session de dua ra thong bao
            Session::flash('error', 'Mã học sinh không đúng, yêu cầu nhập lại!');
        }
        return view('bills.studentCode');
    }

    public function index ()
    {
        $bills = Bill::orderBy('id', 'desc')->get();
        return view('bills.list', compact('bills'));
    }

    public function store (Request $request)
    {
        $studentInput = $request->input('studentCode');
        $student = Student::where('student_code', $studentInput)->first();

        $borrowedDay = strtotime($request->input('borrowed_day'));
        $payDay = strtotime($request->input('pay_day'));
        $borrowingTime = $payDay - $borrowedDay;

        if ($borrowingTime > 604800) {
            Session::flash('error', 'Bạn không được phép mượn vượt quá số ngày theo quy định!');
            return redirect()->back();
        } else {
            if ($student) {
                //neu sl sach muon < 2
                if ($student->quantity_bill < 2) {
                    $student->quantity_bill += 1;
                    $student->save();

                    $bill = new Bill();
                    $bill->borrowed_day = $request->input('borrowed_day');
                    $bill->pay_day = $request->input('pay_day');
                    $bill->id_book = $request->input('id_book');
                    $bill->id_student = $student->id;
                    $bill->status = "Đang mượn";
                    $bill->save();

                    $billDetail = new BillDetail();
                    $billDetail->id_book = $request->input('id_book');
                    $billDetail->id_bill = $bill->id;
                    $billDetail->save();


                    Session::flash('success', 'Tạo mới thành công');
                    return redirect()->route('bills_index');
                } else {
                    Session::flash('error', 'Bạn đã mượn vượt quá số lượng sách theo quy định!');
                    return redirect()->route('student_list');
                }

            } else {
                $student = new Student();
                $student->student_code = $_GET["studentCode"];
                $student->student_name = $_GET["fullname"];
                $student->class_name = $_GET["group"];
                $student->email = $_GET["email"];
                $student->phone = $_GET["phone"];
                $student->quantity_bill = 1;
                $student->save();

                $bill = new Bill();
                $bill->id_book = $request->input('id_book');
                $bill->id_student = $student->id;
                $bill->status = "Đang mượn";
                $bill->borrowed_day = $request->input('borrowed_day');
                $bill->pay_day = $request->input('pay_day');
                $bill->save();

                $billDetail = new BillDetail();
                $billDetail->id_book = $request->input('id_book');
                $billDetail->id_bill = $bill->id;
                $billDetail->save();
                Session::flash('success', 'Tạo mới thành công');
                return redirect()->route('bills_index');
            }
        }
    }

    public function destroy ($id)
    {
        //Tim bil
        $bill = Bill::FindOrFail($id);
        //tim student
        $student = Student::FindOrFail($bill->id_student);

        //cap nhap student
        if ($student) {
            $student->quantity_bill -= 1;
            $student->save();
        }


        $billDetail = BillDetail::where('id_bill', $bill->id)->first();
        $billDetail->delete();
        $bill->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        return redirect()->route('bills_index');
    }
}
