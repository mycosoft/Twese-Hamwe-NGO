<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Event;
use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use App\Models\Program;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedTeamMembers();
        $this->seedPrograms();
        $this->seedProjects();
        $this->seedEvents();
        $this->seedBlogCategories();
        $this->seedBlogPosts();
        $this->seedGallery();
    }

    private function seedTeamMembers(): void
    {
        $teamMembers = [
            [
                'name' => 'Clark Rubuye Bwira',
                'position' => 'Chairperson',
                'bio' => 'Leading the Twese Hamwe Empowerment Project with dedication to community development and women empowerment in Rwanda.',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Mack Mupita Henry',
                'position' => 'Vice Chairperson',
                'bio' => 'Supporting project leadership and strategic initiatives for sustainable community impact.',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Umutoni Vanessa',
                'position' => 'Secretary',
                'bio' => 'Managing administrative functions and ensuring effective communication within the organization.',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Uwumukiza Josephine Kamanzi',
                'position' => 'Treasurer',
                'bio' => 'Overseeing financial management and ensuring transparent resource allocation for project activities.',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Ssenjobe Michael',
                'position' => 'Communication Officer',
                'bio' => 'Leading outreach efforts and building partnerships to amplify the project\'s impact and visibility.',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'name' => 'Mutamuriza Farida',
                'position' => 'Member',
                'bio' => 'Contributing to project activities and community engagement initiatives.',
                'is_active' => true,
                'order' => 6,
            ],
        ];

        foreach ($teamMembers as $member) {
            TeamMember::firstOrCreate(
                ['name' => $member['name']],
                $member
            );
        }
    }

    private function seedPrograms(): void
    {
        $programs = [
            [
                'title' => 'Espace Amis pour Enfants',
                'slug' => 'espace-amis-pour-enfants',
                'short_description' => 'A safe, supervised, and child-friendly space for children of women participants during training hours.',
                'description' => "The Espace Amis pour Enfants is a safe, supervised, and child-friendly space integrated within the Twese Hamwe Empowerment Project. It provides temporary care, protection, and early learning activities for children of women participants while their mothers engage in skills training and production activities.\n\n**Rationale**\nMany women in the community, especially single mothers and primary caregivers, face barriers to participating in vocational training due to childcare responsibilities. Without a safe space for their children, attendance and concentration are significantly reduced.\n\n**Key Activities**\n- Structured play and games\n- Drawing, coloring, and creative activities\n- Storytelling and songs\n- Basic learning (numbers, letters, shapes)\n- Hygiene routines and rest time\n\n**Safety & Child Protection Measures**\n- Supervision by trained caregivers or community volunteers\n- Clear child protection guidelines\n- Clean, well-ventilated environment\n- Physical separation from tools and machinery\n- Daily attendance and monitoring records\n\n**Target Group**\n- Children of women participating in the Twese Hamwe Empowerment Project\n- Age group: 3-12 years\n- Priority given to children of single mothers and vulnerable households",
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Vocational Skills Training',
                'slug' => 'vocational-skills-training',
                'short_description' => 'Hands-on training in sewing and hand-weaving for women and youth to develop marketable skills.',
                'description' => "The Vocational Skills Training program provides comprehensive hands-on training in sewing and hand-weaving for women and youth in Rwanda. This program empowers participants with practical skills that enable them to create products and generate sustainable income.\n\n**Objectives**\n- Provide quality vocational training to women and youth\n- Develop marketable skills in textile production\n- Enable participants to move from learning to earning\n- Build confidence and self-reliance\n\n**Training Components**\n- Basic and advanced sewing techniques\n- Hand-weaving on traditional looms\n- Product design and quality control\n- Basic business and entrepreneurship skills\n\n**Expected Outcomes**\n- Participants gain practical production skills\n- Increased employment and self-employment opportunities\n- Women and youth begin earning income and supporting their families",
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Community Production Center',
                'slug' => 'community-production-center',
                'short_description' => 'A fully-equipped skills and production center where trained women and youth create products for income.',
                'description' => "The Community Production Center is the culmination of our empowerment journey - a space where trained women and youth can apply their skills to create quality products for sale, generating sustainable income for themselves and their families.\n\n**Vision**\nTo transform a small room into a working skills center where participants stop watching and start creating with their own hands.\n\n**Center Features**\n- Sewing machines and hand-weaving looms\n- Work tables, storage, and proper lighting\n- Production materials and supplies\n- Basic branding and packaging facilities\n\n**Impact**\n- Women and youth transition from training to production\n- Participants earn income and support their families\n- Community gains access to locally-made quality products\n- Sustainable model that continues beyond initial funding",
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Women Empowerment Initiative',
                'slug' => 'women-empowerment-initiative',
                'short_description' => 'Comprehensive support for women including skills training, childcare support, and economic empowerment.',
                'description' => "The Women Empowerment Initiative is a comprehensive program designed to address the multiple barriers women face in achieving economic independence. By integrating vocational training with childcare support, we ensure that women, especially single mothers and primary caregivers, can fully participate in empowerment activities.\n\n**Program Components**\n- Vocational skills training (sewing, weaving)\n- Childcare support through Espace Amis pour Enfants\n- Economic empowerment through production opportunities\n- Community support network\n\n**Gender-Responsive Approach**\nThis initiative demonstrates gender-responsive programming by recognizing and addressing the unique challenges women face, including childcare responsibilities that often prevent their participation in training programs.\n\n**Expected Results**\n- Increased participation and retention of women trainees\n- Reduced stress and distraction for mothers\n- Stronger community trust and project acceptance\n- Sustainable income generation for women-headed households",
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($programs as $program) {
            Program::firstOrCreate(
                ['slug' => $program['slug']],
                $program
            );
        }
    }

    private function seedProjects(): void
    {
        // Get the Community Production Center program for the fundraising project
        $productionProgram = Program::where('slug', 'community-production-center')->first();
        $skillsProgram = Program::where('slug', 'vocational-skills-training')->first();

        if ($productionProgram) {
            Project::firstOrCreate(
                ['slug' => 'community-skills-production-center-fundraising'],
                [
                    'program_id' => $productionProgram->id,
                    'title' => 'Community Skills & Production Center Fundraising',
                    'slug' => 'community-skills-production-center-fundraising',
                    'short_description' => 'Raising USD 10,000 to launch a community skills and production center for women and youth in Rwanda.',
                    'description' => "**Our Fundraising Goal & Targets**\n\nOur goal is to raise USD 10,000 to launch a community skills and production center for women and youth in Rwanda. Every amount moves us closer - and every milestone unlocks real change.\n\n**First Goal: USD 2,000 - Open the Door**\nThis allows us to start:\n- Buy fabric, thread, and yarn\n- Provide basic tools and safety materials\n- Begin the first training sessions\nWomen and youth touch a sewing machine or loom for the first time.\n\n**Second Goal: USD 4,000 - Skills Become Real**\n- Purchase sewing machines\n- Add a hand-weaving loom\n- Expand hands-on training\nParticipants stop watching and start creating with their own hands.\n\n**Third Goal: USD 7,000 - A Real Workshop**\n- Add more machines and looms\n- Work tables, storage, and lighting\nA small room becomes a working skills center.\n\n**Final Goal: USD 10,000 - From Learning to Earning**\n- Production materials\n- Basic branding and packaging\n- Project visibility and reporting\nWomen and youth begin earning income and supporting their families.\n\n**Why Your Support Matters**\n\nThis is not charity. This is a chance to give someone skills, dignity, and a future. Even a small donation helps someone move from waiting for help to creating their own opportunity.\n\nTogether - Twese Hamwe - we rise.",
                    'location' => 'Rwanda',
                    'start_date' => now(),
                    'end_date' => now()->addYear(),
                    'budget' => 10000.00,
                    'raised_amount' => 0.00,
                    'status' => 'ongoing',
                    'is_active' => true,
                    'is_featured' => true,
                ]
            );
        }

        // Child-friendly space project under Espace Amis program
        $espaceProgram = Program::where('slug', 'espace-amis-pour-enfants')->first();
        
        if ($espaceProgram) {
            Project::firstOrCreate(
                ['slug' => 'child-friendly-space-setup'],
                [
                    'program_id' => $espaceProgram->id,
                    'title' => 'Child-Friendly Space Setup',
                    'slug' => 'child-friendly-space-setup',
                    'short_description' => 'Creating a safe and nurturing environment for children aged 3-12 while their mothers attend training.',
                    'description' => "**Project Overview**\n\nThis project aims to establish a child-friendly space that provides:\n- Safe and supervised care for children aged 3-12 years\n- Structured play and early learning activities\n- Support for mothers to fully participate in training\n\n**Key Features**\n- Trained caregivers and community volunteers\n- Age-appropriate educational materials\n- Clean, well-ventilated environment\n- Child protection measures and daily monitoring\n\n**Expected Impact**\n- Enable women's full participation in training\n- Promote children's wellbeing through structured activities\n- Strengthen gender inclusion and child protection\n- Increase project completion rates",
                    'location' => 'Rwanda',
                    'start_date' => now(),
                    'end_date' => now()->addMonths(6),
                    'budget' => 2000.00,
                    'raised_amount' => 0.00,
                    'status' => 'ongoing',
                    'is_active' => true,
                    'is_featured' => false,
                ]
            );
        }
    }

    private function seedEvents(): void
    {
        $events = [
            [
                'title' => 'Sewing Skills Training Launch',
                'slug' => 'sewing-skills-training-launch',
                'short_description' => 'Join us for the official launch of our sewing skills training program for women and youth.',
                'description' => "We are excited to announce the launch of our sewing skills training program. This event marks the beginning of a new chapter for women and youth in our community who will learn valuable skills to support their families.\n\nThe event will include:\n- Introduction to the training curriculum\n- Meet the trainers\n- Registration for participants\n- Light refreshments",
                'location' => 'Twese Hamwe Community Center, Rwanda',
                'start_date' => now()->addDays(14),
                'end_date' => now()->addDays(14)->addHours(4),
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Community Fundraising Gala',
                'slug' => 'community-fundraising-gala',
                'short_description' => 'An evening of celebration and fundraising to support our skills training programs.',
                'description' => "Join us for an inspiring evening as we come together to raise funds for our community skills and production center. The gala will feature:\n\n- Presentations from program beneficiaries\n- Display of handmade products\n- Live entertainment\n- Silent auction\n- Networking opportunities\n\nAll proceeds go directly to purchasing sewing machines and weaving looms for our training center.",
                'location' => 'Kigali Convention Center, Rwanda',
                'start_date' => now()->addMonth(),
                'end_date' => now()->addMonth()->addHours(5),
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Espace Amis pour Enfants Open Day',
                'slug' => 'espace-amis-open-day',
                'short_description' => 'Visit our child-friendly space and see how we support mothers during training.',
                'description' => "We invite the community to visit our Espace Amis pour Enfants - a safe space where children are cared for while their mothers attend vocational training.\n\nDuring the open day:\n- Tour the child-friendly facilities\n- Meet our caregivers\n- See children's activities and learning materials\n- Learn about our child protection measures\n- Discover how you can support this initiative",
                'location' => 'Twese Hamwe Training Center, Rwanda',
                'start_date' => now()->addDays(21),
                'end_date' => now()->addDays(21)->addHours(3),
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($events as $event) {
            Event::firstOrCreate(
                ['slug' => $event['slug']],
                $event
            );
        }
    }

    private function seedBlogCategories(): void
    {
        $categories = [
            ['name' => 'News', 'slug' => 'news', 'description' => 'Latest news and updates from Twese Hamwe', 'is_active' => true],
            ['name' => 'Stories', 'slug' => 'stories', 'description' => 'Impact stories from our beneficiaries', 'is_active' => true],
            ['name' => 'Programs', 'slug' => 'programs', 'description' => 'Updates about our programs and initiatives', 'is_active' => true],
        ];

        foreach ($categories as $category) {
            BlogCategory::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }

    private function seedBlogPosts(): void
    {
        $admin = User::where('email', 'admin@twesehamwe.org')->first();
        $newsCategory = BlogCategory::where('slug', 'news')->first();
        $storiesCategory = BlogCategory::where('slug', 'stories')->first();
        $programsCategory = BlogCategory::where('slug', 'programs')->first();

        if (!$admin) return;

        $posts = [
            [
                'user_id' => $admin->id,
                'blog_category_id' => $newsCategory?->id,
                'title' => 'Twese Hamwe Launches Community Empowerment Project',
                'slug' => 'twese-hamwe-launches-community-empowerment-project',
                'excerpt' => 'We are thrilled to announce the official launch of our community skills and production center initiative.',
                'content' => "Today marks a significant milestone for Twese Hamwe as we officially launch our Community Empowerment Project. This initiative aims to provide vocational training in sewing and hand-weaving to women and youth in Rwanda.\n\nOur goal is to raise USD 10,000 to establish a fully-equipped skills center where participants can learn, create, and eventually earn sustainable income for their families.\n\nWe believe that empowerment comes through skills, dignity, and opportunity. Together - Twese Hamwe - we rise.",
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now()->subDays(5),
                'views' => 124,
            ],
            [
                'user_id' => $admin->id,
                'blog_category_id' => $storiesCategory?->id,
                'title' => 'From Struggle to Strength: Marie\'s Journey',
                'slug' => 'from-struggle-to-strength-maries-journey',
                'excerpt' => 'Meet Marie, a single mother who transformed her life through our vocational training program.',
                'content' => "Marie is a single mother of three who joined our sewing training program six months ago. Before joining, she struggled to provide for her children and often worried about their future.\n\nThrough dedication and hard work, Marie has now mastered basic sewing skills and is creating beautiful products. She recently sold her first batch of handmade bags at a local market.\n\n\"Twese Hamwe gave me more than skills,\" Marie says. \"They gave me hope and a way to support my children with dignity.\"\n\nMarie's story is just one example of the transformation happening in our community. With your support, we can help more women like Marie build a better future.",
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now()->subDays(3),
                'views' => 89,
            ],
            [
                'user_id' => $admin->id,
                'blog_category_id' => $programsCategory?->id,
                'title' => 'Introducing Espace Amis pour Enfants',
                'slug' => 'introducing-espace-amis-pour-enfants',
                'excerpt' => 'A child-friendly space that enables mothers to participate fully in vocational training.',
                'content' => "We are proud to introduce Espace Amis pour Enfants - a safe, supervised space for children of women participating in our training programs.\n\nMany women in our community face a difficult choice: attend training to build skills, or stay home to care for their children. Our child-friendly space eliminates this barrier.\n\nChildren aged 3-12 can enjoy structured play, creative activities, storytelling, and basic learning while their mothers focus on training. All activities are supervised by trained caregivers following strict child protection guidelines.\n\nThis initiative demonstrates our commitment to gender-responsive programming that addresses real barriers to women's participation.",
                'is_published' => true,
                'is_featured' => false,
                'published_at' => now()->subDays(7),
                'views' => 67,
            ],
            [
                'user_id' => $admin->id,
                'blog_category_id' => $newsCategory?->id,
                'title' => 'First Fundraising Milestone Reached',
                'slug' => 'first-fundraising-milestone-reached',
                'excerpt' => 'Thanks to generous donors, we have reached our first USD 2,000 goal.',
                'content' => "We are overjoyed to announce that we have reached our first fundraising milestone of USD 2,000!\n\nThis achievement means we can now:\n- Purchase fabric, thread, and yarn\n- Provide basic tools and safety materials\n- Begin our first training sessions\n\nFor the first time, women and youth in our community will touch a sewing machine and begin learning skills that will change their lives.\n\nThank you to everyone who contributed. Your generosity is already making a difference. We are now working toward our second goal of USD 4,000 to purchase sewing machines and a hand-weaving loom.\n\nTogether, we are turning dreams into reality.",
                'is_published' => true,
                'is_featured' => false,
                'published_at' => now()->subDay(),
                'views' => 156,
            ],
            [
                'user_id' => $admin->id,
                'blog_category_id' => $storiesCategory?->id,
                'title' => 'Building Community Through Craftsmanship',
                'slug' => 'building-community-through-craftsmanship',
                'excerpt' => 'How traditional weaving is bringing women together and preserving cultural heritage.',
                'content' => "In Rwanda, hand-weaving is more than a skill - it is a cultural tradition passed down through generations. At Twese Hamwe, we are preserving this heritage while creating economic opportunities.\n\nOur weaving program brings women together around traditional looms where they learn patterns and techniques from experienced artisans. But something magical happens in these sessions: friendships form, stories are shared, and a supportive community emerges.\n\n\"When we weave together, we share our burdens,\" explains one participant. \"We laugh, we encourage each other, and we celebrate every small success.\"\n\nThe products created - baskets, mats, and decorative items - carry not just skilled craftsmanship but the spirit of community and resilience.\n\nThis is the heart of Twese Hamwe: together, we are stronger.",
                'is_published' => true,
                'is_featured' => false,
                'published_at' => now()->subDays(2),
                'views' => 78,
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::firstOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }

    private function seedGallery(): void
    {
        // Get all images from the TWESE HAMWE folder (excluding logo)
        $imagesPath = public_path('TWESE HAMWE');
        $allImages = [];
        
        if (is_dir($imagesPath)) {
            $files = scandir($imagesPath);
            foreach ($files as $file) {
                if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $file) && $file !== 'logo.jpeg') {
                    $allImages[] = 'TWESE HAMWE/' . $file;
                }
            }
        }
        
        // Distribute images across albums
        $imageCount = count($allImages);
        $imagesPerAlbum = $imageCount > 0 ? ceil($imageCount / 3) : 5;
        
        $albums = [
            [
                'title' => 'Training Sessions',
                'slug' => 'training-sessions',
                'description' => 'Photos from our vocational skills training sessions',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Community Events',
                'slug' => 'community-events',
                'description' => 'Highlights from our community gatherings and events',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Espace Amis pour Enfants',
                'slug' => 'espace-amis-pour-enfants',
                'description' => 'Our child-friendly space in action',
                'is_active' => true,
                'order' => 3,
            ],
        ];

        $imageIndex = 0;
        foreach ($albums as $index => $albumData) {
            $album = GalleryAlbum::firstOrCreate(
                ['slug' => $albumData['slug']],
                $albumData
            );

            // Assign images to this album
            $albumImages = array_slice($allImages, $imageIndex, $imagesPerAlbum);
            $imageIndex += $imagesPerAlbum;
            
            $order = 1;
            foreach ($albumImages as $imagePath) {
                GalleryImage::firstOrCreate(
                    ['gallery_album_id' => $album->id, 'image' => $imagePath],
                    [
                        'gallery_album_id' => $album->id,
                        'title' => $album->title . ' Photo ' . $order,
                        'image' => $imagePath,
                        'caption' => $album->description,
                        'order' => $order,
                    ]
                );
                $order++;
            }
        }
    }
}
