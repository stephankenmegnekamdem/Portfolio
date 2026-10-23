@extends('components.layouts.contact-cvapp')

@section('title', 'CV — ' . config('portfolio.name'))

@section('content')
    <div class="cv-page">


        <div class="detailed-info my-dark">

            <!-- LEFT COLUMN: photo, contact, languages, skills -->
            <div class="cv-left">

                <div class="profile">
                    <img src="{{ asset('assets/images/PHOTO-2026-09-28-17-15-02.jpg') }}" alt="Photo of Stephan Kenmegne Kamdem">
                </div>

                <h1 class="name">KENMEGNE KAMDEM STEPHAN</h1>

                <section class="block">
                    <h5>Contact</h5>
                    <ul class="plain">
                        <li>Neuilly-sur-Marne, 93330, France</li>
                        <li><a href="mailto:{{ config('portfolio.email') }}">{{ config('portfolio.email') }}</a></li>
                        <li><a href="https://www.linkedin.com/in/stephan-kenmegne-kamdem/">linkedin.com/in/stephan-kenmegne-kamdem</a>
                        </li>
                        <li><a href="https://github.com/stephankenmegnekamdem">github.com/stephankenmegnekamdem</a></li>
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

                <section class="block" id="skills">
                    <h5>Technical Skills</h5>
                    <ul>
                        <li><b>Languages:</b> Java, Python, PHP, JavaScript, C, C++, SQL, HTML, CSS</li>
                        <li><b>Frameworks and tools:</b> Laravel, Git, GitHub, Linux, Microsoft Office</li>
                        <li><b>Web and data:</b> Web development, REST, JSON, relational databases</li>
                    </ul>
                </section>

                <section class="block">
                    <h5>Soft Skills</h5>
                    <ul>
                        <li>Initiative</li>
                        <li>Autonomy</li>
                        <li>Leadership</li>
                        <li>Problem solving</li>
                        <li>Adaptability</li>
                        <li>Communication</li>
                    </ul>
                </section>
            </div>

            <!-- RIGHT COLUMN -->
            <div class="cv-right">

                <section class="block" id="about-me">
                    <h5>About Me</h5>
                    <p>
                        Final-year Software Engineering student (GPA 3.75/4) with solid foundations in Java,
                        Python, PHP and JavaScript, and hands-on experience building full-stack web applications
                        with Laravel and React. Skilled in REST APIs, database design, machine learning and Git,
                        with a focus on clean, maintainable code. Currently on an Erasmus+ exchange at EPITECH
                        Paris, seeking a final-year internship to contribute to a real product within an
                        engineering team.
                    </p>
                </section>

                <section class="block" id="education">
                    <h5>Education &amp; Training</h5>

                    <div class="entry" id="epitech">
                        <div class="entry-head">
                            <span class="entry-title">Erasmus+ Study Mobility, EPITECH Paris</span>
                            <span class="entry-date">14/09/2026 - Current · Paris, France</span>
                        </div>
                        <p class="entry-sub">EQF level 6</p>
                        <ul>
                            <li>Web development: HTML, CSS, JavaScript, JSON, PHP and database connections for building
                                responsive interfaces, with projects in progress
                            </li>
                            <li>Python: programming fundamentals and scripting, applied in data and machine learning
                                work
                            </li>
                            <li>Java: object-oriented programming, currently deepening my knowledge through coursework
                            </li>
                            <li>Video programming: introduction to graphics and multimedia programming</li>
                            <li>DevOps: version control workflows and deployment basics</li>
                            <li>Portfolio: personal website built with Laravel, in progress</li>
                            <li>Job Board: web application in progress</li>
                            <li>Marvin and Popeye: in progress</li>
                        </ul>
                    </div>

                    <div class="entry" id="nisantasi">
                        <div class="entry-head">
                            <span class="entry-title">Bachelor's Degree in Software Engineering, Istanbul Nisantasi University</span>
                            <span class="entry-date">19/10/2023 - Current · Istanbul, Türkiye</span>
                        </div>
                        <p class="entry-sub">EQF level 6</p>
                        <ul>
                            <li>Programming and algorithms: object-oriented programming (Java), data structures and
                                algorithms, algorithmic problem-solving
                            </li>
                            <li>Web and backend: advanced web programming with PHP and Laravel, application development,
                                REST-style backend design
                            </li>
                            <li>Databases: database management systems, relational schema design, data management</li>
                            <li>Software engineering: software design and architecture, system design, requirements
                                analysis, software development lifecycle
                            </li>
                            <li>Quality assurance: software verification, validation and testing</li>
                            <li>Data and machine learning: machine learning and pattern recognition, statistical
                                analysis, data analysis
                            </li>
                            <li>Collaboration: teamwork on collaborative software projects</li>
                        </ul>
                    </div>

                </section>

                <section class="block" id="work">
                    <h5>Work Experience</h5>
                    <div class="entry" id="donbosco">
                        <div class="entry-head">
                            <span class="entry-title">Primary School Volunteer Teacher, Don Bosco Oratorio</span>
                            <span class="entry-date">06/2025 – 08/2026 · Istanbul, Türkiye</span>
                        </div>
                        <ul>
                            <li>Taught mathematics, science and basic computer skills (Word, Excel, PowerPoint) to
                                students aged 6 to 14, and prepared lessons adapted to each age group
                            </li>
                            <li>Acted as English-French interpreter between staff, parents and students, and advised
                                parents on academic progress
                            </li>
                            <li>Organised educational activities and games during summer programmes</li>
                        </ul>
                    </div>
                </section>

                <section class="block" id="projects">
                    <h5>Projects</h5>

                    <div class="entry project" id="project1">
                        <div class="entry-head">
                            <span class="entry-title">Laravel E-commerce Website (Coursework)</span>
                            <span class="entry-date">01/2026 – 06/2026</span>
                        </div>
                        <p>Full-stack e-commerce app with role-based access control, full CRUD, a shopping cart, and two
                            admin interfaces (SB Admin 2, AdminLTE) on MySQL.
                            <a href="https://github.com/stephankenmegnekamdem/LaravelProject">GitHub</a></p>
                    </div>

                    <div class="entry project" id="project2">
                        <div class="entry-head">
                            <span
                                class="entry-title">ML Pipeline: California Housing Price Prediction (Team Lead)</span>
                            <span class="entry-date">01/2026 – 06/2026</span>
                        </div>
                        <p>End-to-end regression pipeline with a tuned Random Forest model benchmarked against XGBoost.
                            Led the team's tasks, report and presentation.
                            <a href="https://github.com/stephankenmegnekamdem/Machine_Learning_XGBoost_vs_RandomForest">GitHub</a>
                        </p>
                    </div>

                    <div class="entry project" id="project3">
                        <div class="entry-head">
                            <span class="entry-title">Learn Base Conversion</span>
                            <span class="entry-date">09/2025 – 01/2026</span>
                        </div>
                        <p>Base-conversion tool first written in Java, then ported to a Kotlin Multiplatform app with a
                            Jetpack Compose interface.
                            <a href="https://github.com/stephankenmegnekamdem/learningbaseconversions">GitHub</a></p>
                    </div>
                </section>

            </div>
        </div>
    </div>

@endsection
