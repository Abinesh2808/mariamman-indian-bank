<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('date_of_birth');
            $table->char('mobile', 10);
            $table->string('email');
            $table->string('address');
            $table->integer('family_income');
            $table->string('password');
            $table->string('id_card_type');
            $table->string('id_card_number');
            $table->integer('account_number');
            $table->integer('customer_id');
            $table->boolean('is_active');
            $table->double('balance');
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
        Schema::dropIfExists('customers');
    }
}
