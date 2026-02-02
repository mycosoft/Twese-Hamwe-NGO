@extends('frontend.layouts.app')

@section('title', $event->title)

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-primary-700 to-primary-900">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white">
            @if($event->start_date > now())
                <span class="bg-accent-500 text-white px-4 py-1 rounded-full text-sm font-semibold mb-4 inline-block" data-aos="fade-up">{{ __('Upcoming Event') }}</span>
            @else
                <span class="bg-gray-500 text-white px-4 py-1 rounded-full text-sm font-semibold mb-4 inline-block" data-aos="fade-up">{{ __('Past Event') }}</span>
            @endif
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="100">{{ $event->title }}</h1>
            <div class="flex flex-wrap items-center justify-center gap-4 text-white/80 text-sm" data-aos="fade-up" data-aos-delay="200">
                <span><i class="far fa-calendar mr-1"></i>{{ $event->start_date->format('M d, Y') }}</span>
                <span><i class="far fa-clock mr-1"></i>{{ $event->start_date->format('h:i A') }}</span>
                @if($event->location)
                    <span><i class="fas fa-map-marker-alt mr-1"></i>{{ $event->location }}</span>
                @endif
            </div>
            <nav class="flex justify-center mt-6" data-aos="fade-up" data-aos-delay="300">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-white/80 hover:text-white">{{ __('Home') }}</a></li>
                    <li><span class="text-white/60">/</span></li>
                    <li><a href="{{ route('events') }}" class="text-white/80 hover:text-white">{{ __('Events') }}</a></li>
                    <li><span class="text-white/60">/</span></li>
                    <li class="text-accent-400">{{ Str::limit($event->title, 30) }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Event Content -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Event Image -->
                @if($event->image)
                    <div class="mb-8 -mt-24 relative z-10" data-aos="fade-up">
                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full rounded-2xl shadow-2xl">
                    </div>
                @endif

                <!-- Description -->
                <div class="prose prose-lg max-w-none" data-aos="fade-up">
                    <h2>{{ __('About This Event') }}</h2>
                    {!! nl2br(e($event->description)) !!}
                </div>

                <!-- Share -->
                <div class="mt-10 pt-8 border-t" data-aos="fade-up">
                    <h4 class="text-sm font-semibold text-gray-500 uppercase mb-4">{{ __('Share this event') }}</h4>
                    <div class="flex gap-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($event->title) }}" target="_blank" class="w-10 h-10 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($event->title . ' ' . request()->url()) }}" target="_blank" class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    <!-- Event Details Card -->
                    <div class="bg-gray-50 rounded-2xl p-6" data-aos="fade-left">
                        <h3 class="font-bold text-gray-800 text-lg mb-6">{{ __('Event Details') }}</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-calendar text-primary-600"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">{{ __('Date') }}</p>
                                    <p class="font-semibold text-gray-800">{{ $event->start_date->format('l, F d, Y') }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-clock text-primary-600"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">{{ __('Time') }}</p>
                                    <p class="font-semibold text-gray-800">{{ $event->start_date->format('h:i A') }}
                                        @if($event->end_date)
                                            - {{ $event->end_date->format('h:i A') }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            
                            @if($event->location)
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-map-marker-alt text-primary-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 text-sm">{{ __('Location') }}</p>
                                        <p class="font-semibold text-gray-800">{{ $event->location }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if($event->start_date > now())
                            <div class="mt-8">
                                @if($event->registration_url)
                                    <a href="{{ $event->registration_url }}" target="_blank" class="btn-primary text-white px-8 py-3 rounded-full font-semibold w-full text-center block">
                                        {{ __('Register Now') }} <i class="fas fa-external-link-alt ml-2"></i>
                                    </a>
                                @else
                                    <a href="{{ route('contact') }}" class="btn-primary text-white px-8 py-3 rounded-full font-semibold w-full text-center block">
                                        {{ __('Contact to Register') }}
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>

                    <!-- Add to Calendar -->
                    @if($event->start_date > now())
                        <div class="bg-white border-2 border-gray-100 rounded-2xl p-6" data-aos="fade-left" data-aos-delay="100">
                            <h3 class="font-bold text-gray-800 text-lg mb-4">{{ __('Add to Calendar') }}</h3>
                            <div class="space-y-3">
                                <a href="#" class="flex items-center gap-3 text-gray-600 hover:text-primary-600 transition">
                                    <i class="fab fa-google text-lg"></i>
                                    <span>{{ __('Google Calendar') }}</span>
                                </a>
                                <a href="#" class="flex items-center gap-3 text-gray-600 hover:text-primary-600 transition">
                                    <i class="fas fa-calendar text-lg"></i>
                                    <span>{{ __('Outlook Calendar') }}</span>
                                </a>
                                <a href="#" class="flex items-center gap-3 text-gray-600 hover:text-primary-600 transition">
                                    <i class="fas fa-download text-lg"></i>
                                    <span>{{ __('Download iCal') }}</span>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Events -->
@if($relatedEvents->isNotEmpty())
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800">{{ __('Other Events You Might Like') }}</h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($relatedEvents as $related)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="h-48 overflow-hidden relative">
                        @if($related->image)
                            <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary-300 to-primary-500 flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-white text-4xl"></i>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4 bg-primary-600 text-white px-3 py-2 rounded-lg text-center">
                            <span class="text-2xl font-bold block leading-none">{{ $related->start_date->format('d') }}</span>
                            <span class="text-xs uppercase">{{ $related->start_date->format('M') }}</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-3">
                            <a href="{{ route('events.show', $related->slug ?? $related->id) }}" class="hover:text-primary-600 transition">{{ $related->title }}</a>
                        </h3>
                        <div class="flex items-center gap-3 text-sm text-gray-500 mb-4">
                            <span><i class="far fa-clock mr-1"></i>{{ $related->start_date->format('h:i A') }}</span>
                            @if($related->location)
                                <span><i class="fas fa-map-marker-alt mr-1"></i>{{ Str::limit($related->location, 15) }}</span>
                            @endif
                        </div>
                        <a href="{{ route('events.show', $related->slug ?? $related->id) }}" class="text-primary-600 font-semibold text-sm hover:text-primary-700 transition inline-flex items-center">
                            {{ __('Learn More') }} <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

@push('styles')
<style>
    .prose h2 { @apply text-2xl font-bold text-gray-800 mt-8 mb-4; }
    .prose p { @apply text-gray-600 leading-relaxed mb-4; }
</style>
@endpush
