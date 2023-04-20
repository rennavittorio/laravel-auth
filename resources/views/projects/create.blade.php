@extends('layouts.app')
@section('content')


<div class="container py-5">

    <h1 class="mb-5">
        //insert new project
    </h1>

    <form class="row g-3" action="{{ route('projects.store') }}" method="POST">
        @csrf

        <div class="col-md-6">
          <label for="title" class="form-label">title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? "" }}">
        </div>
        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="col-6">
            <label for="proj_category" class="form-label">proj_category</label>
            <select class="form-select @error('proj_category') is-invalid @enderror" 
            aria-label="Default select example" id="proj_category" name="proj_category" value="">
                <option selected>Open this select menu</option>
                @foreach($project_categories as $key=>$cat)
                    <option @selected(old('proj_category') == $key) value="{{ $key }}"> {{ $cat }} </option>
                @endforeach
            </select>
            @error('proj_categories')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control" id="description" name="description" value="">{{ old('description') ?? "" }}</textarea>
        </div>
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="col-md-6">
            <label for="website_link" class="form-label">website_link</label>
            <input type="text" class="form-control" id="website_link" name="website_link" value="{{ old('website_link') ?? "" }}">
        </div>
        @error('website_link')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="col-md-6">
            <label for="source_code_link" class="form-label">source_code_link</label>
            <input type="text" class="form-control" id="source_code_link" name="source_code_link" value="{{ old('source_code_link') ?? "" }}">
        </div>
        @error('source_code_link')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="col-md-6">
            <label for="client" class="form-label">client</label>
            <input type="text" class="form-control" id="client" name="client" value="{{ old('client') ?? "" }}">
        </div>
        @error('client')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="col-6">
            <label for="client_category" class="form-label">client_category</label>
            <select class="form-select @error('client_category') is-invalid @enderror" 
            aria-label="Default select example" id="client_category" name="client_category" value="">
                <option selected>Open this select menu</option>
                @foreach($client_categories as $key=>$cat)
                    <option @selected(old('client_category') == $key) value="{{ $key }}"> {{ $cat }} </option>
                @endforeach
            </select>
            @error('client_category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save new project</button>
        </div>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                {{-- $error->all() ci restituisce un array/collection, che cicla --}}
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>


@endsection