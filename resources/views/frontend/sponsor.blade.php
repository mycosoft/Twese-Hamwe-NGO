@extends('frontend.layouts.app')

@section('title', __('Sponsor a Life'))

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-primary-700 to-primary-900">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-4" data-aos="fade-up">{{ __('Sponsor a Life. Change a Story.') }}</h1>
        <p class="text-xl text-white/90 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            {{ __('Your sponsorship provides food, education, healthcare, and love to vulnerable individuals. Join us in creating lasting impact.') }}
        </p>
    </div>
</section>

<!-- Sponsorship Type Tabs -->
<section class="py-8 bg-white border-b sticky top-0 z-40">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            <button onclick="switchTab('child')" class="sponsorship-tab active px-6 py-3 rounded-full font-semibold transition" data-tab="child">
                <i class="fas fa-child mr-2"></i>{{ __('Sponsor a Child') }}
            </button>
            <button onclick="switchTab('mother')" class="sponsorship-tab px-6 py-3 rounded-full font-semibold transition" data-tab="mother">
                <i class="fas fa-female mr-2"></i>{{ __('Sponsor a Mother') }}
            </button>
            <button onclick="switchTab('neighbourhood')" class="sponsorship-tab px-6 py-3 rounded-full font-semibold transition" data-tab="neighbourhood">
                <i class="fas fa-home mr-2"></i>{{ __('Sponsor a Neighbourhood') }}
            </button>
        </div>
    </div>
</section>

<!-- Child Sponsorship Content -->
<section id="child-content" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8 mb-12">
            <div class="lg:col-span-2" data-aos="fade-right">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ __('Sponsor a Child') }}</h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    {{ __('When you sponsor a child, you provide more than basic needs—you offer hope for a brighter future. Your monthly support helps cover:') }}
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary-600 mt-1 mr-3"></i>
                        <span class="text-gray-600">{{ __('Quality education and school fees') }}</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary-600 mt-1 mr-3"></i>
                        <span class="text-gray-600">{{ __('Nutritious meals and healthcare') }}</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary-600 mt-1 mr-3"></i>
                        <span class="text-gray-600">{{ __('Safe shelter and clothing') }}</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary-600 mt-1 mr-3"></i>
                        <span class="text-gray-600">{{ __('Regular progress updates and letters') }}</span>
                    </li>
                </ul>
                <p class="text-gray-600 text-lg leading-relaxed">
                    {{ __('Each child has multiple sponsors to ensure they receive comprehensive care. Your sponsorship directly transforms a life and breaks the cycle of poverty.') }}
                </p>
            </div>
            <div class="lg:col-span-1" data-aos="fade-left">
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
                    <p class="text-4xl font-bold text-primary-600 mb-2">$30<span class="text-lg font-normal text-gray-500">/month</span></p>
                    <p class="text-gray-600 mb-6">{{ __('Minimum suggested sponsorship') }}</p>
                    <button onclick="openSponsorModal('child')" class="btn-primary text-white px-8 py-4 rounded-full font-semibold w-full text-lg">
                        {{ __('Start Sponsoring') }}
                    </button>
                    <p class="text-sm text-gray-500 mt-4">{{ __('Tax-deductible. Cancel anytime.') }}</p>
                </div>
            </div>
        </div>

        <!-- Children Waiting -->
        <div class="mb-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Children Waiting for Sponsors') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($sponsorChildren as $child)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up">
                    <div class="h-64 overflow-hidden relative">
                        @if($child->image)
                            <img src="{{ Storage::url($child->image) }}" alt="{{ $child->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                                <i class="fas fa-child text-white text-6xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold text-gray-800 mb-1">{{ $child->name }}</h4>
                        <p class="text-primary-600 font-medium mb-3">
                            @if($child->date_of_birth)
                                {{ \Carbon\Carbon::parse($child->date_of_birth)->age }} {{ __('years old') }}
                            @else
                                {{ __('Age not specified') }}
                            @endif
                        </p>
                        @if($child->location)
                            <p class="text-gray-500 text-sm mb-2"><i class="fas fa-map-marker-alt mr-1"></i>{{ $child->location }}</p>
                        @endif
                        @if($child->story)
                        <a href="javascript:void(0)" 
                           onclick="openStoryModal(this)" 
                           data-name="{{ $child->name }}" 
                           data-story="{{ $child->story }}"
                           data-image="{{ $child->image ? Storage::url($child->image) : asset('TWESE HAMWE/logo.jpeg') }}"
                           data-location="{{ $child->location ?? 'Not specified' }}"
                           data-birthday="{{ $child->date_of_birth ? \Carbon\Carbon::parse($child->date_of_birth)->format('d-M-Y') : 'Not specified' }}"
                           class="text-primary-600 font-semibold text-sm inline-flex items-center mb-3 hover:text-primary-700 transition">
                            <i class="fas fa-book-open mr-2"></i>{{ __('View Story') }}
                        </a>
                        @endif
                        <button onclick="openSponsorModal('child', '{{ $child->name }}')" class="btn-primary text-white px-6 py-2 rounded-full font-semibold w-full">
                            {{ __('Sponsor') }}
                        </button>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12 bg-white rounded-2xl">
                    <i class="fas fa-child text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">{{ __('All children are currently sponsored. Check back soon!') }}</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Mother Sponsorship Content -->
<section id="mother-content" class="py-16 bg-white hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8 mb-12">
            <div class="lg:col-span-2" data-aos="fade-right">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ __('Sponsor a Mother') }}</h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    {{ __('Empower a mother with the skills and resources she needs to build a sustainable future for her family. Your sponsorship helps provide:') }}
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-accent-600 mt-1 mr-3"></i>
                        <span class="text-gray-600">{{ __('Vocational training and skills development') }}</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-accent-600 mt-1 mr-3"></i>
                        <span class="text-gray-600">{{ __('Business startup kit and materials') }}</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-accent-600 mt-1 mr-3"></i>
                        <span class="text-gray-600">{{ __('Financial literacy and mentorship') }}</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-accent-600 mt-1 mr-3"></i>
                        <span class="text-gray-600">{{ __('Ongoing support and community') }}</span>
                    </li>
                </ul>
                <p class="text-gray-600 text-lg leading-relaxed">
                    {{ __('Your support helps mothers become self-sufficient, breaking cycles of poverty and creating stable families. Watch as your sponsorship transforms not just one life, but an entire family.') }}
                </p>
            </div>
            <div class="lg:col-span-1" data-aos="fade-left">
                <div class="bg-accent-50 rounded-2xl shadow-lg p-8 text-center">
                    <p class="text-4xl font-bold text-accent-600 mb-2">$50<span class="text-lg font-normal text-gray-500">/month</span></p>
                    <p class="text-gray-600 mb-6">{{ __('Minimum suggested sponsorship') }}</p>
                    <button onclick="openSponsorModal('mother')" class="btn-accent text-white px-8 py-4 rounded-full font-semibold w-full text-lg">
                        {{ __('Start Sponsoring') }}
                    </button>
                    <p class="text-sm text-gray-500 mt-4">{{ __('Tax-deductible. Cancel anytime.') }}</p>
                </div>
            </div>
        </div>

        <!-- Mothers Waiting -->
        <div class="mb-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Mothers Waiting for Sponsors') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($sponsorMothers ?? [] as $mother)
                <div class="bg-gray-50 rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up">
                    <div class="h-64 overflow-hidden">
                        @if($mother->image)
                            <img src="{{ Storage::url($mother->image) }}" alt="{{ $mother->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-accent-400 to-accent-600 flex items-center justify-center">
                                <i class="fas fa-female text-white text-6xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold text-gray-800 mb-1">{{ $mother->name }}</h4>
                        <p class="text-accent-600 font-medium mb-3">{{ $mother->age }} {{ __('years old') }}</p>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $mother->short_description }}</p>
                        <button onclick="openSponsorModal('mother')" class="btn-accent text-white px-6 py-2 rounded-full font-semibold w-full">
                            {{ __('Sponsor') }} {{ $mother->name }}
                        </button>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12 bg-gray-50 rounded-2xl">
                    <i class="fas fa-female text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">{{ __('Mother profiles coming soon. Please check back or contact us for more information.') }}</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Neighbourhood Sponsorship Content -->
<section id="neighbourhood-content" class="py-16 bg-gray-50 hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8 mb-12">
            <div class="lg:col-span-2" data-aos="fade-right">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ __('Sponsor a Neighbourhood') }}</h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    {{ __('Transform an entire community through sustainable development. Your sponsorship helps fund infrastructure and programs that benefit everyone:') }}
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary-600 mt-1 mr-3"></i>
                        <span class="text-gray-600">{{ __('Community center construction and maintenance') }}</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary-600 mt-1 mr-3"></i>
                        <span class="text-gray-600">{{ __('Clean water and sanitation facilities') }}</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary-600 mt-1 mr-3"></i>
                        <span class="text-gray-600">{{ __('Skills training programs for adults') }}</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary-600 mt-1 mr-3"></i>
                        <span class="text-gray-600">{{ __('Regular impact reports and updates') }}</span>
                    </li>
                </ul>
                <p class="text-gray-600 text-lg leading-relaxed">
                    {{ __('Neighbourhood sponsorship creates ripple effects that lift entire communities out of poverty. Your investment multiplies impact across generations.') }}
                </p>
            </div>
            <div class="lg:col-span-1" data-aos="fade-left">
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
                    <p class="text-4xl font-bold text-primary-600 mb-2">$100<span class="text-lg font-normal text-gray-500">/month</span></p>
                    <p class="text-gray-600 mb-6">{{ __('Minimum suggested sponsorship') }}</p>
                    <button onclick="openSponsorModal('neighbourhood')" class="btn-primary text-white px-8 py-4 rounded-full font-semibold w-full text-lg">
                        {{ __('Start Sponsoring') }}
                    </button>
                    <p class="text-sm text-gray-500 mt-4">{{ __('Tax-deductible. Cancel anytime.') }}</p>
                </div>
            </div>
        </div>

        <!-- Neighbourhoods Waiting -->
        <div class="mb-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Neighbourhoods Waiting for Sponsors') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($sponsorNeighbourhoods ?? [] as $neighbourhood)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="fade-up">
                    <div class="h-48 overflow-hidden">
                        @if($neighbourhood->image)
                            <img src="{{ Storage::url($neighbourhood->image) }}" alt="{{ $neighbourhood->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                                <i class="fas fa-home text-white text-6xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold text-gray-800 mb-1">{{ $neighbourhood->name }}</h4>
                        <p class="text-gray-600 text-sm mb-4">{{ $neighbourhood->location }}</p>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $neighbourhood->short_description }}</p>
                        <button onclick="openSponsorModal('neighbourhood')" class="btn-primary text-white px-6 py-2 rounded-full font-semibold w-full">
                            {{ __('Sponsor') }} {{ $neighbourhood->name }}
                        </button>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12 bg-white rounded-2xl">
                    <i class="fas fa-home text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">{{ __('Neighbourhood profiles coming soon. Please check back or contact us for more information.') }}</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Sponsorship Modal -->
<div id="sponsorModal" class="fixed inset-0 bg-black/70 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b">
            <div class="flex justify-between items-center">
                <h3 id="modalTitle" class="text-xl font-bold text-gray-800">{{ __('Sponsor a Child') }}</h3>
                <button onclick="closeSponsorModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
        <form action="{{ route('sponsor.submit') }}" method="POST" class="p-6">
            @csrf
            <input type="hidden" name="sponsorship_type" id="sponsorshipType" value="child">
            <input type="hidden" name="amount" id="sponsorshipAmount" value="30">
            
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('Sponsorship Type') }}</label>
                <select id="sponsorTypeSelect" name="type" onchange="updateModalType(this.value)" class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary-500 focus:outline-none">
                    <option value="child">{{ __('Sponsor a Child') }} - <span class="amount-text" data-type="child">$30</span>/{{ __('month') }}</option>
                    <option value="mother">{{ __('Sponsor a Mother') }} - <span class="amount-text" data-type="mother">$50</span>/{{ __('month') }}</option>
                    <option value="neighbourhood">{{ __('Sponsor a Neighbourhood') }} - <span class="amount-text" data-type="neighbourhood">$100</span>/{{ __('month') }}</option>
                </select>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('Sponsorship Duration') }}</label>
                <select name="duration" class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary-500 focus:outline-none">
                    <option value="monthly">{{ __('Monthly (Recurring)') }}</option>
                    <option value="quarterly">{{ __('Quarterly (3 months)') }}</option>
                    <option value="biannual">{{ __('Biannual (6 months)') }}</option>
                    <option value="annual">{{ __('Annual (12 months)') }}</option>
                </select>
            </div>
            
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('First Name') }}</label>
                    <input type="text" name="first_name" required class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('Last Name') }}</label>
                    <input type="text" name="last_name" required class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary-500 focus:outline-none">
                </div>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('Email Address') }}</label>
                <input type="email" name="email" required class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary-500 focus:outline-none">
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('Phone Number') }}</label>
                <input type="tel" name="phone" class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary-500 focus:outline-none">
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('Message (Optional)') }}</label>
                <textarea name="message" rows="3" class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary-500 focus:outline-none" placeholder="{{ __('Any specific preferences or questions?') }}"></textarea>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-4 mb-6">
                <p class="text-sm text-gray-600 mb-2">{{ __('Total Amount:') }}</p>
                <p id="totalAmount" class="text-2xl font-bold text-primary-600">$30/{{ __('month') }}</p>
            </div>
            
            <button type="submit" class="btn-primary text-white px-8 py-4 rounded-full font-semibold w-full text-lg">
                {{ __('Continue to Payment') }} <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </form>
    </div>
</div>

<!-- Story Modal -->
<div id="storyModal" class="fixed inset-0 bg-black/70 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto relative">
        <!-- Close Button -->
        <button onclick="closeStoryModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600 z-10">
            <i class="fas fa-times text-2xl"></i>
        </button>
        
        <!-- Modal Header with Profile -->
        <div class="p-8 pb-6">
            <div class="flex items-start gap-6">
                <!-- Profile Picture -->
                <div class="flex-shrink-0">
                    <img id="storyModalImage" src="" alt="Profile" class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                </div>
                
                <!-- Name and Info -->
                <div class="flex-1 pt-2">
                    <h2 id="storyModalName" class="text-4xl font-bold text-gray-900 mb-3"></h2>
                    <div class="flex flex-wrap gap-4 text-gray-600 mb-4">
                        <div class="flex items-center gap-2">
                            <span class="font-semibold">Location:</span>
                            <span id="storyModalLocation" class="text-green-600 font-medium"></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="font-semibold">Birthday:</span>
                            <span id="storyModalBirthday" class="text-green-600 font-medium"></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Progress Bar -->
            <div class="mt-6">
                <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                    <div class="h-full flex">
                        <div class="bg-green-300" style="width: 20%"></div>
                        <div class="bg-green-500" style="width: 30%"></div>
                        <div class="bg-blue-500" style="width: 25%"></div>
                        <div class="bg-blue-700" style="width: 25%"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Story Content -->
        <div class="px-8 pb-6">
            <div id="storyModalContent" class="text-gray-700 text-base leading-relaxed space-y-4"></div>
        </div>
        
        <!-- Footer with Sponsor Button -->
        <div class="px-8 pb-8 pt-4">
            <button onclick="closeStoryModal(); setTimeout(() => openSponsorModal('child'), 300);" class="btn-primary text-white px-8 py-3 rounded-full font-semibold w-full text-lg hover:shadow-lg transition">
                {{ __('Sponsor This Child') }} <i class="fas fa-heart ml-2"></i>
            </button>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .sponsorship-tab {
        background-color: #f3f4f6;
        color: #4b5563;
        border: 2px solid transparent;
    }
    .sponsorship-tab:hover {
        background-color: #e5e7eb;
    }
    .sponsorship-tab.active {
        background-color: #16a34a;
        color: white;
    }
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

