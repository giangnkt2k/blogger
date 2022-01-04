@extends('admin.admin_master')

@section('admin')
<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Contact</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.contact')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleFormControlTextarea1"  placeholder="Enter Description">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Phone Number</label>
                    <input type="number" class="form-control" name="phone" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Link">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>


</div>
@endsection
