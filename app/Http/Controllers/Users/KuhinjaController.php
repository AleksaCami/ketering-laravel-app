<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KuhinjaController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:kuhinja');
    }

    public function index()
    {
        return view('users.kuhinja');
    }
}
