<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Status;
use App\Enums\Discounts;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->string('barcode')->unique();
            $table->string('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->decimal('price',8,2);
            $table->decimal('price_after_discount',8,2)->default(0);
            $table->integer('quantity');
            $table->integer('views');
            $table->string('status')->default(Status::DEFAULT)->comment(Status::INACTIVE.', '.Status::ACTIVE);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->dateTime('discount_start_at')->nullable();
            $table->dateTime('discount_end_at')->nullable();
            $table->string('discount_type')->nullable()->comment(Discounts::FIXED.', '.Discounts::PERCENT);
            $table->decimal('discount',8,2)->default(0);
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
        Schema::dropIfExists('products');
    }
}
