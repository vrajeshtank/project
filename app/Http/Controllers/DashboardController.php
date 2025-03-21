<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Business;
use DB;

class DashboardController extends Controller
{
    public function index() {
        $user = User::select('name', 'email')->get();
        return view('dashboard', compact('user'));
    }

   
}
