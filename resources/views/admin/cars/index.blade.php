@extends('layouts.admin')

@section('header')
  <div class="h4 gc">
    Cars List
  </div>
  <a href="{{ route('admin.cars.create') }}" class="btn btn-success"><i class="fa-solid fa-plus me-2"></i>Add New Car</a>
@endsection

@section('content')
  <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Photox</th>
          <th>Car</th>
          <th>Plate</th>
          <th>Year</th>
          <th>Km</th>
          <th>Active</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($cars as $car)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="@if ($car->active) bg-success @else bg-danger @endif"><img src="{{ asset('storage/' . $car->photo) }}" alt="{{ $car->brand }} {{ $car->model }}" class="img-fluid" style="width: 100px;"></td>
            <td>{{ $car->brand }} {{ $car->model }}</td>
            <td>{{ $car->plate }}</td>
            <td>{{ $car->year }}</td>
            <td>{{ $car->km }}</td>
            <td>
              @if ($car->active)
                <span class="badge bg-success">Yes</span>
              @else
                <span class="badge bg-danger">No</span>
              @endif
            </td>
            <td>
              <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i></a>
              <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
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