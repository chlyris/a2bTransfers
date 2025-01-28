@extends('layouts.admin')

@section('header')
    <!-- SweetAlert2 Component -->
    <x-sweet-alert :message="session('success')" type="success" />
  <div class="h4 gc">
    Cars List
  </div>
  <a href="{{ route('admin.cars.create') }}" class="btn btn-success"><i class="fa-solid fa-plus me-2"></i>Add New Car</a>
@endsection

@section('content')
  <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle text-center">
      <thead>
        <tr>
          <th style="width: 167px;">Photo</th>
          <th>Car</th>
          <th>Plate</th>
          <th>Year</th>
          <th>Km</th>
          <th>Capacity</th>
          <th>Insurance</th>
          <th>KTEO</th>
          <th>E-Pass</th>
          <th style="width: 83px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($cars as $car)
          <tr>
            <td class="@if ($car->active) bg-success @else bg-danger @endif"><img src="{{ asset('storage/' . $car->photo) }}" alt="{{ $car->brand }} {{ $car->model }}" class="img-fluid" style="width: 150px;"></td>
            <td>{{ $car->brand }} {{ $car->model }}</td>
            <td>{{ $car->plate }}</td>
            <td>{{ $car->year }}</td>
            <td>{{ $car->km }}</td>
            <td>
              <div class="d-flex flex-column">
                  <span>Passengers: {{ $car->passenger_capacity }}</span>
                  <span>Trunk: {{ $car->trunk_capacity }} ltrs</span>
              </div>
            </td>
              <td>
              <div class="d-flex flex-column">
                  <span class="bg-info-subtle rounded">{{ $car->insurance }}</span>
                  <span class="bg-warning rounded">{{ \Carbon\Carbon::parse($car->insurance_expiration)->format('d/m/Y') }}</span>
              </div>
            </td>
              <td>
              <div class="d-flex flex-column">
                  <span class="bg-info-subtle rounded">{{ \Carbon\Carbon::parse($car->kteo)->format('d/m/Y') }}</span>
                  <span class="bg-warning rounded">{{ \Carbon\Carbon::parse($car->kteo_expiration)->format('d/m/Y') }}</span>
              </div>
            </td>
            <td>{{ $car->e_pass }}</td>
            <td>
              <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i></a>
              <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                  <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(event)">
                      <i class="fa-solid fa-trash"></i>
                  </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="text-center">No cars found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="mt-3">
    {{ $cars->links() }}
  </div>
@endsection
