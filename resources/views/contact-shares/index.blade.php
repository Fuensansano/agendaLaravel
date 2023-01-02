@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Contacts shared with me</h1>
        @forelse($contactsSharedWithUser as $contact)
            <div class="d-flex justify-content-between bg-dark mb-3  rounded px-4 py-2">
                <div>
                    <a href=" {{ route('contacts.show', $contact->id) }}">
                        <img class="photo" src="{{ Storage::url($contact->photo)  }}" alt="contact photo">
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <p class="me-2 mb-0">{{ $contact->name }}</p>
                    <p class="me-2 mb-0 d-none d-md-block">Phone_number: <a href="tel:{{ $contact->phone_number }}">
                            {{ $contact->phone_number }}</a></p>
                    <p class="me-2 mb-0 d-none d-md-block">Email:<a href="mailto:{{ $contact->email }}">
                            {{ $contact->email }}</a></p>
                    <p class="me-2 mb-0 d-none d-md-block">Shared by:
                        <span class="text-info">{{ $contact->user->email }}</span></p>
                </div>
            </div>
        @empty
            <div class="col-md-4 mx-auto">
                <div class="card card-body text-center">
                    <p>No contacts shared with you yet</p>
                </div>
            </div>
        @endforelse

        <div class="container mt-5">
            <h1 class="text-center">Contacts shared by me</h1>
            @forelse($contactsSharedByUser as $contact)
                @foreach($contact->sharedWithUsers as $user)
                    <div class="d-flex justify-content-between bg-dark mb-3  rounded px-4 py-2">
                        <div>
                            <a href=" {{ route('contacts.show', $contact->id) }}">
                                <img class="photo" src="{{ Storage::url($contact->photo)  }}" alt="contact photo">
                            </a>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="me-2 mb-0">{{ $contact->name }}</p>
                            <p class="me-2 mb-0 d-none d-md-block">Phone_number: <a href="tel:{{ $contact->phone_number }}">
                                    {{ $contact->phone_number }}</a></p>
                            <p class="me-2 mb-0 d-none d-md-block">Email:<a href="mailto:{{ $contact->email }}">
                                    {{ $contact->email }}</a></p>
                            <p class="me-2 mb-0 d-none d-md-block">Shared with:
                                <span class="text-info">{{ $contact->user->email }}</span></p>
                            <form action="{{ route('contact-shares.destroy', $user->pivot->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mb-0 p-1 px-2">
                                    Unshare
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @empty
                <div class="col-md-4 mx-auto">
                    <div class="card card-body text-center">
                        <p>No contacts shared by you yet</p>
                        <a href="{{ route('contact-shares.create') }}">Share now</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
