<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid', 36)->unique();
            $table->bigInteger('balance_wallet')->default(0)->nullable(true);
            $table->bigInteger('poin_wallet')->default(0)->nullable(true);
            $table->string('pin');
            // $table->uuid('user_uuid', 36);
            // $table->foreign('user_uuid')->references('uuid')->on('users');
            $table->foreignId('user_uuid');
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
        Schema::dropIfExists('wallet');
    }
}
