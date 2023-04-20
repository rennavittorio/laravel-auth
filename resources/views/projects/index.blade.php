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
    
            @foreach ($projects as $key=>$proj)

            <tr>
                <td>{{ $proj->id }}</td>
                <td>{{ $proj->title }}</td>
                {{-- <td>{{ $proj->description }}</td> --}}
                <td><a href="{{ $proj->website_link }}" target="_blank">{{ $proj->website_link }}</a></td>
                <td><a href="{{ $proj->source_code_link }}" target="_blank">{{ $proj->source_code_link }}</a></td>
                <td>{{ $proj->proj_category }}</td>
                <td>{{ $proj->client }}</td>
                {{-- <td>{{ $proj->client_category }}</td> --}}
            </tr>
                
            @endforeach
    
        </tbody>
        
    </table>

</div>


@endsection