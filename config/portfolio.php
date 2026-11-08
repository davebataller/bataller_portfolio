<?php

/*
|--------------------------------------------------------------------------
| Portfolio content
|--------------------------------------------------------------------------
|
| Every piece of text shown on the website lives here. Update this file to
| change the portfolio without touching any Blade template.
|
*/

return [

    'name' => 'Janray Dave T. Bataller',
    'first_name' => 'Janray',
    'initials' => 'JB',
    'role' => 'BS Information Technology Student',
    'tagline' => 'I build clean, practical web experiences.',
    'availability' => 'Open to internships and opportunities',
    'location' => 'Bangued, Abra, Philippines',

    'email' => 'davebataller20@gmail.com',
    'phone' => '09XX XXX XXXX',
    // Set this to a real number (for example '09171234567') to turn the phone
    // text into a tap-to-call link. Leave null while the number is a placeholder.
    'phone_link' => null,

    'school' => 'Data Center College of Bangued – Abra',
    'school_short' => 'DCC Bangued',
    'course' => 'Bachelor of Science in Information Technology',
    'year_level' => '4th Year',

    'bio' => [
        'I am a fourth-year Bachelor of Science in Information Technology student at Data Center College of Bangued – Abra. I enjoy turning ideas into clean, responsive websites and learning how thoughtful design makes technology easier to use.',
        'Most of my time is spent practicing web development with Laravel, PHP, and modern CSS. I care about readable code, simple interfaces, and building projects that solve real problems for real people.',
        'Right now I am preparing my capstone project and growing my portfolio one project at a time. I am always open to learning from others, collaborating, and taking on new challenges.',
    ],

    'stats' => [
        ['value' => '4th', 'label' => 'Year level'],
        ['value' => '3', 'label' => 'Education milestones'],
        ['value' => '1', 'label' => 'Public repository'],
        ['value' => '8+', 'label' => 'Tools & technologies'],
    ],

    'skills' => [
        'Frontend' => ['HTML5', 'CSS3', 'JavaScript', 'Tailwind CSS', 'Blade'],
        'Backend' => ['PHP', 'Laravel', 'MySQL'],
        'Tools' => ['Git', 'GitHub', 'VS Code', 'Figma'],
    ],

    'education' => [
        [
            'level' => 'College',
            'school' => 'Data Center College of Bangued – Abra',
            'program' => 'Bachelor of Science in Information Technology',
            'year' => 'Present',
            'status' => 'In progress',
            'current' => true,
            'description' => 'Currently in my fourth year, focusing on web development, databases, and systems analysis while preparing for my capstone project.',
        ],
        [
            'level' => 'Secondary',
            'school' => 'Little Flower High School',
            'program' => 'Junior and Senior High School',
            'year' => '2020',
            'status' => 'Graduated',
            'current' => false,
            'description' => 'Completed junior and senior high school, where I first became interested in computers and technology.',
        ],
        [
            'level' => 'Elementary',
            'school' => 'Peñarrubia Central School',
            'program' => 'Primary Education',
            'year' => '2016',
            'status' => 'Graduated',
            'current' => false,
            'description' => 'Finished my primary education and built the study habits that carried me through high school and college.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Certifications
    |--------------------------------------------------------------------------
    |
    | Each entry is shown in the certification dashboard and as a certificate
    | card. Drop the image inside public/images/certificates/ and point the
    | "image" key at it. "type" is used to count participation vs completion
    | credentials, so keep it short.
    |
    */

    'certifications' => [
        [
            'title' => 'Startup Now Cordillera: Exploring Programs, Funding, and Opportunities for Aspiring Startups',
            'issuer' => 'Department of Science and Technology — Cordillera Administrative Region',
            'issuer_short' => 'DOST CAR',
            'date' => 'September 2, 2026',
            'year' => '2026',
            'type' => 'Certificate of Participation',
            'tags' => ['Startups', 'Funding', 'DOST'],
            'description' => 'Joined DOST Cordillera’s online session on startup programs, funding options, and opportunities available to aspiring founders.',
            'image' => 'images/certificates/startup-now-cordillera-2026.jpg',
            'alt' => 'DOST Cordillera Certificate of Participation awarded to Janray Dave T. Bataller for Startup Now Cordillera.',
        ],
        [
            'title' => 'Understanding Startups & Getting Your Idea Ready for the Philippine Startup Challenge XI',
            'issuer' => 'Department of Information and Communications Technology — Cordillera Administrative Region',
            'issuer_short' => 'DICT CAR',
            'date' => 'September 7, 2026',
            'year' => '2026',
            'type' => 'Certificate of Participation',
            'tags' => ['Startups', 'Pitch readiness', 'DICT'],
            'description' => 'Completed DICT’s webinar series on startup fundamentals and preparing an idea for the Philippine Startup Challenge XI.',
            'image' => 'images/certificates/startup-challenge-xi-webinar-2026.jpg',
            'alt' => 'DICT Cordillera Certificate of Participation awarded to Janray Dave T. Bataller for the Philippine Startup Challenge XI webinar series.',
        ],
        [
            'title' => 'Introduction to Modern AI',
            'issuer' => 'Cisco Networking Academy',
            'issuer_short' => 'Cisco NetAcad',
            'date' => 'October 22, 2026',
            'year' => '2026',
            'type' => 'Certificate of Completion',
            'tags' => ['Artificial Intelligence', 'AI Fundamentals', 'Cisco'],
            'description' => 'Completed Cisco Networking Academy’s introductory course on modern artificial intelligence and its practical applications.',
            'image' => 'images/certificates/cisco-introduction-to-modern-ai-2026.jpg',
            'alt' => 'Cisco Networking Academy Certificate of Completion for Introduction to Modern AI awarded to Janray Dave T. Bataller.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Projects
    |--------------------------------------------------------------------------
    |
    | Add an array per project when they are ready. The projects section and
    | the dashboard automatically switch from the empty state to a grid.
    |
    | Example:
    | [
    |     'title' => 'Inventory System',
    |     'description' => 'A simple stock tracking system for a small store.',
    |     'stack' => ['Laravel', 'MySQL', 'Tailwind CSS'],
    |     'status' => 'Completed',
    |     'repo' => 'https://github.com/davebataller/inventory-system',
    |     'demo' => null,
    |     'featured' => true,
    | ],
    |
    */

    'projects' => [
        [
            'title' => 'A QR Code Based Event Attendance',
            'description' => 'A QR code-based event attendance system built for DCCP-Bangued (S.Y. 2025–2026). Includes a secure login page for system admins, an admin dashboard with student records and live attendance updating every 10 seconds, QR scanning for time in / time out, active event tracking such as Intramurals 2026, plus reports for registration, attendance, and event records.',
            'stack' => ['Laravel', 'PHP', 'MySQL', 'Tailwind CSS'],
            'status' => 'Completed',
            'repo' => null,
            'demo' => null,
            'featured' => true,
            'images' => [
                [
                    'path' => 'images/projects/qr-event-attendance-dashboard.jpg',
                    'alt' => 'Admin dashboard of the QR Code Event Attendance System showing student records and live attendance for Intramurals 2026.',
                ],
                [
                    'path' => 'images/projects/qr-event-attendance-login.jpg',
                    'alt' => 'Login page of the DCCP-Bangued QR Code Event Attendance System.',
                ],
            ],
        ],
    ],

    'project_categories' => [
        'Web applications',
        'Information systems',
        'UI experiments',
    ],

    'github' => [
        'username' => 'davebataller',
        'profile' => 'https://github.com/davebataller',
        'repository' => 'https://github.com/davebataller/bataller_portfolio',
        'repository_clone' => 'https://github.com/davebataller/bataller_portfolio.git',
    ],

    'repo_stack' => ['Laravel 12', 'Blade', 'Tailwind CSS', 'Vite'],

    'learning' => [
        'Laravel fundamentals and clean architecture',
        'Responsive interfaces with Tailwind CSS',
        'Database design and MySQL queries',
        'Version control with Git and GitHub',
    ],

];
