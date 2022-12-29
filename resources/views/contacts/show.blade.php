@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header text-info">CONTACT DETAILS</div>

                    <div class="card-body">
                        <p>Name: {{ $contact->name }}</p>
                        <p>Phone_number: <a href="tel:{{ $contact->phone_number }}">
                                {{ $contact->phone_number }}</a></p>
                        <p>Age: {{ $contact->age }}</p>
                        <p>Email:<a href="mailto:{{ $contact->email }}">
                                {{ $contact->email }}</a></p>
                        <p>Creado el: {{ $contact->created_at }}</p>
                        <p>Actualizado: {{ $contact->updated_at  }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
