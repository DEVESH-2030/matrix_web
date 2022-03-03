
@extends('frontend.layout.app')

@section('content')

    <div class="container">
        <form class="form-horizontal" action="{{ route('student.store') }}" method="post">
    @csrf
        <div class="form-group">
            <label class="control-label col-sm-2" for="first_name">First Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name">
                @if($errors->has('first_name'))
                    <span class="error" style="color:red">{{ $errors->first('first_name') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="last_name">Last Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name">
                @if($errors->has('last_name'))
                    <span class="error" style="color:red">{{ $errors->first('last_name') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="university_id">University:</label>
            <div class="col-sm-10">
                <select class="form-control" name="university_id" id="university_id">
                @foreach ($universities as $university)
                    <option value="{{ $university->id }}">
                        {{ $university->name }}
                    </option>
                    @if($errors->has('university_id'))
                        <span class="error" style="color:red">{{ $errors->first('university_id') }}</span>
                    @endif
                @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                @if($errors->has('email'))
                    <span class="error" style="color:red">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Mobile:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile">
                @if($errors->has('mobile'))
                    <span class="error" style="color:red">{{ $errors->first('mobile') }}</span>
                @endif
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('student.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
    </div>
@endsection
