<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;

class AdminBillController extends Controller
{
    public function index(){
        $bill = Bill::paginate(10);
        return view('admin.page.bills.index',compact('bill'));
    }
    public function details($id){
        $bill_details = BillDetail::where('id_bill',$id)->get();
        // dd($bill_details);
        return view('admin.page.bills.details',compact('bill_details'));
    }
}
