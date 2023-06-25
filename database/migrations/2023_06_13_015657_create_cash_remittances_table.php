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
        Schema::create('cash_remittances', function (Blueprint $table) {
            $table->string('CASH_ID')->primary();
            $table->string('USER_ID');
            $table->string('CASH_TYPE_ID');
            $table->string('AMOUNT');
            $table->timestamp('DATE_CREATED');
            $table->timestamps();

            // FOREIGN KEY
            $table->foreign('USER_ID')->references('USER_ID')->on('users');
            $table->foreign('CASH_TYPE_ID')->references('CASH_TYPE_ID')->on('cash_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash_remittances');
    }
};
