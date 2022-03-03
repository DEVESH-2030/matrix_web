
@extends('frontend.layout.app')

@section('content')

    <div class="container">
        <form class="form-horizontal" action="{{ route('university.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">University Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter university name">
                    @if($errors->has('name'))
                        <span class="error" style="color:red">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Logo:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="logo" id="logo" placeholder="Enter university logo">
                    @if($errors->has('logo'))
                        <span class="error" style="color:red">{{ $errors->first('logo') }}</span>
                    @endif
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
                <label class="control-label col-sm-2" for="pwd">Website:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="website" id="website" placeholder="Enter website">
                    @if($errors->has('website'))
                        <span class="error" style="color:red">{{ $errors->first('website') }}</span>
                    @endif
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ route('university.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection
