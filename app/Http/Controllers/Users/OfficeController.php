<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:office');
    }

    public function index()
    {
        return view('users.office');
    }
}
