<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weightages', function (Blueprint $table) {
            $table->id();
            $table->integer('cr1_limit')->default(0);
            $table->integer('cr1_score')->default(0);
            $table->integer('cr2_limit')->default(0);
            $table->integer('cr2_score')->default(0);
            $table->integer('cr3_limit')->default(0);
            $table->integer('cr3_score')->default(0);
            $table->integer('cr4_limit')->default(0);
            $table->integer('cr4_score')->default(0);
            $table->integer('cr9_weightage')->default(0);
            $table->integer('cr9_score')->default(0);
            $table->integer('cr10_weightage')->default(0);
            $table->integer('cr10_score')->default(0);
            $table->integer('cr11_weightage')->default(0);
            $table->integer('cr11_score')->default(0);
            $table->integer('cr12_weightage')->default(0);
            $table->integer('cr12_score')->default(0);
            $table->integer('cr13_weightage')->default(0);
            $table->integer('cr13_score')->default(0);
            $table->integer('cr14_weightage')->default(0);
            $table->integer('cr14_score')->default(0);
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
        Schema::dropIfExists('weightages');
    }
}
