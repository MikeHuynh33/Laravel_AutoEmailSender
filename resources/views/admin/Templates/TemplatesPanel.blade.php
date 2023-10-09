@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb p-2" style="background-color: #e9ecef">
            <li class="breadcrumb-item fs-4">
                Dashboard
            </li>
            <li class="breadcrumb-item active fs-4 fw-bold">
                TempalteControlPanel
            </li>
        </ol>
        <div class="container-fuild">
            {{-- Using Livewire to create Recipient Components --}}
            @livewire('templates.template-panel')
        </div>
    </div>
@endsection
