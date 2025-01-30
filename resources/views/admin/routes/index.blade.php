@extends('layouts.admin')

@section('header')
    <!-- SweetAlert2 Component -->
    <x-sweet-alert :message="session('success')" type="success" />
    <div class="h4 gc">
        Routes List
    </div>
    <a href="{{ route('admin.routes.create') }}" class="btn btn-success"><i class="fa-solid fa-plus me-2"></i>Add Route</a>
@endsection

@section('content')

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Pickup Location</th>
                <th>Dropoff Location</th>
                <th>Pricing</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($routes as $route)
                <tr>
                    <td>{{ $route->pickup_location }}</td>
                    <td>{{ $route->dropoff_location }}</td>
                    <td>
                        <ul>
                            @foreach ($route->routePrices as $price)
                                <li>
                                    {{ $price->car->brand }} {{ $price->car->model }} -
                                    €{{ number_format($price->price, 2) }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('admin.routes.edit', $route->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('admin.routes.destroy', $route->id) }}" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(event, this)">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete(event, element) {
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "This will permanently delete the route.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    element.closest('form').submit();
                }
            });
        }
    </script>
@endsection
