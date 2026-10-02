<?php
use App\Enums\OrderStatusEnum;
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
        Schema::create('order_statues', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 255);
            $table->enum('status', array_values(OrderStatusEnum::cases()))->default(OrderStatusEnum::CONFIRMED->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_statues');
    }
};
