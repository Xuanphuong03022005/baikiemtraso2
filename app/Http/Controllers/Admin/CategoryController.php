<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $name = $data['name'];
        $description = $data['description'];
        $image_name = $request->file('image')->getClientOriginalName();
        $success = $request->file('image')->storeAs('images', $image_name, 'public');
        if($success){
            try{
                $category = Category::create([
                    'name'=> $name,
                    'description' =>  $description,
                    'image' =>$image_name
                ]);
                return redirect()->back()->with( 'message' ,'Thêm phân loại thành công');
            }catch(Exception $e){
                return redirect()->back()->with( 'message' ,'Thêm phân loại không thành công');
            }
           
        }else{
            return redirect()->back()->with( 'message' ,'Thêm ảnh không thành công');
        }
    }

    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')
        ->get();
        return view('admin.list_category', compact('categories'));
    }
    public function edit($id)
    {
        $cate = Category::find($id);
        return  view('admin.edit_category', compact('cate'));
    }
    public function update(Request $request, $id){
        $data = $request->all();
        $name = $data['name'];
        $description = $data['description'];
        if($request->file('image')){
            $image_name = $request->file('image')->getClientOriginalName();
            $success = $request->file('image')->storeAs('images', $image_name, 'public');
        }else{
            $image_name = $data['image_old'];
        }
        if($success){
            try{
                $category = Category::find($id);
                $category->update([
                    'name'=> $name,
                    'description' =>  $description,
                    'image' =>$image_name
                ]);
                return redirect()->back()->with( 'message' ,'Cập nhật phân loại thành công');
            }catch(Exception $e){
                return redirect()->back()->with( 'message' ,'Cập nhật phân loại không thành công');
            }
           
        }else{
            return redirect()->back()->with( 'message' ,'Cập nhật ảnh không thành công');
        }
    }
    public function destroy($id)
    {
        try{
            $category = Category::find($id);
            $category->delete();
            return redirect()->back()->with( 'message' ,'Xoá thành công');
        }catch(Exception $e){
            return redirect()->back()->with( 'message' ,'Xoá Không thành công');
        }
       

    }
}
