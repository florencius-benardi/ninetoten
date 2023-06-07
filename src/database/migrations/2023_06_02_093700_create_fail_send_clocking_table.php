<?php

use App\Models\FailSendClocking;
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
        Schema::create(FailSendClocking::ATTR_TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(FailSendClocking::ATTR_INT_CLOCKING_ID);
            $table->mediumText(FailSendClocking::ATTR_CHAR_MESSAGE)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(FailSendClocking::ATTR_TABLE);
    }
};
