@extends('layouts.admin')

@section('header')
  <div class="h4 gc">
    Add a New Car
  </div>
  <a href="{{ route('admin.cars.index') }}" class="btn btn-warning"><i class="fa-solid fa-arrow-left me-3"></i>Cars List</a>
@endsection

@section('content')
  <form method="POST" action="{{ route('admin.cars.store') }}" enctype="multipart/form-data">
      @csrf

      <div class="row align-items-center mb-4">

        <!-- Active -->
        <div class="col-auto">
          <label for="active" class="form-label">Active</label>
          <select class="form-select" id="active" name="active" required>
              <option value="1" selected>Yes</option>
              <option value="0">No</option>
          </select>
          @error('active')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <!-- Brand -->
        <div class="col">
          <label for="brand" class="form-label">Brand</label>
          <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}" required>
          @error('brand')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <!-- Model -->
        <div class="col">
          <label for="model" class="form-label">Model</label>
          <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}" required>
          @error('model')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <!-- Year -->
        <div class="col">
          <label for="year" class="form-label">Year</label>
          <input type="number" class="form-control" id="year" name="year" value="{{ old('year') }}" required>
          @error('year')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

      </div>

      <div class="row align-items-center mb-4">
        
        <!-- KM -->
        <div class="col">
          <label for="km" class="form-label">Kilometers</label>
          <input type="number" class="form-control" id="km" name="km" value="{{ old('km') }}" required>
          @error('km')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <!-- Plate -->
        <div class="col">
          <label for="plate" class="form-label">Plate</label>
          <input type="text" class="form-control" id="plate" name="plate" value="{{ old('plate') }}" required>
          @error('plate')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <!-- Passenger Capacity -->
        <div class="col">
          <label for="passenger_capacity" class="form-label">Passenger Capacity</label>
          <input type="number" class="form-control" id="passenger_capacity" name="passenger_capacity" value="{{ old('passenger_capacity') }}" required>
          @error('passenger_capacity')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <!-- Trunk Capacity -->
        <div class="col">
          <label for="trunk_capacity" class="form-label">Trunk Capacity (Liters)</label>
          <input type="number" class="form-control" id="trunk_capacity" name="trunk_capacity" value="{{ old('trunk_capacity') }}" required>
          @error('trunk_capacity')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

      </div>

      <div class="row align-items-center mb-4">

        <!-- Insurance -->
        <div class="col">
          <label for="insurance" class="form-label">Insurance</label>
          <input type="text" class="form-control" id="insurance" name="insurance" value="{{ old('insurance') }}">
          @error('insurance')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <!-- Insurance Expiration Date -->
        <div class="col">
            <label for="insurance_expiration" class="form-label">Insurance Expiration Date</label>
            <input type="date" class="form-control" id="insurance_expiration" name="insurance_expiration" value="{{ old('insurance_expiration') }}">
            @error('insurance_expiration')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- KTEO -->
        <div class="col">
            <label for="kteo" class="form-label">KTEO</label>
            <input type="date" class="form-control" id="kteo" name="kteo" value="{{ old('kteo') }}">
            @error('kteo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- KTEO Expiration Date -->
        <div class="col">
            <label for="kteo_expiration" class="form-label">KTEO Expiration Date</label>
            <input type="date" class="form-control" id="kteo_expiration" name="kteo_expiration" value="{{ old('kteo_expiration') }}">
            @error('kteo_expiration')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

      </div>

      <div class="row align-items-center mb-4">

        <!-- E-pass -->
        <div class="col-4">
          <label for="e_pass" class="form-label">E-Pass</label>
          <input type="text" class="form-control" id="e_pass" name="e_pass" value="{{ old('e_pass') }}">
          @error('e_pass')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

      

        <!-- Photo -->
        <div class="col-8">
          <label for="photo" class="form-label">Photo</label>
          <input type="file" class="form-control" id="photo" name="photo">
          @error('photo')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

      </div>

      <!-- Notes -->
      <div class="mb-4">
          <label for="notes" class="form-label">Notes</label>
          <textarea class="form-control" id="notes" name="notes">{{ old('notes') }}</textarea>
          @error('notes')
              <div class="text-danger">{{ $message }}</div>
          @enderror
      </div>

      <button type="submit" class="btn btn-lg btn-success w-100">Add Car</button>
  </form>
@endsection
