@extends('frontend.layouts.app')

@section('title', __('Events'))

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-primary-700 to-primary-900">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up">{{ __('Events') }}</h1>
            <p class="text-xl text-white/90 mb-6" data-aos="fade-up" data-aos-delay="100">{{ __('Join us at our upcoming events and activities') }}</p>
            <nav class="flex justify-center" data-aos="fade-up" data-aos-delay="200">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-white/80 hover:text-white">{{ __('Home') }}</a></li>
                    <li><span class="text-white/60">/</span></li>
                    <li class="text-accent-400">{{ __('Events') }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Upcoming Events -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Mark Your Calendar') }}</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2">{{ __('Upcoming Events') }}</h2>
        </div>
        
        @if($upcomingEvents->isEmpty())
            <div class="text-center py-12 bg-gray-50 rounded-2xl">
                <i class="fas fa-calendar-times text-5xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">{{ __('No upcoming events at the moment. Check back soon!') }}</p>
            </div>
        @else
            <div class="space-y-6">
                @foreach($upcomingEvents as $event)
                    <div class="bg-white border-2 border-gray-100 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="grid md:grid-cols-4 gap-0">
                            <!-- Date Box -->
                            <div class="bg-gradient-to-br from-primary-600 to-primary-700 p-6 flex flex-col items-center justify-center text-white text-center">
                                <span class="text-5xl font-bold">{{ $event->start_date->format('d') }}</span>
                                <span class="text-xl uppercase">{{ $event->start_date->format('M') }}</span>
                                <span class="text-sm opacity-80">{{ $event->start_date->format('Y') }}</span>
                            </div>
                            
                            <!-- Event Image -->
                            <div class="h-48 md:h-auto overflow-hidden">
                                @if($event->image)
                                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-accent-400 to-accent-600 flex items-center justify-center">
                                        <i class="fas fa-calendar-alt text-white text-4xl"></i>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Event Details -->
                            <div class="md:col-span-2 p-6 flex flex-col justify-center">
                                <div class="flex flex-wrap items-center gap-3 mb-3">
                                    @if($event->is_featured)
                                        <span class="bg-accent-100 text-accent-700 px-3 py-1 rounded-full text-xs font-semibold">{{ __('Featured') }}</span>
                                    @endif
                                    <span class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i>{{ $event->start_date->format('h:i A') }}</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $event->title }}</h3>
                                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($event->description, 150) }}</p>
                                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mb-4">
                                    @if($event->location)
                                        <span><i class="fas fa-map-marker-alt text-primary-500 mr-1"></i>{{ $event->location }}</span>
                                    @endif
                                    @if($event->end_date && $event->end_date != $event->start_date)
                                        <span><i class="fas fa-arrow-right text-primary-500 mr-1"></i>{{ __('Until') }} {{ $event->end_date->format('M d, Y') }}</span>
                                    @endif
                                </div>
                                <div class="flex gap-3">
                                    <a href="{{ route('events.show', $event->slug ?? $event->id) }}" class="btn-primary text-white px-6 py-2 rounded-full font-semibold text-sm inline-flex items-center">
                                        {{ __('View Details') }} <i class="fas fa-arrow-right ml-2"></i>
                                    </a>
                                    @if($event->registration_url)
                                        <a href="{{ $event->registration_url }}" target="_blank" class="bg-gray-100 text-gray-700 px-6 py-2 rounded-full font-semibold text-sm hover:bg-gray-200 transition inline-flex items-center">
                                            {{ __('Register') }} <i class="fas fa-external-link-alt ml-2"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<!-- Past Events -->
@if($pastEvents->isNotEmpty())
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Looking Back') }}</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2">{{ __('Past Events') }}</h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($pastEvents as $event)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="relative h-48 overflow-hidden">
                        @if($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover grayscale hover:grayscale-0 transition duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-gray-400 to-gray-600 flex items-center justify-center">
                                <i class="fas fa-calendar-check text-white text-4xl"></i>
                            </div>
                        @endif
                        <div class="absolute top-4 right-4 bg-gray-800 text-white px-3 py-1 rounded-full text-xs font-semibold">
                            {{ __('Completed') }}
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-sm text-gray-500 mb-3">
                            <span><i class="far fa-calendar mr-1"></i>{{ $event->start_date->format('M d, Y') }}</span>
                            @if($event->location)
                                <span><i class="fas fa-map-marker-alt mr-1"></i>{{ Str::limit($event->location, 20) }}</span>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-3">{{ $event->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($event->description, 100) }}</p>
                        <a href="{{ route('events.show', $event->slug ?? $event->id) }}" class="text-primary-600 font-semibold text-sm hover:text-primary-700 transition inline-flex items-center">
                            {{ __('View Recap') }} <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Event Calendar CTA -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-3xl p-8 md:p-12" data-aos="fade-up">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="text-white">
                    <h2 class="text-2xl md:text-3xl font-bold mb-4">{{ __('Never Miss an Event') }}</h2>
                    <p class="text-white/90 mb-6">{{ __('Subscribe to our calendar and get notified about upcoming events, workshops, and community gatherings.') }}</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#" class="bg-white text-primary-700 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition inline-flex items-center">
                            <i class="fab fa-google mr-2"></i>{{ __('Google Calendar') }}
                        </a>
                        <a href="#" class="bg-white/20 text-white px-6 py-3 rounded-full font-semibold hover:bg-white/30 transition inline-flex items-center">
                            <i class="fas fa-download mr-2"></i>{{ __('iCal') }}
                        </a>
                    </div>
                </div>
                <div class="hidden md:flex justify-center">
                    <div class="bg-white/10 rounded-xl p-6 text-center">
                        <i class="fas fa-calendar-check text-6xl text-white/80 mb-4"></i>
                        <p class="text-white/80 text-sm">{{ __('Stay updated with all our events') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4" data-aos="fade-up">{{ __('Want to Host an Event with Us?') }}</h2>
        <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            {{ __('Partner with Twese Hamwe to organize community events, workshops, or fundraisers that make a difference.') }}
        </p>
        <a href="{{ route('contact') }}" class="btn-primary text-white px-8 py-3 rounded-full font-semibold inline-flex items-center" data-aos="fade-up" data-aos-delay="200">
            <i class="fas fa-handshake mr-2"></i>{{ __('Partner With Us') }}
        </a>
    </div>
</section>
@endsection
