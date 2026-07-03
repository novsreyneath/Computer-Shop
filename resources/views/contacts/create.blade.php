@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h3>Contact Us</h3>

                </div>

                <div class="card-body">

                    @if($errors->any())

                        <div class="alert alert-danger">

                            <ul>

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('contacts.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label>Name</label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label>Email</label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label>Phone</label>

                            <input type="text"
                                   name="phone"
                                   class="form-control">

                        </div>

                        <div class="mb-3">

                            <label>Message</label>

                            <textarea name="message"
                                      class="form-control"
                                      rows="5"
                                      required></textarea>

                        </div>

                        <button class="btn btn-success">

                            Send Message

                        </button>

                        <a href="{{ route('home') }}"
                           class="btn btn-secondary">

                            Cancel

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection