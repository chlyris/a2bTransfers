<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::paginate(25);
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'active' => 'required|boolean',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'km' => 'required|integer',
            'plate' => 'required|string|unique:cars,plate',
            'passenger_capacity' => 'required|integer',
            'trunk_capacity' => 'required|integer',
            'e_pass' => 'nullable|string|max:255',
            'insurance' => 'nullable|string|max:255',
            'insurance_expiration' => 'nullable|date',
            'kteo' => 'nullable|date',
            'kteo_expiration' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('cars', 'public');
        }

        Car::create($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Car created successfully.');
    }

    public function show(Car $car)
    {
        return view('admin.cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'active' => 'required|boolean',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'km' => 'required|integer',
            'plate' => 'required|string|unique:cars,plate,' . $car->id,
            'passenger_capacity' => 'required|integer',
            'trunk_capacity' => 'required|integer',
            'e_pass' => 'nullable|string|max:255',
            'insurance' => 'nullable|string|max:255',
            'insurance_expiration' => 'nullable|date',
            'kteo' => 'nullable|date',
            'kteo_expiration' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('cars', 'public');
        }

        $car->update($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully.');
    }
}
