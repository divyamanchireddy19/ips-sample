<?php

namespace App\Livewire\Inventory;

use App\Models\Inventory\Part;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class PartsTable extends PowerGridComponent
{
	use WithExport;

	public bool $multiSort = true;

	public function setUp(): array
	{
		$this->showCheckBox();
		$this->persist(['columns', 'filters']);

		return [
			Exportable::make('export')
				->striped()
				->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),

			Header::make()
				->showToggleColumns()
				->showSearchInput(),

			Footer::make()
				->showPerPage(25)
				->showRecordCount(mode: 'full'),

		];
	}

	public function datasource(): Builder
	{
		return Part::query();
	}

	public function relationSearch(): array
	{
		return [];
	}

	public function columns(): array
	{
		return [
			Column::make('Part number', 'part_number')
				->sortable()
				->searchable(),

			Column::make('Quantity', 'quantity')
				->sortable(),
			// ->searchable(),

			Column::make('Unit price', 'unit_price')
				->sortable(),
			// ->searchable(),

			Column::make('Bin shelf location', 'bin_shelf_location')
				->sortable()
				->searchable(),

			Column::action('Action'),
		];
	}

	public function filters(): array
	{
		return [
			Filter::datepicker('date_of_last_order'),
			Filter::datepicker('date_of_last_receipt'),
			Filter::inputText('part_number')
				->operators(['contains', 'is', 'is_not']),
		];
	}

	#[\Livewire\Attributes\On('edit')]
	public function edit($rowId): void
	{
		redirect()->to(url('/inventory/edit-part/' . $rowId));
	}

	#[\Livewire\Attributes\On('delete')]
	public function delete($rowId): void
	{
		// $a = $this->js('confirm(' . $rowId . ')');
		// \Log::info($a);
		Part::where('id', $rowId)->delete();
		// $this->js('alert(' . $rowId . ')');
		// redirect()->to(url('/inventory/edit-part/'.$rowId));
	}

	public function actions(\App\Models\Inventory\Part $row): array
	{
		return [
			Button::add('edit')
				->slot('Edit')
				->id()
				->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
				->dispatch('edit', ['rowId' => $row->id]),

			Button::add('delete')
				->slot('Delete')
				->id()
				->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
				->dispatch('delete', ['rowId' => $row->id]),
			// ->attributes(['onclick' => "confirmDelete(event)"]),

			// Button::add('edit')
			// ->slot('Edit')
			// ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
			// ->route('inventory.parts.edit', 'id' => $row->id),
		];
	}

	/*
public function actionRules($row): array
{
return [
// Hide button edit for ID 1
Rule::button('edit')
->when(fn($row) => $row->id === 1)
->hide(),
];
}
 */
}
