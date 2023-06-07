<?php

use App\Models\SettingSendClocking;
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
        Schema::create(SettingSendClocking::ATTR_TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(SettingSendClocking::ATTR_CHAR_KEY);
            $table->string(SettingSendClocking::ATTR_CHAR_VALUE)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(SettingSendClocking::ATTR_TABLE);
    }
};
