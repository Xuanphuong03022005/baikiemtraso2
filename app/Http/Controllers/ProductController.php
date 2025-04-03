<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{

    public function edit($id)
    {
        $categories = Category::all();
        $product = product::find($id);
        return view('admin.edit_product', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($request->file('image')) {
            $image_name = $request->file('image')->getClientOriginalName();
            $success = $request->file('image')->storeAs('images', $image_name, 'public');
        } else {
            $image_name = $data['image_old'];
        }
        if ($success) {
            try {
                $product = Product::find($id);
                $product->update([
                    'id_type' => $data['id_type'],
                    'description' => $data['description'],
                    'unit_price' => $data['unit_price'],
                    'image' => $image_name,
                    'unit' => $data['unit'],
                    'name' => $data['name'],
                ]);
                return redirect()->back()->with('message', 'Cập nhật sản phẩm thành công');
            } catch (Exception $e) {
                return redirect()->back()->with('message', 'Cập nhật sản phẩm không thành công');
            }
        } else {
            return redirect()->back()->with('message', 'Cập nhật ảnh không thành công');
        }
    }
    public function index()
    {
        $products = product::join('type_products as t', 'products.id_type', 't.id')
            ->select('products.*', 't.name as type_name')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.list_products', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.add_product', compact('categories'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $image_name = $request->file('image')->getClientOriginalName();
        try {
            $success = $request->file('image')->storeAs('images', $image_name, 'public');
            $product = Product::create([
                'id_type' => $data['id_type'],
                'description' => $data['description'],
                'unit_price' => $data['unit_price'],
                'image' => $image_name,
                'unit' => $data['unit'],
                'name' => $data['name'],
            ]);
            return redirect()->back()->with('message', 'Thêm sản phẩm thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('message', 'Thêm sản phẩm không thành công');
        }
    }
    public function show($id)
    {
        $product = Product::where('products.id', $id)
            ->join('type_products as t', 'products.id_type', 't.id')
            ->select('products.*', 't.name as type_name', 't.description as type_description', 't.image as type_image')
            ->first();
        return view('product', compact('product'));
    }
    public function destroy($id){
        try {
            $product = Product::where('id', $id)
            ->delete();
            return redirect()->back()->with('message', 'Xoá sản phẩm thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('message', 'Xoá sản phẩm không thành công');
        }
    }
}
