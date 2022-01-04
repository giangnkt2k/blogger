@extends('admin.admin_master')

@section('admin')
<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create About</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('/about/update/'.$homeabout->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">About Title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $homeabout->title }}" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">About Short Description</label>
                    <textarea class="form-control" name="short_dis" id="exampleFormControlTextarea1"  placeholder="Enter Description">{{ $homeabout->short_dis }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">About Long Description</label>
                    <textarea class="form-control" name="long_dis" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Link">{{ $homeabout->long_dis }}</textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>


</div>
@endsection
