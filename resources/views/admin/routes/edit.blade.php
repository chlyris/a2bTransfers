@extends('layouts.admin')

@section('header')
    <div class="h4 gc">
        Edit Route
    </div>
    <a href="{{ route('admin.routes.index') }}" class="btn btn-warning"><i class="fa-solid fa-arrow-left me-3"></i>Routes List</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('admin.routes.update', $route->id) }}">
        @csrf
        @method('PUT')

        <!-- Pickup Location -->
        <div class="mb-3">
            <label for="pickup_location" class="form-label">Pickup Location</label>
            <input type="text" id="pickup_location" name="pickup_location"
                   value="{{ old('pickup_location', $route->pickup_location) }}"
                   class="form-control" required>
            @error('pickup_location') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Dropoff Location -->
        <div class="mb-3">
            <label for="dropoff_location" class="form-label">Dropoff Location</label>
            <input type="text" id="dropoff_location" name="dropoff_location"
                   value="{{ old('dropoff_location', $route->dropoff_location) }}"
                   class="form-control" required>
            @error('dropoff_location') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Pricing Section -->
        <h4>Pricing Per Car</h4>
        <div id="pricing-section">
            @foreach ($route->routePrices as $index => $price)
                <div class="price-group mb-3 border p-3">
                    <label for="car_id_{{ $index }}" class="form-label">Select Car</label>
                    <select name="prices[{{ $price->id }}][car_id]" id="car_id_{{ $index }}" class="form-select" required>
                        @foreach($cars as $car)
                            <option value="{{ $car->id }}" {{ $car->id == $price->car_id ? 'selected' : '' }}>
                                {{ $car->brand }} {{ $car->model }}
                            </option>
                        @endforeach
                    </select>

                    <label for="price_{{ $index }}" class="form-label">Price (€)</label>
                    <input type="number" step="0.01" name="prices[{{ $price->id }}][price]" id="price_{{ $index }}"
                           value="{{ $price->price }}" class="form-control" required>

                    <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removePrice(this, {{ $price->id }})">
                        Remove
                    </button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-primary btn-sm mb-3" onclick="addPriceField()">Add Another Car</button>

        <button type="submit" class="btn btn-success mt-3">Update Route</button>
    </form>
    </div>

    <script>
        let priceCounter = {{ $route->routePrices->count() }};
        let removedPrices = [];

        function addPriceField() {
            const pricingSection = document.getElementById('pricing-section');
            const newField = `
                <div class="price-group mb-3 border p-3">
                    <label class="form-label">Select Car</label>
                    <select name="new_prices[${priceCounter}][car_id]" class="form-select" required>
                        @foreach($cars as $car)
            <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }}</option>
                        @endforeach
            </select>

            <label class="form-label">Price (€)</label>
            <input type="number" step="0.01" name="new_prices[${priceCounter}][price]" class="form-control" required>

                    <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removePrice(this, null)">
                        Remove
                    </button>
                </div>
            `;
            pricingSection.insertAdjacentHTML('beforeend', newField);
            priceCounter++;
        }

        function removePrice(element, priceId) {
            if (priceId !== null) {
                removedPrices.push(priceId);
                document.getElementById('pricing-section').insertAdjacentHTML(
                    'beforeend', `<input type="hidden" name="removed_prices[]" value="${priceId}">`
                );
            }
            element.closest('.price-group').remove();
        }
    </script>
@endsection
