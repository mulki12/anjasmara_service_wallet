<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid', 36)->unique(true);
            $table->string('title_promo');
            $table->string('description_promo')->nullable(true);
            $table->string('image_promo')->nullable(true);
            $table->string('code_promo')->nullable(true);
            $table->bigInteger('discount_promo')->nullable(true);
            $table->string('type_discount_promo')->nullable(true);
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
        Schema::dropIfExists('promo');
    }
}
