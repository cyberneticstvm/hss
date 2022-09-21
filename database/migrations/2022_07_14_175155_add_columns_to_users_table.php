<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile', 10)->unique();
            $table->char('company_type', 2)->comment("JV-Joint Venture, SC-Single Company");
            $table->integer('company_count')->default('1');
            $table->string('user_type', 10)->comment("user, admin, staff");
            $table->string('email_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('mobile', 'company_type', 'company_count', 'user_type');
        });
    }
}
