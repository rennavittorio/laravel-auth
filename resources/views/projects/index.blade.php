@extends('layouts.app')
@section('content')

<div class="container">

    <div class="title-wrapper py-5">
        <h1 class="mb-3">
            //my-proj-portfolio
        </h1>
        <a href="{{ route('projects.create') }}" class="w-auto btn btn-primary">
            + add new project
        </a>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                {{-- <th scope="col">description</th> --}}
                <th scope="col">website</th>
                <th scope="col">source</th>
                <th scope="col">proj-cat</th>
                <th scope="col">client</th>
                <th scope="col">actions</th>
                {{-- <th scope="col">client-cat</th> --}}
            </tr>
        </thead>
    
        <tbody>
    
            @foreach ($projects as $key=>$project)

            <tr>
                <td>{{ $project->id }}</td>
                <td><a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a></td>
                {{-- <td>{{ $project->description }}</td> --}}
                <td><a href="{{ $project->website_link }}" target="_blank">{{ $project->website_link }}</a></td>
                <td><a href="{{ $project->source_code_link }}" target="_blank">{{ $project->source_code_link }}</a></td>
                <td>{{ $project->proj_category }}</td>
                <td>{{ $project->client }}</td>
                {{-- <td>{{ $project->client_category }}</td> --}}
                <td>
                    <div class="actions-wrapper d-flex gap-3">
                        <a href="{{ route('projects.edit', $project->slug) }}" class="btn btn-sm btn-warning"><></a>
                        <a href="{{ route('projects.delete', $project->id) }}" class="btn btn-sm btn-danger">x</a>
                    </div>
                </td>
            </tr>
                
            @endforeach
    
        </tbody>
        
    </table>

</div>


@endsection