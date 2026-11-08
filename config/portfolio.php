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

    'projects' => [],

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
