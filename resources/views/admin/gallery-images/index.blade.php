@extends('admin.layouts.master')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y p-0">
        <livewire:admin.gallery-image.list-gallery></livewire:admin.gallery-image.list-gallery>
        <livewire:admin.gallery-image.create-gallery></livewire:admin.gallery-image.create-gallery>
        <livewire:admin.gallery-image.update-gallery></livewire:admin.gallery-image.update-gallery>
    </div>
@endsection

