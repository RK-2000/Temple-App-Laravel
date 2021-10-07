<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function __construct()
  {

    $this->middleware('guest:admin')->except('logout');
  }
  public function index()
  {
    return view('admin.AdminLoginView');
  }

  public function login(Request $request)
  {
    $this->validate($request, [
      "email" => "required|exists:tbl_admin_users,email",
      "password" => "required|min:6"
    ]);

    $credentials = $request->only('email', 'password');
    $credentials['status'] = 1;

    if (Auth::guard('admin')->attempt($credentials)) {

      return redirect()->route('admin.home')->with("message", "Admin login succesfully");
    } else {
      dd("User is deleted");
      return redirect()->back()->with("error", "Email or password is wrong");
    }
  }

  public function logout()
  {
    $route = "admin.login.get";
    Auth::guard('admin')->logout();
    return redirect()->route($route)->with("message", "logout successfully");
  }
}
