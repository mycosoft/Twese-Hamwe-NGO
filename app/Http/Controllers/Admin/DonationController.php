<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $query = Donation::with(['project', 'sponsorChild']);

        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $donations = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.donations.index', compact('donations'));
    }

    public function show(Donation $donation)
    {
        $donation->load(['project', 'sponsorChild']);
        return view('admin.donations.show', compact('donation'));
    }

    public function updateStatus(Request $request, Donation $donation)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,completed,failed,refunded',
        ]);

        $donation->update($validated);

        return redirect()->back()
            ->with('success', 'Donation status updated successfully.');
    }

    public function destroy(Donation $donation)
    {
        $donation->delete();

        return redirect()->route('admin.donations.index')
            ->with('success', 'Donation record deleted successfully.');
    }
}
