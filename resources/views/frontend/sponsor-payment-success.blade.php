@extends('frontend.layouts.app')

@section('title', __('Payment Successful'))

@section('content')
<!-- Success Section -->
<section class="py-20 bg-gradient-to-br from-green-50 to-green-100">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-white rounded-3xl shadow-2xl p-12" data-aos="zoom-in">
            <!-- Success Icon -->
            <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-check text-white text-5xl"></i>
            </div>

            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">{{ __('Thank You!') }}</h1>
            <p class="text-xl text-gray-600 mb-8">
                {{ __('Your sponsorship payment has been processed successfully.') }}
            </p>

            <div class="bg-green-50 rounded-2xl p-6 mb-8">
                <h3 class="font-bold text-gray-800 mb-3">{{ __('What Happens Next?') }}</h3>
                <ul class="text-left space-y-3 text-gray-600">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-envelope text-green-600 mt-1"></i>
                        <span>{{ __('You will receive a confirmation email with your sponsorship details') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-heart text-green-600 mt-1"></i>
                        <span>{{ __('Your sponsorship will directly impact someone\'s life') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-file-invoice text-green-600 mt-1"></i>
                        <span>{{ __('A tax-deductible receipt will be sent to your email') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-paper-plane text-green-600 mt-1"></i>
                        <span>{{ __('You will receive regular updates about your sponsored individual') }}</span>
                    </li>
                </ul>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('home') }}" class="btn-primary text-white px-8 py-3 rounded-full font-semibold inline-flex items-center justify-center">
                    <i class="fas fa-home mr-2"></i>{{ __('Back to Home') }}
                </a>
                <a href="{{ route('sponsor') }}" class="btn-secondary text-gray-700 px-8 py-3 rounded-full font-semibold inline-flex items-center justify-center border-2 border-gray-300 hover:border-gray-400">
                    <i class="fas fa-heart mr-2"></i>{{ __('Sponsor Another') }}
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Impact Statistics -->
<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">{{ __('Your Impact') }}</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-6 bg-primary-50 rounded-2xl" data-aos="fade-up">
                <i class="fas fa-graduation-cap text-4xl text-primary-600 mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ __('Education') }}</h3>
                <p class="text-gray-600">{{ __('Providing access to quality education and school materials') }}</p>
            </div>
            <div class="text-center p-6 bg-accent-50 rounded-2xl" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-heartbeat text-4xl text-accent-600 mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ __('Healthcare') }}</h3>
                <p class="text-gray-600">{{ __('Ensuring access to medical care and nutrition') }}</p>
            </div>
            <div class="text-center p-6 bg-primary-50 rounded-2xl" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-home text-4xl text-primary-600 mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ __('Shelter') }}</h3>
                <p class="text-gray-600">{{ __('Providing safe and secure living conditions') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Share Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ __('Spread the Word') }}</h2>
        <p class="text-gray-600 mb-8">{{ __('Help us reach more people who can make a difference. Share your sponsorship journey with friends and family.') }}</p>
        
        <div class="flex justify-center gap-4">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('sponsor')) }}" target="_blank" class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?text={{ urlencode(__('I just sponsored a life! Join me in making a difference.')) }}&url={{ urlencode(route('sponsor')) }}" target="_blank" class="w-12 h-12 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://wa.me/?text={{ urlencode(__('I just sponsored a life! Join me in making a difference. ') . route('sponsor')) }}" target="_blank" class="w-12 h-12 bg-green-600 text-white rounded-full flex items-center justify-center hover:bg-green-700 transition">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="mailto:?subject={{ urlencode(__('Join me in sponsoring a life')) }}&body={{ urlencode(__('I just sponsored someone through Twese Hamwe NGO. You can too! ') . route('sponsor')) }}" class="w-12 h-12 bg-gray-600 text-white rounded-full flex items-center justify-center hover:bg-gray-700 transition">
                <i class="fas fa-envelope"></i>
            </a>
        </div>
    </div>
</section>
@endsection
