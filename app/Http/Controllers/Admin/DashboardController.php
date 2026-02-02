<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'programs' => \App\Models\Program::count(),
            'projects' => \App\Models\Project::count(),
            'events' => \App\Models\Event::count(),
            'team_members' => \App\Models\TeamMember::count(),
            'sponsor_children' => \App\Models\SponsorChild::count(),
            'blog_posts' => \App\Models\BlogPost::count(),
            'donations' => \App\Models\Donation::where('status', 'completed')->count(),
            'total_donations' => \App\Models\Donation::where('status', 'completed')->sum('amount'),
            'gallery_albums' => \App\Models\GalleryAlbum::count(),
        ];

        $recentDonations = \App\Models\Donation::where('status', 'completed')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $recentPosts = \App\Models\BlogPost::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentDonations', 'recentPosts'));
    }
}
