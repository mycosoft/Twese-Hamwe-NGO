<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SponsorChild;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SponsorChildController extends Controller
{
    public function index()
    {
        $children = SponsorChild::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.sponsor-children.index', compact('children'));
    }

    public function create()
    {
        return view('admin.sponsor-children.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'location' => 'nullable|string|max:255',
            'story' => 'nullable|string',
            'needs' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'monthly_amount' => 'nullable|numeric|min:0',
            'is_sponsored' => 'boolean',
            'sponsor_name' => 'nullable|string|max:255',
            'sponsor_email' => 'nullable|email|max:255',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name'] . '-' . time());

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('sponsor-children', 'public');
        }

        SponsorChild::create($validated);

        return redirect()->route('admin.sponsor-children.index')
            ->with('success', 'Child profile created successfully.');
    }

    public function edit(SponsorChild $sponsorChild)
    {
        return view('admin.sponsor-children.edit', compact('sponsorChild'));
    }

    public function update(Request $request, SponsorChild $sponsorChild)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'location' => 'nullable|string|max:255',
            'story' => 'nullable|string',
            'needs' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'monthly_amount' => 'nullable|numeric|min:0',
            'is_sponsored' => 'boolean',
            'sponsor_name' => 'nullable|string|max:255',
            'sponsor_email' => 'nullable|email|max:255',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('sponsor-children', 'public');
        }

        $sponsorChild->update($validated);

        return redirect()->route('admin.sponsor-children.index')
            ->with('success', 'Child profile updated successfully.');
    }

    public function destroy(SponsorChild $sponsorChild)
    {
        $sponsorChild->delete();

        return redirect()->route('admin.sponsor-children.index')
            ->with('success', 'Child profile deleted successfully.');
    }
}
