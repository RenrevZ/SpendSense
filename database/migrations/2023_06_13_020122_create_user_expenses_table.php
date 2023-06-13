<?php

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
        Schema::create('user_expenses', function (Blueprint $table) {
            $table->id('EXPENSE_TYPE');
            $table->unsignedBigInteger('CASH_TYPE_ID');
            $table->unsignedBigInteger('EXPENSE_ID');
            $table->unsignedBigInteger('USER_ID');
            $table->string('AMOUNT');
            $table->timestamp('DATE_CREATED');
            $table->timestamps();

            // FOREIGN KEY
            $table->foreign('CASH_TYPE_ID')->references('CASH_TYPE_ID')->on('cash_types');
            $table->foreign('EXPENSE_ID')->references('EXPENSE_ID')->on('expenses_types');
            $table->foreign('USER_ID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_expenses');
    }
};
