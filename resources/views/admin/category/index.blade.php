@extends('admin.layouts.master')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y p-0">
        <livewire:admin.category.list-category></livewire:admin.category.list-category>

        <!-- BEGIN modal -->
        <livewire:admin.category.create-category></livewire:admin.category.create-category>
        <livewire:admin.category.update-category></livewire:admin.category.update-category>
        <!--  END modal -->
    </div>
@endsection
