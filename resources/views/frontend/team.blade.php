@extends('frontend.layouts.app')

@section('title', __('Our Team'))

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-primary-700 to-primary-900">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up">{{ __('Our Team') }}</h1>
            <p class="text-xl text-white/90 mb-6" data-aos="fade-up" data-aos-delay="100">{{ __('Meet the dedicated people behind our mission') }}</p>
            <nav class="flex justify-center" data-aos="fade-up" data-aos-delay="200">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-white/80 hover:text-white">{{ __('Home') }}</a></li>
                    <li><span class="text-white/60">/</span></li>
                    <li class="text-accent-400">{{ __('Our Team') }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Executive Team Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Leadership') }}</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2">{{ __('Executive Team') }}</h2>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">{{ __('Our leadership team brings together decades of experience in community development, non-profit management, and social impact.') }}</p>
        </div>
        
        @if($teamMembers->isNotEmpty())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($teamMembers as $member)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative h-72 overflow-hidden">
                            @if($member->image)
                                <img src="{{ Storage::url($member->image) }}" alt="{{ $member->name }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                                    <span class="text-white text-6xl font-bold">{{ substr($member->name, 0, 1) }}</span>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                            @if($member->linkedin || $member->twitter || $member->email)
                                <div class="absolute bottom-4 left-0 right-0 flex justify-center gap-3 opacity-0 group-hover:opacity-100 transition duration-300 transform translate-y-4 group-hover:translate-y-0">
                                    @if($member->linkedin)
                                        <a href="{{ $member->linkedin }}" target="_blank" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-primary-600 hover:bg-primary-600 hover:text-white transition">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    @endif
                                    @if($member->twitter)
                                        <a href="{{ $member->twitter }}" target="_blank" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-primary-600 hover:bg-primary-600 hover:text-white transition">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    @endif
                                    @if($member->email)
                                        <a href="mailto:{{ $member->email }}" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-primary-600 hover:bg-primary-600 hover:text-white transition">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $member->name }}</h3>
                            <p class="text-primary-600 font-medium mb-3">{{ $member->position }}</p>
                            @if($member->bio)
                                <p class="text-gray-600 text-sm">{{ Str::limit($member->bio, 120) }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <i class="fas fa-users text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">{{ __('Team information coming soon.') }}</p>
            </div>
        @endif
    </div>
</section>

<!-- Values Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('What Drives Us') }}</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2">{{ __('Our Core Values') }}</h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center" data-aos="fade-up">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-handshake text-primary-600 text-2xl"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">{{ __('Collaboration') }}</h4>
                <p class="text-gray-600 text-sm">{{ __('Working together with communities, partners, and stakeholders to achieve lasting impact.') }}</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-accent-600 text-2xl"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">{{ __('Integrity') }}</h4>
                <p class="text-gray-600 text-sm">{{ __('Maintaining transparency and accountability in all our operations and relationships.') }}</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-heart text-primary-600 text-2xl"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">{{ __('Compassion') }}</h4>
                <p class="text-gray-600 text-sm">{{ __('Treating every individual with dignity, respect, and genuine care for their wellbeing.') }}</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lightbulb text-accent-600 text-2xl"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">{{ __('Innovation') }}</h4>
                <p class="text-gray-600 text-sm">{{ __('Finding creative solutions to complex challenges and continuously improving our approach.') }}</p>
            </div>
        </div>
    </div>
</section>
@endsection
