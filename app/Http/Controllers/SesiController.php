<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index (){
    return view ('login');
    }

    function login (Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'    
        ], [
            'email.required' => 'email wajib di isi',
            'password.required' => 'password wajib di isi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin'){
                return redirect('/StokBarang');
            }elseif(Auth::user()->role == 'cashier'){
                return redirect('/Cashier');
            }
        }else{
            return redirect('')->withErrors('email yang anda masukan tidak seusai')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}