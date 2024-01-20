<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use App\Models\Inventory\Part;
use Illuminate\Support\Facades\Auth;

class EditPart extends Component
{
	public $part;
	public $part_id;
	public $part_number, $description, $quantity, $unit_price, $bin_shelf_location, $minimum_stock_level, $reorder_quantity, $supplier_id, $status, $category, $serial_number, $date_of_last_order, $date_of_last_receipt, $lead_time, $modified_by;

	public function mount($partId)
	{
		$this->part_id = $partId;
		$this->part = Part::findOrFail($partId);

		// Populate the form fields with existing part data
		$this->part_number = $this->part->part_number;
		$this->description = $this->part->description;
		$this->quantity = $this->part->quantity;
		$this->unit_price = $this->part->unit_price;
		$this->bin_shelf_location = $this->part->bin_shelf_location;
		$this->minimum_stock_level = $this->part->minimum_stock_level;
		$this->reorder_quantity = $this->part->reorder_quantity;
		$this->supplier_id = $this->part->supplier_id;
		$this->status = $this->part->status;
		$this->category = $this->part->category;
		$this->serial_number = $this->part->serial_number;
		$this->date_of_last_order = $this->part->date_of_last_order;
		$this->date_of_last_receipt = $this->part->date_of_last_receipt;
		$this->lead_time = $this->part->lead_time;
		$this->modified_by = Auth::id();
	}

	protected function rules()
	{
		return [
			'part_number' => 'required|string|max:255|unique:parts,part_number,' . $this->part_id,
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

	public function update()
	{
		$this->validate();

		$this->part->update([
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
			'modified_by' => $this->modified_by,
		]);

		session()->flash('message', 'Part successfully updated.');

		return redirect()->route('inventory.parts');
	}

	public function render()
	{
		return view('livewire.inventory.edit-part')->layout('layouts.app');
	}
}
