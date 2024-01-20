<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory\Parts;

class PartsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('inventory.parts');
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function bulkImport()
	{
		return view('inventory.bulk-import');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Parts $parts)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Parts $parts)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Parts $parts)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Parts $parts)
	{
		//
	}
}
