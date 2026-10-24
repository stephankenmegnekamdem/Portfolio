<?php

return [
    'name'       => 'STEPHAN KENMEGNE KAMDEM',
    'short_name' => 'KKS',
    'tagline'    => 'Software Engineering student building web applications with Laravel.',
    'email' => env('PORTFOLIO_CONTACT_EMAIL'),
    'github'     => 'https://github.com/stephankenmegnekamdem',
    'linkedin'   => 'https://www.linkedin.com/in/stephan-kenmegne-kamdem/',

    'projects' => [
    [
        'title' => 'Laravel E-commerce Website',
        'image' => 'assets/images/projects/fece433e54f817872309273fb46fe6e9.jpg',
        'description' => 'Built a full-stack e-commerce web application with dual admin templates...',
        'url' => 'https://github.com/stephankenmegnekamdem/LaravelProject',

        // New keys (all optional)
        'screenshots' => [
            'assets/images/projects/ecommerce/homepage.png',
            'assets/images/projects/ecommerce/Login.png',
            'assets/images/projects/ecommerce/adminltepanel.png',
            'assets/images/projects/ecommerce/sbadminpanel.png',
            'assets/images/projects/ecommerce/cartpage.png'
        ],
        'technologies' => ['Laravel 10', 'PHP 8.1', 'MySQL', 'Spatie Permission', 'CKEditor 5', 'Bootstrap 4 and 5'],
        'why' => 'It shows I can build a complete system end to end: data model, authentication, roles, and two admin interfaces over one database.',
        'ship' => [
            'Move to managed hosting with secrets kept in environment variables',
            'Add a payment gateway such as Stripe and order confirmation emails',
            'Add automated tests and a CI pipeline',
            'Optimise product images and serve them through a CDN',
        ],
        'next' => ['Product search and filters', 'Low-stock alerts', 'Reviews and wishlists'],
        'proves' => ['Full-stack developer', 'Laravel back-end developer', 'QA: test planning for CRUD and role-based flows'],
    ],
    [
        'title' => 'ML Pipeline – California Housing Price Prediction',
        'image' => 'assets/images/projects/What-Is-Supervised-Learning.jpg',
        'description' => 'As a team, built a complete machine learning program...',
        'url' => 'https://github.com/stephankenmegnekamdem/Machine_Learning_XGBoost_vs_RandomForest',

        'screenshots' => [
            'assets/images/projects/ml/comparism.png',
            'assets/images/projects/ml/present.png',
        ],
        'technologies' => ['Python', 'scikit-learn', 'XGBoost', 'pandas', 'matplotlib', 'seaborn', 'Jupyter'],
        'why' => 'It shows I can run a fair model comparison, tune with cross-validation, and explain results to non-specialists.',
        'ship' => [
            'Wrap the trained model in a FastAPI endpoint',
            'Package it in Docker and track model versions',
            'Monitor prediction drift on new data',
        ],
        'next' => ['LightGBM or CatBoost baselines', 'Distance-to-coast features', 'SHAP explanations per prediction'],
        'proves' => ['Machine learning engineer', 'AI scientist', 'Team leadership and project coordination'],
    ],
        [
    'title' => 'Learn Base Conversion Program, Kotlin',
    'image' => 'assets/images/projects/multiplatform.png',
    'description' => 'A Kotlin Multiplatform game of logic that teaches number base conversions between binary and decimal. It has a Learn mode with step-by-step guidance and an Answer mode for practice, running on Android, iOS and Desktop from one shared codebase.',
    'url' => 'https://github.com/stephankenmegnekamdem/learningbaseconversions',

    // Optional keys. Remove any you don't need.
    'screenshots' => [
        'assets/images/projects/learning-base/home.png',
        'assets/images/projects/learning-base/choice.png',
        'assets/images/projects/learning-base/learn.png',
    ],
    'technologies' => ['Kotlin Multiplatform', 'Jetpack Compose', 'Compose Multiplatform', 'Gradle', 'Git', 'Java (original version)'],
    'why' => 'It shows I can take a working program written for one platform and turn it into a shared, multi-platform app with a modern UI. It also shows I can design for learners, not just for correctness.',
    'ship' => [
        'Publish the Android build to Google Play and the iOS build to the App Store',
        'Add unit tests for the conversion logic in commonMain so it runs on every platform',
        'Save progress per user so learners can see their results over time',
        'Set up CI to build all three targets on every commit',
    ],
    'next' => [
        'Add octal and hexadecimal conversions',
        'Add timed quizzes and a score history',
        'Add accessibility support such as screen reader labels and larger text',
    ],
    'proves' => [
        'Mobile developer (Android and iOS)',
        'Cross-platform developer with Kotlin Multiplatform',
        'Educational software designer',
    ],
            ],
            [
    'title' => 'Personal Portfolio Website',
    'image' => 'assets/images/projects/0632FBD4-CD94-4031-9A44-8B29BFFF1305.png',
    'description' => 'My personal portfolio, built with Laravel and Blade. It presents my projects, education, experience and CV, with a snap-scrolling layout, a project catalogue driven by a single config file, and a printable CV page.',
    'url' => 'https://github.com/stephankenmegnekamdem/Portfolio',

    'screenshots' => [
        'assets/images/projects/portfolio/homepage.png',
        'assets/images/projects/portfolio/projectspage.png',
        'assets/images/projects/portfolio/cvpage.png',
        'assets/images/projects/portfolio/contactpage.png'
    ],
    'technologies' => ['Laravel', 'Blade components', 'Tailwind CSS', 'Vite', 'PHP 8.1', 'Git'],
    'why' => 'It shows I can build and present a real product end to end: layout, content management through config, responsive design and print styling. It is also the place where recruiters see my work first.',
    'ship' => [
        'Deploy to a managed host with HTTPS and a custom domain',
        'Move the content from the config file into a database with a simple admin form',
        'Add a contact form with spam protection and email delivery',
        'Add basic analytics and a sitemap for search engines',
    ],
    'next' => [
        'Dark and light theme switch',
        'Automated tests for the config-driven pages',
        'Translated versions of the content',
    ],
    'proves' => [
        'Full-stack developer',
        'Front-end developer with responsive design skills',
        'QA: checking layouts across screen sizes and print output',
    ],

],

],

    'sections' => [
        'personal' => [
                        'title' => 'STEPHAN KENMEGNE KAMDEM',
                        'icon'  => 'assets/images/personal/Screenshot 2026-10-20 at 10.57.41.png',
                        'items' => ["Software Engineer student"],
                        'nationality' => [
                                            'label' => 'Cameroon 🇨🇲',
                                            'url'   => 'https://fr.wikipedia.org/wiki/Cameroun',
                        ],
            'descriptions' => [
                                "Hey, I'm kks. I'm a final-year Software Engineering student who believes computers are great, but people are the real fun part.",
                                "Right now I'm in Paris on an Erasmus+ semester at EPITECH, which is a big adventure for someone who once thought 'debugging' was a type of Cameroonian dance move.",
                                "I've built a Laravel e-commerce site, a machine learning comparison project, and a Kotlin app that started in Java and ended up with a Compose UI. Each one came with its share of tears, laughter, and 'why is this working now?' moments.",
                                "This portfolio is my newest project. If something looks a bit rough, don't worry, I'm already planning the next round of fixes and a few jokes to go with them.",
                                ],

            'traits' => [
                            "Happiest when I'm trying something new, even if I'm not sure I'll get it right",
                            "The person who laughs the loudest at my own bad jokes",
                            "Always ready to share a good story, a good meal, or a good movie recommendation",
                            "Learns best by building, breaking, and building again, usually with some music in the background",
                        ],

            'interests' => [
                            'Anime',
                            'Movies',
                            'Travel',
                            'Meeting new people',
                            'Making people laugh',
                            'Building things with code',
                            'Sharing good vibes',
                        ],
        ],
        'education' => [
            [
                'title' => 'EPITECH Paris',
                'icon'  => 'assets/images/icons/images-2.png',
                'items' => ['Erasmus+ Study Mobility, — University X (2026–2027)'],
                'descriptions' => [
                            "Discover IT programme (ongoing exchange semester), gaining hands-on experience and",
                            "deepening my foundations in:",
                            "",
                                "Programming (Python, Java)",
                                "Web development (HTML, CSS, JavaScript)",
                                "DevOps and project management",
                            "",
                            "EQF level 6",
                    ],
            ],

            [
                'title' => "Istanbul Nisantasi University",
                'icon'  => 'assets/images/icons/nisantasi-universitesi-logo-png_seeklogo-383727.png',
                'items' => ['BSc Software Engineering — University X (2023–2027)'],
                'descriptions' => ["Main Subjects",
                            "Object-Oriented Programming, Data Structures & Algorithms, Database Management",
                            "Systems, Operating Systems, Software Design & Architecture , Advanced Web Programming·",
                            "Software Verification, Validation & Testing, Machine Learning & Pattern Recognition",

                       "Skills Developed",
                        "",
                           "Application development with Java, PHP and Laravel",
                            "System design and requirements analysis",
                            "Database design and management",
                            "Problem-solving and algorithmic thinking",
                            "Software quality and development best practices",
                            "Data analysis and statistical reasoning",
                            "Project management and collaborative teamwork",
                        "",
                        "Level in EQF: EQF level 6"],
            ],

            [
                'title' => "Istanbul Gelisim University",
                'icon'  => 'assets/images/icons/igu-logo_190222902d3d4158b2d007e8a89ea53f.png',
                'items' => ['Turkish Language Preparatory Class — University X (Jan 2023 – Jun 2023)'],
                'descriptions' => [
                'Studied Turkish language to develop communication skills and facilitate cultural integration.',
                'Focused on improving Turkish language proficiency for academic and everyday communication.',
            ],
        ],

            [
                'title' => "MAARIF COLLEGE Ngaoundere\n",
                'icon'  => 'assets/images/icons/ZCnRBWE5_400x400.jpg',
                'items' => ['GCE Advanced Level — High School X (2020–2022)'],
                'descriptions' => ['Took Computer Science, Pure Maths with Mechanics, Physics, Biology, Chemistry.',
                       'Level in EQF: EQF level 4'],
            ],

        ],
        'work' => [
            'title' => 'Work Experience',
            'icon'  => 'assets/images/icons/work.png',
            'items' => ['Volunteer @ Company DON BOSCO ORATORIO — 2023'],
            'descriptions' => [
                    'Delivered educational support and teaching activities, adapting explanations to students’ learning needs and levels of understanding.',
                    'Prepared and organized lesson notes and educational materials to facilitate knowledge acquisition and improve learning outcomes.',
                    'Translated and clarified educational content to bridge language barriers, ensuring accurate interpretation and effective communication.',
                    'Developed strong communication, organization, adaptability, and problem-solving skills while working in an educational environment.',
],
        ],
        'projects' => [
        [
            'title' => 'Laravel E-commerce Platform',
            'icon' => 'assets/images/projects/projects.svg',
            'items' => ['full-stack e-commerce platform'],
            'descriptions' => [
                'Built a full-stack e-commerce web application with dual admin templates',
                'SB Admin 2 and AdminLTE), both sharing the same MySQL database.',
                'Implemented role-based access control, full CRUD for',
                'products/categories/orders, shopping cart, and a public contact form',
                'with admin management.',
            ],
        ],
    [
            'title' => 'Machine Learning, XG-Boost vs Random Forest',
            'icon' => 'assets/images/projects/projects.svg',
            'items' => ['XG-Boost vs Random Forest on California Dataset'],
            'descriptions' => [
                'As a team, built a complete machine learning program from data',
                'preprocessing to model training and evaluation, with a report and',
                'presentation, using the built-in California housing dataset with',
                'Random Forest and XGBoost models.',
                'Coordinated all activities as team leader and built the Random Forest model.',
            ],
        ],
    [
            'title' => 'Learn Base Conversion Program, Kotlin',
            'icon' => 'assets/images/projects/projects.svg',
            'items' => ['Kotlin Multiplatform App'],
            'descriptions' => [
                'A Kotlin Multiplatform program to learn how to convert from one base',
                'to another, used for the Kotlin annual contest.',
                'Originally written in Java, then refactored to a Jetpack Compose UI',
                'with the help of an AI tool.',
            ],
        ],
            [
            'title' => 'Personal Portfolio Website',
            'icon' => 'assets/images/projects/0632FBD4-CD94-4031-9A44-8B29BFFF1305.png',
            'items' => ['Laravel portfolio site'],
            'descriptions' => [
                'A personal portfolio built with Laravel and Blade components.',
                'It presents my projects, education, experience and CV,',
                'with a snap-scrolling layout driven by a single config file',
                'and a printable CV page.',
        ],
        ],
    ],
        'skills' => [
            'title' => 'Skills',
            'icon'  => 'images/icons/skills.svg',
            'items' => ['HTML/ CSS/ Javascript | ', 'Java programing | ', 'Microsoft Office | ', 'Machine Learning | ',
                        'Python programming | ', 'PHP / Laravel Framework | '
                        , 'Github Basics | ', 'Problem solving | ', 'adapt to change | ',
                        'Communication | ', 'Leadership and Organization | ', 'Initiative and autonomy |'],
            'descriptions' => [''],
        ],
        'certifications' => [
                        'images/certs/cert1.png',
                    ],
    ],
];
