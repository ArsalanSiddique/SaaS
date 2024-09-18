@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('tenants.store') }}" method="POST">

                        @csrf

                        <div class="form-group my-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="domain">Domain</label>
                            <input type="text" name="domain" id="domain" placeholder="Domain" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="password">Passwrod</label>
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="confirm-password">Confirm Passwrod</label>
                            <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password" class="form-control">
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary my-3">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection