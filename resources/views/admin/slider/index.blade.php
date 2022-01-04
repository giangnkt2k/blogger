@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h4>Home Slider</h4>
                    <a href="{{ route('add.slider') }}" style="float: right; padding-bottom:10px"><button class="btn btn-info">Add Slider</button></a>
                </div>
                <div class="col-md-12">

                    <div class='card'>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                        @endif
                        <div class="card-header">
                            All Slider
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col" width="10%">Title</th>
                                    <th scope="col" width="20%">Description</th>
                                    <th scope="col" width="15%">Image</th>
                                    <th scope="col" width="10%">Link</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i =1)
                                @foreach ($sliders as $slide)
                                    <tr>
                                        <th scope="row"> {{ $i++ }}</th>
                                        <td>{{ $slide->title }}</td>
                                        <td>{{ $slide->description }}</td>
                                        <td><img src="{{ asset($slide->image) }}" style="height:50px; width:70px;" alt="">
                                        </td>
                                        <td>{{ $slide->link }}</td>

                                        <td>
                                            <a href="{{ url('/slider/edit/' . $slide->id) }}" class="btn btn-info">
                                                Edit</a>
                                            <a href="{{ url('/slider/delete/' . $slide->id) }}"
                                                onclick="return confirm('Are you sure to delete?')"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- <x-jet-welcome /> -->

                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
