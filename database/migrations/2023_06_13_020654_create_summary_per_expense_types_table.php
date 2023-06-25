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
        Schema::create('summary_per_expense_types', function (Blueprint $table) {
            $table->id();
            $table->string('EXPENSE_ID');
            $table->string('USER_ID');
            $table->string('AMOUNT');
            $table->timestamps();

            // FOREIGN KEY
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
        Schema::dropIfExists('summary_per_expense_types');
    }
};
