@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb ms-5 p-2" style="background-color: #e9ecef">
            <li class="breadcrumb-item fs-4">
                Dashboard
            </li>
            <li class="breadcrumb-item active fs-4 fw-bold">
                UserControlPanel
            </li>
        </ol>
        <div class="container-fuild">
            {{-- Using Livewire to create UserAccount Components --}}
            @livewire('user-account.account-user')
        </div>
    </div>
@endsection
