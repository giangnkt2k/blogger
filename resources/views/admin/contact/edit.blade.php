@extends('admin.admin_master')

@section('admin')
<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Contact</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('/update/contact/'.$contacts->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleFormControlInput1" value="{{ $contacts->address }}"placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Email</label>
                    <input class="form-control" name="email" id="exampleFormControlTextarea1" value="{{ $contacts->email }}"  placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Phone Number</label>
                    <input class="form-control" name="phone" id="exampleFormControlTextarea1" value="{{ $contacts->phone }}" rows="3" placeholder="Enter Phone">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>


</div>
@endsection
