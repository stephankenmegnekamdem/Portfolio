@extends('components.layouts.cvapp')

@section('title', 'CV — ' . config('portfolio.name'))

@section('content')
<div class="cv-page">
    <!-- Sidebar: photo, menu, personal details -->
    <aside>


                <a href="#about-me">About</a>
                <a href="#education">Education</a>
                <a href="#work">Work</a>
                <a href="#projects">Projects</a>
                <a href="#skills">Skills</a>
                <a href="#certifications">Certifications</a>



    </aside>

    <!-- Detailed info blocks -->
    <div class="detailed-info my-dark">
<!-- LEFT COLUMN: profile, about, contact, languages -->
        <div class="cv-left">

            <div class="profile items-center">
                <img src="assets/images/PHOTO-2026-09-28-17-15-02.jpg" alt="Photo of Stephan Kenmegne Kamdem">
            </div>
            <br>

            <h6 class="my-black"><b>KENMEGNE KAMDEM STEPHAN</b></h6>
           <br>


                <h5 id="about-me">ABOUT ME</h5>
                <p>
                    Final-year Bachelor's Software Engineering student with 3.75/4 GPA selected
                    for an Erasmus+ Internship Mobility and currently undertaking an Erasmus+
                    Study Mobility at EPITECH Paris. Passionate about programming and software
                    engineering, with a strong focus on understanding fundamental concepts and
                    developing clean, efficient, and practical solutions. Eager to continuously
                    learn new technologies, strengthen technical skills through hands-on
                    experience, and build an international career in software engineering.
                </p><br>


            <h5><b>Contact</b></h5><br>
            <p>
                <a href="https://www.google.com/maps/search/?api=1&query=8+esplanade+de+Chantilly%2C+93330+Neuilly-sur-Marne%2C+France">
                    <i class="material-icons">place</i> 93330, Neuilly-sur-Marne, France
                </a>
            </p>
            <p>
                <a href="mailto:kenmgnekamdemstephan@gmail.com">
                    <i class="material-icons">email</i> kenmgnekamdemstephan@gmail.com
                </a>
            </p>

            <p>
                <a href="https://github.com/stephankenmegnekamdem">
                    <i class="fa-brands fa-github"></i> GitHub
                </a>
            </p>
            <p>
                <a href="https://www.linkedin.com/in/stephan-kenmegne-kamdem-84b653350">
                    <i class="fa-brands fa-linkedin"></i> LinkedIn
                </a>
            </p>

            <br>

            <h5><b>Languages</b></h5><br>
            <p>English: Mother tongue</p>
            <p>French: Mother tongue</p>
            <p>Turkish: B2 level</p>
        </div>

