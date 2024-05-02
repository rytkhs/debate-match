<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DebateController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function debateRoom()
    {
        return view('debateRoom');
    }
}
