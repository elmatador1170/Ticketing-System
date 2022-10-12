<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view("auth/login");
    }


    /*
     * Login User
     *
     */
    public function store() {
        $credentials = request()->validate([
            "email" => ["email:rfc,dns"],
            "password" => "required"
        ]);


        if (auth()->attempt($credentials)) {
            return redirect("/tickets/");
        }

        return back()->withErrors([
            "login" => "User credentials not valid."
        ]);
    }

    /*
     * Logout User
     *
     */
    public function logout() {
        auth()->logout();
        return back();
    }


}
