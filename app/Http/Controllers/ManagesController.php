<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagesController extends Controller
{
    public function index() {

        return view('dashboard.manage.index');
    }
}
