@extends('admin.layouts.base')

@section('contents')

    <h1>Add new project</h1>

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" novalidate>
        
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
                type="text"
                class="form-control @error('title') is-invalid @enderror"
                id="title"
                name="title"
                value="{{ old('title') }}"
            >
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <label class="input-group-text  @error('image') is-invalid @enderror" for="image">Upload</label>
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="category" class="form-label">Type</label>
            <select 
                class="form-control @error('type') is-invalid @enderror"  id="type" name="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            
            @error('type_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <h3>Tecnologies: </h3>
            @foreach ($technologies as $technology)
            <div class="mb-3 form-check">
                <input
                     type="checkbox" 
                     class="form-check-input " 
                     id="tec{{$technology->id}}" 
                     name="technologies[]" 
                     value="{{$technology->id}}" 
                     
                     @if(in_array($technology->id, old('technologies', []))) checked @endif 
                >
                <label class="form-check-label" for="tec{{$technology->id}}">{{$technology->name}}</label>
            </div>
            @endforeach
    
            {{-- @error('type_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror --}}
        </div>


        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select 
            class="form-control   @error('category') is-invalid @enderror"
            id="category" 
            name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            
            @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="url_image" class="form-label">Image url</label>
            <input
                type="url"
                class="form-control @error('url_image') is-invalid @enderror"
                id="url_image"
                name="url_image"
                value="{{ old('url_image') }}"
            >
            @error('url_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea
                class="form-control @error('content') is-invalid @enderror"
                id="content"
                rows="10"
                name="content">{{ old('content') }}</textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary">Save</button>
    </form>

@endsection