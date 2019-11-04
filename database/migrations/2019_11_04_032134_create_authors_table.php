<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors',               // 테이블명
            function (Blueprint $table) {       // Closure, 콜백
                //$table : Blueprint 클래스의 인스턴스
                //         posts 테이블 객체(인스턴스)
                $table->increments('id');  // 6.x 버전.
                $table->string('email', 255);
                $table->string('password', 60);
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors;');
    }
}
