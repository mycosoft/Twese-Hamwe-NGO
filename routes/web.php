<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SponsorChildController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('locale/{locale}', [HomeController::class, 'setLocale'])->name('locale.set');
Route::get('/what-we-do', [HomeController::class, 'programs'])->name('programs');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/donate', [HomeController::class, 'donate'])->name('donate');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/who-we-are', [HomeController::class, 'about'])->name('about');
Route::get('/sponsor', [HomeController::class, 'sponsor'])->name('sponsor');
Route::post('/sponsor', [HomeController::class, 'sponsorSubmit'])->name('sponsor.submit');
Route::get('/api/sponsorship-amounts', [HomeController::class, 'getSponsorshipAmounts'])->name('sponsor.amounts');
Route::get('/sponsor/payment', [HomeController::class, 'sponsorPayment'])->name('sponsor.payment');
Route::post('/sponsor/payment/process', [HomeController::class, 'processSponsorPayment'])->name('sponsor.payment.process');
Route::get('/sponsor/payment/success', [HomeController::class, 'sponsorPaymentSuccess'])->name('sponsor.payment.success');
Route::get('/stories', [HomeController::class, 'stories'])->name('stories');
Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [HomeController::class, 'blogShow'])->name('blog.show');
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/events/{slug}', [HomeController::class, 'eventShow'])->name('events.show');
Route::get('/projects', [HomeController::class, 'projects'])->name('projects');
Route::get('/projects/{slug}', [HomeController::class, 'projectShow'])->name('projects.show');

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Programs
    Route::resource('programs', ProgramController::class);

    // Events
    Route::resource('events', EventController::class);

    // Team Members
    Route::resource('team-members', TeamMemberController::class);

    // Projects
    Route::resource('projects', ProjectController::class);

    // Sponsor Children
    Route::resource('sponsor-children', SponsorChildController::class);

    // Blog Categories
    Route::resource('blog-categories', BlogCategoryController::class);

    // Blog Posts
    Route::resource('blog-posts', BlogPostController::class);

    // Donations
    Route::get('donations', [DonationController::class, 'index'])->name('donations.index');
    Route::get('donations/{donation}', [DonationController::class, 'show'])->name('donations.show');
    Route::patch('donations/{donation}/status', [DonationController::class, 'updateStatus'])->name('donations.update-status');
    Route::delete('donations/{donation}', [DonationController::class, 'destroy'])->name('donations.destroy');

    // Gallery
    Route::resource('gallery', GalleryController::class);
    Route::post('gallery/{gallery}/upload-images', [GalleryController::class, 'uploadImages'])->name('gallery.upload-images');
    Route::delete('gallery/images/{image}', [GalleryController::class, 'deleteImage'])->name('gallery.delete-image');

    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('settings/general', [SettingController::class, 'general'])->name('settings.general');
    Route::post('settings/general', [SettingController::class, 'updateGeneral'])->name('settings.general.update');
    Route::get('settings/social', [SettingController::class, 'social'])->name('settings.social');
    Route::post('settings/social', [SettingController::class, 'updateSocial'])->name('settings.social.update');

    // Users
    Route::resource('users', UserController::class);

    // Roles
    Route::resource('roles', RoleController::class);
});

require __DIR__.'/auth.php';
