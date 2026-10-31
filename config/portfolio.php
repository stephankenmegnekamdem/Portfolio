<?php

return [
    'name'       => 'STEPHAN KENMEGNE KAMDEM',
    'short_name' => 'KKS',
    'tagline'    => 'Software Engineering student building web applications with Laravel.',
    'email'      => env('PORTFOLIO_CONTACT_EMAIL'),
    'github'     => 'https://github.com/stephankenmegnekamdem',
    'linkedin'   => 'https://www.linkedin.com/in/stephan-kenmegne-kamdem/',

    /*
     * Projects shown as tiles and as detailed pages.
     * Keep the same order as the 'projects' list in 'sections' below.
     */
    'projects' => [
        [
            'title'        => 'Laravel E-commerce Website',
            'image'        => 'assets/images/projects/fece433e54f817872309273fb46fe6e9.jpg',
            'description'  => 'A full-stack e-commerce web application with two admin panels sharing one MySQL database.',
            'url'          => 'https://github.com/stephankenmegnekamdem/LaravelProject',
            'screenshots'  => [
                'assets/images/projects/ecommerce/homepage.png',
                'assets/images/projects/ecommerce/Login.png',
                'assets/images/projects/ecommerce/adminltepanel.png',
                'assets/images/projects/ecommerce/sbadminpanel.png',
                'assets/images/projects/ecommerce/cartpage.png',
            ],
            'technologies' => ['Laravel 10', 'PHP 8.1', 'MySQL', 'Spatie Permission', 'CKEditor 5', 'Bootstrap 4 and 5'],
            'why'          => 'It shows I can build a complete system end to end: data model, authentication, roles, and two admin interfaces over one database.',
            'ship'         => [
                'Move to managed hosting with secrets kept in environment variables',
                'Add a payment gateway such as Stripe and order confirmation emails',
                'Add automated tests and a CI pipeline',
                'Optimise product images and serve them through a CDN',
            ],
            'next'         => ['Product search and filters', 'Low-stock alerts', 'Reviews and wishlists'],
            'proves'       => ['Full-stack developer', 'Laravel back-end developer', 'Test planning for CRUD and role-based flows'],
        ],
        [
            'title'        => 'ML Pipeline – California Housing Price Prediction',
            'image'        => 'assets/images/projects/What-Is-Supervised-Learning.jpg',
            'description'  => 'A team machine learning project that compares Random Forest and XGBoost on the California housing dataset.',
            'url'          => 'https://github.com/stephankenmegnekamdem/Machine_Learning_XGBoost_vs_RandomForest',
            'screenshots'  => [
                'assets/images/projects/ml/comparism.png',
                'assets/images/projects/ml/present.png',
            ],
            'technologies' => ['Python', 'scikit-learn', 'XGBoost', 'pandas', 'matplotlib', 'seaborn', 'Jupyter'],
            'why'          => 'It shows I can run a fair model comparison, tune with cross-validation, and explain results to non-specialists.',
            'ship'         => [
                'Wrap the trained model in a FastAPI endpoint',
                'Package it in Docker and track model versions',
                'Monitor prediction drift on new data',
            ],
            'next'         => ['LightGBM or CatBoost baselines', 'Distance-to-coast features', 'SHAP explanations per prediction'],
            'proves'       => ['Machine learning engineer', 'Data analysis', 'Team leadership and project coordination'],
        ],
        [
            'title'        => 'Learn Base Conversion (Kotlin Multiplatform)',
            'image'        => 'assets/images/projects/multiplatform.png',
            'description'  => 'A learning tool that teaches conversion between binary and decimal numbers. It has a Learn mode with step-by-step guidance and an Answer mode for practice, built from one shared Kotlin codebase.',
            'url'          => 'https://github.com/stephankenmegnekamdem/learningbaseconversions',
            'screenshots'  => [
                'assets/images/projects/learning-base/home.png',
                'assets/images/projects/learning-base/choice.png',
                'assets/images/projects/learning-base/learn.png',
            ],
            'technologies' => ['Kotlin Multiplatform', 'Jetpack Compose', 'Compose Multiplatform', 'Gradle', 'Git', 'Java (original version)'],
            'why'          => 'It shows I can take a program written for one platform and turn it into a shared, multi-platform app with a modern UI. It also shows I can design for learners, not just for correctness.',
            'ship'         => [
                'Publish the Android build to Google Play and the iOS build to the App Store',
                'Add unit tests for the conversion logic so it runs on every platform',
                'Save progress per user so learners can see their results over time',
                'Set up CI to build all targets on every commit',
            ],
            'next'         => [
                'Add octal and hexadecimal conversions',
                'Add timed quizzes and a score history',
                'Add accessibility support such as screen reader labels and larger text',
            ],
            'proves'       => ['Mobile developer', 'Cross-platform developer with Kotlin Multiplatform', 'Educational software designer'],
        ],
        [
            'title'        => 'Personal Portfolio Website',
            'image'        => 'assets/images/projects/0632FBD4-CD94-4031-9A44-8B29BFFF1305.png',
            'description'  => 'My personal portfolio, built with Laravel and Blade. It presents my projects, education, experience and CV, with a snap-scrolling layout, a project catalogue driven by a single config file, and a printable CV page.',
            'url'          => 'https://github.com/stephankenmegnekamdem/Portfolio',
            'screenshots'  => [
                'assets/images/projects/portfolio/homepage.png',
                'assets/images/projects/portfolio/projectspage.png',
                'assets/images/projects/portfolio/cvpage.png',
                'assets/images/projects/portfolio/contactpage.png',
            ],
            'technologies' => ['Laravel', 'Blade components', 'Tailwind CSS', 'Vite', 'PHP 8.1', 'Git'],
            'why'          => 'It shows I can build and present a real product end to end: layout, content management through config, responsive design and print styling.',
            'ship'         => [
                'Deploy to a managed host with HTTPS and a custom domain',
                'Move the content from the config file into a database with a simple admin form',
                'Add a contact form with spam protection and email delivery',
                'Add basic analytics and a sitemap for search engines',
            ],
            'next'         => ['Dark and light theme switch', 'Automated tests for the config-driven pages', 'Translated versions of the content'],
            'proves'       => ['Full-stack developer', 'Front-end developer with responsive design skills', 'Checking layouts across screen sizes and print output'],
        ],
        [
            'title'        => 'School Timetable Generator',
            'image'        => 'assets/images/projects/timetable-software.png',
            'description'  => 'A Java program that generates a weekly timetable for a six-class primary school, respecting teacher availability, absences, subject eligibility and daily limits. It is a working prototype that is still being improved.',
            'url'          => null,
            'screenshots'  => [],
            'technologies' => ['Java', 'Object-oriented design', 'Randomised search', 'Penalty-based scoring'],
            'why'          => 'It shows I can model a real-world problem with many constraints, design a search algorithm, and check the results with a validator.',
            'ship'         => [
                'Fix the known issues and add automated tests',
                'Make the school setup configurable instead of hard-coded',
                'Add a simple interface for entering teachers and subjects',
            ],
            'next'         => ['A smarter search strategy', 'Export the timetable to PDF or Excel'],
            'proves'       => ['Software developer', 'Algorithm design', 'Problem solving'],
        ],
    ],

    /*
     * Skills grouped into categories, shown as cards on the home page.
     * Based on the skills listed in the CV.
     */
    'skill_groups' => [
        [
            'title' => 'Programming languages',
            'items' => ['Java', 'Python', 'PHP', 'JavaScript', 'C', 'C++', 'SQL', 'HTML', 'CSS'],
        ],
        [
            'title' => 'Frameworks and tools',
            'items' => ['Laravel', 'Git', 'GitHub', 'Linux', 'Microsoft Office'],
        ],
        [
            'title' => 'Web and data',
            'items' => ['Web software development', 'REST', 'JSON', 'Relational databases'],
        ],
        [
            'title' => 'Machine learning and mobile',
            'items' => ['Machine learning', 'Kotlin Multiplatform'],
        ],
        [
            'title' => 'Soft skills',
            'items' => ['Initiative', 'Autonomy', 'Leadership', 'Problem solving', 'Adapting to change', 'Communication'],
        ],
    ],

    /*
     * Languages, with a level and a percentage for the progress bar (0 to 100).
     * Levels match the CV.
     */
    'languages' => [
        ['name' => 'English', 'level' => 'Native', 'percent' => 100],
        ['name' => 'French',  'level' => 'Native', 'percent' => 100],
        ['name' => 'Turkish', 'level' => 'B2',     'percent' => 70],
    ],

    /*
     * Content for the sections of the home page.
     */
    'sections' => [

        'personal' => [
            'title' => 'STEPHAN KENMEGNE KAMDEM',
            'icon'  => 'assets/images/personal/kks.png',
            'items' => ['Final-year Software Engineering student'],
            'nationality' => [
                'label' => 'Cameroon 🇨🇲',
                'url'   => 'https://fr.wikipedia.org/wiki/Cameroun',
            ],
            'descriptions' => [
                "Hey, I'm kks. I'm a final-year Software Engineering student who believes computers are great, but people are the real fun part.",
                "Right now I'm in Paris on an Erasmus+ semester at EPITECH, which is a big adventure for someone who once thought 'debugging' was a type of dance move.",
                "I've built a Laravel e-commerce site, a machine learning comparison project, and a Kotlin app that started in Java and ended up with a Compose UI. Each one came with its share of tears, laughter, and 'why is this working now?' moments.",
                "This portfolio is my newest project. If something looks a bit rough, don't worry, I'm already planning the next round of fixes.",
            ],
            'traits' => [
                "Happiest when I'm trying something new, even if I'm not sure I'll get it right",
                'The person who laughs the loudest at my own bad jokes',
                'Always ready to share a good story, a good meal, or a good movie recommendation',
                'Learns best by building, breaking, and building again',
            ],
            'interests' => [
                'Anime',
                'Movies',
                'Travel',
                'Chess',
                'Volleyball',
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
                'items' => ['Erasmus+ Study Mobility (2026–present)'],
                'descriptions' => [
                    'Discover IT programme (exchange semester), with hands-on, project-based learning.',
                    'Courses include programming in Python and Java, web development with HTML, CSS and JavaScript, and DevOps basics.',
                    'EQF level 6',
                ],
            ],
            [
                'title' => 'Istanbul Nisantasi University',
                'icon'  => 'assets/images/icons/nisantasi-universitesi-logo-png_seeklogo-383727.png',
                'items' => ['BSc Software Engineering (2023–2027)'],
                'descriptions' => [
                    'Main subjects: object-oriented programming, data structures and algorithms, database management systems, software design and architecture, advanced web programming, software verification and testing, and machine learning.',
                    'Skills developed: application development with Java, PHP and Laravel, system design, database design, problem-solving, software quality, data analysis and teamwork.',
                    'EQF level 6',
                ],
            ],
            [
                'title' => 'Istanbul Gelisim University',
                'icon'  => 'assets/images/icons/igu-logo_190222902d3d4158b2d007e8a89ea53f.png',
                'items' => ['Turkish Language Preparatory Class (Jan–Jun 2023)'],
                'descriptions' => [
                    'Studied Turkish to build communication skills and support academic and everyday life in Türkiye.',
                ],
            ],
            [
                'title' => 'MAARIF College Ngaoundéré',
                'icon'  => 'assets/images/icons/ZCnRBWE5_400x400.jpg',
                'items' => ['GCE Advanced Level (2020–2022)'],
                'descriptions' => [
                    'Subjects: Computer Science, Pure Mathematics with Mechanics, Physics, Biology and Chemistry.',
                    'EQF level 4',
                ],
            ],
        ],

        'work' => [
            'title' => 'Work Experience',
            'icon'  => 'assets/images/icons/work.png',
            'items' => ['Primary School Volunteer Teacher, Don Bosco Oratorio, Istanbul (2025–2026)'],
            'descriptions' => [
                'Taught mathematics, science and basic computer skills (Word, Excel, PowerPoint) to more than 60 students aged 6 to 14, and completed teacher training sessions.',
                'Prepared lessons and explained concepts clearly, adapting to each age group.',
                'Acted as an English–French interpreter between staff, parents and students.',
                'Advised parents and children on academic progress.',
                'Organised educational activities and games during summer programmes.',
            ],
        ],

        /*
         * Project details for the home page timeline.
         * Must match the order of the 'projects' list above.
         */
        'projects' => [
            [
                'title' => 'Laravel E-commerce Platform',
                'icon'  => 'assets/images/projects/fece433e54f817872309273fb46fe6e9.jpg',
                'items' => ['Full-stack e-commerce platform'],
                'descriptions' => [
                    'Built a full-stack e-commerce web application with two admin templates (SB Admin 2 and AdminLTE) sharing one MySQL database.',
                    'Implemented role-based access control, full CRUD for products, categories and orders, a shopping cart, and a public contact form with admin management.',
                ],
            ],
            [
                'title' => 'ML Pipeline: Random Forest vs XGBoost',
                'icon'  => 'assets/images/projects/What-Is-Supervised-Learning.jpg',
                'items' => ['California housing price prediction'],
                'descriptions' => [
                    'As a team, built a machine learning pipeline from data preprocessing to model training and evaluation, with a written report and presentation.',
                    'Implemented and tuned a Random Forest model, benchmarked it against XGBoost, and led the team’s comparison work, coordinating tasks and deliverables.',
                ],
            ],
            [
                'title' => 'Learn Base Conversion (Kotlin Multiplatform)',
                'icon'  => 'assets/images/projects/multiplatform.png',
                'items' => ['Kotlin Multiplatform app'],
                'descriptions' => [
                    'An educational tool that teaches conversion between number bases, first written in Java and then ported to Kotlin Multiplatform.',
                    'The interface is built with Jetpack Compose, with conversion logic and UI adapted and reviewed for correctness.',
                ],
            ],
            [
                'title' => 'Personal Portfolio Website',
                'icon'  => 'assets/images/projects/0632FBD4-CD94-4031-9A44-8B29BFFF1305.png',
                'descriptions' => [
                    'A personal portfolio built with Laravel and Blade components.',
                    'It presents my projects, education, experience and CV, with a snap-scrolling layout driven by a single config file and a printable CV page.',
                ],
            ],
            [
                'title' => 'School Timetable Generator',
                'icon'  => 'assets/images/projects/timetable-software.png',
                'items' => ['Java prototype for a primary school'],
                'descriptions' => [
                    'A Java program that generates a weekly timetable for six classes, respecting teacher availability, absences and subject eligibility.',
                    'It uses randomised search with penalty-based scoring and a validator to check each result. It is a working prototype that is still being improved.',
                ],
            ],
        ],

        'certifications' => [
            [
                'image'       => 'assets/images/certs/certs1.png',
                'title'       => 'Artificial Intelligence Certificate Program, Module 1',
                'description' => 'The first of three modules in an artificial intelligence programme run by the Continuing Education Application and Research Centre of Istanbul Nişantaşı University. Completed as 12 hours of training from 10 to 20 February 2025.',
            ],
            [
                'image'       => 'assets/images/certs/certs2.png',
                'title'       => 'Machine Learning Fundamentals, Module 2',
                'description' => 'The second module, Fundamentals of Machine Learning, from the Continuing Education Centre of Istanbul Nişantaşı University. It covers how models learn patterns from data. Completed as 12 hours of training from 3 to 16 March 2025.',
            ],
            [
                'image'       => 'assets/images/certs/certs3.png',
                'title'       => 'Artificial Intelligence Certificate Program, Module 3',
                'description' => 'The third and final module of the same artificial intelligence programme, building on the first two. Completed as 12 hours of training from 9 to 23 April 2025.',
            ],
            [
                'image'       => 'assets/images/certs/certs4.png',
                'title'       => 'Generative AI Webinar: Autoencoder Models',
                'description' => 'A webinar on autoencoders, a type of neural network that learns a compressed representation of data and can be used to generate new content. Held on 25 March 2025 as part of the Generative AI webinar series of the Digital Genç Artificial Intelligence Ecosystem, organised by the Digital Transformation Office of the Presidency of the Republic of Türkiye.',
            ],
            [
                'image'       => 'assets/images/certs/certs5.png',
                'title'       => 'Generative AI Webinar: Mathematical Foundations of AI II',
                'description' => 'The second session of a series on the mathematics behind artificial intelligence, titled From Vectors to Algorithms. It shows how vectors and mathematical structures form the basis of the algorithms used in AI. Held on 24 February 2025 as part of the Digital Genç Artificial Intelligence Ecosystem, organised by the Digital Transformation Office of the Presidency of the Republic of Türkiye.',
            ],
        ],

        'recognitions' => [
            [
                'image'       => 'assets/images/certs/certs6.png',
                'title'       => 'Green Homeland Campaign: One Ticket, One Tree',
                'description' => 'A recognition, not a training certificate. It comes from the Green Homeland Mobilisation initiative of the Ministry of Agriculture and Forestry and the Ministry of Transport and Infrastructure, with TCDD. It records that a tree will be planted in my name for a high-speed train journey, as part of the Every Ticket, One Tree project.',
            ],
        ],
    ],

];
