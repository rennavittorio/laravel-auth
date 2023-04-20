@extends('layouts.app')
@section('content')

<div class="container">

    <h1 class="py-5">
        //my-proj-portfolio
    </h1>
    
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
            </tr>
                
            @endforeach
    
        </tbody>
        
    </table>

</div>


@endsection