@extends('frontend.layouts.app')

@section('title', $project->name)

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-primary-700 to-primary-900">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white">
            @if($project->is_featured)
                <span class="bg-accent-500 text-white px-4 py-1 rounded-full text-sm font-semibold mb-4 inline-block" data-aos="fade-up">{{ __('Featured Project') }}</span>
            @endif
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="100">{{ $project->name }}</h1>
            @if($project->status)
                <span class="inline-block {{ $project->status == 'active' ? 'bg-green-500' : ($project->status == 'completed' ? 'bg-gray-500' : 'bg-yellow-500') }} text-white px-4 py-1 rounded-full text-sm font-semibold capitalize" data-aos="fade-up" data-aos-delay="150">
                    {{ __($project->status) }}
                </span>
            @endif
            <nav class="flex justify-center mt-6" data-aos="fade-up" data-aos-delay="200">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-white/80 hover:text-white">{{ __('Home') }}</a></li>
                    <li><span class="text-white/60">/</span></li>
                    <li><a href="{{ route('projects') }}" class="text-white/80 hover:text-white">{{ __('Projects') }}</a></li>
                    <li><span class="text-white/60">/</span></li>
                    <li class="text-accent-400">{{ Str::limit($project->name, 30) }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Project Content -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Project Image -->
                @if($project->image)
                    <div class="mb-8 -mt-24 relative z-10" data-aos="fade-up">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="w-full rounded-2xl shadow-2xl">
                    </div>
                @endif

                <!-- Description -->
                <div class="prose prose-lg max-w-none" data-aos="fade-up">
                    <h2>{{ __('About This Project') }}</h2>
                    {!! nl2br(e($project->description)) !!}
                </div>

                <!-- Goals Section -->
                @if($project->goals)
                    <div class="mt-10 bg-gray-50 rounded-2xl p-8" data-aos="fade-up">
                        <h3 class="text-xl font-bold text-gray-800 mb-4"><i class="fas fa-bullseye text-primary-600 mr-2"></i>{{ __('Project Goals') }}</h3>
                        <div class="prose max-w-none text-gray-600">
                            {!! nl2br(e($project->goals)) !!}
                        </div>
                    </div>
                @endif

                <!-- Impact Section -->
                @if($project->impact)
                    <div class="mt-8 bg-primary-50 rounded-2xl p-8" data-aos="fade-up">
                        <h3 class="text-xl font-bold text-gray-800 mb-4"><i class="fas fa-chart-line text-primary-600 mr-2"></i>{{ __('Impact & Results') }}</h3>
                        <div class="prose max-w-none text-gray-600">
                            {!! nl2br(e($project->impact)) !!}
                        </div>
                    </div>
                @endif

                <!-- Share -->
                <div class="mt-10 pt-8 border-t" data-aos="fade-up">
                    <h4 class="text-sm font-semibold text-gray-500 uppercase mb-4">{{ __('Share this project') }}</h4>
                    <div class="flex gap-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($project->name) }}" target="_blank" class="w-10 h-10 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($project->name . ' ' . request()->url()) }}" target="_blank" class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    <!-- Progress Card -->
                    @if($project->goal_amount > 0)
                        <div class="bg-white border-2 border-primary-100 rounded-2xl p-6" data-aos="fade-left">
                            <h3 class="font-bold text-gray-800 text-lg mb-4">{{ __('Fundraising Progress') }}</h3>
                            
                            @php
                                $progress = min(100, ($project->current_amount / $project->goal_amount) * 100);
                            @endphp
                            
                            <div class="text-center mb-6">
                                <p class="text-4xl font-bold text-primary-600">${{ number_format($project->current_amount) }}</p>
                                <p class="text-gray-500">{{ __('raised of') }} ${{ number_format($project->goal_amount) }} {{ __('goal') }}</p>
                            </div>
                            
                            <div class="h-4 bg-gray-200 rounded-full overflow-hidden mb-4">
                                <div class="h-full progress-bar rounded-full transition-all duration-1000" style="width: {{ $progress }}%"></div>
                            </div>
                            
                            <p class="text-center text-lg font-semibold text-gray-800 mb-6">{{ number_format($progress, 0) }}% {{ __('Complete') }}</p>
                            
                            <a href="{{ route('donate') }}" class="btn-accent text-white px-8 py-3 rounded-full font-semibold w-full text-center block">
                                <i class="fas fa-heart mr-2"></i>{{ __('Donate to This Project') }}
                            </a>
                        </div>
                    @else
                        <div class="bg-white border-2 border-primary-100 rounded-2xl p-6" data-aos="fade-left">
                            <h3 class="font-bold text-gray-800 text-lg mb-4">{{ __('Support This Project') }}</h3>
                            <p class="text-gray-600 mb-6">{{ __('Your donation helps us continue this important work in our community.') }}</p>
                            <a href="{{ route('donate') }}" class="btn-accent text-white px-8 py-3 rounded-full font-semibold w-full text-center block">
                                <i class="fas fa-heart mr-2"></i>{{ __('Donate Now') }}
                            </a>
                        </div>
                    @endif

                    <!-- Project Details Card -->
                    <div class="bg-gray-50 rounded-2xl p-6" data-aos="fade-left" data-aos-delay="100">
                        <h3 class="font-bold text-gray-800 text-lg mb-6">{{ __('Project Details') }}</h3>
                        
                        <div class="space-y-4">
                            @if($project->start_date)
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-calendar-alt text-primary-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 text-sm">{{ __('Start Date') }}</p>
                                        <p class="font-semibold text-gray-800">{{ $project->start_date->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            @if($project->end_date)
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 bg-accent-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-flag-checkered text-accent-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 text-sm">{{ __('End Date') }}</p>
                                        <p class="font-semibold text-gray-800">{{ $project->end_date->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            @if($project->location)
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-map-marker-alt text-primary-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 text-sm">{{ __('Location') }}</p>
                                        <p class="font-semibold text-gray-800">{{ $project->location }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            @if($project->beneficiaries)
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 bg-accent-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-users text-accent-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 text-sm">{{ __('Beneficiaries') }}</p>
                                        <p class="font-semibold text-gray-800">{{ $project->beneficiaries }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Contact Card -->
                    <div class="bg-primary-600 text-white rounded-2xl p-6" data-aos="fade-left" data-aos-delay="200">
                        <h3 class="font-bold text-lg mb-4">{{ __('Want to Learn More?') }}</h3>
                        <p class="text-white/90 text-sm mb-6">{{ __('Contact us for more information about this project or how you can get involved.') }}</p>
                        <a href="{{ route('contact') }}" class="bg-white text-primary-700 px-6 py-3 rounded-full font-semibold text-center block hover:bg-gray-100 transition">
                            <i class="fas fa-envelope mr-2"></i>{{ __('Contact Us') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
@if($relatedProjects->isNotEmpty())
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800">{{ __('Other Projects') }}</h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($relatedProjects as $related)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="h-48 overflow-hidden">
                        @if($related->image)
                            <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}" class="w-full h-full object-cover transition duration-500 hover:scale-110">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary-300 to-primary-500 flex items-center justify-center">
                                <i class="fas fa-project-diagram text-white text-4xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-3">
                            <a href="{{ route('projects.show', $related->slug ?? $related->id) }}" class="hover:text-primary-600 transition">{{ $related->name }}</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($related->description, 80) }}</p>
                        <a href="{{ route('projects.show', $related->slug ?? $related->id) }}" class="text-primary-600 font-semibold text-sm hover:text-primary-700 transition inline-flex items-center">
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
    .prose h3 { @apply text-xl font-bold text-gray-800 mt-6 mb-3; }
    .prose p { @apply text-gray-600 leading-relaxed mb-4; }
    .prose ul { @apply list-disc list-inside mb-4 text-gray-600; }
    .prose ol { @apply list-decimal list-inside mb-4 text-gray-600; }
</style>
@endpush
