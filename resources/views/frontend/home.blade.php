@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section with YouTube Video Background -->
    <section class="relative h-[85vh] flex items-center justify-center overflow-hidden">
        <!-- YouTube Video Background -->
        <div class="absolute inset-0 w-full h-full">
            <div class="relative w-full h-full">
                <iframe 
                    class="absolute top-1/2 left-1/2 w-[177.77vh] min-w-full min-h-[56.25vw] h-[100vh] -translate-x-1/2 -translate-y-1/2"
                    src="https://www.youtube.com/embed/qmOC8SWz3Y8?autoplay=1&mute=1&loop=1&playlist=qmOC8SWz3Y8&controls=0&showinfo=0&rel=0&iv_load_policy=3&modestbranding=1&playsinline=1&enablejsapi=1"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
        
        <!-- Overlay -->
        <div class="absolute inset-0 hero-overlay"></div>
        
        <!-- Content -->
        <div class="relative z-10 text-center text-white px-4 max-w-5xl mx-auto">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 animate-fade-in-up" style="animation-delay: 0.2s;">
                Twese Hamwe
            </h1>
            <p class="text-xl md:text-2xl lg:text-3xl font-light mb-4 animate-fade-in-up" style="animation-delay: 0.4s;">
                {{ __('Together We Rise') }}
            </p>
            <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 0.6s;">
                {{ __('Empowering women and youth in Rwanda through skills training, community development, and sustainable income opportunities.') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-up" style="animation-delay: 0.8s;">
                <a href="#programs" class="btn-primary text-white px-8 py-4 rounded-full font-semibold text-lg inline-flex items-center justify-center">
                    <i class="fas fa-hand-holding-heart mr-2"></i>{{ __('Our Programs') }}
                </a>
                <a href="#donate" class="btn-accent text-white px-8 py-4 rounded-full font-semibold text-lg inline-flex items-center justify-center">
                    <i class="fas fa-heart mr-2"></i>{{ __('Donate Now') }}
                </a>
            </div>
        </div>

        <!-- Scroll Down Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <a href="#about" class="text-white">
                <i class="fas fa-chevron-down text-3xl"></i>
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <div class="relative">
                        <img src="{{ asset('TWESE HAMWE/WhatsApp Image 2026-02-01 at 9.11.35 PM.jpeg') }}" 
                             alt="About Twese Hamwe" 
                             class="rounded-2xl shadow-2xl w-full h-[400px] object-cover">
                        <div class="absolute -bottom-6 -right-6 bg-accent-500 text-white p-6 rounded-xl shadow-lg hidden md:block">
                            <p class="text-4xl font-bold">2026</p>
                            <p class="text-sm">{{ __('Changing Lives') }}</p>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left">
                    <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('About Us') }}</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-6">
                        {{ __('Empowering Communities Through') }} <span class="text-primary-600">{{ __('Skills & Opportunity') }}</span>
                    </h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        {{ __('Twese Hamwe (Together) is a community empowerment project dedicated to transforming lives in Rwanda. We provide vocational training, child-friendly spaces, and sustainable income opportunities for women and youth.') }}
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        {{ __('Our mission is to break the cycle of poverty by giving people the skills, dignity, and opportunities they need to create their own futures.') }}
                    </p>
                    
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-users text-primary-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-gray-800">100+</p>
                                <p class="text-sm text-gray-500">{{ __('Women Trained') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-accent-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-child text-accent-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-gray-800">50+</p>
                                <p class="text-sm text-gray-500">{{ __('Children Cared For') }}</p>
                            </div>
                        </div>
                    </div>

                    <a href="#programs" class="btn-primary text-white px-6 py-3 rounded-full font-semibold inline-flex items-center">
                        {{ __('Learn More') }} <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="programs" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('What We Do') }}</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-4">
                    {{ __('Our') }} <span class="text-primary-600">{{ __('Programs') }}</span>
                </h2>
                <p class="text-gray-600">
                    {{ __('We offer comprehensive programs designed to empower women and youth with skills, support, and opportunities for sustainable livelihoods.') }}
                </p>
            </div>

            <!-- Programs Slider -->
            <div class="relative">
                <div class="overflow-hidden" id="programsSlider">
                    <div class="flex transition-transform duration-500 ease-in-out" id="programsTrack">
                        @foreach($programs as $index => $program)
                        <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover h-full">
                                <div class="h-48 bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center">
                                    @if($program->image)
                                        <img src="{{ Storage::url($program->image) }}" alt="{{ $program->title }}" class="w-full h-full object-cover">
                                    @else
                                        <i class="fas fa-child text-6xl text-white opacity-80"></i>
                                    @endif
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $program->title }}</h3>
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $program->short_description }}</p>
                                    <a href="#" class="text-primary-600 font-semibold text-sm inline-flex items-center hover:text-primary-700 transition">
                                        {{ __('Learn More') }} <i class="fas fa-arrow-right ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Slider Navigation -->
                <button onclick="slideProgramsLeft()" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-12 h-12 bg-white shadow-lg rounded-full flex items-center justify-center text-primary-600 hover:bg-primary-600 hover:text-white transition z-10">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button onclick="slideProgramsRight()" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-12 h-12 bg-white shadow-lg rounded-full flex items-center justify-center text-primary-600 hover:bg-primary-600 hover:text-white transition z-10">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Donation/Fundraising Section -->
    <section id="donate" class="py-20 bg-gradient-to-br from-primary-700 via-primary-800 to-primary-900 text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 translate-y-1/2"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <span class="text-white font-semibold text-sm uppercase tracking-wider">{{ __('Support Our Mission') }}</span>
                    <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-6">
                        {{ __('Help Us Reach Our Goal of') }} <span class="text-white">$10,000</span>
                    </h2>
                    <p class="text-gray-200 mb-8 leading-relaxed">
                        {{ __('Your donation helps us provide skills training, establish production centers, and create sustainable income opportunities for women and youth in Rwanda.') }}
                    </p>

                    @if($featuredProject)
                    <!-- Progress Bar -->
                    <div class="bg-white/20 rounded-full h-6 mb-4 overflow-hidden">
                        @php
                            $percentage = $featuredProject->budget > 0 ? min(100, ($featuredProject->raised_amount / $featuredProject->budget) * 100) : 0;
                        @endphp
                        <div class="progress-bar h-full rounded-full transition-all duration-1000" style="width: {{ $percentage }}%"></div>
                    </div>
                    <div class="flex justify-between text-sm mb-8">
                        <span>${{ number_format($featuredProject->raised_amount, 0) }} {{ __('raised') }}</span>
                        <span>{{ __('Goal') }}: ${{ number_format($featuredProject->budget, 0) }}</span>
                    </div>
                    @endif

                    <!-- Milestones -->
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="bg-white/10 rounded-xl p-4">
                            <p class="text-white font-bold text-xl">$2,000</p>
                            <p class="text-sm text-gray-300">{{ __('Open the Door') }}</p>
                        </div>
                        <div class="bg-white/10 rounded-xl p-4">
                            <p class="text-white font-bold text-xl">$4,000</p>
                            <p class="text-sm text-gray-300">{{ __('Skills Become Real') }}</p>
                        </div>
                        <div class="bg-white/10 rounded-xl p-4">
                            <p class="text-white font-bold text-xl">$7,000</p>
                            <p class="text-sm text-gray-300">{{ __('A Real Workshop') }}</p>
                        </div>
                        <div class="bg-white/10 rounded-xl p-4">
                            <p class="text-white font-bold text-xl">$10,000</p>
                            <p class="text-sm text-gray-300">{{ __('From Learning to Earning') }}</p>
                        </div>
                    </div>

                    <a href="#" class="btn-accent text-white px-8 py-4 rounded-full font-semibold text-lg inline-flex items-center animate-pulse-glow">
                        <i class="fas fa-heart mr-2"></i>{{ __('Donate Now') }}
                    </a>
                </div>

                <div data-aos="fade-left">
                    <img src="{{ asset('TWESE HAMWE/WhatsApp Image 2026-02-01 at 9.11.37 PM.jpeg') }}" 
                         alt="Donate" 
                         class="rounded-2xl shadow-2xl w-full h-[500px] object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Upcoming') }}</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-4">
                    {{ __('Our') }} <span class="text-primary-600">{{ __('Events') }}</span>
                </h2>
                <p class="text-gray-600">
                    {{ __('Join us at our upcoming events and be part of the change.') }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                @forelse($upcomingEvents as $event)
                <div class="bg-gray-50 rounded-2xl p-6 card-hover" data-aos="fade-up">
                    <div class="flex gap-4 items-start">
                        <div class="flex-shrink-0 flex flex-col items-center justify-center bg-primary-600 text-white rounded-xl p-3 w-16">
                            <span class="text-2xl font-bold">{{ $event->start_date->format('d') }}</span>
                            <span class="text-xs uppercase">{{ $event->start_date->format('M') }}</span>
                        </div>
                        <div class="flex-grow">
                            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $event->title }}</h3>
                            <div class="flex flex-wrap gap-2 mb-2">
                                <span class="bg-accent-100 text-accent-700 px-2 py-1 rounded-full text-xs font-medium">
                                    <i class="fas fa-clock mr-1"></i>{{ $event->start_date->format('h:i A') }}
                                </span>
                                <span class="bg-primary-100 text-primary-700 px-2 py-1 rounded-full text-xs font-medium">
                                    <i class="fas fa-map-marker-alt mr-1"></i>{{ $event->location }}
                                </span>
                            </div>
                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $event->short_description }}</p>
                            <a href="#" class="text-primary-600 font-semibold text-sm inline-flex items-center hover:text-primary-700 transition">
                                {{ __('Learn More') }} <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <i class="fas fa-calendar-times text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">{{ __('No upcoming events at the moment.') }}</p>
                </div>
                @endforelse
            </div>

            @if($upcomingEvents->count() > 0)
            <div class="text-center mt-10" data-aos="fade-up">
                <a href="{{ route('events') }}" class="btn-outline text-primary-600 px-8 py-3 rounded-full font-semibold inline-flex items-center border-2 border-primary-600 hover:bg-primary-600 hover:text-white transition">
                    {{ __('View All Events') }} <i class="fas fa-calendar-alt ml-2"></i>
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-20 relative overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('TWESE HAMWE/WhatsApp Image 2026-02-01 at 9.10.55 PM.jpeg') }}" 
                 alt="Background" 
                 class="w-full h-full object-cover">
            <!-- Green Overlay -->
            <div class="absolute inset-0 bg-primary-800/60"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-white">{{ __('Make a Difference Today') }}</h2>
            <p class="text-xl text-gray-200 mb-8 max-w-2xl mx-auto">
                {{ __('Join us in empowering women and youth. Your support creates lasting change.') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('donate') }}" class="bg-white text-primary-700 px-8 py-4 rounded-full font-semibold text-lg hover:bg-gray-100 transition inline-flex items-center justify-center">
                    <i class="fas fa-heart mr-2"></i>{{ __('Donate Now') }}
                </a>
                <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-primary-700 transition inline-flex items-center justify-center">
                    <i class="fas fa-hands-helping mr-2"></i>{{ __('Get Involved') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Our Work') }}</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-4">
                    {{ __('Photo') }} <span class="text-primary-600">{{ __('Gallery') }}</span>
                </h2>
                <p class="text-gray-600">
                    {{ __('See the impact of our programs through these moments captured in our community.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                @php
                    $galleryImages = [
                        'WhatsApp Image 2026-02-01 at 9.10.46 PM.jpeg',
                        'WhatsApp Image 2026-02-01 at 9.10.50 PM.jpeg',
                        'WhatsApp Image 2026-02-01 at 9.10.53 PM.jpeg',
                        'WhatsApp Image 2026-02-01 at 9.10.54 PM.jpeg',
                        'WhatsApp Image 2026-02-01 at 9.10.55 PM.jpeg',
                    ];
                @endphp
                
                <!-- Large Image on Left -->
                <div class="relative group overflow-hidden rounded-xl cursor-pointer" data-aos="zoom-in">
                    <img src="{{ asset('TWESE HAMWE/' . $galleryImages[0]) }}" 
                         alt="Gallery Image 1" 
                         class="w-full h-[400px] lg:h-[420px] object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-4">
                        <i class="fas fa-search-plus text-white text-2xl"></i>
                    </div>
                </div>
                
                <!-- 4 Smaller Images on Right -->
                <div class="grid grid-cols-2 gap-4">
                    @foreach(array_slice($galleryImages, 1, 4) as $index => $image)
                    <div class="relative group overflow-hidden rounded-xl cursor-pointer" data-aos="zoom-in" data-aos-delay="{{ ($index + 1) * 50 }}">
                        <img src="{{ asset('TWESE HAMWE/' . $image) }}" 
                             alt="Gallery Image {{ $index + 2 }}" 
                             class="w-full h-[200px] object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-4">
                            <i class="fas fa-search-plus text-white text-2xl"></i>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Latest News') }}</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-4">
                    {{ __('Our') }} <span class="text-primary-600">{{ __('Blog') }}</span>
                </h2>
                <p class="text-gray-600">
                    {{ __('Stories of impact, updates, and insights from our community work.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($recentPosts as $index => $post)
                <article class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="h-48 bg-gradient-to-br from-primary-400 to-primary-600 relative">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <i class="fas fa-newspaper text-6xl text-white opacity-50"></i>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4">
                            <span class="bg-accent-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                {{ $post->category->name ?? 'News' }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-gray-400 text-sm mb-3">
                            <i class="far fa-calendar mr-2"></i>
                            {{ $post->published_at?->format('M d, Y') ?? 'Draft' }}
                            <span class="mx-2">|</span>
                            <i class="far fa-eye mr-2"></i>
                            {{ $post->views }} {{ __('views') }}
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 hover:text-primary-600 transition">
                            <a href="#">{{ $post->title }}</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                        <a href="#" class="text-primary-600 font-semibold text-sm inline-flex items-center hover:text-primary-700 transition">
                            {{ __('Read More') }} <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Impact Numbers Section -->
    <section class="py-16 bg-gradient-to-r from-primary-700 to-primary-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div data-aos="zoom-in" data-aos-delay="0">
                    <i class="fas fa-female text-4xl text-white mb-4"></i>
                    <p class="text-4xl md:text-5xl font-bold mb-2">100+</p>
                    <p class="text-gray-300">{{ __('Women Empowered') }}</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="100">
                    <i class="fas fa-child text-4xl text-white mb-4"></i>
                    <p class="text-4xl md:text-5xl font-bold mb-2">50+</p>
                    <p class="text-gray-300">{{ __('Children Supported') }}</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="200">
                    <i class="fas fa-project-diagram text-4xl text-white mb-4"></i>
                    <p class="text-4xl md:text-5xl font-bold mb-2">4</p>
                    <p class="text-gray-300">{{ __('Active Programs') }}</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="300">
                    <i class="fas fa-hand-holding-heart text-4xl text-white mb-4"></i>
                    <p class="text-4xl md:text-5xl font-bold mb-2">$10K</p>
                    <p class="text-gray-300">{{ __('Fundraising Goal') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Impact Stories Section -->
    <section id="impact-stories" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Real Stories') }}</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-4">
                    {{ __('Our') }} <span class="text-primary-600">{{ __('Impact Stories') }}</span>
                </h2>
                <p class="text-gray-600">
                    {{ __('See how our programs are transforming lives in the community.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Story 1 -->
                <div class="bg-gray-50 rounded-2xl overflow-hidden shadow-lg card-hover" data-aos="fade-up" data-aos-delay="100">
                    <div class="h-56 bg-gradient-to-br from-primary-500 to-primary-700 relative">
                        <img src="{{ asset('TWESE HAMWE/WhatsApp Image 2026-02-01 at 9.10.53 PM.jpeg') }}" 
                             alt="Marie's Story" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="bg-accent-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                {{ __('Women Empowerment') }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ __('From Struggle to Success') }}</h3>
                        <p class="text-primary-600 font-semibold text-sm mb-3">Marie Uwimana</p>
                        <p class="text-gray-600 mb-4">
                            {{ __('After completing our tailoring program, Marie now runs her own small business and supports her family with dignity and pride.') }}
                        </p>
                        <a href="{{ route('stories') }}" class="text-primary-600 font-semibold text-sm inline-flex items-center hover:text-primary-700 transition">
                            {{ __('Read Full Story') }} <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Story 2 -->
                <div class="bg-gray-50 rounded-2xl overflow-hidden shadow-lg card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="h-56 bg-gradient-to-br from-primary-500 to-primary-700 relative">
                        <img src="{{ asset('TWESE HAMWE/WhatsApp Image 2026-02-01 at 9.10.54 PM.jpeg') }}" 
                             alt="Children at Espace Amis" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="bg-accent-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                {{ __('Child Protection') }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ __('A Safe Place to Learn') }}</h3>
                        <p class="text-primary-600 font-semibold text-sm mb-3">Espace Amis pour Enfants</p>
                        <p class="text-gray-600 mb-4">
                            {{ __('Our child-friendly space provides children with a nurturing environment where they can learn, play, and grow safely while their mothers work.') }}
                        </p>
                        <a href="{{ route('stories') }}" class="text-primary-600 font-semibold text-sm inline-flex items-center hover:text-primary-700 transition">
                            {{ __('Read Full Story') }} <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-10" data-aos="fade-up">
                <a href="{{ route('stories') }}" class="btn-primary text-white px-8 py-3 rounded-full font-semibold inline-flex items-center">
                    {{ __('View All Stories') }} <i class="fas fa-book-open ml-2"></i>
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Programs Slider
    let currentProgram = 0;
    const totalPrograms = {{ count($programs) }};
    const programsPerView = window.innerWidth >= 768 ? 3 : 1;
    const maxSlide = Math.max(0, totalPrograms - programsPerView);

    function updateProgramsSlider() {
        const track = document.getElementById('programsTrack');
        const slideWidth = 100 / programsPerView;
        track.style.transform = `translateX(-${currentProgram * slideWidth}%)`;
        
        // Update dots
        document.querySelectorAll('#programsDots button').forEach((dot, index) => {
            if (index === currentProgram) {
                dot.classList.remove('bg-gray-300');
                dot.classList.add('bg-primary-600');
            } else {
                dot.classList.remove('bg-primary-600');
                dot.classList.add('bg-gray-300');
            }
        });
    }

    function slideProgramsLeft() {
        currentProgram = Math.max(0, currentProgram - 1);
        updateProgramsSlider();
    }

    function slideProgramsRight() {
        currentProgram = Math.min(maxSlide, currentProgram + 1);
        updateProgramsSlider();
    }

    function goToProgram(index) {
        currentProgram = Math.min(maxSlide, index);
        updateProgramsSlider();
    }

    // Handle window resize
    window.addEventListener('resize', function() {
        const newPerView = window.innerWidth >= 768 ? 3 : 1;
        if (newPerView !== programsPerView) {
            location.reload();
        }
    });
</script>
@endpush
