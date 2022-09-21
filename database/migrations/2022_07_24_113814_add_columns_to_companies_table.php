<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id');
            $table->string('domain_area')->nullable();
            $table->string('registered_address')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('contact_person', 50)->nullable();
            $table->string('contact_number', 15)->nullable();
            $table->string('email', 50)->nullable();
            $table->date('date_of_incorp', 50)->nullable();
            $table->integer('years_of_experience')->default(0)->nullable();
            $table->integer('number_of_employees')->default(0)->nullable();
            $table->integer('year1')->default(0)->nullable();
            $table->decimal('fee1', 10, 2)->default(0.00)->nullable();
            $table->integer('year2')->default(0)->nullable();
            $table->decimal('fee2', 10, 2)->default(0.00)->nullable();
            $table->integer('year3')->default(0)->nullable();
            $table->decimal('fee3', 10, 2)->default(0.00)->nullable();
            $table->text('blacklisted_details')->nullable();
            $table->text('litigations_details')->nullable();
            $table->text('not_eligible_details')->nullable();
            $table->text('other_details')->nullable();
            $table->string('attachment_1')->nullable()->comment('Scanned Cover letter');
            $table->string('attachment_2')->nullable()->comment('Partnership Deed / Sales Tax Registration / Memorandum of Articles of Association');
            $table->string('attachment_3')->nullable()->comment('Copy of Certificate of incorporation');
            $table->string('attachment_4')->nullable()->comment('Copy of the audited balance sheet for the last three years');
            $table->string('attachment_5')->nullable()->comment('Certification by Chartered Accountant regarding turnover from Design/Execution of LWM Projects');
            $table->string('attachment_6')->nullable()->comment('Net worth certification by a Chartered accountant');
            $table->string('attachment_7')->nullable()->comment('Copies of at least three work orders');
            $table->string('attachment_8')->nullable()->comment('Letter of satisfaction from at least two clients');
            $table->string('attachment_9')->nullable()->comment('In support of the information, Photo copies of project completion / commissioning certificates, and any other relevant documents. The details should cover Consultant experience in the development of the facility');
            $table->string('attachment_10')->nullable()->comment('Key Full time staff Qualifications and Experience');
            $table->unsignedBigInteger('user_id');
            $table->foreign('type_id')->references('id')->on('company_types');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('type_id', 'domain_area', 'registered_address', 'contact_address', 'contact_person', 'contact_number', 'email', 'email', 'date_of_incorp', 'years_of_experience', 'number_of_employees', 'year1', 'fee1', 'year2', 'fee2', 'year3', 'fee3', 'blacklisted_details', 'litigations_details', 'not_eligible_details', 'other_details', 'attachment_1', 'attachment_2', 'attachment_3', 'attachment_4', 'attachment_5', 'attachment_6', 'attachment_7', 'attachment_8', 'attachment_9', 'attachment_10');
        });
    }
}
