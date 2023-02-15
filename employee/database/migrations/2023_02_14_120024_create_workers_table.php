<?php
/**
 * workersテーブル用のマイグレーションファイル
 * 
 * このファイルでは社員管理システムのデータを格納するため
 * デフォルテーブルのひな型を格納してます。 
 * 
 * @version 1.0 
 * @author Rikuto Otsuka
 * 
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('password');
            $table->string('name');
            $table->string('sex');
            $table->integer('age');
            $table->string('address');
            $table->string('department');
            $table->string('division');
            $table->date('hire_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
};
