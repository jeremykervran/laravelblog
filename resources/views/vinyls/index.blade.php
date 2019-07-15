@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Vinyls</h1>

    <div class="col-sm-12">
        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}  
          </div>
        @endif
    </div>

    <div>
        <a style="margin: 19px;" href="{{ route('vinyls.create')}}" class="btn btn-primary">New vinyl</a>
    </div>  

  <table class="table table-striped">
    <thead>
        <tr>
          <td>Title</td>
          <td>Band</td>
          <td>Year</td>
          <td>Genre</td>
          <td>State</td>
          <td>Cover</td>
          <td colspan = 2></td>
        </tr>
    </thead>
    <tbody>
        @foreach($vinyls as $vinyl)
        <tr>
            <td>{{$vinyl->title}}</td>
            <td>{{$vinyl->band}}</td>
            <td>{{$vinyl->year}}</td>
            <td>{{$vinyl->genre}}</td>
            <td>{{$vinyl->state}}</td>
            <td>
                <img src="{{$vinyl->cover}}" style="width: 100px; height:100px;" alt="{{$vinyl->title}}">
            </td>
            <td>
                <a href="{{ route('vinyls.edit',$vinyl->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('vinyls.destroy', $vinyl->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection