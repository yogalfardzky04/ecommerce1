<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        /**Mengambil data dari database */
        $users = User::get();
        return view('admin.user.index',[
            'users' => $users

        ]);
    }
}
