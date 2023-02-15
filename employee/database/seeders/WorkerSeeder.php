<?php
/**
 * workersテーブル用のSeederファイル
 * 
 * このファイルでは社員管理システムのデフォルトユーザーを定義してます。 
 * 
 * @version 1.0 
 * @author Rikuto Otsuka
 * 
 */
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $worker = [
            'password'=> bcrypt('12345678'),
            'name'=>'Admin',
            'sex'=>'男',
            'age'=>'20',
            'address'=>'東京都XXX市XX町',
            'department'=>'営業部',
            'division'=>'第一1課',
            'hire_date'=>'2023/01/01',
        ];
        DB::table('workers')->insert($worker);
    }
}
