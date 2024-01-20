<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('parts', function (Blueprint $table) {
			$table->id();
			$table->string('part_number');
			$table->string('description')->nullable();
			$table->integer('quantity');
			$table->integer('minimum_stock_level')->nullable()->default(0);
			$table->integer('reorder_quantity')->nullable()->default(0);
			$table->unsignedBigInteger('supplier_id')->nullable(); // separate suppliers table
			$table->string('category')->nullable();
			$table->string('serial_number')->nullable();
			$table->string('bin_shelf_location');
			$table->decimal('unit_price', 8, 2);
			$table->smallInteger('status')->default(1); //  1 is for 'active', 2-draft, 3-archived
			$table->date('date_of_last_order')->nullable();
			$table->date('date_of_last_receipt')->nullable();
			$table->integer('lead_time')->nullable(); // In days
			$table->unsignedBigInteger('created_by'); //  foreign key to users table
			$table->unsignedBigInteger('modified_by')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('parts');
	}
};
