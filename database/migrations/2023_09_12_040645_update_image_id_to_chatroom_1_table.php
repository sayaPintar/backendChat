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
            $table->foreign("image_id")->references("id")->on("chat_image")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chatroom_1', function (Blueprint $table) {
            //
            $table->dropForeign("chatroom_1_image_id_foreign");
        });
    }
};
