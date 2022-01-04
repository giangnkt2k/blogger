@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h4>Home Contact</h4>
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
                            All Contacts
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col" width="10%">Name</th>
                                    <th scope="col" width="15%">Email</th>
                                    <th scope="col" width="15%">Subject</th>
                                    <th scope="col" width="20%">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i =1)
                                @foreach ($messages as $mess)
                                    <tr>
                                        <th scope="row"> {{ $i++ }}</th>
                                        <td>{{ $mess->name }}</td>
                                        <td>{{ $mess->email }}</td>
                                        <td>{{ $mess->subject }}</td>
                                        <td>{{ $mess->message }}</td>
                                        <td>
                                            <a href="{{ url('/delete/message/' . $mess->id) }}"
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
