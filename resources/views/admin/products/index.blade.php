@extends('admin.layouts.master')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y p-0">
        <livewire:admin.products.list-product/>
        <livewire:admin.products.create-gallery-image/>
@endsection

