@extends('layouts.app')

@section('content')

<h3 class="d-block">Personal Information <span class="float-right"><a href="/person/create" class="btn btn-primary">Add New</a></span></h3>
<hr>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Fullname</th>
            <th scope="col">Birth Date</th>
            <th scope="col">Email</th>
            <th scope="col">Contact No.</th>
            <th scope="col">Address</th>
            <th scope="col">Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach($people as $person)
            <tr>
                <th><strong>{{ $loop->index + 1 }}</strong></th>
                <td><a href="#">{{ $person->lastname }}, {{ $person->firstname }} {{ $person->middlename }}</a>
                </td>
                <td>{{ $person->birthdate }}</td>
                <td>{{ $person->email }}</td>
                <td>{{ $person->contact_no }}</td>
                <td>{{ $person->address }}</td>
                <td><a href="#" class="btn btn-dark btn-sm">Update</a><a href="#"
                        class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
        @endforeach

    </tbody>
</table>
{{ $people->links() }}

@endsection
