<?php
/**
 * 社員管理システム用のコントローラーファイル
 * 
 * このファイルでは社員管理システムページで行う処理に関するコントローラーです。
 * 
 * @version 1.0 
 * @author Rikuto Otsuka
 * 
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployController extends Controller
{
    /*トップページを表示します*/
    public function index()
    {
        return view('employ/index');
    }
}
