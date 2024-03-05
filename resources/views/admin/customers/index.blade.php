@extends('admin.layouts.master')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y p-0">
        <livewire:admin.customers.list-customer></livewire:admin.customers.list-customer>

        <!-- BEGIN modal -->
        <livewire:admin.customers.create-customer></livewire:admin.customers.create-customer>
        <livewire:admin.customers.update-customer></livewire:admin.customers.update-customer>
        <!--  END modal -->
    </div>
@endsection
