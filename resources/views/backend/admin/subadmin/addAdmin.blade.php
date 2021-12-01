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



                <div class="col-sm-6" style="background-color:lavender;">
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" id="upload_image_form" action="javascript:void(0)" >
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
        @endif

        <!-- Script Start  -->
        <script type="text/javascript">
            $(document).ready(function(){
                $("#formSubmit").click(function(){
                    jQuery.ajax({
                        url:"{{route('usersupdate')}}",
                        type: "GET",
                        data: $(this).serialize(),
                        success:function(data){  
                        } 
                    });
                    //stay.preventDefault(); 
                });
                // +++++++++++++++ For Image ++++++++++++++++
                $('#image').change(function(){
                    let reader = new FileReader();
                    reader.onload = (e) => { 
                        $('#image_preview_container').attr('src', e.target.result); 
                    }
                    reader.readAsDataURL(this.files[0]); 
                });

                // +++++++++++++++++ Update Data +++++++++++++
                $('#upload_image_form').submit(function(e) {
                    e.preventDefault();      
                    var formData = new FormData(this);
                    $.ajax({
                        type:'POST',
                        url: "{{ url('updateAdmin')}}",
                        data: formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                        alert("Update Success");
                            window.location = "subadmin";
                            return false;
                        }
                    });   

                }); 
            });       
        </script>

    <!--End Section -->
    </section>
    <!-- /.content -->
</div>
@endsection
