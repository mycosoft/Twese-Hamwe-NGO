@extends('frontend.layouts.app')

@section('title', __('Complete Payment'))

@section('content')
<!-- Hero Section -->
<section class="relative py-16 bg-gradient-to-br from-primary-700 to-primary-900">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4" data-aos="fade-up">{{ __('Complete Your Sponsorship') }}</h1>
        <p class="text-xl text-white/90 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            {{ __('You\'re one step away from changing a life forever.') }}
        </p>
    </div>
</section>

<!-- Payment Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">{{ __('Order Summary') }}</h3>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-gray-600">
                            <span>{{ __('Sponsorship Type') }}</span>
                            <span class="font-semibold text-gray-800">{{ ucfirst($sponsorshipData['type']) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>{{ __('Duration') }}</span>
                            <span class="font-semibold text-gray-800">{{ ucfirst($sponsorshipData['duration']) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>{{ __('Amount') }}</span>
                            <span class="font-semibold text-gray-800">${{ number_format($sponsorshipData['amount'], 2) }}</span>
                        </div>
                    </div>
                    
                    <div class="border-t pt-4">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-lg font-bold text-gray-800">{{ __('Total') }}</span>
                            <span class="text-2xl font-bold text-primary-600">${{ number_format($sponsorshipData['amount'], 2) }}</span>
                        </div>
                    </div>

                    <div class="mt-6 p-4 bg-primary-50 rounded-xl">
                        <p class="text-sm text-gray-700">
                            <i class="fas fa-info-circle text-primary-600 mr-2"></i>
                            {{ __('Your sponsorship will make a direct impact on someone\'s life.') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Payment Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Payment Information') }}</h3>

                    <!-- Sponsor Information Summary -->
                    <div class="mb-6 p-4 bg-gray-50 rounded-xl">
                        <h4 class="font-semibold text-gray-800 mb-2">{{ __('Sponsor Details') }}</h4>
                        <p class="text-gray-600">{{ $sponsorshipData['first_name'] }} {{ $sponsorshipData['last_name'] }}</p>
                        <p class="text-gray-600">{{ $sponsorshipData['email'] }}</p>
                        @if(isset($sponsorshipData['phone']))
                        <p class="text-gray-600">{{ $sponsorshipData['phone'] }}</p>
                        @endif
                    </div>

                    <!-- PayPal Integration Placeholder -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-gray-800 mb-4">{{ __('Choose Payment Method') }}</h4>
                        
                        <!-- PayPal Button Container -->
                        <div id="paypal-button-container" class="mb-4"></div>

                        <!-- Alternative: Manual Payment Instructions -->
                        <div class="mt-6 p-6 border-2 border-dashed border-gray-300 rounded-xl">
                            <h5 class="font-semibold text-gray-800 mb-3">{{ __('Alternative Payment Options') }}</h5>
                            <p class="text-gray-600 mb-4">{{ __('You can also complete your payment through:') }}</p>
                            
                            <div class="space-y-3">
                                <div class="flex items-start gap-3">
                                    <i class="fas fa-money-check-alt text-primary-600 mt-1"></i>
                                    <div>
                                        <p class="font-semibold text-gray-800">{{ __('Bank Transfer') }}</p>
                                        <p class="text-sm text-gray-600">{{ __('Contact us for bank details') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <i class="fas fa-mobile-alt text-primary-600 mt-1"></i>
                                    <div>
                                        <p class="font-semibold text-gray-800">{{ __('Mobile Money') }}</p>
                                        <p class="text-sm text-gray-600">{{ __('MTN Mobile Money, Airtel Money available') }}</p>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('contact') }}" class="mt-4 inline-flex items-center text-primary-600 hover:text-primary-700 font-semibold">
                                {{ __('Contact us for assistance') }} <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="flex gap-4">
                        <a href="{{ route('sponsor') }}" class="flex-1 btn-secondary text-gray-700 px-6 py-3 rounded-full font-semibold text-center border-2 border-gray-300 hover:border-gray-400">
                            <i class="fas fa-arrow-left mr-2"></i>{{ __('Back to Sponsor Page') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust Badges -->
<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-6 text-center">
            <div class="p-6">
                <i class="fas fa-shield-alt text-4xl text-primary-600 mb-3"></i>
                <h4 class="font-bold text-gray-800 mb-2">{{ __('Secure Payment') }}</h4>
                <p class="text-sm text-gray-600">{{ __('Your payment information is encrypted and secure') }}</p>
            </div>
            <div class="p-6">
                <i class="fas fa-receipt text-4xl text-primary-600 mb-3"></i>
                <h4 class="font-bold text-gray-800 mb-2">{{ __('Tax Deductible') }}</h4>
                <p class="text-sm text-gray-600">{{ __('All donations are tax-deductible') }}</p>
            </div>
            <div class="p-6">
                <i class="fas fa-heart text-4xl text-primary-600 mb-3"></i>
                <h4 class="font-bold text-gray-800 mb-2">{{ __('Direct Impact') }}</h4>
                <p class="text-sm text-gray-600">{{ __('100% of your sponsorship goes directly to help') }}</p>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<!-- PayPal SDK - Replace YOUR_CLIENT_ID with your actual PayPal client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID&currency=USD"></script>

<script>
    // PayPal Integration
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    description: 'Sponsorship - {{ ucfirst($sponsorshipData["type"]) }}',
                    amount: {
                        currency_code: 'USD',
                        value: '{{ $sponsorshipData["amount"] }}'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Payment successful
                alert('Transaction completed by ' + details.payer.name.given_name);
                
                // You can send the transaction details to your server here
                fetch('{{ route("sponsor.payment.process") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        orderID: data.orderID,
                        payerID: data.payerID,
                        details: details
                    })
                }).then(response => response.json())
                  .then(data => {
                      if (data.success) {
                          window.location.href = '{{ route("sponsor.payment.success") }}';
                      }
                  });
            });
        },
        onError: function(err) {
            console.error('PayPal Error:', err);
            alert('An error occurred during payment. Please try again or contact us for assistance.');
        }
    }).render('#paypal-button-container');
</script>
@endpush
