<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BillDetailController extends Controller
{
    public function show($id) {
        $bill = BillDetail::FindOrFail($id);
        return view('bills.bill_details', compact('bill'));

    }

    public function update(Request $request, $id)
    {
        $bill = BillDetail::FindOrFail($id);
        $bill_update = Bill::findOrFail($bill->bill->id);

        $book = Book::findOrFail($bill->books->id);
        if($request->input('status') == 'Đã trả'){
            $bill_update->status = $request->input('status');
            $bill_update->save();
            $book->quantity = $book->quantity +1;
            $book->save();
        } else {
            $bill_update->status = $request->input('status');
            $bill_update->save();
        }
        Session::flash('success', 'Tạo mới thành công');
        return redirect()->route('bill_details', $bill->id);
    }
}
