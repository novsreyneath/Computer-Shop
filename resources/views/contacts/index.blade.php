@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="mb-3">Contact Us</h2>

    <p class="text-muted mb-5">
        We're here to help. Feel free to contact us anytime.
    </p>

    <div class="row">

        @foreach($contacts as $contact)

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card shadow-sm border-0 text-center h-100">

                <div class="card-body">

                    <!-- Circle Icon -->
                    <div class="mb-4">

                        <div class="rounded-circle bg-primary d-inline-flex justify-content-center align-items-center"
                             style="width:80px;height:80px;">

                            <i class="fas fa-user text-white fa-2x"></i>

                        </div>

                    </div>

                    <h4 class="fw-bold">

                        {{ $contact->name }}

                    </h4>

                    <hr>

                    <p>

                        <i class="fas fa-envelope text-primary"></i>

                        {{ $contact->email }}

                    </p>

                    <p>

                        <i class="fas fa-phone text-success"></i>

                        {{ $contact->phone }}

                    </p>

                    <p class="text-muted">

                        {{ $contact->message }}

                    </p>

                    @auth
                    @if(Auth::user()->is_admin)

                    <form action="{{ route('contacts.destroy',$contact->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">

                            Delete

                        </button>

                    </form>

                    @endif
                    @endauth

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection