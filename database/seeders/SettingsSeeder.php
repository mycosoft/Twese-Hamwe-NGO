<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General settings
            ['key' => 'site_name', 'value' => 'Twese Hamwe', 'group' => 'general', 'type' => 'text'],
            ['key' => 'site_tagline', 'value' => 'Together We Can Make a Difference', 'group' => 'general', 'type' => 'text'],
            ['key' => 'site_email', 'value' => 'info@twesehamwe.org', 'group' => 'general', 'type' => 'text'],
            ['key' => 'site_phone', 'value' => '+250 788 000 000', 'group' => 'general', 'type' => 'text'],
            ['key' => 'site_address', 'value' => 'Kigali, Rwanda', 'group' => 'general', 'type' => 'textarea'],

            // Social media settings
            ['key' => 'facebook_url', 'value' => '', 'group' => 'social', 'type' => 'url'],
            ['key' => 'twitter_url', 'value' => '', 'group' => 'social', 'type' => 'url'],
            ['key' => 'instagram_url', 'value' => '', 'group' => 'social', 'type' => 'url'],
            ['key' => 'linkedin_url', 'value' => '', 'group' => 'social', 'type' => 'url'],
            ['key' => 'youtube_url', 'value' => '', 'group' => 'social', 'type' => 'url'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
