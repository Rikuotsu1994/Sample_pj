<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeFormRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Session;

class EmployeeController extends Controller
{
    /**
    * ログイン済みかどうかの判定を行います
    *
    * @return View
    */
    public function loginEmployee(): View
    {
        if (Auth::check()) {
            return view('employee/index');
        }
        else {
            return view('auth/login');
        }
    }

    /**
    * 社員データを登録します
    *
    * @param EmployeeFormRequest $request
    * @return RedirectResponse
    */
    public function createEmployee(EmployeeFormRequest $request): RedirectResponse
    {
        $param = [
            'password' => bcrypt($request->password),
            'worker_name' => $request->worker_name,
            'sex' => $request->sex,
            'age' => $request->age,
            'address' => $request->address,
            'department' => $request->department,
            'division' => $request->division,
            'hire_date' => $request->hire_date,
        ];

        DB::beginTransaction();
        try {
            DB::table('workers')->insert($param);
            DB::commit();
            return redirect('/employee/create')->with('message', '登録が完了しました。トップ画面に戻ります。');
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect('/employee/create')->with('message', '登録に失敗しました。トップ画面に戻ります。');
        }
    }

    /**
    * 検索条件に一致する社員データを取得します
    *
    * @param Request $request
    * @return View
    */
    public function searchEmployee(Request $request): View
    {
        $worker_id = $request->input('worker_id');
        $worker_name = $request->input('worker_name');
        $department = $request->input('department');
        $division = $request->input('division');
        $query = DB::table('workers');
        $query->where('worker_id', 'like', '%' .$worker_id .'%');
        $query->where('worker_name', 'like', '%' .$worker_name .'%');
        $query->where('department', 'like', '%' .$department .'%');
        $query->where('division', 'like', '%' .$division .'%');
        $workers = $query->paginate(30);
        return view('/employee/search', ['workers' => $workers])->with(compact('worker_id', 'worker_name', 'department', 'division'));
    }

    /**
    * 更新対象の社員データを取得します
    *
    * @param Request $request
    * @return View
    */
    public function getUpdateEmployee(Request $request): View
    {
        $workers = DB::table('workers')->where('worker_id', $request->worker_id)->get();
        return view('/employee/update', ['workers' => $workers]);
    }

    /**
    * 社員データを更新します
    *
    * @param EmployeeFormRequest $request
    * @return View
    */
    public function updateEmployee(EmployeeFormRequest $request): mixed
    {
        $param = [
            'worker_name' => $request->worker_name,
            'sex' => $request->sex,
            'age' => $request->age,
            'address' => $request->address,
            'department' => $request->department,
            'division' => $request->division,
            'hire_date' => $request->hire_date,
        ];

        DB::beginTransaction();
        try {
            DB::table('workers')->where('worker_id',$request->worker_id)->update($param);
            DB::commit();
            $workers = DB::table('workers')->where('worker_id', $request->worker_id)->get();
            Session::flash('message', '更新が完了しました。社員検索画面に戻ります。');
            return view('employee/update', ['workers' => $workers]);
        } catch (QueryException $e) {
            DB::rollBack();
            $workers = DB::table('workers')->where('worker_id', $request->worker_id)->get();
            Session::flash('message', '更新に失敗しました。社員検索画面に戻ります。');
            return view('employee/update', ['workers' => $workers]);
        }
    }
}