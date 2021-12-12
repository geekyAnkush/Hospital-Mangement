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
        <div align="center" style="padding: 100px">
            <style>
                tr{
                    background-color: #98d6f3;
                    color: black;
                }
                th{
                    padding: 10px;
                }
                td{

                }
            </style>
            <table>
                <tr style="background-color: #305353">
                    <th>Patient Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Approve</th>
                    <th>Reject</th>
                </tr>
                @foreach($data as $x)
                <tr align="center">
                    <td>{{$x->name}}</td>
                    <td>{{$x->email}}</td>
                    <td>{{$x->phone}}</td>
                    <td>{{$x->doctor}}</td>
                    <td>{{$x->date}}</td>
                    <td>{{$x->message}}</td>
                    <td>{{$x->status}}</td>
                    <td><a class="btn btn-success btn-sm" href="{{url('approved',$x->id)}}">Approved</a></td>
                    <td><a class="btn btn-danger btn-sm" href="{{url('cancelled',$x->id)}}">Rejected</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.script')
</body>
</html>
