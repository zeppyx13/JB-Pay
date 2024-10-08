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
        Schema::create('location', function (Blueprint $table) {
            $table->id('Id_location');
            $table->string('Location', 50);
            $table->string('Area', 30);
            $table->date('date');
            $table->time('Time');
            $table->string('DressCode', 30);
            $table->float('Budget');
            $table->string('MeetingPoint', 30);
            $table->string('Map', 600);
            $table->string('Activity', 30);
            $table->timestamps();
        });
        Schema::create('debt', function (Blueprint $table) {
            $table->id('Id_debt');
            $table->integer('Id_location');
            $table->float('Debt');
            $table->float('Paid');
            $table->string('Receipt');
            $table->string('Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi');
        Schema::dropIfExists('debt');
    }
};
