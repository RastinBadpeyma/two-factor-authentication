<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AuthTokenController extends Controller
{
    public function getToken(Request $request)
    {
      if (!$request->session()->has('auth')){
          return redirect('/');
      }
      $request->session()->reflash();

        return view('auth.token');
    }

    public function postToken(Request $request)
    {
        if (!$request->session()->has('auth')){
            return redirect('/');
        }
    }
}
