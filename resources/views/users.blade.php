{{-- filepath: c:\laragon\www\passakorn1\resources\views\users.blade.php --}}
@extends('template.backend.master')

@section('content')
<style>
    .app-header,
    .app-sidebar {
        display: none !important;
    }

    .app-main {
        width: 100% !important;
        margin-left: 0 !important;
        padding-top: 0 !important;
    }
</style>

@livewire('usertable')
@endsection