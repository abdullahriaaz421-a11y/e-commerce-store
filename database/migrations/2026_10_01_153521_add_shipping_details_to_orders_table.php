<?php

use App\Enums\CourierCompanyEnum;
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
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('courier_company',array_values(CourierCompanyEnum::cases()))->default(CourierCompanyEnum::DHL->value)->after('payment_method')->nullable();
            $table->string('tracking_number')->after('courier_company')->nullable();
            $table->string('delivery_days')->after('tracking_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
