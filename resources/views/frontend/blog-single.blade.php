@extends('frontend.layouts.app')

@section('title', $post->title)

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-primary-700 to-primary-900">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white">
            @if($post->category)
                <span class="bg-accent-500 text-white px-4 py-1 rounded-full text-sm font-semibold mb-4 inline-block" data-aos="fade-up">{{ $post->category->name }}</span>
            @endif
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="100">{{ $post->title }}</h1>
            <div class="flex items-center justify-center gap-4 text-white/80 text-sm" data-aos="fade-up" data-aos-delay="200">
                <span><i class="far fa-calendar mr-1"></i>{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                @if($post->author)
                    <span><i class="far fa-user mr-1"></i>{{ $post->author->name ?? 'Admin' }}</span>
                @endif
            </div>
            <nav class="flex justify-center mt-6" data-aos="fade-up" data-aos-delay="300">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-white/80 hover:text-white">{{ __('Home') }}</a></li>
                    <li><span class="text-white/60">/</span></li>
                    <li><a href="{{ route('blog') }}" class="text-white/80 hover:text-white">{{ __('Blog') }}</a></li>
                    <li><span class="text-white/60">/</span></li>
                    <li class="text-accent-400">{{ Str::limit($post->title, 30) }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Blog Content -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Featured Image -->
        @if($post->image)
            <div class="mb-10 -mt-24 relative z-10" data-aos="fade-up">
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full rounded-2xl shadow-2xl">
            </div>
        @endif

        <!-- Content -->
        <article class="prose prose-lg max-w-none" data-aos="fade-up">
            {!! $post->content !!}
        </article>

        <!-- Tags -->
        @if($post->tags)
            <div class="mt-10 pt-8 border-t" data-aos="fade-up">
                <h4 class="text-sm font-semibold text-gray-500 uppercase mb-3">{{ __('Tags') }}</h4>
                <div class="flex flex-wrap gap-2">
                    @foreach(explode(',', $post->tags) as $tag)
                        <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm hover:bg-primary-100 hover:text-primary-700 transition cursor-pointer">{{ trim($tag) }}</span>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Share -->
        <div class="mt-10 pt-8 border-t" data-aos="fade-up">
            <h4 class="text-sm font-semibold text-gray-500 uppercase mb-4">{{ __('Share this article') }}</h4>
            <div class="flex gap-3">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" class="w-10 h-10 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post->title) }}" target="_blank" class="w-10 h-10 bg-blue-700 text-white rounded-full flex items-center justify-center hover:bg-blue-800 transition">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>

        <!-- Author Box -->
        @if($post->author)
            <div class="mt-10 bg-gray-50 rounded-2xl p-8" data-aos="fade-up">
                <div class="flex items-center gap-6">
                    <div class="w-20 h-20 rounded-full bg-primary-100 flex items-center justify-center flex-shrink-0">
                        <span class="text-primary-600 text-2xl font-bold">{{ substr($post->author->name ?? 'A', 0, 1) }}</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-lg">{{ $post->author->name ?? 'Admin' }}</h4>
                        <p class="text-gray-600 text-sm">{{ __('Author') }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Related Posts -->
@if($relatedPosts->isNotEmpty())
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800">{{ __('Related Articles') }}</h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($relatedPosts as $related)
                <article class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="h-48 overflow-hidden">
                        @if($related->image)
                            <img src="{{ Storage::url($related->image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover transition duration-500 hover:scale-110">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary-300 to-primary-500 flex items-center justify-center">
                                <i class="fas fa-newspaper text-white text-4xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <span class="text-gray-400 text-xs">{{ $related->published_at ? $related->published_at->format('M d, Y') : $related->created_at->format('M d, Y') }}</span>
                        <h3 class="text-lg font-bold text-gray-800 mt-2 mb-3">
                            <a href="{{ route('blog.show', $related->slug) }}" class="hover:text-primary-600 transition">{{ $related->title }}</a>
                        </h3>
                        <a href="{{ route('blog.show', $related->slug) }}" class="text-primary-600 font-semibold text-sm hover:text-primary-700 transition">
                            {{ __('Read More') }} <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-primary-600 to-primary-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4" data-aos="fade-up">{{ __('Stay Connected') }}</h2>
        <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            {{ __('Follow us for more updates and stories of impact from our community.') }}
        </p>
        <div class="flex flex-wrap justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('blog') }}" class="bg-white text-primary-700 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition inline-flex items-center">
                <i class="fas fa-newspaper mr-2"></i>{{ __('More Articles') }}
            </a>
            <a href="{{ route('donate') }}" class="btn-accent text-white px-8 py-3 rounded-full font-semibold inline-flex items-center">
                <i class="fas fa-heart mr-2"></i>{{ __('Support Us') }}
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .prose h2 { @apply text-2xl font-bold text-gray-800 mt-8 mb-4; }
    .prose h3 { @apply text-xl font-bold text-gray-800 mt-6 mb-3; }
    .prose p { @apply text-gray-600 leading-relaxed mb-4; }
    .prose ul { @apply list-disc list-inside mb-4 text-gray-600; }
    .prose ol { @apply list-decimal list-inside mb-4 text-gray-600; }
    .prose blockquote { @apply border-l-4 border-primary-500 pl-4 italic text-gray-700 my-6; }
    .prose img { @apply rounded-xl shadow-lg my-6; }
    .prose a { @apply text-primary-600 hover:text-primary-700 underline; }
</style>
@endpush
