@extends('layouts.admin')

@section('header')
    <div class="h4 gc">
        Edit Car
    </div>
    <a href="{{ route('admin.cars.index') }}" class="btn btn-warning"><i class="fa-solid fa-arrow-left me-3"></i>Cars List</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('admin.cars.update', $car->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row align-items-center mb-4">

            <!-- Active -->
            <div class="col-auto">
                <label for="active" class="form-label">Active</label>
                <select class="form-select" id="active" name="active" required>
                    <option value="1" {{ $car->active ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$car->active ? 'selected' : '' }}>No</option>
                </select>
                @error('active')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Brand -->
            <div class="col">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $car->brand) }}" required>
                @error('brand')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Model -->
            <div class="col">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ old('model', $car->model) }}" required>
                @error('model')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Year -->
            <div class="col">
                <label for="year" class="form-label">Year</label>
                <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $car->year) }}" required>
                @error('year')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="row align-items-center mb-4">

            <!-- KM -->
            <div class="col">
                <label for="km" class="form-label">Kilometers</label>
                <input type="number" class="form-control" id="km" name="km" value="{{ old('km', $car->km) }}" required>
                @error('km')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Plate -->
            <div class="col">
                <label for="plate" class="form-label">Plate</label>
                <input type="text" class="form-control" id="plate" name="plate" value="{{ old('plate', $car->plate) }}" required>
                @error('plate')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Passenger Capacity -->
            <div class="col">
                <label for="passenger_capacity" class="form-label">Passenger Capacity</label>
                <input type="number" class="form-control" id="passenger_capacity" name="passenger_capacity" value="{{ old('passenger_capacity', $car->passenger_capacity) }}" required>
                @error('passenger_capacity')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Trunk Capacity -->
            <div class="col">
                <label for="trunk_capacity" class="form-label">Trunk Capacity (Liters)</label>
                <input type="number" class="form-control" id="trunk_capacity" name="trunk_capacity" value="{{ old('trunk_capacity', $car->trunk_capacity) }}" required>
                @error('trunk_capacity')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="row align-items-center mb-4">

            <!-- Insurance -->
            <div class="col">
                <label for="insurance" class="form-label">Insurance</label>
                <input type="text" class="form-control" id="insurance" name="insurance" value="{{ old('insurance', $car->insurance) }}">
                @error('insurance')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Insurance Expiration Date -->
            <div class="col">
                <label for="insurance_expiration" class="form-label">Insurance Expiration Date</label>
                <input type="date" class="form-control" id="insurance_expiration" name="insurance_expiration" value="{{ old('insurance_expiration', $car->insurance_expiration) }}">
                @error('insurance_expiration')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- KTEO -->
            <div class="col">
                <label for="kteo" class="form-label">KTEO</label>
                <input type="date" class="form-control" id="kteo" name="kteo" value="{{ old('kteo', $car->kteo) }}">
                @error('kteo')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- KTEO Expiration Date -->
            <div class="col">
                <label for="kteo_expiration" class="form-label">KTEO Expiration Date</label>
                <input type="date" class="form-control" id="kteo_expiration" name="kteo_expiration" value="{{ old('kteo_expiration', $car->kteo_expiration) }}">
                @error('kteo_expiration')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="row align-items-center mb-4">

            <!-- E-pass -->
            <div class="col-4">
                <label for="e_pass" class="form-label">E-Pass</label>
                <input type="text" class="form-control" id="e_pass" name="e_pass" value="{{ old('e_pass', $car->e_pass) }}">
                @error('e_pass')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Photo -->
            <div class="col-8">
                <label for="photo" class="form-label">Photo</label>
                <div class="d-flex align-items-center gap-4">
                    <input type="file" class="form-control" id="photo" name="photo">
                    @if($car->photo)
                        <img src="{{ asset('storage/' . $car->photo) }}" alt="Car Photo" class="img-thumbnail mt-2" style="max-width: 200px;">
                    @endif
                </div>
                @error('photo')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <!-- Notes -->
        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes">{{ old('notes', $car->notes) }}</textarea>
            @error('notes')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Service Records Section -->
        <h3 class="mt-5">Service Records</h3>

        <div id="services-section">
            @foreach ($services as $service)
                <div class="service-record border p-3 mb-3" data-id="{{ $service->id }}">
                    <div class="mb-2">
                        <label for="service_date_{{ $service->id }}" class="form-label">Service Date</label>
                        <input type="date" name="services[{{ $service->id }}][service_date]" id="service_date_{{ $service->id }}" value="{{ $service->service_date }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="service_notes_{{ $service->id }}" class="form-label">Service Notes</label>
                        <textarea name="services[{{ $service->id }}][service_notes]" id="service_notes_{{ $service->id }}" class="form-control">{{ $service->service_notes }}</textarea>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeServiceRecord(this, {{ $service->id }})">Remove</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-primary btn-sm mb-3" onclick="addService()">Add New Service</button>

        <button type="submit" class="btn btn-lg btn-success w-100">Update Car</button>
    </form>

    <script>
        let serviceCounter = {{ $services->count() }};
        const removedServiceRecords = [];

        function addService() {
            serviceCounter++;
            const newService = `
            <div class="service-record border p-3 mb-3">
                <div class="mb-2">
                    <label for="new_service_date_${serviceCounter}" class="form-label">Service Date</label>
                    <input type="date" name="new_services[${serviceCounter}][service_date]" id="new_service_date_${serviceCounter}" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="new_service_notes_${serviceCounter}" class="form-label">Service Notes</label>
                    <textarea name="new_services[${serviceCounter}][service_notes]" id="new_service_notes_${serviceCounter}" class="form-control"></textarea>
                </div>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeService(this)">Remove</button>
            </div>`;
            document.getElementById('services-section').insertAdjacentHTML('beforeend', newService);
        }

        function removeService(element) {
            element.closest('.service-record').remove();
        }

        function removeServiceRecord(element, serviceId) {
            removedServiceRecords.push(serviceId); // Track the service record ID to be deleted
            element.closest('.service-record').remove();
            // Add a hidden input to submit the removed IDs to the backend
            const removedInput = `<input type="hidden" name="removed_services[]" value="${serviceId}">`;
            document.getElementById('services-section').insertAdjacentHTML('beforeend', removedInput);
        }
    </script>

@endsection
