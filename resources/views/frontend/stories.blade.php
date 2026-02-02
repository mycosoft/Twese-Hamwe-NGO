@extends('frontend.layouts.app')

@section('title', __('Stories of Impact'))

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-primary-700 to-primary-900">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up">{{ __('Stories of Impact') }}</h1>
            <p class="text-xl text-white/90 mb-6" data-aos="fade-up" data-aos-delay="100">{{ __('Real stories of transformation and hope') }}</p>
            <nav class="flex justify-center" data-aos="fade-up" data-aos-delay="200">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-white/80 hover:text-white">{{ __('Home') }}</a></li>
                    <li><span class="text-white/60">/</span></li>
                    <li class="text-accent-400">{{ __('Stories of Impact') }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Featured Story -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="relative" data-aos="fade-right">
                <img src="{{ asset('TWESE HAMWE/logo.jpeg') }}" alt="Featured Story" class="rounded-2xl shadow-2xl w-full">
                <div class="absolute -bottom-4 -right-4 bg-accent-500 text-white px-6 py-3 rounded-xl shadow-lg">
                    <i class="fas fa-star mr-2"></i>{{ __('Featured Story') }}
                </div>
            </div>
            <div data-aos="fade-left">
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Success Story') }}</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-6">{{ __('From Struggle to Success') }}</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    "{{ __('Before joining Twese Hamwe, I struggled to provide for my three children. Through their vocational training program, I learned tailoring skills that changed my life completely.') }}"
                </p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    "{{ __('Today, I run my own small tailoring business and can afford to send all my children to school. I am no longer dependent on anyone - I am empowered.') }}"
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-full overflow-hidden">
                        <img src="{{ asset('TWESE HAMWE/logo.jpeg') }}" alt="Marie" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">Marie Uwimana</p>
                        <p class="text-gray-500 text-sm">{{ __('Tailoring Program Graduate, 2022') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Impact Statistics -->
<section class="py-12 bg-primary-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
            <div data-aos="zoom-in">
                <p class="text-4xl font-bold mb-1">500+</p>
                <p class="text-white/80 text-sm">{{ __('Lives Transformed') }}</p>
            </div>
            <div data-aos="zoom-in" data-aos-delay="100">
                <p class="text-4xl font-bold mb-1">200+</p>
                <p class="text-white/80 text-sm">{{ __('Children Educated') }}</p>
            </div>
            <div data-aos="zoom-in" data-aos-delay="200">
                <p class="text-4xl font-bold mb-1">150+</p>
                <p class="text-white/80 text-sm">{{ __('Businesses Started') }}</p>
            </div>
            <div data-aos="zoom-in" data-aos-delay="300">
                <p class="text-4xl font-bold mb-1">95%</p>
                <p class="text-white/80 text-sm">{{ __('Success Rate') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Stories Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Testimonials') }}</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2">{{ __('More Success Stories') }}</h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Story 1 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('TWESE HAMWE/logo.jpeg') }}" alt="Story" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <span class="bg-primary-100 text-primary-700 px-3 py-1 rounded-full text-xs font-semibold">{{ __('Child Education') }}</span>
                    <h4 class="font-bold text-gray-800 mt-4 mb-2">{{ __('Jean\'s Journey to School') }}</h4>
                    <p class="text-gray-600 text-sm mb-4">
                        "{{ __('Thanks to the Espace Amis program, I now go to school every day. I want to become a doctor and help people in my community.') }}"
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary-100 flex items-center justify-center">
                            <i class="fas fa-child text-primary-600"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Jean Pierre</p>
                            <p class="text-gray-500 text-xs">{{ __('Age 12, Espace Amis') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Story 2 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="100">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('TWESE HAMWE/logo.jpeg') }}" alt="Story" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <span class="bg-accent-100 text-accent-700 px-3 py-1 rounded-full text-xs font-semibold">{{ __('Women Empowerment') }}</span>
                    <h4 class="font-bold text-gray-800 mt-4 mb-2">{{ __('From Unemployed to Entrepreneur') }}</h4>
                    <p class="text-gray-600 text-sm mb-4">
                        "{{ __('The basket weaving training gave me more than a skill - it gave me hope. Now I earn enough to support my family with dignity.') }}"
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-accent-100 flex items-center justify-center">
                            <i class="fas fa-female text-accent-600"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Claudine Mukamana</p>
                            <p class="text-gray-500 text-xs">{{ __('Weaving Program, 2021') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Story 3 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="200">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('TWESE HAMWE/logo.jpeg') }}" alt="Story" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <span class="bg-primary-100 text-primary-700 px-3 py-1 rounded-full text-xs font-semibold">{{ __('Youth Training') }}</span>
                    <h4 class="font-bold text-gray-800 mt-4 mb-2">{{ __('Building a Career in Mechanics') }}</h4>
                    <p class="text-gray-600 text-sm mb-4">
                        "{{ __('I dropped out of school and had no prospects. Twese Hamwe\'s mechanics training program gave me a second chance at life.') }}"
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary-100 flex items-center justify-center">
                            <i class="fas fa-user text-primary-600"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Emmanuel Habimana</p>
                            <p class="text-gray-500 text-xs">{{ __('Mechanics Graduate, 2023') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Story 4 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('TWESE HAMWE/logo.jpeg') }}" alt="Story" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <span class="bg-accent-100 text-accent-700 px-3 py-1 rounded-full text-xs font-semibold">{{ __('Community Impact') }}</span>
                    <h4 class="font-bold text-gray-800 mt-4 mb-2">{{ __('A Village Transformed') }}</h4>
                    <p class="text-gray-600 text-sm mb-4">
                        "{{ __('Our entire village has benefited from the community center. Women learn, children play safely, and hope has returned to our community.') }}"
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-accent-100 flex items-center justify-center">
                            <i class="fas fa-home text-accent-600"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">{{ __('Nyamirambo Community') }}</p>
                            <p class="text-gray-500 text-xs">{{ __('Since 2019') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Story 5 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="100">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('TWESE HAMWE/logo.jpeg') }}" alt="Story" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <span class="bg-primary-100 text-primary-700 px-3 py-1 rounded-full text-xs font-semibold">{{ __('Health & Nutrition') }}</span>
                    <h4 class="font-bold text-gray-800 mt-4 mb-2">{{ __('Healthy Children, Happy Families') }}</h4>
                    <p class="text-gray-600 text-sm mb-4">
                        "{{ __('The nutrition program saved my daughter\'s life. She was malnourished, but now she is healthy and thriving in school.') }}"
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary-100 flex items-center justify-center">
                            <i class="fas fa-heartbeat text-primary-600"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Dancille Ingabire</p>
                            <p class="text-gray-500 text-xs">{{ __('Nutrition Program, 2022') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Story 6 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="200">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('TWESE HAMWE/logo.jpeg') }}" alt="Story" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <span class="bg-accent-100 text-accent-700 px-3 py-1 rounded-full text-xs font-semibold">{{ __('Financial Literacy') }}</span>
                    <h4 class="font-bold text-gray-800 mt-4 mb-2">{{ __('Saving for the Future') }}</h4>
                    <p class="text-gray-600 text-sm mb-4">
                        "{{ __('I never knew how to save money. The financial literacy training taught me to plan and now I have savings for emergencies.') }}"
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-accent-100 flex items-center justify-center">
                            <i class="fas fa-coins text-accent-600"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Vestine Nyiraneza</p>
                            <p class="text-gray-500 text-xs">{{ __('Savings Group Member') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Testimonial Section -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Watch') }}</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2">{{ __('Hear Their Stories') }}</h2>
        </div>
        
        <div class="relative rounded-2xl overflow-hidden shadow-2xl" data-aos="zoom-in">
            <div class="aspect-video bg-gray-200 flex items-center justify-center">
                <div class="text-center">
                    <div class="w-20 h-20 bg-primary-600 rounded-full flex items-center justify-center mx-auto mb-4 cursor-pointer hover:bg-primary-700 transition">
                        <i class="fas fa-play text-white text-2xl ml-1"></i>
                    </div>
                    <p class="text-gray-600">{{ __('Video testimonials coming soon') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
