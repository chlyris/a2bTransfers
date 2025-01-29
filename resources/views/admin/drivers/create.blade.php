@extends('layouts.admin')

@section('header')
    <div class="h4 gc">
        Add a New Driver
    </div>
    <a href="{{ route('admin.drivers.index') }}" class="btn btn-warning"><i class="fa-solid fa-arrow-left me-3"></i>Drivers List</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('admin.drivers.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="d-flex justify-content-end mb-3">
            <div class="d-flex gap-3 align-items-center">
                <label for="active" class="form-label">Active</label>
                <select id="active" name="active" class="form-select" required>
                    <option value="1" selected>Yes</option>
                    <option value="0">No</option>
                </select>
                @error('active') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="d-flex align-items-center gap-3 mb-3">

            <div class="flex-grow-1">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="flex-grow-1">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="flex-grow-1">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

        </div>

        <div class="d-flex align-items-center gap-3 mb-3">

            <div class="flex-grow-1">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" name="address" class="form-control">
                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="flex-grow-1">
                <label for="id_number" class="form-label">ID Number</label>
                <input type="text" id="id_number" name="id_number" class="form-control">
                @error('id_number') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="flex-grow-1">
                <label for="license_number" class="form-label">License Number</label>
                <input type="text" id="license_number" name="license_number" class="form-control">
                @error('license_number') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

        </div>

        <div class="d-flex align-items-center gap-3 mb-3">

            <div class="flex-grow-1">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control">
                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="flex-grow-1">
                <label for="afm" class="form-label">AFM</label>
                <input type="text" id="afm" name="afm" class="form-control">
                @error('afm') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="flex-grow-1">
                <label for="amka" class="form-label">AMKA</label>
                <input type="text" id="amka" name="amka" class="form-control">
                @error('amka') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

        </div>

        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" id="avatar" name="avatar" class="form-control">
            @error('avatar') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea id="notes" name="notes" class="form-control"></textarea>
            @error('notes') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success w-100">Create Driver</button>
    </form>
@endsection
