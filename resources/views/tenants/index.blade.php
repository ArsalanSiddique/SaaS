@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 d-flex justify-content-end">
                <a href="{{ route('tenants.create') }}">
                    <button class="btn btn-success">Add Tenant</button>
                </a>
            </div>
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Domain</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tenants as $tenant)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $tenant->name }} </td>
                                    <td> {{ $tenant->email }} </td>
                                    <td> {{ $tenant->domains->pluck('domain')->first() }} </td>
                                    <td>
                                        <a target="_blank" href="http://{{$tenant->domains->pluck('domain')->first()}}:8000">
                                            <button class="btn btn-sm btn-success">Open</button>
                                        </a>
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No record found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection