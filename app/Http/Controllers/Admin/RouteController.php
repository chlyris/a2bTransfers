<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\Car;
use App\Models\RoutePrice;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::with('routePrices.car')->get();
        return view('admin.routes.index', compact('routes'));
    }

    public function create()
    {
        $cars = Car::all();
        return view('admin.routes.create', compact('cars'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pickup_location' => 'required|string',
            'dropoff_location' => 'required|string',
            'prices' => 'required|array',
            'prices.*.car_id' => 'required|exists:cars,id',
            'prices.*.price' => 'required|numeric|min:0',
        ]);

        $route = Route::create([
            'pickup_location' => $validated['pickup_location'],
            'dropoff_location' => $validated['dropoff_location'],
        ]);

        foreach ($validated['prices'] as $priceData) {
            RoutePrice::create([
                'route_id' => $route->id,
                'car_id' => $priceData['car_id'],
                'price' => $priceData['price'],
            ]);
        }

        return redirect()->route('admin.routes.index')->with('success', 'Route created successfully.');
    }

    // **Edit Function**
    public function edit(Route $route)
    {
        $cars = Car::all();
        $route->load('routePrices.car'); // Load associated car prices
        return view('admin.routes.edit', compact('route', 'cars'));
    }

    // **Update Function**
    public function update(Request $request, Route $route)
    {
        $validated = $request->validate([
            'pickup_location' => 'required|string',
            'dropoff_location' => 'required|string',
            'prices' => 'nullable|array',
            'prices.*.car_id' => 'required|exists:cars,id',
            'prices.*.price' => 'required|numeric|min:0',
        ]);

        // Update route details
        $route->update([
            'pickup_location' => $validated['pickup_location'],
            'dropoff_location' => $validated['dropoff_location'],
        ]);

        // Update existing prices
        if ($request->has('prices')) {
            foreach ($request->prices as $priceId => $data) {
                $routePrice = RoutePrice::find($priceId);
                if ($routePrice) {
                    $routePrice->update($data);
                }
            }
        }

        // Add new price records
        if ($request->has('new_prices')) {
            foreach ($request->new_prices as $data) {
                RoutePrice::create([
                    'route_id' => $route->id,
                    'car_id' => $data['car_id'],
                    'price' => $data['price'],
                ]);
            }
        }

        // Remove deleted price records
        if ($request->has('removed_prices')) {
            RoutePrice::whereIn('id', $request->removed_prices)->delete();
        }

        return redirect()->route('admin.routes.index')->with('success', 'Route updated successfully.');
    }

    // **Destroy Function**
    public function destroy(Route $route)
    {
        // Automatically deletes associated RoutePrices due to foreign key constraints
        $route->delete();

        return redirect()->route('admin.routes.index')->with('success', 'Route deleted successfully.');
    }
}
