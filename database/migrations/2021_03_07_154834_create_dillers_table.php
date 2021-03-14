<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDillersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dillers', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('terminal_balance')->default(0);
            $table->tinyInteger('disable_edit_bonus_promo')->default(0);
            $table->tinyInteger('cashout_in_game')->default(0);
            $table->tinyInteger('cashout_all')->default(0);
            $table->tinyInteger('one_jackpot')->default(0);
            $table->tinyInteger('casino_out_payment_visa-mastercard')->default(0);
            $table->tinyInteger('casino_out_payment_qiwi')->default(0);
            $table->tinyInteger('casino_out_payment_paykassa')->default(0);
            $table->integer('minimum_rtp')->default(85);
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
        Schema::dropIfExists('dillers');
    }
}
