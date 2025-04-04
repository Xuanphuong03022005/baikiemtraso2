<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Http\Request;

class BillControllere extends Controller
{
    public function show($id){
        $bill = BillDetail::where('id_bill', $id)
        ->join('products as p', 'bill_detail.id_product', 'p.id')
        ->join('bills as b', 'bill_detail.id_bill', 'b.id')
        ->select('bill_detail.*', 'p.name as product_name', 'b.status as status')
        ->get();
        return view('admin.list_bill_detail', compact('bill'));
    }
    public function index()
    {
        $bills = Bill::join('customer as c', 'bills.id_customer', 'c.id')
        ->select('bills.*', 'c.name as user_name')
        ->get();
        return view('admin.list_bill', compact('bills'));
    }
    
}
