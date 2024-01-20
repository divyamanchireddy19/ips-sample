<?php

namespace App\Imports;

use App\Models\Inventory\Part;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PartsImport implements ToModel, WithHeadingRow
{
	public function model(array $row)
	{
		$this->validate($row);

		$partData = [
			'part_number' => $row['part_number'],
			'description' => $row['description'],
			'quantity' => $row['quantity'],
			'unit_price' => $row['unit_price'],
			'bin_shelf_location' => $row['bin_shelf_location'],
			// 'minimum_stock_level' => $row['minimum_stock_level'],
			// 'reorder_quantity' => $row['reorder_quantity'],
			// 'supplier_id' => $row['supplier_id'],
			'status' => $row['status'],
			// 'category' => $row['category'],
			// 'serial_number' => $row['serial_number'],
			// 'date_of_last_order' => Carbon::parse($row['date_of_last_order']),
			// 'date_of_last_receipt' => Carbon::parse($row['date_of_last_receipt']),
			// 'lead_time' => $row['lead_time'],
			'created_by' => Auth::id(),
			'modified_by' => Auth::id(),
			// Auth::id(), // You can use Auth::id() to get the current authenticated user's ID
		];

		// Specify the condition to check for an existing record (e.g., part_number)
		$condition = ['part_number' => $row['part_number']];

		// Perform create or update
		Part::updateOrInsert($condition, $partData);
	}

	protected function validate(array $row)
	{
		$validator = validator($row, [
			'part_number' => 'required|max:255',
			// 'description' => 'required|string|max:1000',
			'quantity' => 'required|integer|min:0',
			'unit_price' => 'required|numeric|min:0',
			'bin_shelf_location' => 'nullable|string|max:255',
			// 'minimum_stock_level' => 'required|integer|min:0',
			// 'reorder_quantity' => 'required|integer|min:0',
			// 'supplier_id' => 'nullable|exists:suppliers,id',
			'status' => 'required|integer', // Define status range if needed
			// 'category' => 'nullable|string|max:255',
			// 'serial_number' => 'nullable|string|max:255',
			// 'date_of_last_order' => 'nullable|date',
			// 'date_of_last_receipt' => 'nullable|date',
			// 'lead_time' => 'nullable|integer|min:0',
			// 'created_by' => 'required|exists:users,id',
			// 'modified_by' => 'nullable|exists:users,id',
		]);

		if ($validator->fails()) {
			$errors = $validator->errors()->messages();
			throw new \Exception("Validation failed: " . json_encode($errors));
		}
	}
}
