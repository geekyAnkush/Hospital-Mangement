<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')
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
        <div align="center" style="padding: 100px; margin-left: 10em">
            <style>
                tr{
                    background-color: #98d6f3;
                    color: black;
                }
                th{
                    padding: 18px;
                    text-align: center;
                }
                td{
                    padding: 10px;
                }
            </style>
            <table>
                <tr style="background-color: #305353">
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Speciality</th>
                    <th>Room no</th>
                    <th>Image</th>
                    <th colspan="2">Action</th>
                </tr>
                @foreach($data as $x)
                    <tr align="center">
                        <td><img height="100" width="100" src = "doctorImage/{{$x->image}}"></td>
                        <td>{{$x->name}}</td>
                        <td>{{$x->phone}}</td>
                        <td>{{$x->speciality}}</td>
                        <td>{{$x->room}}</td>
                        <td><a onclick="return confirm('Data will be DELETED.Are you sure?')" class="btn btn-danger" href="{{url('deldoc',$x->id)}}">Delete</a></td>
                        <td><a class="btn btn-primary" href="{{url('updoc',$x->id)}}">Update</a></td>

                    </tr>
                @endforeach
            </table>
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
