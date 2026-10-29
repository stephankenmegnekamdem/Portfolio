@extends('components.layouts.contact-cvapp')

@section('title', 'CV — ' . config('portfolio.name'))

@section('content')
    <div class="cv-page">


        <div class="detailed-info my-dark">

            <!-- LEFT COLUMN: photo, contact, skills, languages, hobbies -->
            <div class="cv-left">

                <div class="profile">
                    <img src="{{ asset('assets/images/cv/Screenshot 2026-10-20 at 10.57.41.png') }}" alt="Photo of Stephan Kenmegne Kamdem">
                </div>

                <h1 class="name">KENMEGNE KAMDEM STEPHAN</h1>

                <section class="block">
                    <h5>Contact</h5>
                    <ul class="plain">
                        <li>Paris, 75015</li>
                        <li><a href="mailto:{{ config('portfolio.email') }}">{{ config('portfolio.email') }}</a></li>
                        <li>07 81 18 53 06</li>
                        <li>Linkedin: <a href="https://www.linkedin.com/in/stephan-kenmegne-kamdem/">@stephankenmegnekamdem</a></li>
                        <li>Github: <a href="https://github.com/stephankenmegnekamdem">@stephankenmegnekamdem</a></li>
                    </ul>
                </section>

                <section class="block" id="skills">
                    <h5>Technical Skills</h5>
                    <ul>
                        <li><b>Programming languages:</b> Java, Python, PHP, JavaScript, C, C++, SQL, HTML, CSS</li>
                        <li><b>Frameworks and tools:</b> Laravel, Git, GitHub, Linux, Microsoft Office</li>
                        <li><b>Web and data:</b> Web software development, REST, JSON, relational database management systems</li>
                    </ul>
                </section>

                <section class="block">
                    <h5>Soft Skills</h5>
                    <ul>
                        <li>Initiative</li>
                        <li>Autonomy</li>
                        <li>Leadership</li>
                        <li>Problem solving</li>
                        <li>Adapt to change</li>
                        <li>Communication</li>
                    </ul>
                </section>

                <section class="block">
                    <h5>Languages</h5>
                    <ul class="plain">
                        <li>English: Native</li>
                        <li>French: Native</li>
                        <li>Turkish: B2</li>
                    </ul>
                </section>

                <section class="block">
                    <h5>Hobbies</h5>
                    <ul class="plain">
                        <li>Chess player</li>
                        <li>Table Tennis</li>
                        <li>Volleyball</li>
                    </ul>
                </section>
            </div>

            <!-- RIGHT COLUMN: profile, education, experience, projects -->
            <div class="cv-right">

                <section class="block" id="about-me">
                    <h5>About Me</h5>
                    <p>
                        Final-year Software Engineering student (GPA 3.75/4) building full-stack web applications
                        with Laravel, PHP and MySQL. Experienced in REST API development, relational database
                        design and Git/GitHub workflows. Proficient in Java, Python, JavaScript, C and C++, with
                        working knowledge of Linux and Kotlin Multiplatform. Seeking a final-year internship or
                        Erasmus+ traineeship in software engineering.
                    </p>
                </section>

                <section class="block" id="education">
                    <h5>Education &amp; Training</h5>

                    <div class="entry" id="nisantasi">
                        <div class="entry-head">
                            <span class="entry-title">Bachelor's Degree in Software Engineering, Istanbul Nisantasi University</span>
                            <span class="entry-date">19/10/2023 - CURRENT · Istanbul, Türkiye</span>
                        </div>
                        <p class="entry-sub">EQF level 6</p>
                        <ul>
                            <li>Relevant coursework: Data Structures and Algorithms, Object-Oriented Programming (Java),
                                Database Systems, Software Design and Architecture, Software Testing and Validation,
                                Machine Learning
                            </li>
                        </ul>
                    </div>

                    <div class="entry" id="epitech">
                        <div class="entry-head">
                            <span class="entry-title">Erasmus+ Study Mobility, EPITECH Paris</span>
                            <span class="entry-date">14/09/2026 - CURRENT · Paris, France</span>
                        </div>
                        <p class="entry-sub">EQF level 6</p>
                        <ul>
                            <li>Project / learn by doing pedagogy, develop practical and coding skills.</li>
                            <li>Coursework: Web Development, Python, Java, DevOps and Version Control</li>
                        </ul>
                    </div>

                </section>

                <section class="block" id="work">
                    <h5>Work Experience</h5>
                    <div class="entry" id="donbosco">
                        <div class="entry-head">
                            <span class="entry-title">Primary School Volunteer Teacher, Don Bosco Oratorio</span>
                            <span class="entry-date">01/06/2025 – 14/08/2026 · Istanbul, Türkiye</span>
                        </div>
                        <ul>
                            <li>Taught mathematics, science and computing to about 60 students aged 6 to 14, adapting
                                content and pace to each age group
                            </li>
                            <li>Explained complex concepts clearly to non-specialist audiences, translating technical
                                material into accessible steps
                            </li>
                            <li>Trained students in Word, Excel and PowerPoint, building foundations in document,
                                spreadsheet and presentation tools
                            </li>
                            <li>Served as English-French interpreter between staff, parents and students, keeping
                                communication accurate across language barriers
                            </li>
                            <li>Advised parents and students on academic progress, communicating findings clearly to
                                both
                            </li>
                            <li>Organised educational activities and summer programmes for groups of children</li>
                        </ul>
                    </div>
                </section>

                <section class="block" id="projects">
                    <h5>Projects</h5>

                    <div class="entry project" id="project1">
                        <div class="entry-head">
                            <span class="entry-title">Laravel E-commerce Website</span>
                            <span class="entry-date">28/01/2026 – 15/06/2026</span>
                        </div>
                        <p class="entry-sub">PHP, Laravel, MySQL, HTML5, CSS3, JS</p>
                        <ul>
                            <li>Built a full-stack e-commerce application with two admin interfaces sharing one MySQL
                                database
                            </li>
                            <li>Implemented role-based access control, full CRUD for products, categories and orders, a
                                shopping cart, and contact-form management
                            </li>
                        </ul>
                        <p><a href="https://github.com/stephankenmegnekamdem/LaravelProject">GitHub</a></p>
                    </div>

                    <div class="entry project" id="project2">
                        <div class="entry-head">
                            <span class="entry-title">ML Pipeline - California Housing Price Prediction (Team Lead)</span>
                            <span class="entry-date">28/01/2026 – 15/06/2026</span>
                        </div>
                        <p class="entry-sub">Python</p>
                        <ul>
                            <li>Built an end-to-end regression pipeline covering preprocessing, model training and
                                evaluation
                            </li>
                            <li>Implemented and tuned a Random Forest model, which outperformed XGBoost on every metric:
                                RMSE $50,410 vs $58,290; MAE $32,650 vs $40,861; R² 0.806 vs 0.741
                            </li>
                            <li>Coordinated team tasks and deliverables; produced the written report and presentation</li>
                        </ul>
                        <p><a href="https://github.com/stephankenmegnekamdem/Machine_Learning_XGBoost_vs_RandomForest">GitHub</a></p>
                    </div>

                    <div class="entry project" id="project3">
                        <div class="entry-head">
                            <span class="entry-title">Personal Portfolio Website</span>
                            <span class="entry-date">05/10/2025 – CURRENT</span>
                        </div>
                        <p class="entry-sub">Laravel, PHP, CSS, JavaScript, Vite</p>
                        <ul>
                            <li>Designed and built a personal portfolio website with Laravel and PHP, structuring routing,
                                controllers and Blade views to present projects and professional experience
                            </li>
                        </ul>
                        <p><a href="https://github.com/stephankenmegnekamdem/Portfolio">GitHub</a></p>
                    </div>

                    <div class="entry project" id="project4">
                        <div class="entry-head">
                            <span class="entry-title">Learn Base Conversion</span>
                            <span class="entry-date">01/09/2025 – 12/01/2026</span>
                        </div>
                        <p class="entry-sub">KMP, Java, Jetpack Compose UI</p>
                        <ul>
                            <li>Built a base-conversion tool in Java, then ported it to a Kotlin Multiplatform app with a
                                Jetpack Compose interface
                            </li>
                            <li>Verified conversion logic for correctness</li>
                        </ul>
                        <p><a href="https://github.com/stephankenmegnekamdem/learningbaseconversions">GitHub</a></p>
                    </div>
                </section>

            </div>
        </div>
    </div>

@endsection
