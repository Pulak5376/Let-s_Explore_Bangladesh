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
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->string('to');
            $table->date('date')->nullable();
            $table->time('departure_time');
            $table->string('bus_class');
            $table->integer('total_seats');
            $table->decimal('fare', 8, 2);
            $table->string('operator_name')->nullable();
            $table->boolean('recurring')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};
