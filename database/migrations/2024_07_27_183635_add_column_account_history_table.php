<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAccountHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_history', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')
                                        ->on('customers')->onDelete('cascade');
            $table->integer('account_number')->unsigned();
            $table->foreign('account_id')->references('account_number')
                                        ->on('customers')->onDelete('cascade');
            
        });


        DB::unprepared('
            CREATE TRIGGER update_balance_after_insert
            AFTER INSERT ON account_history
            FOR EACH ROW
            BEGIN
                UPDATE account_history
                SET balance = (SELECT COALESCE(SUM(credit - debit), 0) FROM account_history WHERE id <= NEW.id)
                WHERE id = NEW.id;
            END
        ');

        DB::unprepared('
            CREATE TRIGGER update_balance_after_update
            AFTER UPDATE ON account_history
            FOR EACH ROW
            BEGIN
                UPDATE account_history
                SET balance = (SELECT COALESCE(SUM(credit - debit), 0) FROM account_history WHERE id <= NEW.id)
                WHERE id = NEW.id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_history', function (Blueprint $table) {
            //
        });
    }
}
