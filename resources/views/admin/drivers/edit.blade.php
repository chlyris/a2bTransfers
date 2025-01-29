@extends('layouts.admin')

@section('header')
    <div class="h4 gc">
        Edit Driver
    </div>
    <a href="{{ route('admin.drivers.index') }}" class="btn btn-warning"><i class="fa-solid fa-arrow-left me-3"></i>Drivers List</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('admin.drivers.update', $driver->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="d-flex justify-content-end mb-3">
            <div class="d-flex gap-3 align-items-center">
                <label for="active" class="form-label">Active</label>
                <select id="active" name="active" class="form-select" required>
                    <option value="1" {{ old('active', $driver->active) == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('active', $driver->active) == 0 ? 'selected' : '' }}>No</option>
                </select>
                @error('active') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="d-flex align-items-center gap-3 mb-3">

            <div class="flex-grow-1">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $driver->name) }}" class="form-control" required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="flex-grow-1">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $driver->email) }}" class="form-control" required>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

        </div>

        <div class="d-flex align-items-center gap-3 mb-3">

            <div class="flex-grow-1">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" name="address" value="{{ old('address', $driver->address) }}" class="form-control">
                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="flex-grow-1">
                <label for="id_number" class="form-label">ID Number</label>
                <input type="text" id="id_number" name="id_number" value="{{ old('id_number', $driver->id_number) }}" class="form-control">
                @error('id_number') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="flex-grow-1">
                <label for="license_number" class="form-label">License Number</label>
                <input type="text" id="license_number" name="license_number" value="{{ old('license_number', $driver->license_number) }}" class="form-control">
                @error('license_number') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

        </div>

        <div class="d-flex align-items-center gap-3 mb-3">

            <div class="flex-grow-1">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $driver->phone) }}" class="form-control">
                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="flex-grow-1">
                <label for="afm" class="form-label">AFM</label>
                <input type="text" id="afm" name="afm" value="{{ old('afm', $driver->afm) }}" class="form-control">
                @error('afm') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="flex-grow-1">
                <label for="amka" class="form-label">AMKA</label>
                <input type="text" id="amka" name="amka" value="{{ old('amka', $driver->amka) }}" class="form-control">
                @error('amka') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

        </div>

        <div class="d-flex align-items-center gap-3 mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" id="avatar" name="avatar" class="form-control">
            @if ($driver->avatar)
                <img src="{{ asset('storage/' . $driver->avatar) }}" alt="Avatar" class="mt-2" width="100">
            @endif
            @error('avatar') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea id="notes" name="notes" class="form-control">{{ old('notes', $driver->notes) }}</textarea>
            @error('notes') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success w-100">Update Driver</button>
    </form>
@endsection
