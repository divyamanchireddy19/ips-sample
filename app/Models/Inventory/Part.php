<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Part extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'part_number',
		'description',
		'quantity',
		'unit_price',
		'bin_shelf_location',
		'minimum_stock_level',
		'reorder_quantity',
		'supplier_id',
		'status',
		'category',
		'serial_number',
		'date_of_last_order',
		'date_of_last_receipt',
		'lead_time',
		'created_by',
		'modified_by',
	];

	protected $dates = [
		'date_of_last_order', 'date_of_last_receipt', 'deleted_at',
	];

	// Scopes
	public function scopeActive($query)
	{
		return $query->where('status', 1); //  1 is 'active'
	}

	public function scopeDraft($query)
	{
		return $query->where('status', 3); //  3 is 'archived'
	}

	public function scopeArchived($query)
	{
		return $query->where('status', 3); //  3 is 'archived'
	}

	public function setUnitPriceAttribute($value)
	{
		$this->attributes['unit_price'] = $value * 100; // Storing price in cents
	}

	public function setDateOfLastOrderAttribute($value)
	{
		$this->attributes['date_of_last_order'] = \Carbon\Carbon::parse($value);
	}

	public function setDateOfLastReceiptAttribute($value)
	{
		$this->attributes['date_of_last_receipt'] = \Carbon\Carbon::parse($value);
	}

	public function getUnitPriceAttribute($value)
	{
		return $value / 100; // Converting price back from cents
	}

	// Add relationships (like supplier, createdBy, modifiedBy) as per your database structure...
}
