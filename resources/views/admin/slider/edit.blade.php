@extends('admin.admin_master')

@section('admin')
<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Slider</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('/slider/update/'.$sliders->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="old_image" value="{{ $sliders->image }}">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Slider Title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$sliders->title}}" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Slider Description</label>

                    <textarea type="text" name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"  placeholder="Enter Description">{{ $sliders->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Slider Image</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">Slider Link</label>
                    <input type="text" class="form-control" name="link" id="exampleFormControlInput2" value="{{$sliders->link}}" placeholder="Enter Link">
                </div>
                <div class="form-group">
                    <img src="{{ asset($sliders->image)}}" style="width:400px; height:200px;" alt="">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>


</div>
@endsection
