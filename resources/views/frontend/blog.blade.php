@extends('frontend.layouts.app')

@section('title', __('Our Blog'))

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-primary-700 to-primary-900">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up">{{ __('Our Blog') }}</h1>
            <p class="text-xl text-white/90 mb-6" data-aos="fade-up" data-aos-delay="100">{{ __('News, updates, and insights from our work') }}</p>
            <nav class="flex justify-center" data-aos="fade-up" data-aos-delay="200">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-white/80 hover:text-white">{{ __('Home') }}</a></li>
                    <li><span class="text-white/60">/</span></li>
                    <li class="text-accent-400">{{ __('Blog') }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Blog Posts -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($posts->isEmpty())
            <div class="text-center py-16">
                <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">{{ __('No blog posts available yet. Check back soon!') }}</p>
            </div>
        @else
            <!-- Featured Post -->
            @if($featuredPost = $posts->first())
                <div class="mb-16" data-aos="fade-up">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="grid lg:grid-cols-2">
                        <div class="h-64 lg:h-auto overflow-hidden">
                                @if($featuredPost->image)
                                    <img src="{{ Storage::url($featuredPost->image) }}" alt="{{ $featuredPost->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-white text-6xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="p-8 lg:p-12 flex flex-col justify-center">
                                <div class="flex items-center gap-4 mb-4">
                                    <span class="bg-accent-100 text-accent-700 px-3 py-1 rounded-full text-xs font-semibold">{{ __('Featured') }}</span>
                                    @if($featuredPost->category)
                                        <span class="bg-primary-100 text-primary-700 px-3 py-1 rounded-full text-xs font-semibold">{{ $featuredPost->category->name }}</span>
                                    @endif
                                </div>
                                <h2 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-4">{{ $featuredPost->title }}</h2>
                                <p class="text-gray-600 mb-6">{{ Str::limit($featuredPost->excerpt ?? strip_tags($featuredPost->content), 200) }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3 text-sm text-gray-500">
                                        <span><i class="far fa-calendar mr-1"></i>{{ $featuredPost->published_at ? $featuredPost->published_at->format('M d, Y') : $featuredPost->created_at->format('M d, Y') }}</span>
                                        @if($featuredPost->author)
                                            <span><i class="far fa-user mr-1"></i>{{ $featuredPost->author->name ?? 'Admin' }}</span>
                                        @endif
                                    </div>
                                    <a href="{{ route('blog.show', $featuredPost->slug) }}" class="btn-primary text-white px-6 py-2 rounded-full font-semibold text-sm inline-flex items-center">
                                        {{ __('Read More') }} <i class="fas fa-arrow-right ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Blog Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts->skip(1) as $post)
                    <article class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="h-48 overflow-hidden">
                            @if($post->image)
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition duration-500 hover:scale-110">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-primary-300 to-primary-500 flex items-center justify-center">
                                    <i class="fas fa-newspaper text-white text-4xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-3">
                                @if($post->category)
                                    <span class="bg-primary-100 text-primary-700 px-3 py-1 rounded-full text-xs font-semibold">{{ $post->category->name }}</span>
                                @endif
                                <span class="text-gray-400 text-xs">{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">
                                <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-primary-600 transition">{{ $post->title }}</a>
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($post->excerpt ?? strip_tags($post->content), 120) }}</p>
                            <div class="flex items-center justify-between pt-4 border-t">
                                @if($post->author)
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-primary-100 flex items-center justify-center">
                                            <span class="text-primary-600 text-sm font-bold">{{ substr($post->author->name ?? 'A', 0, 1) }}</span>
                                        </div>
                                        <span class="text-gray-600 text-sm">{{ $post->author->name ?? 'Admin' }}</span>
                                    </div>
                                @endif
                                <a href="{{ route('blog.show', $post->slug) }}" class="text-primary-600 font-semibold text-sm hover:text-primary-700 transition">
                                    {{ __('Read More') }} <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($posts->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $posts->links() }}
                </div>
            @endif
        @endif
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-3xl p-8 md:p-12 text-center" data-aos="fade-up">
            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-envelope text-white text-2xl"></i>
            </div>
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">{{ __('Stay Updated') }}</h2>
            <p class="text-white/90 mb-8">{{ __('Subscribe to our newsletter for the latest news, stories, and updates from Twese Hamwe.') }}</p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" placeholder="{{ __('Enter your email') }}" class="flex-1 px-6 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-accent-400">
                <button type="submit" class="btn-accent text-white px-8 py-3 rounded-full font-semibold whitespace-nowrap">
                    {{ __('Subscribe') }}
                </button>
            </form>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4" data-aos="fade-up">{{ __('Want to Share Your Story?') }}</h2>
        <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            {{ __('If you have been impacted by our programs or want to contribute content to our blog, we would love to hear from you.') }}
        </p>
        <a href="{{ route('contact') }}" class="btn-primary text-white px-8 py-3 rounded-full font-semibold inline-flex items-center" data-aos="fade-up" data-aos-delay="200">
            <i class="fas fa-paper-plane mr-2"></i>{{ __('Contact Us') }}
        </a>
    </div>
</section>
@endsection

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush
