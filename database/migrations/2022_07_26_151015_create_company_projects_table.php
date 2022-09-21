<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('project_name', 150)->nullable();
            $table->string('client_name', 150)->nullable();    
            $table->decimal('project_cost', 10, 2)->default(0.00)->nullable();    
            $table->integer('project_period')->default(0)->nullable();    
            $table->date('project_start_date')->nullable();    
            $table->unsignedBigInteger('project_status')->default(0)->nullable();    
            $table->foreign('project_status')->references('id')->on('project_status');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_projects');
    }
}
