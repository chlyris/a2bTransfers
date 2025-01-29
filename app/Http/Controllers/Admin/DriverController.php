<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = User::where('type', 'driver')->get();
        return view('admin.drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('admin.drivers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'active' => 'required|boolean',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'id_number' => 'nullable|string|max:255',
            'license_number' => 'nullable|string|max:255',
            'afm' => 'nullable|string|max:255',
            'amka' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $validated['type'] = 'driver';
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('admin.drivers.index')->with('success', 'Driver created successfully.');
    }

    public function edit(User $driver)
    {
        return view('admin.drivers.edit', compact('driver'));
    }

    public function update(Request $request, User $driver)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $driver->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'active' => 'required|boolean',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'id_number' => 'nullable|string|max:255',
            'license_number' => 'nullable|string|max:255',
            'afm' => 'nullable|string|max:255',
            'amka' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('avatar')) {
            if ($driver->avatar && \Storage::disk('public')->exists($driver->avatar)) {
                \Storage::disk('public')->delete($driver->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $driver->update($validated);

        return redirect()->route('admin.drivers.index')->with('success', 'Driver updated successfully.');
    }

    public function destroy(User $driver)
    {
        // Delete the avatar file if it exists
        if ($driver->avatar && \Storage::disk('public')->exists($driver->avatar)) {
            \Storage::disk('public')->delete($driver->avatar);
        }

        $driver->delete();

        return redirect()->route('admin.drivers.index')->with('success', 'Driver deleted successfully.');
    }
}
