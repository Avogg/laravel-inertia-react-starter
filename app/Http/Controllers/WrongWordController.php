<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WrongWordController extends Controller
{
    public function index()
    {
        return inertia('Wrongword/Index');
    }
}
