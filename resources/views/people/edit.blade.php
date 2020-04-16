@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-12">
        <h2 class="d-block my-2 py-2 px-3 text-primary">Update Profile</h2>
        <hr>
    </div>
</div>
{!! Form::model($person, ['route' => ['people.update', $person->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}
    @include('inc.form.person-form')
{!! Form::close() !!}
@endsection
