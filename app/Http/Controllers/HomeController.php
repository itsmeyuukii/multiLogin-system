<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            //Check the Auth if user then go to admin.home
            if(Auth::user()->usertype == "user") {
                return view("dashboard");
            }else
            {
                return view("admin.home");
            }
        }
        return redirect("/login");
    }
    public function page()
    {
        return view("admin.admin");
    }
}
