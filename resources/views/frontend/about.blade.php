@extends('frontend.layouts.app')

@section('title', __('Who We Are'))

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-primary-700 to-primary-900">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up">{{ __('Who We Are') }}</h1>
            <p class="text-xl text-white/90 mb-6" data-aos="fade-up" data-aos-delay="100">{{ __('Our story, mission, and values') }}</p>
            <nav class="flex justify-center" data-aos="fade-up" data-aos-delay="200">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-white/80 hover:text-white">{{ __('Home') }}</a></li>
                    <li><span class="text-white/60">/</span></li>
                    <li class="text-accent-400">{{ __('Who We Are') }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('About Us') }}</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-6">{{ __('Together We Rise') }}</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    {{ __('Twese Hamwe, meaning "Together" in Kinyarwanda, is a community-based organization dedicated to empowering women and youth in Rwanda through skills training, community development, and sustainable income opportunities.') }}
                </p>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    {{ __('Founded with a vision of creating self-sustaining communities, we work tirelessly to provide vulnerable populations with the tools and skills they need to build better futures for themselves and their families.') }}
                </p>
                <p class="text-gray-600 leading-relaxed">
                    {{ __('Our programs focus on vocational training, child development through our Espace Amis centers, women empowerment initiatives, and community production centers that create income-generating opportunities.') }}
                </p>
            </div>
            <div class="relative" data-aos="fade-left">
                <img src="{{ asset('TWESE HAMWE/logo.jpeg') }}" alt="Twese Hamwe" class="rounded-2xl shadow-2xl w-full">
                <div class="absolute -bottom-6 -left-6 bg-accent-500 text-white p-6 rounded-xl shadow-lg">
                    <p class="text-4xl font-bold">10+</p>
                    <p class="text-sm">{{ __('Years of Impact') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission, Vision, Values -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Our Foundation') }}</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2">{{ __('Mission, Vision & Values') }}</h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Mission -->
            <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-bullseye text-primary-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">{{ __('Our Mission') }}</h3>
                <p class="text-gray-600 leading-relaxed">
                    {{ __('To empower vulnerable women and youth through comprehensive skills training, education, and sustainable economic opportunities, enabling them to become self-sufficient members of their communities.') }}
                </p>
            </div>
            
            <!-- Vision -->
            <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-eye text-accent-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">{{ __('Our Vision') }}</h3>
                <p class="text-gray-600 leading-relaxed">
                    {{ __('A Rwanda where every woman and young person has access to the skills, resources, and opportunities needed to live with dignity, contribute to their communities, and build prosperous futures.') }}
                </p>
            </div>
            
            <!-- Values -->
            <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-heart text-primary-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">{{ __('Our Values') }}</h3>
                <ul class="text-gray-600 space-y-2">
                    <li class="flex items-center"><i class="fas fa-check text-primary-500 mr-2"></i>{{ __('Community First') }}</li>
                    <li class="flex items-center"><i class="fas fa-check text-primary-500 mr-2"></i>{{ __('Integrity & Transparency') }}</li>
                    <li class="flex items-center"><i class="fas fa-check text-primary-500 mr-2"></i>{{ __('Empowerment') }}</li>
                    <li class="flex items-center"><i class="fas fa-check text-primary-500 mr-2"></i>{{ __('Sustainability') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Our History Timeline -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Our Journey') }}</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2">{{ __('Timeline of Growth') }}</h2>
        </div>
        
        <div class="relative">
            <!-- Timeline line -->
            <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-1 bg-primary-200 h-full"></div>
            
            <!-- Timeline items -->
            <div class="space-y-12">
                <!-- Item 1 -->
                <div class="flex flex-col md:flex-row items-center" data-aos="fade-up">
                    <div class="md:w-1/2 md:pr-8 md:text-right mb-4 md:mb-0">
                        <div class="bg-gray-50 p-6 rounded-xl inline-block">
                            <span class="text-primary-600 font-bold text-lg">2014</span>
                            <h4 class="font-bold text-gray-800 mt-1">{{ __('Foundation') }}</h4>
                            <p class="text-gray-600 text-sm mt-2">{{ __('Twese Hamwe was established with a small group of dedicated volunteers committed to community development.') }}</p>
                        </div>
                    </div>
                    <div class="hidden md:flex w-8 h-8 bg-primary-600 rounded-full items-center justify-center z-10">
                        <i class="fas fa-flag text-white text-sm"></i>
                    </div>
                    <div class="md:w-1/2 md:pl-8"></div>
                </div>
                
                <!-- Item 2 -->
                <div class="flex flex-col md:flex-row items-center" data-aos="fade-up">
                    <div class="md:w-1/2 md:pr-8"></div>
                    <div class="hidden md:flex w-8 h-8 bg-accent-500 rounded-full items-center justify-center z-10">
                        <i class="fas fa-child text-white text-sm"></i>
                    </div>
                    <div class="md:w-1/2 md:pl-8 mb-4 md:mb-0">
                        <div class="bg-gray-50 p-6 rounded-xl inline-block">
                            <span class="text-accent-600 font-bold text-lg">2016</span>
                            <h4 class="font-bold text-gray-800 mt-1">{{ __('Espace Amis Launch') }}</h4>
                            <p class="text-gray-600 text-sm mt-2">{{ __('Launched our first Espace Amis center for children, providing safe spaces for learning and development.') }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Item 3 -->
                <div class="flex flex-col md:flex-row items-center" data-aos="fade-up">
                    <div class="md:w-1/2 md:pr-8 md:text-right mb-4 md:mb-0">
                        <div class="bg-gray-50 p-6 rounded-xl inline-block">
                            <span class="text-primary-600 font-bold text-lg">2019</span>
                            <h4 class="font-bold text-gray-800 mt-1">{{ __('Vocational Training') }}</h4>
                            <p class="text-gray-600 text-sm mt-2">{{ __('Expanded programs to include vocational skills training for women and youth.') }}</p>
                        </div>
                    </div>
                    <div class="hidden md:flex w-8 h-8 bg-primary-600 rounded-full items-center justify-center z-10">
                        <i class="fas fa-tools text-white text-sm"></i>
                    </div>
                    <div class="md:w-1/2 md:pl-8"></div>
                </div>
                
                <!-- Item 4 -->
                <div class="flex flex-col md:flex-row items-center" data-aos="fade-up">
                    <div class="md:w-1/2 md:pr-8"></div>
                    <div class="hidden md:flex w-8 h-8 bg-accent-500 rounded-full items-center justify-center z-10">
                        <i class="fas fa-star text-white text-sm"></i>
                    </div>
                    <div class="md:w-1/2 md:pl-8 mb-4 md:mb-0">
                        <div class="bg-gray-50 p-6 rounded-xl inline-block">
                            <span class="text-accent-600 font-bold text-lg">{{ __('Today') }}</span>
                            <h4 class="font-bold text-gray-800 mt-1">{{ __('Growing Impact') }}</h4>
                            <p class="text-gray-600 text-sm mt-2">{{ __('Continuing to expand our reach and impact across multiple communities in Rwanda.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Impact Numbers -->
<section class="py-16 bg-gradient-to-r from-primary-600 to-primary-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
            <div data-aos="zoom-in">
                <p class="text-4xl md:text-5xl font-bold mb-2">500+</p>
                <p class="text-white/80">{{ __('Women Trained') }}</p>
            </div>
            <div data-aos="zoom-in" data-aos-delay="100">
                <p class="text-4xl md:text-5xl font-bold mb-2">200+</p>
                <p class="text-white/80">{{ __('Children Supported') }}</p>
            </div>
            <div data-aos="zoom-in" data-aos-delay="200">
                <p class="text-4xl md:text-5xl font-bold mb-2">10+</p>
                <p class="text-white/80">{{ __('Communities Reached') }}</p>
            </div>
            <div data-aos="zoom-in" data-aos-delay="300">
                <p class="text-4xl md:text-5xl font-bold mb-2">50+</p>
                <p class="text-white/80">{{ __('Partners') }}</p>
            </div>
        </div>
    </div>
</section>
@endsection
