@extends('admin.layouts.master')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y p-0">
        <livewire:admin.posts.list-posts></livewire:admin.posts.list-posts>
        <livewire:admin.posts.create-posts></livewire:admin.posts.create-posts>
        {{-- <livewire:admin.posts.update-posts></livewire:admin.posts.update-posts> --}}
    </div>
@endsection

