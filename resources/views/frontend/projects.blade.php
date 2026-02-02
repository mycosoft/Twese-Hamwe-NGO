@extends('frontend.layouts.app')

@section('title', __('Our Projects'))

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-primary-700 to-primary-900">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up">{{ __('Our Projects') }}</h1>
            <p class="text-xl text-white/90 mb-6" data-aos="fade-up" data-aos-delay="100">{{ __('Initiatives that create lasting impact') }}</p>
            <nav class="flex justify-center" data-aos="fade-up" data-aos-delay="200">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-white/80 hover:text-white">{{ __('Home') }}</a></li>
                    <li><span class="text-white/60">/</span></li>
                    <li class="text-accent-400">{{ __('Projects') }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Featured Project -->
@if($featuredProject)
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-primary-50 to-accent-50 rounded-3xl overflow-hidden" data-aos="fade-up">
            <div class="grid lg:grid-cols-2 gap-0">
                <div class="h-72 lg:h-auto overflow-hidden">
                    @if($featuredProject->image)
                        <img src="{{ asset('storage/' . $featuredProject->image) }}" alt="{{ $featuredProject->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                            <i class="fas fa-project-diagram text-white text-6xl"></i>
                        </div>
                    @endif
                </div>
                <div class="p-8 lg:p-12 flex flex-col justify-center">
                    <span class="bg-accent-500 text-white px-4 py-1 rounded-full text-sm font-semibold inline-block w-fit mb-4">{{ __('Featured Project') }}</span>
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-4">{{ $featuredProject->name }}</h2>
                    <p class="text-gray-600 mb-6">{{ Str::limit($featuredProject->description, 200) }}</p>
                    
                    <!-- Progress Bar -->
                    @if($featuredProject->goal_amount > 0)
                        <div class="mb-6">
                            @php
                                $progress = min(100, ($featuredProject->current_amount / $featuredProject->goal_amount) * 100);
                            @endphp
                            <div class="flex justify-between text-sm mb-2">
                                <span class="font-semibold text-primary-600">${{ number_format($featuredProject->current_amount) }} {{ __('raised') }}</span>
                                <span class="text-gray-500">{{ __('Goal') }}: ${{ number_format($featuredProject->goal_amount) }}</span>
                            </div>
                            <div class="h-3 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full progress-bar rounded-full transition-all duration-1000" style="width: {{ $progress }}%"></div>
                            </div>
                            <p class="text-sm text-gray-500 mt-2">{{ number_format($progress, 0) }}% {{ __('of goal reached') }}</p>
                        </div>
                    @endif
                    
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('donate') }}" class="btn-accent text-white px-8 py-3 rounded-full font-semibold inline-flex items-center">
                            <i class="fas fa-heart mr-2"></i>{{ __('Support This Project') }}
                        </a>
                        <a href="{{ route('projects.show', $featuredProject->slug ?? $featuredProject->id) }}" class="bg-white border-2 border-primary-600 text-primary-600 px-8 py-3 rounded-full font-semibold hover:bg-primary-50 transition inline-flex items-center">
                            {{ __('Learn More') }} <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- All Projects -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Our Work') }}</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2">{{ __('All Projects') }}</h2>
        </div>
        
        @if($projects->isEmpty())
            <div class="text-center py-16 bg-white rounded-2xl">
                <i class="fas fa-project-diagram text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">{{ __('No projects available yet. Check back soon!') }}</p>
            </div>
        @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative h-48 overflow-hidden">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="w-full h-full object-cover transition duration-500 hover:scale-110">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-primary-300 to-primary-500 flex items-center justify-center">
                                    <i class="fas fa-project-diagram text-white text-4xl"></i>
                                </div>
                            @endif
                            @if($project->is_featured)
                                <div class="absolute top-4 right-4 bg-accent-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ __('Featured') }}
                                </div>
                            @endif
                            @if($project->status)
                                <div class="absolute bottom-4 left-4 {{ $project->status == 'active' ? 'bg-green-500' : ($project->status == 'completed' ? 'bg-gray-500' : 'bg-yellow-500') }} text-white px-3 py-1 rounded-full text-xs font-semibold capitalize">
                                    {{ __($project->status) }}
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $project->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($project->description, 100) }}</p>
                            
                            <!-- Progress Bar -->
                            @if($project->goal_amount > 0)
                                @php
                                    $progress = min(100, ($project->current_amount / $project->goal_amount) * 100);
                                @endphp
                                <div class="mb-4">
                                    <div class="flex justify-between text-xs mb-1">
                                        <span class="font-semibold text-primary-600">${{ number_format($project->current_amount) }}</span>
                                        <span class="text-gray-500">${{ number_format($project->goal_amount) }}</span>
                                    </div>
                                    <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-full progress-bar rounded-full" style="width: {{ $progress }}%"></div>
                                    </div>
                                </div>
                            @endif
                            
                            <div class="flex items-center justify-between pt-4 border-t">
                                @if($project->start_date)
                                    <span class="text-gray-500 text-sm"><i class="far fa-calendar mr-1"></i>{{ $project->start_date->format('M Y') }}</span>
                                @endif
                                <a href="{{ route('projects.show', $project->slug ?? $project->id) }}" class="text-primary-600 font-semibold text-sm hover:text-primary-700 transition inline-flex items-center">
                                    {{ __('Details') }} <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<!-- Impact Section -->
<section class="py-16 bg-gradient-to-r from-primary-600 to-primary-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-4" data-aos="fade-up">{{ __('Our Project Impact') }}</h2>
            <p class="text-white/80 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">{{ __('Through our projects, we have reached thousands of lives across Rwanda') }}</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
            <div data-aos="zoom-in">
                <p class="text-4xl md:text-5xl font-bold mb-2">{{ $projects->count() }}+</p>
                <p class="text-white/80">{{ __('Active Projects') }}</p>
            </div>
            <div data-aos="zoom-in" data-aos-delay="100">
                <p class="text-4xl md:text-5xl font-bold mb-2">500+</p>
                <p class="text-white/80">{{ __('Direct Beneficiaries') }}</p>
            </div>
            <div data-aos="zoom-in" data-aos-delay="200">
                <p class="text-4xl md:text-5xl font-bold mb-2">10+</p>
                <p class="text-white/80">{{ __('Communities Served') }}</p>
            </div>
            <div data-aos="zoom-in" data-aos-delay="300">
                <p class="text-4xl md:text-5xl font-bold mb-2">50+</p>
                <p class="text-white/80">{{ __('Partners') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gray-50 rounded-3xl p-8 md:p-12" data-aos="fade-up">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">{{ __('Want to Support a Project?') }}</h2>
                    <p class="text-gray-600 mb-6">{{ __('Your contribution, no matter how small, can make a significant difference in the lives of those we serve.') }}</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('donate') }}" class="btn-accent text-white px-8 py-3 rounded-full font-semibold inline-flex items-center">
                            <i class="fas fa-heart mr-2"></i>{{ __('Donate Now') }}
                        </a>
                        <a href="{{ route('sponsor') }}" class="btn-primary text-white px-8 py-3 rounded-full font-semibold inline-flex items-center">
                            <i class="fas fa-hands-helping mr-2"></i>{{ __('Become a Sponsor') }}
                        </a>
                    </div>
                </div>
                <div class="hidden md:flex justify-center">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-primary-100 rounded-xl p-6 text-center">
                            <i class="fas fa-donate text-primary-600 text-3xl mb-2"></i>
                            <p class="text-gray-800 font-semibold">{{ __('One-time Gift') }}</p>
                        </div>
                        <div class="bg-accent-100 rounded-xl p-6 text-center">
                            <i class="fas fa-sync text-accent-600 text-3xl mb-2"></i>
                            <p class="text-gray-800 font-semibold">{{ __('Monthly Support') }}</p>
                        </div>
                        <div class="bg-accent-100 rounded-xl p-6 text-center">
                            <i class="fas fa-building text-accent-600 text-3xl mb-2"></i>
                            <p class="text-gray-800 font-semibold">{{ __('Corporate') }}</p>
                        </div>
                        <div class="bg-primary-100 rounded-xl p-6 text-center">
                            <i class="fas fa-gift text-primary-600 text-3xl mb-2"></i>
                            <p class="text-gray-800 font-semibold">{{ __('In-Kind') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
