@extends('layouts.app')

@section('content')

<h3 class="d-block">Personal Information <span class="float-right"><a href="/people/create" class="btn btn-primary">Add
            New</a></span></h3>
<hr>
<table class="table">
    <thead class="thead-light">
        <tr>
            {{-- <th scope="col">#</th> --}}
            <th scope="col">Fullname</th>
            <th scope="col">Birth Date</th>
            <th scope="col">Gender</th>
            <th scope="col">Email</th>
            <th scope="col">Contact No.</th>
        </tr>
    </thead>
    <tbody>
        @forelse($people as $person)
        
            <tr>
                {{-- <th><strong>{{ $loop->index + 1}}</strong></th> --}}
                <td><a href="#" data-toggle="modal"
                        data-target="#profileModal{{ $person->id }}">{{ $person->getFullName() }}</a></td>
                <td>{{ $person->birthdate }}</td>
                <td>{{ $person->gender }}</td>
                <td>{{ $person->email }}</td>
                <td>{{ $person->contact_no }}</td>

                @include('inc.modals.person-profile')

            </tr>
        @empty
        <p>No record found.</p>
        @endforelse

    </tbody>
</table>
{{ $people->links() }}

@endsection
