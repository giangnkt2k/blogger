@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h4>Home About</h4>
                    <a href="{{ route('add.about') }}" style="float: right; padding-bottom:10px"><button
                            class="btn btn-info">Add About</button></a>
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
                            All About Data
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">Choice</th>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col" width="10%">Home Title</th>
                                    <th scope="col" width="20%">Short Desscription</th>
                                    <th scope="col" width="15%">Long Desscription</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($homeabout as $about)
                                    <tr>
                                        <th>
                                            <a href="{{ url('/about/choice/' . $about->id) }}"
                                                class="btn form-group {{  $about->choice == 'btn-primary' ? 'btn-primary' : 'btn-danger' }}"
                                                >
                                                Choice </a>
                                        </th>

                                        <th scope="row"> {{ $i++ }}</th>
                                        <td>{{ $about->title }}</td>
                                        <td>{{ $about->short_dis }}</td>
                                        </td>
                                        <td>{{ $about->long_dis }}</td>

                                        <td>
                                            <a href="{{ url('/about/edit/' . $about->id) }}" class="btn btn-info">
                                                Edit</a>
                                            <a href="{{ url('/about/delete/' . $about->id) }}"
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
