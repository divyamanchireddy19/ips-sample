@extends('layouts.app')

@section('content')



<div class="relative min-h-screen  bg-center mx-24 my-24 lg:justify-center lg:items-center  selection:bg-indigo-500 selection:text-white">
    <div class="mt-8 p-6 bg-white border rounded-md shadow-md">
        @if(session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
        @endif

        @if(session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        @endif
        <div class="container mx-auto p-4 flex justify-between items-center">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900">Bulk Import</h1>
            <div>
                <a href="{{ route('inventory.parts') }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">View Parts</a>
            </div>
        </div>
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
            <p class="font-bold">Note</p>
                <p class="mb-2">
                    You can download a CSV from the parts list page and use that as a template to bulk update or add new parts.
                </p>
                <p class="font-semibold">For Status:</p>
                <ul class="list-disc list-inside">
                    <li><span class="font-semibold">0:</span> Bulk</li>
                    <li><span class="font-semibold">1:</span> Active</li>
                    <li><span class="font-semibold">2:</span> Archive</li>
                </ul>

        </div>
        <a href="{{ asset('bulk-import.csv') }}" class="mt-4 px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-bold rounded-md shadow mb-12" download>
            Download Bulk Import CSV
        </a>

        <livewire:import-parts/>
    </div>
</div>


@endsection
