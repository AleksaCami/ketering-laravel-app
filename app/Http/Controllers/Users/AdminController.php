<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        return view('users.admin');
    }

    public function prikaz_korisnika()
    {
        $users = User::all();
        return view('users.prikaz_korisnika')->with('users', $users);
    }
}
