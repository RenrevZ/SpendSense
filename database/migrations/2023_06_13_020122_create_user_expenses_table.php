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
            $table->string('EXPENSE_TYPE')->primary();
            $table->string('CASH_TYPE_ID');
            $table->string('EXPENSE_ID');
            $table->string('USER_ID');
            $table->string('AMOUNT');
            $table->timestamp('DATE_CREATED');
            $table->timestamps();

            // FOREIGN KEY
            $table->foreign('CASH_TYPE_ID')->references('CASH_TYPE_ID')->on('cash_types');
            $table->foreign('EXPENSE_ID')->references('EXPENSE_ID')->on('expenses_types');
            $table->foreign('USER_ID')->references('USER_ID')->on('users');
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
