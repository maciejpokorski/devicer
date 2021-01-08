<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDevicesHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_devices_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('device_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('millage_old')->default(0);
            $table->unsignedInteger('millage_new')->nullable();
            $table->boolean('is_accesable_old')->default(1);
            $table->boolean('is_accesable_new')->default(1);
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
        Schema::dropIfExists('user_devices_history');
    }
}
