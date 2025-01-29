@extends('layouts.admin')

@section('header')
    <!-- SweetAlert2 Component -->
    <x-sweet-alert :message="session('success')" type="success" />
    <div class="h4 gc">
        Drivers List
    </div>
    <a href="{{ route('admin.drivers.create') }}" class="btn btn-success"><i class="fa-solid fa-plus me-2"></i>Add Driver</a>
@endsection

@section('content')
    <table class="table table-striped table-bordered align-middle text-center">
        <thead>
        <tr>
            <th>Avatar</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>ID Number</th>
            <th>License Number</th>
            <th>AFM</th>
            <th>AMKA</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($drivers as $driver)
            <tr>
                <td><img src="{{ asset('storage/' . $driver->avatar) }}" alt="Avatar" width="50"></td>
                <td class="@if ($driver->active) bg-success @else bg-danger @endif text-light">{{ $driver->name }}</td>
                <td>{{ $driver->email }}</td>
                <td>{{ $driver->phone }}</td>
                <td>{{ $driver->id_number }}</td>
                <td>{{ $driver->license_number }}</td>
                <td>{{ $driver->afm }}</td>
                <td>{{ $driver->amka }}</td>
                <td>
                    <a href="{{ route('admin.drivers.edit', $driver->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i></a>
                    <form action="{{ route('admin.drivers.destroy', $driver->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(event)">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
