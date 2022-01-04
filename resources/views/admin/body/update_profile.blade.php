@extends('admin.admin_master')

@section('admin')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Profile Update</h2>
    </div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif
    <div class="card-body">
        <form method="post" action="{{ route('update.user.profile') }}" class="form-pill" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="old_image" value="{{ $user['profile_photo_url'] }}">
            <div class="form-group">
                <label for="user_name">User Name</label>
                <input id="user_name" name="user_name"type="text" class="form-control" value="{{ $user['name']}}" placeholder="User Name">
                @error('user_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="user_email">User Email</label>
                <input id="user_email" name="user_email" type="email" class="form-control" value="{{ $user['email']}}"  placeholder="User Email">
                @error('user_email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                @php
                $avatar = Auth::user()->profile_photo_url;
                $pre_avatar = substr($avatar,8);
              @endphp
                <label for="user_avatar">User Avatar</label>
                <img src="{{ $pre_avatar }}">
                <input id="user_avatar" name="user_avatar" type="file" class="form-control" placeholder="Confirm Password">
                @error('user_avatar')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <button class="btn btn-primary btn-default" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection
