@extends('frontend.layouts.app')

@section('title', __('Gallery'))

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-primary-700 to-primary-900">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up">{{ __('Our Gallery') }}</h1>
            <p class="text-xl text-white/90 mb-6" data-aos="fade-up" data-aos-delay="100">{{ __('Moments of impact, stories of change') }}</p>
            <nav class="flex justify-center" data-aos="fade-up" data-aos-delay="200">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-white/80 hover:text-white">{{ __('Home') }}</a></li>
                    <li><span class="text-white/60">/</span></li>
                    <li class="text-accent-400">{{ __('Gallery') }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Gallery Filter -->
<section class="py-8 bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            <button class="gallery-filter-btn active px-6 py-2 rounded-full border-2 border-primary-600 text-primary-600 font-medium hover:bg-primary-600 hover:text-white transition" data-filter="all">
                {{ __('All') }}
            </button>
            @foreach($albums as $album)
                <button class="gallery-filter-btn px-6 py-2 rounded-full border-2 border-gray-300 text-gray-600 font-medium hover:border-primary-600 hover:text-primary-600 transition" data-filter="album-{{ $album->id }}">
                    {{ $album->title }}
                </button>
            @endforeach
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($albums->isEmpty())
            <div class="text-center py-16">
                <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">{{ __('No gallery albums available yet.') }}</p>
            </div>
        @else
            <!-- All Albums with Images -->
            @foreach($albums as $album)
                <div class="mb-16 gallery-album" data-album="album-{{ $album->id }}">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">{{ $album->title }}</h2>
                            @if($album->description)
                                <p class="text-gray-600 mt-1">{{ $album->description }}</p>
                            @endif
                        </div>
                        <span class="text-sm text-gray-500">{{ $album->images->count() }} {{ __('Photos') }}</span>
                    </div>
                    
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($album->images as $image)
                            <div class="gallery-item group relative aspect-square overflow-hidden rounded-xl shadow-md cursor-pointer" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}" onclick="openLightbox('{{ Storage::url($image->image) }}', '{{ $image->caption ?? $album->title }}')">
                                <img src="{{ Storage::url($image->image) }}" alt="{{ $image->caption ?? $album->title }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                                    <div class="absolute bottom-0 left-0 right-0 p-4">
                                        <p class="text-white text-sm font-medium">{{ $image->caption ?? $album->title }}</p>
                                    </div>
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                    <div class="w-12 h-12 bg-white/90 rounded-full flex items-center justify-center">
                                        <i class="fas fa-expand text-primary-600"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-primary-600 to-primary-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4" data-aos="fade-up">{{ __('Be Part of Our Story') }}</h2>
        <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            {{ __('Your support helps us create more moments of impact. Join us in making a difference.') }}
        </p>
        <div class="flex flex-wrap justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('donate') }}" class="btn-accent text-white px-8 py-3 rounded-full font-semibold inline-flex items-center">
                <i class="fas fa-heart mr-2"></i>{{ __('Donate Now') }}
            </a>
            <a href="{{ route('contact') }}" class="bg-white text-primary-700 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition inline-flex items-center">
                <i class="fas fa-hands-helping mr-2"></i>{{ __('Get Involved') }}
            </a>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4">
    <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white text-3xl hover:text-accent-400 transition">
        <i class="fas fa-times"></i>
    </button>
    <button onclick="prevImage()" class="absolute left-4 top-1/2 -translate-y-1/2 text-white text-3xl hover:text-accent-400 transition">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button onclick="nextImage()" class="absolute right-4 top-1/2 -translate-y-1/2 text-white text-3xl hover:text-accent-400 transition">
        <i class="fas fa-chevron-right"></i>
    </button>
    <div class="max-w-5xl max-h-[80vh]">
        <img id="lightbox-image" src="" alt="" class="max-w-full max-h-[75vh] object-contain">
        <p id="lightbox-caption" class="text-white text-center mt-4"></p>
    </div>
</div>
@endsection

@push('styles')
<style>
    .gallery-filter-btn.active {
        background-color: #16a34a;
        color: white;
        border-color: #16a34a;
    }
</style>
@endpush

@push('scripts')
<script>
    // Gallery filtering
    const filterButtons = document.querySelectorAll('.gallery-filter-btn');
    const albums = document.querySelectorAll('.gallery-album');
    
    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update active button
            filterButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            const filter = btn.dataset.filter;
            
            albums.forEach(album => {
                if (filter === 'all' || album.dataset.album === filter) {
                    album.style.display = 'block';
                } else {
                    album.style.display = 'none';
                }
            });
        });
    });

    // Lightbox functionality
    let currentImages = [];
    let currentIndex = 0;

    function collectAllImages() {
        currentImages = [];
        document.querySelectorAll('.gallery-item').forEach(item => {
            const img = item.querySelector('img');
            if (img) {
                currentImages.push({
                    src: img.src,
                    caption: item.querySelector('.text-white.text-sm')?.textContent || ''
                });
            }
        });
    }

    function openLightbox(src, caption) {
        collectAllImages();
        currentIndex = currentImages.findIndex(img => img.src === src);
        
        document.getElementById('lightbox-image').src = src;
        document.getElementById('lightbox-caption').textContent = caption;
        document.getElementById('lightbox').classList.remove('hidden');
        document.getElementById('lightbox').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.add('hidden');
        document.getElementById('lightbox').classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    function prevImage() {
        if (currentImages.length === 0) return;
        currentIndex = (currentIndex - 1 + currentImages.length) % currentImages.length;
        updateLightboxImage();
    }

    function nextImage() {
        if (currentImages.length === 0) return;
        currentIndex = (currentIndex + 1) % currentImages.length;
        updateLightboxImage();
    }

    function updateLightboxImage() {
        const img = currentImages[currentIndex];
        document.getElementById('lightbox-image').src = img.src;
        document.getElementById('lightbox-caption').textContent = img.caption;
    }

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (document.getElementById('lightbox').classList.contains('hidden')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') prevImage();
        if (e.key === 'ArrowRight') nextImage();
    });
</script>
@endpush
