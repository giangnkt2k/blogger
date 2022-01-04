@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h4>Blog</h4>
                    <a href="{{ route('add.blog') }}" style="float: right; padding-bottom:10px"><button class="btn btn-info">Add Blog</button></a>
                </div>
                <div class="col-md-12">

                    <div class='card'>
                        <div class="card-header">
                            All Contacts
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col" width="15%">Title</th>
                                    <th scope="col" width="20%">Image</th>
                                    <th scope="col" width="10%">User Post</th>
                                    <th scope="col" width="15%">Category</th>
                                    <th scope="col" width="15%">Time Create</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i =1)
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <th scope="row"> {{ $i++ }}</th>
                                        <td>{{ $blog->title }}</td>
                                        <td><img src="{{ asset($blog->image)}}" style="height:50px; width:70px;"  alt=""></td>
                                        <td>{{ $blog->user_id }}</td>
                                        <td>{{ $blog->category }}</td>
                                        <td>{{ $blog->created_at }}</td>

                                        <td>
                                            <a href="{{ url('/edit/blog/' . $blog->id) }}" class="btn btn-info">
                                                Edit</a>
                                            <a href="{{ url('/delete/blog/' . $blog->id) }}"
                                                onclick="return confirm('Are you sure to delete?')"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
