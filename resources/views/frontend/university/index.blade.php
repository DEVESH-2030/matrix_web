
@extends('frontend.layout.app')

@section('content')

    <div class="container">
        <h2>Manage University </h2>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#student">Lists All University</a></li>
            {{-- <li><a data-toggle="tab" href="#create">Create</a></li> --}}
        </ul>

        {{-- tab sections --}}
        <div class="tab-content">
              <br>  
              <input class="form-control" id="myInput" type="text" placeholder="search...">

            {{-- lists all student tab --}}
            <div id="student" class="tab-pane fade in active">
               <div class="container"> <br>
                    <a href="{{ route('university.create') }}" class="btn btn-primary">Add New</a>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="myTable">
                        @foreach ($universities as $university)
                            <tr>
                                <td>{{ $loop->iteration ?? ''}}</td>
                                <td>
                                    <img src="{{ url(config('filesystems.disks.public.root') . $university->logo) }}" alt="file name">
                                </td>
                                <td>{{$university->name ?? ''}}</td>
                                <td>{{$university->email ?? ''}}</td>
                                <td>{{$university->website ?? ''}}</td>
                                <td>
                                    <a href="{{ route('university.edit', $university->id) }}" class="btn btn-primary">Edit</a>
                                    <form method="POST" action="{{ route('university.destroy', $university->id) }}">
                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                        <a type="submit" class="btn btn-danger delete" value="Delete">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $universities->links() }}
                </div>
            </div>

            {{-- create tab --}}
            <div id="create" class="tab-pane fade"> <br>
                <div style="width:900px">
                <form class="form-horizontal" action="{{ route('university.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="first_name">First Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="last_name">Last Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="university_id">University:</label>
                        <div class="col-sm-10">
                           <select class="form-control" name="university_id" id="university_id">
                           @foreach ($universities as $university)
                                <option value="{{ $university->id }}"{{ ($university->id) ? 'selected' : ''}}>
                                    {{ $university->name }}
                                </option>
                           @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Mobile:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('after-scripts')
    {{-- search --}}
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    {{-- delete --}}
    <script>
        $('.delete').click(function(e){
            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('Are you sure want to delete this record?')) {
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
    </script>
@endsection