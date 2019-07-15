@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a vinyl</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('vinyls.update', $vinyl->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" value={{ $vinyl->title }} />
            </div>

            <div class="form-group">
                <label for="band">Band:</label>
                <input type="text" class="form-control" name="band" value={{ $vinyl->band }} />
            </div>

            <div class="form-group">
                <label for="year">Year:</label>
                <input type="text" class="form-control" name="year" value={{ $vinyl->year}} />
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" class="form-control" name="genre" value={{ $vinyl->genre }} />
            </div>
            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" class="form-control" name="state" value={{ $vinyl->state }} />
            </div>
            <div class="form-group">
                <label for="cover">Cover (url):</label>
                <input type="text" class="form-control" name="cover" value={{ $vinyl->cover }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection