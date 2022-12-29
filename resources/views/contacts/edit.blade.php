@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">Edit New Contact</div>

                    <div class="card-body">
                        <form method="POST" action=" {{ route('contacts.update', $contact->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" autocomplete="name"
                                           name="name" autofocus value="{{ old('name') ?? $contact->name }}">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone_number"
                                       class="col-md-4 col-form-label text-md-end">Phone number</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="tel"
                                           class="form-control @error('phone_number') is-invalid @enderror" autocomplete="phone_number"
                                           name="phone_number" value="{{ old('phone_number') ?? $contact->phone_number }}">

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="age"
                                       class="col-md-4 col-form-label text-md-end">Age</label>

                                <div class="col-md-6">
                                    <input id="age" type="text"
                                           class="form-control @error('age') is-invalid @enderror" autocomplete="age"
                                           name="age" value="{{ old('age') ?? $contact->age }}">

                                    @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="text"
                                           class="form-control @error('email') is-invalid @enderror"
                                           autocomplete="email" name="email" autofocus value="{{ old('email') ?? $contact->email }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
