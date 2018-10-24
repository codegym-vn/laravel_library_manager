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
                Session::flash('success', 'Học viên này đã nghỉ học không được phép mượn sách!');
                return view('bills.studentCode');
            }
        } catch (\Exception $exception) {
            //dung session de dua ra thong bao
            Session::flash('success', 'Mã học sinh không đúng, yêu cầu nhập lại!');
            return view('bills.studentCode');
        }
    }

    public function index ()
    {
        $bills = Bill::paginate(3);
        return view('bills.list', compact('bills'));
    }

    public function store (Request $request)
    {
        $studentInput = $request->input('studentCode');
        $student = Student::get($studentInput);
        dd($student);

        if ($studentInput == $student) {
            $student->quantity_bill = +1;
            $student->save();
        } else {
            $student = new Student();
            $student->student_code = $request->input('studentCode');
            $student->student_name = $request->input('fullname');
            $student->class_name = $request->input('group');
            $student->email = $request->input('email');
            $student->phone = $request->input('phone');
            $student->quantity_bill = 1;
            $student->save();
        }

        $student = new Student();
        $student->student_code = $request->input('studentCode');
        $student->student_name = $request->input('fullname');
        $student->class_name = $request->input('group');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
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

        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới thành công');
        return redirect()->route('bills_index');
    }

    public function destroy ($id)
    {
        $bill = Bill::FindOrFail($id);
        $bill->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        return redirect()->route('bills_index');
    }
}
