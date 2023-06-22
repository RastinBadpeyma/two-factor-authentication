<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified','password.confirm']);

    }

    public function index()
    {
        return 'test';
    }


}
