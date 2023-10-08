<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('chatroom_1', function (Blueprint $table) {
            //
            $table->string("chat")->change()->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chatroom_1', function (Blueprint $table) {
            //
            $table->string("chat")->change()->nullable(false);
        });
    }
};
