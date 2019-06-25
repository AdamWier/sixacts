<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAuthTokenSecret extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auth_data', function (Blueprint $table)
        {
            $table->renameColumn('tokenSecret', 'token_secret');
            
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auth_data', function (Blueprint $table) {
            $table->renameColumn('token_secret', 'tokenSecret');
        });
    }
}
