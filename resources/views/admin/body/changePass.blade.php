@extends('admin.admin_master')

@section('admin')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Change Password</h2>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('update.password') }}"class="form-pill">
            @csrf
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input id="current_password" name="old_password"type="password" class="form-control" placeholder="Current Password">
                @error('old_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input id="password" name="password" type="password" class="form-control"  placeholder="New Password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <button class="btn btn-primary btn-default" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection
