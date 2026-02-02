@extends('frontend.layouts.app')

@section('title', __('Contact Us'))

@section('content')
    <!-- Page Header -->
    <section class="relative py-24 bg-gradient-to-br from-primary-700 to-primary-900 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/2 translate-y-1/2"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up">{{ __('Contact Us') }}</h1>
                <p class="text-xl text-gray-200 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                    {{ __('We would love to hear from you. Get in touch with us today.') }}
                </p>
                <div class="flex items-center justify-center mt-6 text-sm" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition">{{ __('Home') }}</a>
                    <i class="fas fa-chevron-right mx-3 text-gray-400 text-xs"></i>
                    <span class="text-accent-400">{{ __('Contact Us') }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Contact Info -->
                <div class="lg:col-span-1" data-aos="fade-right">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Get In Touch') }}</h2>
                    <p class="text-gray-600 mb-8">
                        {{ __('Have questions or want to get involved? We would love to hear from you. Reach out to us and let us build a better future together.') }}
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-xl text-primary-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-1">{{ __('Our Location') }}</h4>
                                <p class="text-gray-600">Kigali, Rwanda</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-xl text-primary-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-1">{{ __('Email Us') }}</h4>
                                <p class="text-gray-600">info@twesehamwe.org</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-xl text-primary-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-1">{{ __('Call Us') }}</h4>
                                <p class="text-gray-600">+250 788 000 000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="mt-10">
                        <h4 class="font-semibold text-gray-800 mb-4">{{ __('Follow Us') }}</h4>
                        <div class="flex space-x-3">
                            <a href="#" class="w-10 h-10 bg-primary-600 text-white rounded-full flex items-center justify-center hover:bg-primary-700 transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary-600 text-white rounded-full flex items-center justify-center hover:bg-primary-700 transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary-600 text-white rounded-full flex items-center justify-center hover:bg-primary-700 transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary-600 text-white rounded-full flex items-center justify-center hover:bg-primary-700 transition">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-2" data-aos="fade-left">
                    <div class="bg-gray-50 rounded-2xl p-8 shadow-lg">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Send Us a Message') }}</h2>
                        
                        @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Your Name') }} *</label>
                                    <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition" placeholder="{{ __('John Doe') }}">
                                    @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Your Email') }} *</label>
                                    <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition" placeholder="john@example.com">
                                    @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Phone Number') }}</label>
                                    <input type="tel" name="phone" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition" placeholder="+250 788 000 000">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Subject') }} *</label>
                                    <select name="subject" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition">
                                        <option value="">{{ __('Select a subject') }}</option>
                                        <option value="general">{{ __('General Inquiry') }}</option>
                                        <option value="volunteer">{{ __('Volunteer Opportunities') }}</option>
                                        <option value="donation">{{ __('Donation Questions') }}</option>
                                        <option value="partnership">{{ __('Partnership') }}</option>
                                        <option value="media">{{ __('Media Inquiry') }}</option>
                                        <option value="other">{{ __('Other') }}</option>
                                    </select>
                                    @error('subject')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Your Message') }} *</label>
                                <textarea name="message" rows="6" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition resize-none" placeholder="{{ __('Tell us how we can help you...') }}"></textarea>
                                @error('message')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn-primary text-white w-full py-4 rounded-lg font-semibold text-lg">
                                <i class="fas fa-paper-plane mr-2"></i>{{ __('Send Message') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ __('Find Us') }}</h2>
                <p class="text-gray-600">{{ __('Visit our office in Kigali, Rwanda') }}</p>
            </div>
            
            <div class="rounded-2xl overflow-hidden shadow-lg h-96" data-aos="zoom-in">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127672.75772082775!2d29.987464399999998!3d-1.9402870499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca4258ed8e797%3A0x6549755b2a446a62!2sKigali%2C%20Rwanda!5e0!3m2!1sen!2s!4v1706817600000!5m2!1sen!2s"
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">{{ __('FAQ') }}</span>
                <h2 class="text-3xl font-bold text-gray-800 mt-2 mb-4">{{ __('Frequently Asked Questions') }}</h2>
            </div>

            <div class="space-y-4" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-gray-50 rounded-xl overflow-hidden">
                    <button onclick="toggleFaq(this)" class="w-full px-6 py-4 text-left flex items-center justify-between font-semibold text-gray-800 hover:bg-gray-100 transition">
                        <span>{{ __('How can I volunteer with Twese Hamwe?') }}</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="hidden px-6 pb-4 text-gray-600">
                        {{ __('We welcome volunteers! Please fill out the contact form above with "Volunteer Opportunities" as the subject, and our team will get back to you with available positions and requirements.') }}
                    </div>
                </div>

                <div class="bg-gray-50 rounded-xl overflow-hidden">
                    <button onclick="toggleFaq(this)" class="w-full px-6 py-4 text-left flex items-center justify-between font-semibold text-gray-800 hover:bg-gray-100 transition">
                        <span>{{ __('How is my donation used?') }}</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="hidden px-6 pb-4 text-gray-600">
                        {{ __('Your donations directly support our programs including skills training, purchasing equipment, and supporting the Espace Amis pour Enfants child-friendly space. We maintain full transparency in our financial reporting.') }}
                    </div>
                </div>

                <div class="bg-gray-50 rounded-xl overflow-hidden">
                    <button onclick="toggleFaq(this)" class="w-full px-6 py-4 text-left flex items-center justify-between font-semibold text-gray-800 hover:bg-gray-100 transition">
                        <span>{{ __('Can I visit your programs in Rwanda?') }}</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="hidden px-6 pb-4 text-gray-600">
                        {{ __('Yes! We welcome visitors who want to see our work firsthand. Please contact us in advance to arrange a visit and we will be happy to show you around our training center and programs.') }}
                    </div>
                </div>

                <div class="bg-gray-50 rounded-xl overflow-hidden">
                    <button onclick="toggleFaq(this)" class="w-full px-6 py-4 text-left flex items-center justify-between font-semibold text-gray-800 hover:bg-gray-100 transition">
                        <span>{{ __('How can my organization partner with Twese Hamwe?') }}</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="hidden px-6 pb-4 text-gray-600">
                        {{ __('We are always looking for partnerships with organizations that share our vision. Please reach out through the contact form with "Partnership" as the subject to discuss collaboration opportunities.') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function toggleFaq(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('i');
        
        content.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }
</script>
@endpush
