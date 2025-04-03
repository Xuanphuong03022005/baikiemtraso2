<?php

namespace App\Http\Controllers;

use App\Cart as AppCart;
use App\Models\Bill;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\BillDetail;
use App\Models\Slide;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Process\Process;

class PageController extends Controller
{
    public function order(Request $request)
    {
        DB::beginTransaction();
        try{
            $cart=Session::get('cart');
            $customer=new Customer();
            $customer->name=$request->input('name');
            $customer->gender=$request->input('gender');
            $customer->email=$request->input('email');
            $customer->address=$request->input('address');
            $customer->phone_number=$request->input('phone_number');
            $customer->note=$request->input('notes');
            $customer->save();
    
            $bill=new Bill();
            $bill->id_customer=$customer->id;
            $bill->date_order=date('Y-m-d');
            $bill->total=$cart->totalPrice;
            $bill->payment=$request->input('payment_method');
            $bill->note=$request->input('notes');
            $bill->save();
    
            foreach($cart->items as $key=>$value)
            {
                $bill_detail=new BillDetail();
                $bill_detail->id_bill=$bill->id;
                $bill_detail->id_product=$key;
                $bill_detail->quantity=$value['qty'];
                $bill_detail->unit_price=$value['price'];
                $bill_detail->save();
            }
            Session::forget('cart');
            DB::commit();
            return redirect()->route('checkout')->with('success','Đặt hàng thành công');
        }catch(Exception){
            DB::rollBack();
            return redirect()->back()->with('success','Đặt hàng không thành công');
        }
       
    }
    public function checkout()
    {
       
        return view('checkout');
    }
    public function index()
    {
        //san pham top 
        $product_top = Product::where('top', 1)
        ->get();
        //san pham moi
        $products = Product::where('new', 1)
        ->get();
        //san pham khuyen mai
        $promotion = Product::where('promotion_price', '!=', 0)
        ->paginate(4);
        $number_top = Product::where('top', 1)->count();
        $number_new =Product::where('new', 1)->count();
        $number_promotion =Product::where('promotion_price', '!=', 0)->count();
        return view('home', compact('products', 'promotion', 'product_top', 'number_top', 'number_new' , 'number_promotion'));
    }
    public function addToCart(Request $request, $id)
    {
       
        $product =Product::find($id);
        if(!$product){
            return redirect()->back()->with('message', 'Sản phẩm không tồn tại');
        }
        $cartOld = Session::has('cart') ? Session::get('cart') : null ;
        $cart = new Cart($cartOld);
        $cart->add($product, $id);
        Session::put('cart', $cart);
        return redirect()->route('cart');
    }
  public function search(Request $request){
      $data = $request->all();
      $value = $data['value'];
      $products = Product::where('name', 'like', '%'.$value.'%')->get();
      return view('search', compact('products'));
  }

}
