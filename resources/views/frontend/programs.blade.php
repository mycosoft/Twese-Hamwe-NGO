@extends('frontend.layouts.app')

@section('title', __('What We Do'))

@section('content')
    <!-- Page Header -->
    <section class="relative py-24 bg-gradient-to-br from-primary-700 to-primary-900 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/2 translate-y-1/2"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up">{{ __('What We Do') }}</h1>
                <p class="text-xl text-gray-200 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                    {{ __('Comprehensive programs designed to empower women and youth with skills, support, and opportunities.') }}
                </p>
                <div class="flex items-center justify-center mt-6 text-sm" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition">{{ __('Home') }}</a>
                    <i class="fas fa-chevron-right mx-3 text-gray-400 text-xs"></i>
                    <span class="text-accent-400">{{ __('What We Do') }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Overview -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Our Programs') }}</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-4">
                    {{ __('Empowering Communities Through Action') }}
                </h2>
                <p class="text-gray-600">
                    {{ __('We offer comprehensive programs designed to empower women and youth with skills, support, and opportunities for sustainable livelihoods.') }}
                </p>
            </div>

            <!-- Programs Grid -->
            <div class="space-y-20">
                @foreach($programs as $index => $program)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center {{ $index % 2 == 1 ? 'lg:flex-row-reverse' : '' }}" data-aos="fade-up">
                    <div class="{{ $index % 2 == 1 ? 'lg:order-2' : '' }}">
                        <div class="relative">
                            <div class="h-80 bg-gradient-to-br from-primary-500 to-primary-700 rounded-2xl flex items-center justify-center shadow-xl">
                                @if($program->image)
                                    <img src="{{ Storage::url($program->image) }}" alt="{{ $program->title }}" class="w-full h-full object-cover rounded-2xl">
                                @else
                                    @if($index == 0)
                                        <i class="fas fa-child text-8xl text-white opacity-80"></i>
                                    @elseif($index == 1)
                                        <i class="fas fa-cut text-8xl text-white opacity-80"></i>
                                    @elseif($index == 2)
                                        <i class="fas fa-industry text-8xl text-white opacity-80"></i>
                                    @else
                                        <i class="fas fa-female text-8xl text-white opacity-80"></i>
                                    @endif
                                @endif
                            </div>
                            <div class="absolute -bottom-4 -right-4 bg-accent-500 text-white px-6 py-3 rounded-lg shadow-lg">
                                <span class="font-semibold">{{ __('Program') }} {{ $index + 1 }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="{{ $index % 2 == 1 ? 'lg:order-1' : '' }}">
                        <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Program') }}</span>
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mt-2 mb-4">{{ $program->title }}</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">{{ $program->short_description }}</p>
                        
                        @if($program->description)
                        <div class="prose prose-sm text-gray-600 mb-6">
                            {!! nl2br(e(Str::limit(strip_tags($program->description), 300))) !!}
                        </div>
                        @endif

                        <div class="flex flex-wrap gap-3 mb-6">
                            <span class="bg-primary-100 text-primary-700 px-4 py-2 rounded-full text-sm font-medium">
                                <i class="fas fa-check-circle mr-2"></i>{{ __('Active Program') }}
                            </span>
                            <span class="bg-accent-100 text-accent-700 px-4 py-2 rounded-full text-sm font-medium">
                                <i class="fas fa-users mr-2"></i>{{ __('Community Focused') }}
                            </span>
                        </div>

                        <a href="#contact" class="btn-primary text-white px-6 py-3 rounded-full font-semibold inline-flex items-center">
                            {{ __('Get Involved') }} <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Impact Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ __('Our Impact') }}</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">{{ __('Together, we are making a real difference in our community.') }}</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg" data-aos="zoom-in" data-aos-delay="0">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-female text-2xl text-primary-600"></i>
                    </div>
                    <p class="text-3xl font-bold text-gray-800 mb-1">100+</p>
                    <p class="text-gray-500 text-sm">{{ __('Women Trained') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg" data-aos="zoom-in" data-aos-delay="100">
                    <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-child text-2xl text-accent-600"></i>
                    </div>
                    <p class="text-3xl font-bold text-gray-800 mb-1">50+</p>
                    <p class="text-gray-500 text-sm">{{ __('Children Supported') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg" data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-project-diagram text-2xl text-primary-600"></i>
                    </div>
                    <p class="text-3xl font-bold text-gray-800 mb-1">4</p>
                    <p class="text-gray-500 text-sm">{{ __('Active Programs') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg" data-aos="zoom-in" data-aos-delay="300">
                    <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heart text-2xl text-accent-600"></i>
                    </div>
                    <p class="text-3xl font-bold text-gray-800 mb-1">$10K</p>
                    <p class="text-gray-500 text-sm">{{ __('Fundraising Goal') }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
