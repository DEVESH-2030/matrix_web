
@extends('frontend.layout.app')

@section('content')

    <div class="container">
        <form class="form-horizontal" action="{{ route('student.update', $student->id) }}" method="post">
    @csrf
    @method('PUT')
    
        <div class="form-group">
            <label class="control-label col-sm-2" for="first_name">First Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name" value="{{$student->first_name}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="last_name">Last Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name" value="{{$student->last_name}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="university_id">University:</label>
            <div class="col-sm-10">
                <select class="form-control" name="university_id" id="university_id" value="{{$student->university_id}}">
                @foreach ($universities as $university)
                    <option value="{{ $university->id }}" @if($student->university_id == $university->id) selected="selected" : '' @endif>{{ $university->name }}
                    </option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{$student->email}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Mobile:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile" value="{{$student->mobile}}">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('student.index') }}" type="reset" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
    </div>
@endsection