<!-- RIGHT COLUMN: all other sections -->
        <div class="cv-right">

        <div class="sections" id="education">
            <h5>EDUCATION & TRAINING</h5>

            <div id="epitech">
                <h6 class="my-grey">14/09/2026 - CURRENT · Paris, France</h6>
                <h6 class="my-black">
                    <a href="https://www.epitech.eu"><img class="my-icons" src="assets/images/images-2.png"></a>
                    Erasmus+ Study Mobility EPITECH Paris
                </h6>
                <p>
                    Discover IT programme (ongoing exchange semester), gaining hands-on experience and
                    deepening my foundations in:
                </p>
                <ul>
                    <li>Programming (Python, Java)</li>
                    <li>Web development (HTML, CSS, JavaScript)</li>
                    <li>DevOps and project management</li>
                </ul>
                <p>EQF level 6</p>
            </div>

            <div id="nisantasi">
                <h6 class="my-grey">19/10/2023 - CURRENT · Istanbul, Türkiye</h6>
                <h6 class="my-black">
                    <a href="https://www.nisantasi.edu.tr/?dil=eng">
                        <img class="my-icons" src="assets/images/nisantasi-universitesi-logo-png_seeklogo-383727.png">
                    </a>
                    Bachelor's Degree in Software Engineering, Istanbul Nisantasi University
                </h6>

                <p class="my-grey">Main Subjects</p>
                <p>
                    Object-Oriented Programming, Data Structures & Algorithms, Database Management
                    Systems, Operating Systems, Software Design & Architecture, Advanced Web Programming ·
                    Software Verification, Validation & Testing, Machine Learning & Pattern Recognition
                </p>

                <p class="my-grey">Skills Developed</p>
                <ul>
                    <li>Application development with Java, PHP and Laravel</li>
                    <li>System design and requirements analysis</li>
                    <li>Database design and management</li>
                    <li>Problem-solving and algorithmic thinking</li>
                    <li>Software quality and development best practices</li>
                    <li>Data analysis and statistical reasoning</li>
                    <li>Project management and collaborative teamwork</li>
                </ul>
                <p>Level in EQF: EQF level 6</p>
            </div>

            <div id="turkish">
                <h6 class="my-grey">04/02/2023 - 30/06/2023 · Istanbul, Türkiye</h6>
                <h6 class="my-black">
                    <a href="https://www.gelisim.edu.tr/en/gelisim-homepage">
                        <img class="my-icons" src="assets/images/igu-logo_190222902d3d4158b2d007e8a89ea53f.png">
                    </a>
                    Turkish Language Preparatory Course, Istanbul Gelisim University
                </h6>
                <p>Turkish language acquisition and cultural immersion; development of intercultural communication skills</p>
            </div>

            <div id="maarif">
                <h6 class="my-grey">07/09/2020 - 30/07/2022 · Ngaoundere, Cameroon</h6>
                <h6 class="my-black">
                    <a href="https://cm.maarifschools.org/page/maarif-college-ngaoundere">
                        <img class="my-icons" src="assets/images/ZCnRBWE5_400x400.jpg">
                    </a>
                    GCE Advanced Level Certificate, MAARIF International College
                </h6>
                <p>Took Computer Science, Pure Maths with Mechanics, Physics, Biology, Chemistry.</p>
                <p>Level in EQF: EQF level 4</p>
            </div>
        </div>

        <div class="sections" id="work">
            <h5>WORK EXPERIENCE</h5>
            <div id="donbosco">
                <h6 class="my-black">
                    <img class="my-icons" src="assets/images/unnamed.png">
                    Don Bosco Oratorio, Istanbul, Türkiye
                </h6>
                <h6 class="my-black">Primary School Volunteer Teacher</h6>
                <p class="my-grey">01/06/2025 - 14/08/2026</p>
                <ul>
                    <li>Taught mathematics, science and basic computer skills (Word, Excel, PowerPoint) to students aged 6 to 14 and completed teacher training sessions</li>
                    <li>Prepared lessons and explained concepts clearly and accessibly, adapting to each age group</li>
                    <li>Advised parents and children on improving academic performance</li>
                    <li>Acted as English-French interpreter between staff, parents and students</li>
                    <li>Led summer activities and organised educational games</li>
                </ul>
            </div>
        </div>

        <div class="sections" id="skills">
            <h5>SKILLS</h5>
            <div id="skills1">
                <h6 class="my-grey">DIGITAL SKILLS</h6>
                <p>HTML/CSS/JavaScript · Java programming · Microsoft Office · Machine Learning · Python programming · PHP / Laravel Framework · GitHub basics</p>
                <h6 class="my-grey">SOFT SKILLS</h6>
                <p>Problem solving · Adapting to change · Communication · Leadership and organisation · Initiative and autonomy</p>
            </div>
        </div>

        <div class="sections" id="projects">
            <h5>PROJECTS</h5>


                <div class="project" id="project1">
                    <h6 class="my-grey">28/01/2026 - 15/06/2026</h6>
                    <h6 class="my-black">
                        <img class="my-icons" src="assets/images/fece433e54f817872309273fb46fe6e9.jpg" alt="Laravel e-commerce project screenshot">
                        <b>Laravel E-commerce Website</b>
                    </h6>
                    <ul>
                        <li>Built a full-stack e-commerce web application with dual admin templates (SB Admin 2 and AdminLTE), both sharing the same MySQL database.</li>
                        <li>Implemented role-based access control, full CRUD for products/categories/orders, shopping cart, and a public contact form with admin management.</li>
                    </ul>
                    <a href="https://github.com/stephankenmegnekamdem/LaravelProject">GitHub link</a>
                </div>

                <div class="project" id="project2">
                    <h6 class="my-grey">28/01/2026 - 15/06/2026</h6>
                    <h6 class="my-black">
                        <img class="my-icons" src="assets/images/What-Is-Supervised-Learning.jpg" alt="Machine learning pipeline project screenshot">
                        <b>ML Pipeline – California Housing Price Prediction</b>
                    </h6>
                    <ul>
                        <li>As a team, built a complete machine learning program from data preprocessing to model training and evaluation, with a report and presentation, using the built-in California housing dataset with Random Forest and XGBoost models.</li>
                        <li>Coordinated all activities as team leader and built the Random Forest model.</li>
                    </ul>
                    <a href="https://github.com/stephankenmegnekamdem/Machine_Learning_XGBoost_vs_RandomForest">GitHub link</a>
                </div>

                <div class="project" id="project3">
                    <h6 class="my-grey">01/09/2025 - 12/01/2026</h6>
                    <h6 class="my-black">
                        <img class="my-icons" src="assets/images/multiplatform.png" alt="Base conversion app screenshot">
                        <b>Learn Base Conversion</b>
                    </h6>
                    <ul>
                        <li>A Kotlin Multiplatform program to learn how to convert from one base to another, used for the Kotlin annual contest.</li>
                        <li>Originally written in Java, then refactored to a Jetpack Compose UI with the help of an AI tool.</li>
                    </ul>
                    <a href="https://github.com/stephankenmegnekamdem/learningbaseconversions">GitHub link</a>
                </div>

        </div>

        <div class="sections" id="certifications">
            <h5>CERTIFICATIONS</h5>

            <div>
                <h6 class="my-grey">Istanbul Nisantasi University, 12/08/2025</h6>
                <h6 class="my-grey">Certificate of Participation: Artificial Intelligence Module 1, 2 and 3</h6>
                <p>
                    <img class="my-icons" src="assets/images/Screenshot%202026-10-09%20at%2015.39.27.png"> Module 1: Introducing Artificial Intelligence and using Python<br>
                    <img class="my-icons" src="assets/images/Screenshot%202026-10-09%20at%2015.39.27.png"> Module 2: Supervised Learning (Classification and Regression)<br>
                    <img class="my-icons" src="assets/images/Screenshot%202026-10-09%20at%2015.39.27.png"> Module 3: Unsupervised Learning and Reinforcement Learning<br>
                    Mode of Learning: Online
                </p>
            </div>

            <div>
                <h6 class="my-grey">Digital Transformation Office of the Presidency of Türkiye | Digital Genç AI Ecosystem, 25/03/2025</h6>
                <h6 class="my-grey">
                    <img class="my-icons" src="assets/images/Screenshot%202026-10-09%20at%2015.38.47.png">
                    Certificate of Participation: Generative AI Webinar Series – Autoencoder models and Mathematical Foundations of AI – From Vectors to Algorithms
                </h6>
                <p>Initiative of the Turkish Government to increase awareness on AI, using mathematics to program</p>
            </div>

            <div>
                <h6 class="my-grey">Ministry of Transport and Infrastructure and Ministry of Agriculture and Forestry of Türkiye, 30/04/2025</h6>
                <h6 class="my-grey">
                    <img class="my-icons" src="assets/images/Screenshot%202026-10-09%20at%2015.38.03.png">
                    Green Citizen Awards
                </h6>
                <p>Took a high speed train during the "every ticket a sapling" campaign for a greener country</p>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
