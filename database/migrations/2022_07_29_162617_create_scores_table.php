<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->unique();
            $table->integer('qualification_1')->default(0);
            $table->integer('qualification_2')->default(0);
            $table->integer('qualification_3')->default(0);
            $table->integer('qualification_4')->default(0);
            $table->integer('experience_1')->default(0);
            $table->integer('experience_2')->default(0);
            $table->integer('experience_3')->default(0);
            $table->integer('experience_4')->default(0);
            $table->integer('capex_1')->default(0);
            $table->integer('capex_2')->default(0);
            $table->integer('capex_3')->default(0);
            $table->integer('total')->default(0);
            $table->text('_token')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('scores');
    }
}
