<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Product;
use App\Models\Region;
use App\Models\Salesperson;
use App\Models\Category;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales_records', function (Blueprint $table) {
            $table->id();
            $table->date('date-of-sale');
            $table->foreignIdFor(Product::class, 'products')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Category::class, 'categories')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Region::class, 'regions')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Salesperson::class, 'salespeople')->constrained()->onDelete('cascade');
            $table->bigInteger('units-sold');
            $table->bigInteger('unit-price');
            $table->bigInteger('totalSales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_records');
    }
};
