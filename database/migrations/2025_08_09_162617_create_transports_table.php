<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('transports', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Operator name
        $table->enum('type', ['bus', 'train']);
        $table->string('route_from');
        $table->string('route_to');
        $table->time('departure_time');
        $table->decimal('price', 8, 2);
        $table->integer('total_seats');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transports');
    }
};
