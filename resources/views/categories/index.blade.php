<?php
@extends('layouts.app')

@section('content')
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}">Create Category</a>
    <ul>
        @foreach ($categories as $category)
            <li>{{ $category->name }} <a href="{{ route('categories.edit', $category) }}">Edit</a></li>
        @endforeach
    </ul>
@endsection