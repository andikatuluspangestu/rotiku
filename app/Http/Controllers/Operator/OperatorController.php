<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $title = 'Operator Dashboard';
        return view('operator.dashboard', compact('title'));
    }
}
