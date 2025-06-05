<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    // only accessible to authenticateed user

    public function __contsruct() {
        $this->middleware('auth');
    }

    public function index() {

        return view('dashboard');
    }
}
