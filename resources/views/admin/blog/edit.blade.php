@extends('admin.admin_master')

@section('admin')
<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Blog</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('/update/blog/'.$blogs->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
        <div class="form-group">
            <label><strong>Title :</strong></label>
            <input type="text" name="title" value="{{ $blogs->title }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect12">Category</label>
            <select class="form-control" name="category" value="{{ $blogs->category}}" id="exampleFormControlSelect12">
                @foreach ($categories as $cate)
                <option>{{ $cate->category_name }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label><strong>Short Description :</strong></label>
            <input type="text" name="short_dip" class="form-control" value="{{ $blogs->short_dip }}">
        </div>
        <div class="form-group">
            <label><strong>Image :</strong></label>
            <input type="hidden" name="old_image" value="{{ $blogs->image }}"class="form-control">
            <img src="{{ $blogs->image }}" alt="">
        </div>
        <div class="form-group">
            <label><strong>Image :</strong></label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label><strong>Blog :</strong></label>
            <textarea class="ckeditor form-control" name="body" >{{ $blogs->body }}"</textarea>
        </div>

        <div class="form-footer pt-4 pt-5 mt-4 border-top">
            <button type="submit" class="btn btn-primary btn-default">Submit</button>
        </div>
    </form>
</div>

@endsection
