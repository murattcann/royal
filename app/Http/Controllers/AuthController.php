<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    private AuthService $service;

    public function __construct()
    {
        $this->service = new AuthService;
    }
    
    public function index(){
        return view("auth.login");
    }

    public function login(LoginRequest $request){
        $login = $this->service->login($request->email, $request->password);
        
        if($login){
            return redirect()->route("home-page")->with("success", "Logged In Successfully!");
        }

        return redirect()->back()->with("error", "Something Went Wrong...");
    }

    public function logout(){
        $this->service->logout();
        
        return redirect()->route("login-page")->with("success", "Logged Out!");
    }

}
