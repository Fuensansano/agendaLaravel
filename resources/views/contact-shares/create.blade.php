@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">Share Contact</div>

                    <div class="card-body">
                        <form method="POST" action=" {{ route('contact-shares.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="contactEmail" class="col-md-4 col-form-label text-md-end">Contact email:</label>

                                <div class="col-md-6">
                                    <input id="contactEmail" type="email"
                                           class="form-control @error('contactEmail') is-invalid @enderror" autocomplete="contactEmail"
                                           name="contactEmail" autofocus value="{{ old('contactEmail') }}">

                                    @error('contactEmail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="userEmail" class="col-md-4 col-form-label text-md-end">User email</label>

                                <div class="col-md-6">
                                    <input id="userEmail" type="email"
                                           class="form-control @error('userEmail') is-invalid @enderror"
                                           autocomplete="userEmail" name="userEmail" autofocus value="{{ old('userEmail') }}">

                                    @error('userEmail')
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
