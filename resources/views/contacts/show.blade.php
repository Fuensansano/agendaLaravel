@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header text-info">CONTACT DETAILS</div>

                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-2">
                            <img class="photo" src="{{ Storage::url($contact->photo)  }}" alt="contact photo">
                        </div>
                        <p>Name: {{ $contact->name }}</p>
                        <p>Phone_number: <a href="tel:{{ $contact->phone_number }}">
                                {{ $contact->phone_number }}</a></p>
                        <p>Age: {{ $contact->age }}</p>
                        <p>Email:<a href="mailto:{{ $contact->email }}">
                                {{ $contact->email }}</a></p>
                        <p>Creado el: {{ $contact->created_at }}</p>
                        <p>Actualizado: {{ $contact->updated_at  }}</p>

                        <div class="d-flex justify-content-center">
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-secondary mb-2 me-4">Edit
                                Contact</a>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mb-2">Delete Contact</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
