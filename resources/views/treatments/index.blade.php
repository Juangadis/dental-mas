<?php
@extends('layouts.app')

@section('content')
    <h1>Treatments</h1>
    <a href="{{ route('treatments.create') }}">Create Treatment</a>
    <ul>
        @foreach ($treatments as $treatment)
            <li>{{ $treatment->title }} ({{ $treatment->category->name }}) <a href="{{ route('treatments.edit', $treatment) }}">Edit</a></li>
        @endforeach
    </ul>
@endsection