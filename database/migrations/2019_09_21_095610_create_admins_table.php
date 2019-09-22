<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('login');
            $table->string('password')->nullable();
            $table->string('name')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->string('office_id')->nullable();
            $table->string('status')->nullable();
            $table->string('super')->nullable();
            $table->string('publish')->nullable();
            $table->string('recruit')->nullable();
            $table->string('about')->nullable();
            $table->string('news')->nullable();
            $table->string('csr')->nullable();
            $table->string('product')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
