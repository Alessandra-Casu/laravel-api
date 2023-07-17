@extends('admin.layouts.base')

@section('contents')

    <h1>{{ $project->title }}</h1>
    {{-- <h2>Category: {{$project->category->name}}</h2> --}}
    <h2>Type Language: {{$project->type->name}}</h2>
    <h3>Technology: {{implode(', ', $project->technologies->pluck('name')->all()) }}</h3>
    {{-- <img src="{{ $project->url_image }}" alt="{{ $project->title }}"> --}}

    @if ($project->image)
         <img src="{{ asset('storage/' . $project->image)}}" alt="$project->title ">
    @endif
    

    <p>{{ $project->content }}</p>

@endsection