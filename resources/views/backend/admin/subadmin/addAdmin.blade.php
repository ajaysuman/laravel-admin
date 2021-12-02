@extends('layouts.master')
@section('section')
  <!-- Content Wrapper. Contains page content -->
  
  @yield('section')
  <!-- Main content -->
  <section class="content"><br>
    <h2>Manage Admin</h2><br>  
    <div class="container-fluid">
        @if($adminedit == "")
            <table class="table"  data-toggle="modal" data-target="#myModal">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admindata as $admindatas)
                        <tr>
                            <td><a href="usersupdate" id="formSubmit" data-pk="{{ $admindatas->id }}" class="update">{{ $admindatas->name }}</a></td>
                            <td> <a href="usersupdate" data-pk="{{ $admindatas->id }}" class="update">{{ $admindatas->email }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            @if($adminedit != "")
                @foreach($adminedit as $admindatas)
                @endforeach 
            
                <div class="row">
                    <div class="col-sm-6" style="background-color:lavenderblush;">
                        <table class="table"  data-toggle="modal" data-target="#myModal">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admindata as $admindatas)
                                    <tr>
                                        <td><a href="usersupdate" id="formSubmit" data-pk="{{ $admindatas->id }}" class="update">{{ $admindatas->name }}</a></td>
                                        <td> <a href="" data-pk="{{ $admindatas->id }}" class="update">{{ $admindatas->email }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>    
                    
                    {{-- Edir Form --}}
                    <div class="col-sm-6" style="background-color:lavender;">
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" id="UpdateData" action="javascript:void(0)" >
                            @csrf
                                <div class="row">
                                
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="userid" id="userid"  value=" {{  $admindatas->id }} ">
                                    </div>
                                
                                    <div class="form-group" c>
                                        <label for="name">User Name</label>
                                        <input type="text" class="form-control" name="username" id="username"  value=" {{  $admindatas->name }} ">
                                    </div>
                                        
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value=" {{  $admindatas->email }} ">
                                    </div>
                                
                                    <div class="col-md-12 mb-2">
                                        <img id="image_preview_container" src="{{ asset('admin/img/' . $admindatas->image) }}"
                                            alt="preview image" style="max-height: 80px;">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" name="image" placeholder="Choose image" id="image">
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>     
                            </form>
                        </div>
                        {{-- <div class="col-sm-4" style="background-color:lavender;">.col-sm-4</div> --}}
                    </div>   
                </div>
                
                 {{-- #################### For User Role ###################   --}}
                <button type="button" id="formButton">Add Sub-Admin</button><br><br>
                <form method="get" id="hideform">
                    @csrf
                    <div class="mb-3">
                        <label for="first-name" class="col-form-label">First-Name:</label>
                        <input type="text" class="form-control" id="first-name" name="firstName">
                        <span id="fstname" style="color: red"></span>
                    </div>
                    <div class="mb-3">
                        <label for="last-name" class="col-form-label">Last-Name:</label>
                        <input type="text" class="form-control" id="last-name" name="lastName">
                        <span id="lstname" style="color: red"></span>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="col-form-label">Contact-No:</label>
                        <input type="number" class="form-control" id="user-contact" name="contact">
                        <span id="user-contacts" style="color: red"></span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="user-email" name="email">
                        <span id="user-emails" style="color: red"></span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" id="user-password" name="password">
                        <span id="user-passwords" style="color: red"></span>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" id="userrole">Add</button><br><br>
                    </div>
                </form>
            @endif 
        
        <!-- /.content -->
        </div>
        <!--End Section -->
  </section>
</section>    
@endsection
