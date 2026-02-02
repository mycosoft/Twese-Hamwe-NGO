<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Event;
use App\Models\Program;
use App\Models\Project;
use App\Models\GalleryAlbum;
use App\Models\TeamMember;
use App\Models\SponsorChild;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_active', true)
            ->orderBy('order')
            ->get();

        $featuredProject = Project::where('is_active', true)
            ->where('is_featured', true)
            ->first();

        $upcomingEvents = Event::where('is_active', true)
            ->where('start_date', '>=', now())
            ->orderBy('start_date')
            ->take(2)
            ->get();

        $recentPosts = BlogPost::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $galleryAlbums = GalleryAlbum::where('is_active', true)
            ->with('images')
            ->orderBy('order')
            ->take(3)
            ->get();

        return view('frontend.home', compact(
            'programs',
            'featuredProject',
            'upcomingEvents',
            'recentPosts',
            'galleryAlbums'
        ));
    }

    public function programs()
    {
        $programs = Program::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('frontend.programs', compact('programs'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Here you can add logic to save contact message or send email
        // For now, just redirect back with success message

        return redirect()->back()->with('success', __('Thank you for your message! We will get back to you soon.'));
    }

    public function donate()
    {
        $featuredProject = Project::where('is_active', true)
            ->where('is_featured', true)
            ->first();

        return view('frontend.donate', compact('featuredProject'));
    }

    public function gallery()
    {
        $albums = GalleryAlbum::where('is_active', true)
            ->with('images')
            ->orderBy('order')
            ->get();

        return view('frontend.gallery', compact('albums'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function sponsor()
    {
        $sponsorChildren = SponsorChild::where('is_active', true)
            ->where('is_sponsored', false)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.sponsor', compact('sponsorChildren'));
    }

    public function sponsorSubmit(Request $request)
    {
        $request->validate([
            'type' => 'required|in:child,mother,neighbourhood',
            'duration' => 'required|string',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        // Store sponsorship data in session for payment processing
        session([
            'sponsorship_data' => [
                'type' => $request->type,
                'duration' => $request->duration,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'amount' => $request->amount,
            ]
        ]);

        // Redirect to PayPal payment page (we'll create this later)
        return redirect()->route('sponsor.payment')->with('success', __('Please complete your payment to finalize the sponsorship.'));
    }

    public function getSponsorshipAmounts()
    {
        // Default sponsorship amounts
        $amounts = [
            'child' => 30,
            'mother' => 50,
            'neighbourhood' => 100,
        ];

        // You can also fetch from database settings if needed
        // For now, we'll return the default amounts
        return response()->json([
            'success' => true,
            'amounts' => $amounts
        ]);
    }

    public function sponsorPayment()
    {
        // Check if sponsorship data exists in session
        if (!session()->has('sponsorship_data')) {
            return redirect()->route('sponsor')->with('error', __('No sponsorship data found. Please fill out the form again.'));
        }

        $sponsorshipData = session('sponsorship_data');
        
        return view('frontend.sponsor-payment', compact('sponsorshipData'));
    }

    public function processSponsorPayment(Request $request)
    {
        // Validate PayPal response
        $request->validate([
            'orderID' => 'required|string',
            'payerID' => 'required|string',
            'details' => 'required|array',
        ]);

        // Get sponsorship data from session
        $sponsorshipData = session('sponsorship_data');

        if (!$sponsorshipData) {
            return response()->json([
                'success' => false,
                'message' => 'No sponsorship data found'
            ], 400);
        }

        // Here you would:
        // 1. Verify the PayPal transaction with PayPal API
        // 2. Create a donation record in your database
        // 3. Send confirmation email to the sponsor
        // 4. Update child sponsorship status if applicable

        // For now, we'll just create a donation record
        try {
            $donation = \App\Models\Donation::create([
                'donor_name' => $sponsorshipData['first_name'] . ' ' . $sponsorshipData['last_name'],
                'donor_email' => $sponsorshipData['email'],
                'donor_phone' => $sponsorshipData['phone'] ?? null,
                'amount' => $sponsorshipData['amount'],
                'currency' => 'USD',
                'payment_method' => 'paypal',
                'transaction_id' => $request->orderID,
                'status' => 'completed',
                'type' => 'sponsorship',
                'message' => $sponsorshipData['message'] ?? null,
                'metadata' => json_encode([
                    'sponsorship_type' => $sponsorshipData['type'],
                    'duration' => $sponsorshipData['duration'],
                    'paypal_details' => $request->details,
                ]),
            ]);

            // Clear session data
            session()->forget('sponsorship_data');

            return response()->json([
                'success' => true,
                'message' => 'Payment processed successfully',
                'donation_id' => $donation->id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to process payment: ' . $e->getMessage()
            ], 500);
        }
    }

    public function sponsorPaymentSuccess()
    {
        return view('frontend.sponsor-payment-success');
    }

    public function stories()
    {
        return view('frontend.stories');
    }

    public function team()
    {
        $teamMembers = TeamMember::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('frontend.team', compact('teamMembers'));
    }

    public function blog()
    {
        $posts = BlogPost::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('frontend.blog', compact('posts'));
    }

    public function blogShow($slug)
    {
        $post = BlogPost::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $relatedPosts = BlogPost::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->when($post->category_id, function($query) use ($post) {
                return $query->where('category_id', $post->category_id);
            })
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('frontend.blog-single', compact('post', 'relatedPosts'));
    }

    public function events()
    {
        $upcomingEvents = Event::where('is_active', true)
            ->where('start_date', '>=', now())
            ->orderBy('start_date')
            ->get();

        $pastEvents = Event::where('is_active', true)
            ->where('start_date', '<', now())
            ->orderBy('start_date', 'desc')
            ->take(6)
            ->get();

        return view('frontend.events', compact('upcomingEvents', 'pastEvents'));
    }

    public function eventShow($slug)
    {
        $event = Event::where('slug', $slug)
            ->orWhere('id', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedEvents = Event::where('is_active', true)
            ->where('id', '!=', $event->id)
            ->where('start_date', '>=', now())
            ->orderBy('start_date')
            ->take(3)
            ->get();

        return view('frontend.event-single', compact('event', 'relatedEvents'));
    }

    public function projects()
    {
        $featuredProject = Project::where('is_active', true)
            ->where('is_featured', true)
            ->first();

        $projects = Project::where('is_active', true)
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.projects', compact('projects', 'featuredProject'));
    }

    public function projectShow($slug)
    {
        $project = Project::where('slug', $slug)
            ->orWhere('id', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedProjects = Project::where('is_active', true)
            ->where('id', '!=', $project->id)
            ->take(3)
            ->get();

        return view('frontend.project-single', compact('project', 'relatedProjects'));
    }

    public function setLocale(Request $request, $locale)
    {
        if (in_array($locale, ['en', 'fr', 'sw'])) {
            session(['locale' => $locale]);
        }
        return redirect()->back();
    }
}
