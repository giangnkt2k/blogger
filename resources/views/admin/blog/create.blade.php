@extends('admin.admin_master')

@section('admin')
<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Blog</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.blog')}}" method="POST" enctype="multipart/form-data">
                @csrf
        <div class="form-group">
            <label><strong>Title :</strong></label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect12">Category</label>
            <select class="custom-select my-1 mr-sm-2" name="category" id="exampleFormControlSelect12">
                <option selected="">Choose...</option>
                @foreach ($categories as $cate)
                <option value="{{ $cate->id}}">{{ $cate->category_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label><strong>Short Description :</strong></label>
            <input type="text" name="short_dip" class="form-control">
        </div>
        <div class="form-group">
            <label><strong>Image :</strong></label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label><strong>Blog :</strong></label>
            <textarea class="ckeditor form-control" name="body"></textarea>
        </div>

        <div class="form-footer pt-4 pt-5 mt-4 border-top">
            <button type="submit" class="btn btn-primary btn-default">Submit</button>
        </div>
    </form>
</div>

@endsection
