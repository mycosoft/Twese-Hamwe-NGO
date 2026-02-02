<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Twese Hamwe Empowerment Project - Together We Rise. Empowering women and youth in Rwanda through skills training and community development.">
    <title>@yield('title', 'Twese Hamwe') - Together We Rise</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        },
                        accent: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            200: '#fed7aa',
                            300: '#fdba74',
                            400: '#fb923c',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                            800: '#9a3412',
                            900: '#7c2d12',
                        },
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Poppins', sans-serif; }
        
        /* Custom animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(34, 197, 94, 0.4); }
            50% { box-shadow: 0 0 40px rgba(34, 197, 94, 0.8); }
        }
        
        .animate-fade-in-up { animation: fadeInUp 0.6s ease-out forwards; }
        .animate-fade-in-down { animation: fadeInDown 0.6s ease-out forwards; }
        .animate-slide-in-left { animation: slideInLeft 0.6s ease-out forwards; }
        .animate-slide-in-right { animation: slideInRight 0.6s ease-out forwards; }
        .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
        
        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #16a34a 0%, #22c55e 50%, #f97316 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Hero overlay */
        .hero-overlay {
            background: linear-gradient(135deg, rgba(22, 163, 74, 0.15) 0%, rgba(21, 128, 61, 0.2) 100%);
        }
        
        /* Card hover effects */
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        /* Button hover effect */
        .btn-primary {
            background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #15803d 0%, #16a34a 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(22, 163, 74, 0.3);
        }
        
        .btn-accent {
            background: linear-gradient(135deg, #ea580c 0%, #f97316 100%);
            transition: all 0.3s ease;
        }
        .btn-accent:hover {
            background: linear-gradient(135deg, #c2410c 0%, #ea580c 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(249, 115, 22, 0.3);
        }
        
        /* Navigation styles */
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #22c55e, #f97316);
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        
        /* Progress bar */
        .progress-bar {
            background: linear-gradient(90deg, #22c55e 0%, #f97316 100%);
        }
        
        /* Section divider */
        .section-divider {
            height: 4px;
            background: linear-gradient(90deg, #22c55e, #f97316, #22c55e);
            border-radius: 2px;
        }

        /* Mobile menu */
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        .mobile-menu.active {
            transform: translateX(0);
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('TWESE HAMWE/logo.jpeg') }}" alt="Twese Hamwe" class="h-12 w-12 rounded-full object-cover">
                    <div>
                        <span class="text-xl font-bold text-primary-700">Twese Hamwe</span>
                        <p class="text-xs text-gray-500">Together We Rise</p>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-6">
                    <!-- Who We Are Dropdown -->
                    <div class="relative group">
                        <button class="nav-link text-gray-700 hover:text-primary-600 font-medium flex items-center {{ request()->routeIs('about') || request()->routeIs('team') || request()->routeIs('stories') ? 'text-primary-600' : '' }}">
                            {{ __('Who We Are') }} <i class="fas fa-chevron-down text-xs ml-1"></i>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="{{ route('about') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">{{ __('About Us') }}</a>
                            <a href="{{ route('team') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">{{ __('Our Team') }}</a>
                            <a href="{{ route('stories') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">{{ __('Stories of Impact') }}</a>
                        </div>
                    </div>
                    
                    <!-- What We Do Dropdown -->
                    <div class="relative group">
                        <button class="nav-link text-gray-700 hover:text-primary-600 font-medium flex items-center {{ request()->routeIs('programs') || request()->routeIs('projects') || request()->routeIs('projects.show') ? 'text-primary-600' : '' }}">
                            {{ __('What We Do') }} <i class="fas fa-chevron-down text-xs ml-1"></i>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="{{ route('programs') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">{{ __('Our Programs') }}</a>
                            <a href="{{ route('projects') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">{{ __('Our Projects') }}</a>
                        </div>
                    </div>
                    
                    <!-- Sponsor Dropdown -->
                    <div class="relative group">
                        <button class="nav-link text-gray-700 hover:text-primary-600 font-medium flex items-center {{ request()->routeIs('sponsor') ? 'text-primary-600' : '' }}">
                            {{ __('Sponsor') }} <i class="fas fa-chevron-down text-xs ml-1"></i>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="{{ route('sponsor') }}#child" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">{{ __('Sponsor a Child') }}</a>
                            <a href="{{ route('sponsor') }}#mother" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">{{ __('Sponsor a Mother') }}</a>
                        </div>
                    </div>
                    
                    <!-- Media Dropdown -->
                    <div class="relative group">
                        <button class="nav-link text-gray-700 hover:text-primary-600 font-medium flex items-center {{ request()->routeIs('blog') || request()->routeIs('blog.show') || request()->routeIs('gallery') || request()->routeIs('events') || request()->routeIs('events.show') ? 'text-primary-600' : '' }}">
                            {{ __('Media') }} <i class="fas fa-chevron-down text-xs ml-1"></i>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="{{ route('blog') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">{{ __('Blog') }}</a>
                            <a href="{{ route('gallery') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">{{ __('Gallery') }}</a>
                            <a href="{{ route('events') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">{{ __('Events') }}</a>
                        </div>
                    </div>
                    
                    <a href="{{ route('contact') }}" class="nav-link text-gray-700 hover:text-primary-600 font-medium {{ request()->routeIs('contact') ? 'text-primary-600' : '' }}">{{ __('Contact') }}</a>
                </div>

                <!-- Social Icons, Language Switcher & Donate -->
                <div class="hidden lg:flex items-center space-x-4">
                    <!-- Social Icons -->
                    <div class="flex items-center space-x-2">
                        <a href="#" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-primary-600 hover:text-white transition">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-primary-600 hover:text-white transition">
                            <i class="fab fa-twitter text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-primary-600 hover:text-white transition">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                    </div>

                    <div class="w-px h-6 bg-gray-300"></div>

                    <!-- Language Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button onclick="toggleLangDropdown()" class="flex items-center space-x-1 text-gray-600 hover:text-primary-600 transition">
                            <i class="fas fa-globe"></i>
                            <span class="text-sm font-medium">
                                @if(app()->getLocale() == 'fr') FR
                                @elseif(app()->getLocale() == 'sw') SW
                                @else EN
                                @endif
                            </span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div id="langDropdown" class="hidden absolute right-0 mt-2 w-32 bg-white rounded-lg shadow-lg py-2 z-50">
                            <a href="{{ url('locale/en') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">
                                <span class="mr-2">🇬🇧</span> English
                            </a>
                            <a href="{{ url('locale/fr') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">
                                <span class="mr-2">🇫🇷</span> Français
                            </a>
                            <a href="{{ url('locale/sw') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">
                                <span class="mr-2">🇰🇪</span> Kiswahili
                            </a>
                        </div>
                    </div>
                    
                    <a href="{{ route('donate') }}" class="btn-accent text-white px-6 py-2 rounded-full font-semibold">
                        <i class="fas fa-heart mr-2"></i>{{ __('Donate') }}
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="lg:hidden text-gray-700 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="mobile-menu fixed inset-0 bg-white z-50 lg:hidden">
            <div class="p-4">
                <div class="flex justify-between items-center mb-8">
                    <a href="{{ url('/') }}" class="flex items-center space-x-3">
                        <img src="{{ asset('TWESE HAMWE/logo.jpeg') }}" alt="Twese Hamwe" class="h-10 w-10 rounded-full object-cover">
                        <span class="text-lg font-bold text-primary-700">Twese Hamwe</span>
                    </a>
                    <button onclick="toggleMobileMenu()" class="text-gray-700">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
                <div class="flex flex-col space-y-4">
                    <!-- Who We Are Section -->
                    <div class="border-b pb-2">
                        <p class="text-gray-500 text-sm uppercase mb-2">{{ __('Who We Are') }}</p>
                        <a href="{{ route('about') }}" onclick="toggleMobileMenu()" class="block text-gray-700 hover:text-primary-600 font-medium py-1 pl-4">{{ __('About Us') }}</a>
                        <a href="{{ route('team') }}" onclick="toggleMobileMenu()" class="block text-gray-700 hover:text-primary-600 font-medium py-1 pl-4">{{ __('Our Team') }}</a>
                        <a href="{{ route('stories') }}" onclick="toggleMobileMenu()" class="block text-gray-700 hover:text-primary-600 font-medium py-1 pl-4">{{ __('Stories of Impact') }}</a>
                    </div>
                    
                    <!-- What We Do Section -->
                    <div class="border-b pb-2">
                        <p class="text-gray-500 text-sm uppercase mb-2">{{ __('What We Do') }}</p>
                        <a href="{{ route('programs') }}" onclick="toggleMobileMenu()" class="block text-gray-700 hover:text-primary-600 font-medium py-1 pl-4">{{ __('Our Programs') }}</a>
                        <a href="{{ route('projects') }}" onclick="toggleMobileMenu()" class="block text-gray-700 hover:text-primary-600 font-medium py-1 pl-4">{{ __('Our Projects') }}</a>
                    </div>
                    
                    <!-- Sponsor Section -->
                    <div class="border-b pb-2">
                        <p class="text-gray-500 text-sm uppercase mb-2">{{ __('Sponsor') }}</p>
                        <a href="{{ route('sponsor') }}#child" onclick="toggleMobileMenu()" class="block text-gray-700 hover:text-primary-600 font-medium py-1 pl-4">{{ __('Sponsor a Child') }}</a>
                        <a href="{{ route('sponsor') }}#mother" onclick="toggleMobileMenu()" class="block text-gray-700 hover:text-primary-600 font-medium py-1 pl-4">{{ __('Sponsor a Mother') }}</a>
                    </div>
                    
                    <!-- Media Section -->
                    <div class="border-b pb-2">
                        <p class="text-gray-500 text-sm uppercase mb-2">{{ __('Media') }}</p>
                        <a href="{{ route('blog') }}" onclick="toggleMobileMenu()" class="block text-gray-700 hover:text-primary-600 font-medium py-1 pl-4">{{ __('Blog') }}</a>
                        <a href="{{ route('gallery') }}" onclick="toggleMobileMenu()" class="block text-gray-700 hover:text-primary-600 font-medium py-1 pl-4">{{ __('Gallery') }}</a>
                        <a href="{{ route('events') }}" onclick="toggleMobileMenu()" class="block text-gray-700 hover:text-primary-600 font-medium py-1 pl-4">{{ __('Events') }}</a>
                    </div>
                    
                    <a href="{{ route('contact') }}" onclick="toggleMobileMenu()" class="text-gray-700 hover:text-primary-600 font-medium py-2 border-b">{{ __('Contact') }}</a>
                    
                    <!-- Language Switcher Mobile -->
                    <div class="flex items-center space-x-4 py-4">
                        <span class="text-gray-500">{{ __('Language') }}:</span>
                        <a href="{{ url('locale/en') }}" class="px-3 py-1 rounded {{ app()->getLocale() == 'en' ? 'bg-primary-600 text-white' : 'bg-gray-200' }}">EN</a>
                        <a href="{{ url('locale/fr') }}" class="px-3 py-1 rounded {{ app()->getLocale() == 'fr' ? 'bg-primary-600 text-white' : 'bg-gray-200' }}">FR</a>
                        <a href="{{ url('locale/sw') }}" class="px-3 py-1 rounded {{ app()->getLocale() == 'sw' ? 'bg-primary-600 text-white' : 'bg-gray-200' }}">SW</a>
                    </div>
                    
                    <a href="{{ route('donate') }}" onclick="toggleMobileMenu()" class="btn-accent text-white px-6 py-3 rounded-full font-semibold text-center mt-4">
                        <i class="fas fa-heart mr-2"></i>{{ __('Donate Now') }}
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <!-- Main Footer Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- About - Wider Column -->
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-3 mb-2">
                        <img src="{{ asset('TWESE HAMWE/logo.jpeg') }}" alt="Twese Hamwe" class="h-12 w-12 rounded-full object-cover">
                        <div>
                            <span class="text-xl font-bold">Twese Hamwe</span>
                            <p class="text-primary-400 text-sm">Together We Rise</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm mb-6 leading-relaxed">
                        Twese Hamwe is a community empowerment project dedicated to transforming lives in Rwanda. We provide vocational training, child-friendly spaces, and sustainable income opportunities for women and youth.
                    </p>
                    <div class="flex space-x-3">
                        <a href="#" class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-sky-500 rounded-full flex items-center justify-center hover:bg-sky-600 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-pink-600 rounded-full flex items-center justify-center hover:bg-pink-700 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-700 rounded-full flex items-center justify-center hover:bg-blue-800 transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-bold mb-6">{{ __('Quick Links') }}</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="{{ route('about') }}" class="hover:text-primary-400 transition flex items-center"><i class="fas fa-chevron-right mr-2 text-xs text-primary-500"></i>{{ __('Who We Are') }}</a></li>
                        <li><a href="{{ route('programs') }}" class="hover:text-primary-400 transition flex items-center"><i class="fas fa-chevron-right mr-2 text-xs text-primary-500"></i>{{ __('Programs') }}</a></li>
                        <li><a href="{{ route('gallery') }}" class="hover:text-primary-400 transition flex items-center"><i class="fas fa-chevron-right mr-2 text-xs text-primary-500"></i>{{ __('Gallery') }}</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-primary-400 transition flex items-center"><i class="fas fa-chevron-right mr-2 text-xs text-primary-500"></i>{{ __('Contact Us') }}</a></li>
                        <li><a href="{{ route('donate') }}" class="hover:text-primary-400 transition flex items-center"><i class="fas fa-chevron-right mr-2 text-xs text-primary-500"></i>{{ __('Donate') }}</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-bold mb-6">{{ __('Contact Info') }}</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-primary-500"></i>
                            <span>Kigali, Rwanda<br>P.O. Box 0000</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-primary-500"></i>
                            <span>info@twesehamwe.org</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone mr-3 text-primary-500 mt-1"></i>
                            <span>+250 788 000 000<br>+250 788 000 001</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-globe mr-3 text-primary-500"></i>
                            <span>https://twesehamwe.org</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Newsletter Section -->
        <div class="border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <div>
                        <h4 class="text-lg font-bold mb-1">{{ __('Stay Updated') }}</h4>
                        <p class="text-gray-400 text-sm">{{ __('Subscribe to our newsletter for updates on our programs and impact.') }}</p>
                    </div>
                    <div class="flex w-full md:w-auto">
                        <input type="email" placeholder="{{ __('Enter your email') }}" class="flex-1 md:w-72 px-4 py-3 rounded-l-full bg-gray-800 border border-gray-700 text-white placeholder-gray-500 focus:outline-none focus:border-primary-500">
                        <button class="bg-primary-600 text-white px-6 py-3 rounded-r-full font-semibold hover:bg-primary-700 transition">
                            {{ __('Subscribe') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} Twese Hamwe. {{ __('All rights reserved.') }}</p>
                    <p class="text-gray-500 text-sm">
                        {{ __('Powered By') }} <a href="https://www.mycosofttechnologies.com" target="_blank" class="text-primary-400 hover:text-primary-300 transition">Mycosoft Technologies</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" onclick="scrollToTop()" class="fixed bottom-6 right-6 w-12 h-12 bg-primary-600 text-white rounded-full shadow-lg hidden hover:bg-primary-700 transition z-40">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });

        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('active');
        }

        // Language dropdown toggle
        function toggleLangDropdown() {
            const dropdown = document.getElementById('langDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('langDropdown');
            if (!e.target.closest('.relative') && dropdown) {
                dropdown.classList.add('hidden');
            }
        });

        // Back to top button
        window.addEventListener('scroll', function() {
            const backToTop = document.getElementById('backToTop');
            if (window.scrollY > 300) {
                backToTop.classList.remove('hidden');
            } else {
                backToTop.classList.add('hidden');
            }
        });

        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-xl');
            } else {
                navbar.classList.remove('shadow-xl');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
