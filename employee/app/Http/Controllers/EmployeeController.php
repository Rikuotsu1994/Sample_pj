<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /**
    *トップページを表示します
    *
    *@return View
    */
    public function index(): View
    {
        return view('employee/index');
    }
}
