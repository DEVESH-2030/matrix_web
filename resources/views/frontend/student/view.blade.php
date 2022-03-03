<!DOCTYPE html>
<html>
    <head>
        <title>Matrix</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
         
        <link rel="stylesheet" href="{{ url('/css/css-custom.css') }}">  
        <link rel="stylesheet" href="{{ url('/css/style.css') }}">  
    </head>
    <body>
        <br />
        <div class="container">
            <h3 align="center">Create Student </h3>
                <br />
            <!-- error message -->    
            @if(count($errors) > 0)
                <div class="alert alert-danger showSweetAlert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    Upload Validation Error *<br>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- success message -->    
            @if($message = Session::get('success'))
                <div class="alert alert-success alert-block showSweetAlert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
            @endif
            
            <!-- form for upload excel file --> 
            <form method="post" enctype="multipart/form-data" action="">
                {{ csrf_field() }}
                <div class="form-group">
                    <table class="table">
                        <tr>
                            <td width="40%" align="right"><label>Select File for Upload</label></td>
                            <td width="30">
                                <input type="file" name="file" id="file" />
                            </td>
                            <td width="30%" align="left">
                                <input type="submit" name="upload" class="btn btn-primary upload-button" value="Upload">
                                <a href="" type="reset" class="btn btn-danger delete-button">Reset</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
            <br />

            <!-- view data list -->
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:rgb(112, 121, 112); color:#ffff">
                    <h3 class="panel-title"> All Data</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        @php
                            $count = 1;
                            $data = [3] ;
                        @endphp
                        @if(count($data) > 0)
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action
                                        <a href="" type="button" class="btn btn-success download-button ml-4" align="right">Create</a>
                                    </th>

                                </tr>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>dfg</td>
                                    <td>xgd</td>
                                    <td align="right">
                                        <a href="" type="button" class="btn btn-danger delete-button">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </table>
                            @else
                                <span class="form-control" align="center"> 
                                    No Data Available
                                </span>
                        @endif
                        <div class="d-flex justify-content-center text-right">

                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </body>
</html>