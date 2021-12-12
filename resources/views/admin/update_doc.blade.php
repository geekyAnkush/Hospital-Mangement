<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')
    <style>
        .inp{
            color:black;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .field{
            padding: 15px;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
<!-- partial -->
        <!-- partial:partials/_navbar.html -->
    @include('admin.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center" style="padding: 100px">
            <form action="{{url('editdoc',$data->id)}}" method="POST" enctype="multipart/form-data">
                <header>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{session()->get('message')}}
                        </div>
                    @endif
                </header>
                @csrf
                <div class="field">
                    <label for="dname">Doctor Name</label>
                    <input class="inp" id="dname" type="text" name="dname" value="{{$data->name}}">
                </div><div class="field">
                    <label for="phone">Phone</label>
                    <input class="inp" id="phone" type="number" name="phone" value="{{$data->phone}}">
                </div><div class="field">
                    <label for="Speciality">Doctor's Speciality</label>
                    <input class="inp" id="Speciality" type="text" name="speciality" value="{{$data->speciality}}">
                </div><div class="field">
                    <label for="room">Room no</label>
                    <input class="inp" id="room" type="text" name="room" value="{{$data->room}}">
                </div><div class="field">
                    <label>Old Image</label>
                    <img src="doctorImage/{{$data->image}}" width="200px" height="200px">
                </div>
                <div class="field">
                    <label id="cimgg">Change Image</label>
                    <input type="file" id="cimgg" name="file">
                </div><div class="field">
                    <input type="submit" class="btn btn-primary" style="padding: 10px">
                </div>
            </form>

        </div>
    </div>
        <!-- main-panel ends -->

    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.script')
</body>
</html>
