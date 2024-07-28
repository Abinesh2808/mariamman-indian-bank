<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_history', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('name');
            $table->string('transaction_type'); 
            $table->timestamp('transaction_date')->useCurrent();
            $table->double('debit')->default(0);
            $table->double('credit')->default(0);
            $table->double('balance')->default(0);
            $table->string('status')->default('completed');
            $table->string('utr_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_history');
    }
}
