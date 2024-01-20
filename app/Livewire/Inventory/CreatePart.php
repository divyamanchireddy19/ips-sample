<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use App\Models\Inventory\Part;
use Illuminate\Support\Facades\Auth;

class CreatePart extends Component
{
	public $part_number, $description, $quantity, $unit_price, $bin_shelf_location, $minimum_stock_level, $reorder_quantity, $supplier_id, $status, $category, $serial_number, $date_of_last_order, $date_of_last_receipt, $lead_time, $created_by, $modified_by;

	protected function rules()
	{
		return [
			'part_number' => 'required|string|max:255|unique:parts,part_number',
			'description' => 'required|string|max:1000',
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
		];
	}

	public function save()
	{
		$this->validate();

		Part::create([
			'part_number' => $this->part_number,
			'description' => $this->description,
			'quantity' => $this->quantity,
			'unit_price' => $this->unit_price,
			'bin_shelf_location' => $this->bin_shelf_location,
			'minimum_stock_level' => $this->minimum_stock_level,
			'reorder_quantity' => $this->reorder_quantity,
			'supplier_id' => $this->supplier_id,
			'status' => $this->status,
			'category' => $this->category,
			'serial_number' => $this->serial_number,
			'date_of_last_order' => $this->date_of_last_order,
			'date_of_last_receipt' => $this->date_of_last_receipt,
			'lead_time' => $this->lead_time,
			'created_by' => Auth::id(), // Set 'created_by' as the ID of the logged-in user
		]);

		session()->flash('message', 'Part successfully created.');

		// return redirect()->back();
		return redirect()->route('inventory.parts');

	}

	public function render()
	{
		return view('livewire.inventory.create-part')->layout('layouts.app');
	}
}
