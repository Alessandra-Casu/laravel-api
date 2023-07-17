@extends('admin.layouts.base')

@section('contents')

    <h1>Projects</h1>

    @if (session('delete_success'))
        @php $project = session('delete_success') @endphp
        <div class="alert alert-danger">
            Il progetto "{{ $project->title }}" è stato eliminato per sempre

        </div>
    @endif


    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Type</th>
                <th scope="col">Technology</th>
                <th scope="col">Image url</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td><a href="{{ route('admin.types.show', ['type' => $project->type]) }}">{{ $project->type->name }}</a></td>
                    {{-- <td><a href="{{ route('admin.categories.show', ['category' => $project->category]) }}">{{ $project->category->name }}</a></td> --}}
 
                    <td>
                        @foreach($project->technologies as $technology)
                            <a href="{{ route('admin.technologies.show', ['technology' => $technology])}}">{{$technology->name}}</a>{{!$loop->last ? ',' : ''}}
                        @endforeach

                    </td>

                    <td>{{ $project->url_image }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.projects.show', ['project' => $project]) }}">View</a>
                        <a class="btn btn-warning" href="{{ route('admin.projects.edit', ['project' => $project]) }}">Edit</a>
                        <button
                            type="button" 
                            class="btn btn-danger js-delete"
                             data-bs-toggle="modal" 
                             data-bs-target="#deleteModal" 
                             data-id="{{ $project->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Delete confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form
                        action=""
                        data-template="{{ route('admin.projects.destroy', ['project' => '*****']) }}"
                        method="post"
                        class="d-inline-block"
                        id="confirm-delete"
                    >
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{ $projects->links() }}

@endsection