@extends('layouts.admin')

@section('header')
    <div class="h4 gc">
        Add a New Route
    </div>
    <a href="{{ route('admin.routes.index') }}" class="btn btn-warning"><i class="fa-solid fa-arrow-left me-3"></i>Routes List</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('admin.routes.store') }}">
        @csrf

        <div class="mb-3">
            <label for="pickup_location" class="form-label">Pickup Location</label>
            <input type="text" id="pickup_location" name="pickup_location" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="dropoff_location" class="form-label">Dropoff Location</label>
            <input type="text" id="dropoff_location" name="dropoff_location" class="form-control" required>
        </div>

        <h4>Pricing Per Car</h4>
        <div id="pricing-section">
            <div class="price-group mb-3">
                <label for="car_id_1" class="form-label">Select Car</label>
                <select name="prices[0][car_id]" id="car_id_1" class="form-select" required>
                    @foreach($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }}</option>
                    @endforeach
                </select>

                <label for="price_1" class="form-label">Price (€)</label>
                <input type="number" step="0.01" name="prices[0][price]" id="price_1" class="form-control" required>
            </div>
        </div>

        <button type="button" class="btn btn-primary btn-sm" onclick="addPriceField()">Add Another Car</button>
        <button type="submit" class="btn btn-success mt-3">Create Route</button>
    </form>

    <script>
        let priceCounter = 1;
        function addPriceField() {
            const pricingSection = document.getElementById('pricing-section');
            const newField = `
                <div class="price-group mb-3">
                    <label for="car_id_${priceCounter}" class="form-label">Select Car</label>
                    <select name="prices[${priceCounter}][car_id]" id="car_id_${priceCounter}" class="form-select" required>
                        @foreach($cars as $car)
            <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }}</option>
                        @endforeach
            </select>

            <label for="price_${priceCounter}" class="form-label">Price (€)</label>
                    <input type="number" step="0.01" name="prices[${priceCounter}][price]" id="price_${priceCounter}" class="form-control" required>
                </div>
            `;
            pricingSection.insertAdjacentHTML('beforeend', newField);
            priceCounter++;
        }
    </script>
@endsection
