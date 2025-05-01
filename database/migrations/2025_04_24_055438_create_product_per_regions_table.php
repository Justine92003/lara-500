<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Product;
use App\Models\Region;  

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_per_regions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class, 'products')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Region::class, 'regions')->constrained()->onDelete('cascade');
            $table->bigInteger('totalSales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_per_regions');
    }
};
