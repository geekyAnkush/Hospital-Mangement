<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <style>
        .field label{
            display: inline-block;
            width: 200px;
        }
    </style>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
    @include('admin.nav')
    <!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="container d-flex justify-content-center" style="padding-top: 100px">

        <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
            <header>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif
            </header>
            <div class="field">
                @csrf
                <div style="padding: 15px">
                    <label for="name">Doctor's Name </label>
                    <input type="text" style="color: black" name="name" id="name" placeholder="Enter Doctor's Name" required>
                </div>
                <div style="padding: 15px">
                    <label for="phone">Phone </label>
                    <input type="number" style="color: black" name="phone" id="phone" placeholder="Enter Phone no" required>
                </div>
                <div style="padding: 15px">
                    <label for="special">Speciality </label>
                    <select id="special" name="special" style="color: black; width: 200px" required>
                        <option>--------Select--------</option>
                        <option value="Skin">Skin</option>
                        <option value="Heart">Heart</option>
                        <option value="Eye">Eye</option>
                        <option value="Nose">Nose</option>
                    </select>
                </div>
                <div style="padding: 15px">
                    <label for="room">Room No </label>
                    <input type="text" style="color: black" name="room" id="room" placeholder="Enter Doctor's Room No" required>
                </div>
                <div style="padding: 15px">
                    <label for="file">Doctor's Image </label>
                    <input type="file" style="color: black" name="file" id="file" required>
                </div>
                <div style="padding: 15px">
                    <button class="btn btn-outline-facebook" name="submit" id="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.script')
</body>
</html>
