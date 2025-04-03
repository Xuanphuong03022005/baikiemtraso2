<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function destroy($id)
    {
        try{
            $category = User::find($id);
            $category->delete();
            return redirect()->back()->with( 'message' ,'Xoá thành công');
        }catch(Exception $e){
            return redirect()->back()->with( 'message' ,'Xoá Không thành công');
        }
    }
    public function index()
    {
        $users = User::withTrashed()->get();
        return view('admin.list_user', compact('users'));
    }
    public function create()
    {
        return view('signup');
    }
    public function store(RegisterRequest $request)
    {
        $data = $request->all();
        $pass = Hash::make($data['password']);
        $user = User::create([
            'name' => $data['name'],
            'user_name' => $data['user_name'],
            'phone' => $data['phone'],
            'email'  => $data['email'],
            'birthday' => $data['birthday'],
            'address' => $data['address'],
            'password' => $pass,
        ]);
        try {

            return redirect()->back()->with('message', 'Thêm người dùng ' . $data['name'] . ' thành công.');
        } catch (Exception $e) {
            return redirect()->back()->with('message', 'Thêm người dùng không thành công.');
        }
    }
    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu ít nhất 6 ký tự'
            ]
        );
        $credentials = ['email' => $req->email, 'password' => $req->password];
        if (Auth::attempt($credentials)) {
            if(Auth::user()->level == 1){
                return redirect()->route('admin.home');
            }else{
                return redirect()->route('trangchu');
            }
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập không thành công']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('trangchu');
    }
}
