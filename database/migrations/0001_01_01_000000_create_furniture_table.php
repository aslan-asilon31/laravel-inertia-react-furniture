<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Categories for organizing products (e.g., 'Living Room', 'Bedroom', 'Kitchen')
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->uuid('parent_id')->nullable()->constrained('categories')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Products table - the core of the shop
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('sku')->unique()->comment('Stock Keeping Unit');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('long_description')->nullable();
            $table->decimal('price', 10, 2)->nullable();

            $table->uuid('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

            $table->string('main_image')->nullable();
            $table->json('gallery_images')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        // Attributes for product variations (e.g., 'Color', 'Material', 'Size')
        Schema::create('attributes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->unique()->nullable(); // e.g., Color, Size
            $table->string('type')->default('text'); // e.g., color, text, image
            $table->timestamps();
        });

        // Attribute values (e.g., 'Red', 'Large', 'Oak')
        Schema::create('attribute_values', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('attribute_id');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade')->onUpdate('cascade');

            $table->string('value')->nullable(); // e.g., Red, L, Oak
            $table->string('code')->nullable(); // e.g., #FF0000 for color
            $table->timestamps();
        });

        // Pivot table to link products with their attributes
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

            $table->uuid('attribute_id');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });

        // Product Variants (SKUs for each combination of attributes, e.g., Red Large Sofa)
        Schema::create('product_variants', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

            $table->string('sku')->unique();
            $table->decimal('price_modifier', 10, 2)->nullable()->comment('Can modify the base product price');
            $table->integer('quantity')->default(0);
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Pivot table to link variants with their specific attribute values
        Schema::create('product_variant_values', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

            $table->uuid('attribute_id');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });

        // Warehouses or store locations for inventory management
        Schema::create('warehouses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
        });

        // Inventory tracking for each product variant at each warehouse
        Schema::create('inventory', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('product_variant_id');
            $table->foreign('product_variant_id')->references('id')->on('product_variants')->onDelete('cascade')->onUpdate('cascade');

            $table->uuid('warehouse_id');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('quantity')->nullable();
            $table->timestamps();
            $table->unique(['product_variant_id', 'warehouse_id']);
        });

        // Customers table
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Customer addresses (shipping and billing)
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');

            $table->string('type')->nullable(); // shipping, billing
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });

        // Orders table
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('order_number')->unique();
            $table->decimal('subtotal', 10, 2)->nullable();
            $table->decimal('tax', 10, 2)->nullable();
            $table->decimal('shipping_cost', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->string('status')->default('pending'); // e.g., pending, processing, shipped, delivered, cancelled
            $table->uuid('shipping_address_id')->constrained('customer_addresses');
            $table->uuid('billing_address_id')->constrained('customer_addresses');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // Order items (the specific products within an order)
        Schema::create('order_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('product_variant_id')->constrained('product_variants');
            $table->integer('quantity')->nullable();
            $table->decimal('price', 10, 2); // Price at the time of purchase
            $table->timestamps();
        });

        // Payments for orders
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->string('transaction_id')->unique();
            $table->string('payment_method')->default('paypal'); // e.g., credit_card, paypal
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('status')->default('waiting-for-payment'); // e.g., completed, failed
            $table->timestamps();
        });

        // Product reviews and ratings
        Schema::create('reviews', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('rating')->unsigned(); // 1 to 5
            $table->text('comment')->nullable();
            $table->boolean('is_approved')->default(false);
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
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('customer_addresses');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('inventory');
        Schema::dropIfExists('warehouses');
        Schema::dropIfExists('product_variant_values');
        Schema::dropIfExists('product_variants');
        Schema::dropIfExists('product_attributes');
        Schema::dropIfExists('attribute_values');
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
};
