
@extends('frontend.layout.app')

@section('content')

    <div class="container">
        <form class="form-horizontal" action="{{ route('university.update', $university->id) }}" method="post">
    @csrf
    @method('PUT')
    
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{$university->name}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="logo">Logo:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="logo" id="logo" placeholder="Enter logo" value="{{$university->logo}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{$university->email}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Website:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="website" id="website" placeholder="Enter website" value="{{$university->website}}">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('university.index') }}" type="reset" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
    </div>
@endsection
