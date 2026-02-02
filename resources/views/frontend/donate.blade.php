@extends('frontend.layouts.app')

@section('title', __('Donate'))

@section('content')
    <!-- Page Header -->
    <section class="relative py-20 bg-gradient-to-br from-primary-700 to-primary-900">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up">{{ __('Make a Donation') }}</h1>
                <p class="text-xl text-white/90 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                    {{ __('Your generosity transforms lives. Help us empower women and youth in Rwanda.') }}
                </p>
                <nav class="flex justify-center mt-6" data-aos="fade-up" data-aos-delay="200">
                    <ol class="flex items-center space-x-2 text-sm">
                        <li><a href="{{ route('home') }}" class="text-white/80 hover:text-white">{{ __('Home') }}</a></li>
                        <li><span class="text-white/60">/</span></li>
                        <li class="text-accent-400">{{ __('Donate') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- Fundraising Progress -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-primary-700 to-primary-900 rounded-3xl p-8 md:p-12 text-white shadow-2xl" data-aos="fade-up">
                <div class="text-center mb-8">
                    <span class="text-accent-400 font-semibold text-sm uppercase tracking-wider">{{ __('Our Goal') }}</span>
                    <h2 class="text-3xl md:text-4xl font-bold mt-2">{{ __('Help Us Raise') }} <span class="text-accent-400">$10,000</span></h2>
                    <p class="text-gray-300 mt-2">{{ __('Every donation brings us closer to transforming lives') }}</p>
                </div>

                @if($featuredProject)
                <!-- Progress Bar -->
                <div class="mb-8">
                    <div class="bg-white/20 rounded-full h-8 overflow-hidden">
                        @php
                            $percentage = $featuredProject->budget > 0 ? min(100, ($featuredProject->raised_amount / $featuredProject->budget) * 100) : 0;
                        @endphp
                        <div class="progress-bar h-full rounded-full transition-all duration-1000 flex items-center justify-center text-sm font-semibold" style="width: {{ max(10, $percentage) }}%">
                            {{ number_format($percentage, 0) }}%
                        </div>
                    </div>
                    <div class="flex justify-between mt-4 text-lg">
                        <div>
                            <p class="text-accent-400 font-bold text-2xl">${{ number_format($featuredProject->raised_amount, 0) }}</p>
                            <p class="text-gray-300 text-sm">{{ __('Raised') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-white font-bold text-2xl">${{ number_format($featuredProject->budget, 0) }}</p>
                            <p class="text-gray-300 text-sm">{{ __('Goal') }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Donation Options -->
    <section class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('Choose Amount') }}</span>
                <h2 class="text-3xl font-bold text-gray-800 mt-2 mb-4">{{ __('Select Your Donation') }}</h2>
                <p class="text-gray-600">{{ __('Every amount makes a difference') }}</p>
            </div>

            <div class="bg-gray-50 rounded-3xl p-8 md:p-12" data-aos="fade-up">
                <!-- Preset Amounts -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    <button onclick="setAmount(25)" class="donation-amount bg-white border-2 border-gray-200 rounded-xl py-4 px-6 text-center hover:border-primary-500 hover:bg-primary-50 transition focus:outline-none focus:border-primary-500">
                        <p class="text-2xl font-bold text-gray-800">$25</p>
                        <p class="text-xs text-gray-500">{{ __('Basic supplies') }}</p>
                    </button>
                    <button onclick="setAmount(50)" class="donation-amount bg-white border-2 border-gray-200 rounded-xl py-4 px-6 text-center hover:border-primary-500 hover:bg-primary-50 transition focus:outline-none focus:border-primary-500">
                        <p class="text-2xl font-bold text-gray-800">$50</p>
                        <p class="text-xs text-gray-500">{{ __('Training materials') }}</p>
                    </button>
                    <button onclick="setAmount(100)" class="donation-amount bg-white border-2 border-primary-500 bg-primary-50 rounded-xl py-4 px-6 text-center transition focus:outline-none">
                        <p class="text-2xl font-bold text-primary-600">$100</p>
                        <p class="text-xs text-primary-500">{{ __('Most Popular') }}</p>
                    </button>
                    <button onclick="setAmount(250)" class="donation-amount bg-white border-2 border-gray-200 rounded-xl py-4 px-6 text-center hover:border-primary-500 hover:bg-primary-50 transition focus:outline-none focus:border-primary-500">
                        <p class="text-2xl font-bold text-gray-800">$250</p>
                        <p class="text-xs text-gray-500">{{ __('Equipment fund') }}</p>
                    </button>
                </div>

                <!-- Custom Amount -->
                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Or enter custom amount') }}</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 text-xl">$</span>
                        <input type="number" id="customAmount" min="1" class="w-full pl-10 pr-4 py-4 text-xl rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition" placeholder="100" value="100">
                    </div>
                </div>

                <!-- Donor Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Full Name') }}</label>
                        <input type="text" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition" placeholder="{{ __('John Doe') }}">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Email Address') }}</label>
                        <input type="email" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition" placeholder="john@example.com">
                    </div>
                </div>

                <!-- Message -->
                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Leave a message (optional)') }}</label>
                    <textarea rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition resize-none" placeholder="{{ __('Your message of support...') }}"></textarea>
                </div>

                <!-- Anonymous -->
                <div class="mb-8">
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="checkbox" class="w-5 h-5 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                        <span class="text-gray-700">{{ __('Make this donation anonymous') }}</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button class="w-full btn-accent text-white py-4 rounded-xl font-semibold text-lg flex items-center justify-center">
                    <i class="fas fa-heart mr-2"></i>
                    {{ __('Donate') }} $<span id="totalAmount">100</span>
                </button>

                <p class="text-center text-gray-500 text-sm mt-4">
                    <i class="fas fa-lock mr-1"></i>{{ __('Secure payment processing') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Other Ways to Give -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('More Options') }}</span>
                <h2 class="text-3xl font-bold text-gray-800 mt-2 mb-4">{{ __('Other Ways to Give') }}</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 text-center shadow-lg" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-university text-2xl text-primary-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ __('Bank Transfer') }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ __('Make a direct bank transfer to our account') }}</p>
                    <a href="{{ route('contact') }}" class="text-primary-600 font-semibold hover:text-primary-700 transition">
                        {{ __('Get Details') }} <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <div class="bg-white rounded-2xl p-8 text-center shadow-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-mobile-alt text-2xl text-primary-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ __('Mobile Money') }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ __('Send via MTN Mobile Money or Airtel Money') }}</p>
                    <a href="{{ route('contact') }}" class="text-primary-600 font-semibold hover:text-primary-700 transition">
                        {{ __('Get Details') }} <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <div class="bg-white rounded-2xl p-8 text-center shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-box-open text-2xl text-primary-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ __('In-Kind Donations') }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ __('Donate sewing machines, fabric, or supplies') }}</p>
                    <a href="{{ route('contact') }}" class="text-primary-600 font-semibold hover:text-primary-700 transition">
                        {{ __('Contact Us') }} <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function setAmount(amount) {
        document.getElementById('customAmount').value = amount;
        document.getElementById('totalAmount').textContent = amount;
        
        // Update button styles
        document.querySelectorAll('.donation-amount').forEach(btn => {
            btn.classList.remove('border-primary-500', 'bg-primary-50');
            btn.classList.add('border-gray-200');
            btn.querySelector('p:first-child').classList.remove('text-primary-600');
            btn.querySelector('p:first-child').classList.add('text-gray-800');
        });
        
        event.target.closest('.donation-amount').classList.remove('border-gray-200');
        event.target.closest('.donation-amount').classList.add('border-primary-500', 'bg-primary-50');
        event.target.closest('.donation-amount').querySelector('p:first-child').classList.remove('text-gray-800');
        event.target.closest('.donation-amount').querySelector('p:first-child').classList.add('text-primary-600');
    }

    document.getElementById('customAmount').addEventListener('input', function() {
        document.getElementById('totalAmount').textContent = this.value || 0;
    });
</script>
@endpush