@push('scripts')
<script>
    // Sponsorship amounts - will be fetched from backend
    let prices = {
        child: 30,
        mother: 50,
        neighbourhood: 100
    };
    
    const titles = {
        child: '{{ __("Sponsor a Child") }}',
        mother: '{{ __("Sponsor a Mother") }}',
        neighbourhood: '{{ __("Sponsor a Neighbourhood") }}'
    };

    // Fetch sponsorship amounts from backend
    async function fetchSponsorshipAmounts() {
        try {
            const response = await fetch('{{ route("sponsor.amounts") }}');
            const data = await response.json();
            
            if (data.success && data.amounts) {
                prices = data.amounts;
                updateAllAmountDisplays();
            }
        } catch (error) {
            console.error('Error fetching sponsorship amounts:', error);
            // Use default amounts if fetch fails
        }
    }

    // Update all amount displays on the page
    function updateAllAmountDisplays() {
        // Update option texts in the modal
        const select = document.getElementById('sponsorTypeSelect');
        if (select) {
            select.options[0].text = '{{ __("Sponsor a Child") }} - $' + prices.child + '/{{ __("month") }}';
            select.options[1].text = '{{ __("Sponsor a Mother") }} - $' + prices.mother + '/{{ __("month") }}';
            select.options[2].text = '{{ __("Sponsor a Neighbourhood") }} - $' + prices.neighbourhood + '/{{ __("month") }}';
        }

        // Update total amount display
        const currentType = document.getElementById('sponsorshipType').value;
        document.getElementById('totalAmount').textContent = '$' + prices[currentType] + '/{{ __("month") }}';
    }

    // Tab switching
    function switchTab(tab) {
        // Update active tab button
        document.querySelectorAll('.sponsorship-tab').forEach(btn => {
            btn.classList.remove('active');
            if (btn.dataset.tab === tab) {
                btn.classList.add('active');
            }
        });
        
        // Show/hide content sections
        document.querySelectorAll('[id$="-content"]').forEach(section => {
            section.classList.add('hidden');
        });
        document.getElementById(tab + '-content').classList.remove('hidden');
        
        // Scroll to content
        document.getElementById(tab + '-content').scrollIntoView({ behavior: 'smooth' });
    }

    // Sponsor Modal
    function openSponsorModal(type, childName) {
        document.getElementById('sponsorModal').classList.remove('hidden');
        document.getElementById('sponsorModal').classList.add('flex');
        document.getElementById('sponsorTypeSelect').value = type;
        updateModalType(type);
        
        if (childName) {
            document.getElementById('modalTitle').textContent = '{{ __("Sponsor") }} ' + childName;
        }
        
        document.body.style.overflow = 'hidden';
    }

    function closeSponsorModal() {
        document.getElementById('sponsorModal').classList.add('hidden');
        document.getElementById('sponsorModal').classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    function updateModalType(type) {
        document.getElementById('modalTitle').textContent = titles[type];
        document.getElementById('sponsorshipType').value = type;
        document.getElementById('sponsorshipAmount').value = prices[type];
        document.getElementById('totalAmount').textContent = '$' + prices[type] + '/{{ __("month") }}';
    }

    // Story Modal
    function openStoryModal(element) {
        const name = element.getAttribute('data-name');
        const story = element.getAttribute('data-story');
        const image = element.getAttribute('data-image');
        const location = element.getAttribute('data-location');
        const birthday = element.getAttribute('data-birthday');
        
        // Set name (split first name and last name)
        document.getElementById('storyModalName').textContent = name;
        
        // Set image
        document.getElementById('storyModalImage').src = image;
        
        // Set location and birthday
        document.getElementById('storyModalLocation').textContent = location;
        document.getElementById('storyModalBirthday').textContent = birthday;
        
        // Set story content - split into paragraphs if there are line breaks
        const storyContent = document.getElementById('storyModalContent');
        const paragraphs = story.split('\n\n').filter(p => p.trim() !== '');
        storyContent.innerHTML = paragraphs.map(p => `<p>${p.trim()}</p>`).join('');
        
        // Show modal
        document.getElementById('storyModal').classList.remove('hidden');
        document.getElementById('storyModal').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeStoryModal() {
        document.getElementById('storyModal').classList.add('hidden');
        document.getElementById('storyModal').classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    // Close modals on escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeSponsorModal();
            closeStoryModal();
        }
    });

    // Close modals on outside click
    document.getElementById('sponsorModal').addEventListener('click', (e) => {
        if (e.target.id === 'sponsorModal') closeSponsorModal();
    });

    document.getElementById('storyModal').addEventListener('click', (e) => {
        if (e.target.id === 'storyModal') closeStoryModal();
    });

    // Fetch sponsorship amounts when page loads
    document.addEventListener('DOMContentLoaded', function() {
        fetchSponsorshipAmounts();
    });
</script>
@endpush
