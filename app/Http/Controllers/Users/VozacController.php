<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VozacController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:vozac');
    }

    public function index()
    {
        return view('users.vozac');
    }
}
