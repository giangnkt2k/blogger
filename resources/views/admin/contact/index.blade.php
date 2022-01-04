@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h4>Home Contact</h4>
                    <a href="{{ route('add.contact') }}" style="float: right; padding-bottom:10px"><button class="btn btn-info">Add About</button></a>
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
                                    <th scope="col" width="10%">Address</th>
                                    <th scope="col" width="20%">Email</th>
                                    <th scope="col" width="15%">Phone</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i =1)
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <th scope="row"> {{ $i++ }}</th>
                                        <td>{{ $contact->address }}</td>
                                        <td>{{ $contact->email }}</td>
                                        </td>
                                        <td>{{ $contact->phone }}</td>

                                        <td>
                                            <a href="{{ url('/contact/edit/' . $contact->id) }}" class="btn btn-info">
                                                Edit</a>
                                            <a href="{{ url('/contact/delete/' . $contact->id) }}"
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
