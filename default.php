<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICETT'26 - International Conference on Emerging Trends and Transformation</title>
    <meta name="description" content="International Conference on Emerging Trends and Transformation (ICETT’26) organized by SCOPE, VIT-AP University.">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        vitBlue: '#005a9c',
                        vitDark: '#003366',
                        vitGold: '#f37021',
                        lightBg: '#f8fafc',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Merriweather', 'serif'],
                    },
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        
        /* Hero Pattern Animation */
        .hero-pattern {
            background-color: #005a9c;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            animation: moveBackground 20s linear infinite;
        }

        @keyframes moveBackground {
            0% { background-position: 0 0; }
            100% { background-position: 60px 60px; }
        }

        .header-shadow { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); }

        /* Scroll Reveal Utility Classes */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Staggered delays for children */
        .delay-100 { transition-delay: 100ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-300 { transition-delay: 300ms; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- Top Bar -->
    <div class="bg-vitDark text-white text-xs py-2">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="hidden md:flex space-x-4">
                <span><i class="fas fa-envelope mr-1"></i> info@icett.in</span>
                <span><i class="fas fa-phone mr-1"></i> +91 863 2370444</span>
            </div>
            <div class="flex space-x-4 ml-auto">
                <a href="#" class="hover:text-vitGold transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-vitGold transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-vitGold transition"><i class="fab fa-linkedin-in"></i></a>
                <span class="border-l border-white/20 pl-4 font-semibold">www.icett.in</span>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="bg-white header-shadow sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- Logos -->
                <div class="flex items-center space-x-6 mb-4 md:mb-0">
                    <!-- Placeholder for VIT Logo -->
                    <div class="flex flex-col items-start">
                         <!-- Mimicking VIT Logo Structure with CSS/Text if image fails -->
                        <div class="flex items-center space-x-2">
                            <img src="vitaplogo.png" alt="VIT-AP Logo" class="h-12">

                        </div>
                    </div>
                    <div class="h-10 w-px bg-gray-300 hidden md:block"></div>
                    <div class="flex flex-col leading-tight">
                        <span class="text-lg font-bold text-vitGold">SCOPE</span>
                        <span class="text-[0.65rem] text-gray-500 uppercase font-semibold">School of Computer Science & Engg.</span>
                    </div>
                </div>

                <!-- Navigation -->
                <nav>
                    <ul class="flex flex-wrap justify-center space-x-1 md:space-x-6 text-sm font-semibold text-gray-700">
                        <li><a href="#home" class="hover:text-vitBlue py-2 px-2 transition">Home</a></li>
                        <li><a href="#about" class="hover:text-vitBlue py-2 px-2 transition">About</a></li>
                        <li><a href="#themes" class="hover:text-vitBlue py-2 px-2 transition">Themes</a></li>
                        <li><a href="#dates" class="hover:text-vitBlue py-2 px-2 transition">Dates</a></li>
                        <li><a href="#registration" class="hover:text-vitBlue py-2 px-2 transition">Registration</a></li>
                        <li><a href="#contact" class="hover:text-vitBlue py-2 px-2 transition">Contact</a></li>
                    </ul>
                </nav>
                
                <!-- CTA Button -->
                <a href="#submission" class="hidden md:inline-block bg-vitGold hover:bg-orange-600 text-white font-bold py-2 px-5 rounded-full text-sm transition shadow-md ml-4 transform hover:scale-105 duration-200">
                    Submit Paper
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero-pattern text-white py-16 md:py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-vitDark to-vitBlue opacity-90"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <div class="reveal active">
                <span class="inline-block bg-white/20 backdrop-blur-sm px-4 py-1 rounded-full text-sm font-semibold mb-4 tracking-wide border border-white/30 animate-pulse-slow">
                    15th & 16th May 2026
                </span>
                <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-4 font-serif leading-tight">
                    International Conference on <br>
                    <span class="text-vitGold inline-block transform hover:scale-105 transition duration-300">Emerging Trends</span> and Transformation
                </h1>
                <p class="text-xl md:text-2xl font-light mb-2 opacity-90">(ICETT’26)</p>
                <p class="text-lg opacity-80 mb-8 max-w-2xl mx-auto">
                    Exploring the frontiers of technology, innovation, and digital transformation. 
                    Organized by SCOPE, VIT-AP University.
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4">
                    <a href="#submission" class="bg-vitGold text-white font-bold py-3 px-8 rounded hover:bg-orange-600 transition shadow-lg transform hover:-translate-y-1 hover:shadow-2xl">
                        Call for Papers
                    </a>
                    <a href="#about" class="bg-transparent border-2 border-white text-white font-bold py-3 px-8 rounded hover:bg-white hover:text-vitBlue transition">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="reveal">
                    <h2 class="text-3xl font-bold text-vitBlue mb-2">About The Conference</h2>
                    <div class="h-1 w-20 bg-vitGold mb-6"></div>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        The International Conference on Emerging Trends and Transformation (ICETT’26) aims to bring together leading academicians, scientists, researchers, and research scholars to exchange and share their experiences and research results on all aspects of Emerging Trends in Engineering and Technology.
                    </p>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        ICETT’26 provides a premier interdisciplinary platform for researchers, practitioners, and educators to present and discuss the most recent innovations, trends, and concerns as well as practical challenges encountered and solutions adopted in the fields of Digital Transformation.
                    </p>
                    
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-vitBlue transform hover:bg-blue-50 transition duration-300">
                        <h3 class="font-bold text-lg mb-2 text-vitDark">About SCOPE</h3>
                        <p class="text-sm text-gray-600">
                            The School of Computer Science and Engineering (SCOPE) at VIT-AP University is dedicated to providing high-quality education and research opportunities. With state-of-the-art facilities and a dynamic curriculum, SCOPE aims to produce globally competent professionals.
                        </p>
                    </div>
                </div>
                <div class="relative reveal delay-200">
                    <div class="absolute w-40 h-40 bg-vitGold/20 rounded-full z-0 animate-pulse-slow -top-8 -left-8"></div>
                    <div class="absolute w-56 h-56 bg-vitBlue/10 rounded-full z-0 -bottom-8 -right-8"></div>
                    <!-- Decorative Placeholder for About Image -->
                    <div class="relative z-10 bg-gray-200 rounded-lg overflow-hidden h-96 shadow-xl flex items-center justify-center animate-float">
                        <img 
                            src="01J0212R2ZR8A8K1QKWY4JXDKY.webp" 
                            alt="VIT-AP University Campus" 
                            class="mx-auto rounded-lg shadow-lg h-full w-full object-cover"
                            loading="lazy"
                        >
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Themes / Tracks Section -->
    <section id="themes" class="py-16 bg-lightBg">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 reveal">
                <h2 class="text-3xl font-bold text-vitBlue">Conference Themes</h2>
                <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Covering a wide range of emerging trends and transformations in the digital era.</p>
                <div class="h-1 w-24 bg-vitGold mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Track 1 -->
                <div class="reveal delay-100 bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 border-t-4 border-vitBlue group transform hover:-translate-y-2">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-vitBlue group-hover:bg-vitBlue group-hover:text-white transition duration-300">
                            <i class="fas fa-brain text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold ml-4 text-gray-800">AI & Intelligent Systems</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-600 ml-2 list-disc list-inside marker:text-vitGold">
                        <li>Generative AI & LLMs</li>
                        <li>Explainable AI (XAI)</li>
                        <li>Computer Vision & Image Processing</li>
                        <li>Natural Language Processing</li>
                        <li>Robotics & Automation</li>
                    </ul>
                </div>

                <!-- Track 2 -->
                <div class="reveal delay-200 bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 border-t-4 border-vitGold group transform hover:-translate-y-2">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-orange-50 flex items-center justify-center text-vitGold group-hover:bg-vitGold group-hover:text-white transition duration-300">
                            <i class="fas fa-network-wired text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold ml-4 text-gray-800">IoT & Connectivity</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-600 ml-2 list-disc list-inside marker:text-vitBlue">
                        <li>Internet of Things (IoT)</li>
                        <li>5G/6G Networks</li>
                        <li>Edge & Fog Computing</li>
                        <li>Wireless Sensor Networks</li>
                        <li>Smart Cities & Infrastructure</li>
                    </ul>
                </div>

                <!-- Track 3 -->
                <div class="reveal delay-300 bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 border-t-4 border-vitBlue group transform hover:-translate-y-2">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-vitBlue group-hover:bg-vitBlue group-hover:text-white transition duration-300">
                            <i class="fas fa-shield-alt text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold ml-4 text-gray-800">Security & Blockchain</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-600 ml-2 list-disc list-inside marker:text-vitGold">
                        <li>Cyber Security & Privacy</li>
                        <li>Blockchain & Distributed Ledgers</li>
                        <li>Cryptography</li>
                        <li>Digital Forensics</li>
                        <li>Secure Software Engineering</li>
                    </ul>
                </div>

                <!-- Track 4 -->
                <div class="reveal delay-100 bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 border-t-4 border-vitGold group transform hover:-translate-y-2">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-orange-50 flex items-center justify-center text-vitGold group-hover:bg-vitGold group-hover:text-white transition duration-300">
                            <i class="fas fa-database text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold ml-4 text-gray-800">Data Science & Analytics</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-600 ml-2 list-disc list-inside marker:text-vitBlue">
                        <li>Big Data Analytics</li>
                        <li>Predictive Modelling</li>
                        <li>Data Mining & Warehousing</li>
                        <li>Business Intelligence</li>
                        <li>Cloud Computing</li>
                    </ul>
                </div>

                <!-- Track 5 -->
                <div class="reveal delay-200 bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 border-t-4 border-vitBlue group transform hover:-translate-y-2">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-vitBlue group-hover:bg-vitBlue group-hover:text-white transition duration-300">
                            <i class="fas fa-leaf text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold ml-4 text-gray-800">Sustainable Tech</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-600 ml-2 list-disc list-inside marker:text-vitGold">
                        <li>Green Computing</li>
                        <li>Renewable Energy Technologies</li>
                        <li>E-Waste Management</li>
                        <li>Sustainable Engineering</li>
                        <li>Tech for Social Good</li>
                    </ul>
                </div>

                 <!-- Track 6 -->
                 <div class="reveal delay-300 bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 border-t-4 border-vitGold group transform hover:-translate-y-2">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-orange-50 flex items-center justify-center text-vitGold group-hover:bg-vitGold group-hover:text-white transition duration-300">
                            <i class="fas fa-vr-cardboard text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold ml-4 text-gray-800">Emerging Realities</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-600 ml-2 list-disc list-inside marker:text-vitBlue">
                        <li>Augmented & Virtual Reality</li>
                        <li>Metaverse & Digital Twins</li>
                        <li>Human-Computer Interaction</li>
                        <li>Gaming Technology</li>
                        <li>Quantum Computing</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Important Dates & Banner -->
    <section id="dates" class="py-16 bg-vitDark text-white relative overflow-hidden">
         <!-- Background decoration for dark section -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full blur-3xl -mr-16 -mt-16"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-vitGold/10 rounded-full blur-3xl -ml-16 -mb-16"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row gap-12">
                <div class="md:w-1/2 reveal">
                    <h2 class="text-3xl font-bold mb-6">Important Dates</h2>
                    <div class="space-y-6">
                        <div class="flex items-start group">
                            <div class="bg-vitGold text-white font-bold p-3 rounded-lg text-center min-w-[80px] transform group-hover:scale-110 transition duration-300">
                                <span class="block text-2xl">15</span>
                                <span class="text-xs uppercase">Jan '26</span>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-xl font-bold group-hover:text-vitGold transition">Abstract Submission Deadline</h4>
                                <p class="text-white/70 text-sm">Submit your initial abstracts for review.</p>
                            </div>
                        </div>

                        <div class="flex items-start group">
                            <div class="bg-white/10 text-white font-bold p-3 rounded-lg text-center min-w-[80px] transform group-hover:scale-110 transition duration-300">
                                <span class="block text-2xl">15</span>
                                <span class="text-xs uppercase">Feb '26</span>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-xl font-bold group-hover:text-vitGold transition">Notification of Acceptance</h4>
                                <p class="text-white/70 text-sm">Authors will be notified regarding the status.</p>
                            </div>
                        </div>

                        <div class="flex items-start group">
                            <div class="bg-white/10 text-white font-bold p-3 rounded-lg text-center min-w-[80px] transform group-hover:scale-110 transition duration-300">
                                <span class="block text-2xl">15</span>
                                <span class="text-xs uppercase">Mar '26</span>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-xl font-bold group-hover:text-vitGold transition">Full Paper & Registration</h4>
                                <p class="text-white/70 text-sm">Camera-ready paper submission and early bird registration.</p>
                            </div>
                        </div>

                        <div class="flex items-start group">
                            <div class="bg-white/10 text-white font-bold p-3 rounded-lg text-center min-w-[80px] transform group-hover:scale-110 transition duration-300">
                                <span class="block text-2xl">15</span>
                                <span class="text-xs uppercase">May '26</span>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-xl font-bold group-hover:text-vitGold transition">Conference Dates</h4>
                                <p class="text-white/70 text-sm">ICETT'26 begins at VIT-AP University.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="md:w-1/2 bg-white/5 p-8 rounded-xl border border-white/10 reveal delay-200">
                    <h3 class="text-2xl font-bold text-vitGold mb-4">Publication Partner</h3>
                    <p class="mb-4">All accepted and presented papers will be published in Scopus Indexed Conference Proceedings.</p>
                    <div class="flex flex-wrap gap-4 mb-6">
                         <!-- Placeholders for partners -->
                         <div class="bg-white h-16 w-32 rounded flex items-center justify-center text-gray-500 font-bold hover:shadow-lg transition cursor-default">Scopus</div>
                         <div class="bg-white h-16 w-32 rounded flex items-center justify-center text-gray-500 font-bold hover:shadow-lg transition cursor-default">Springer</div>
                         <div class="bg-white h-16 w-32 rounded flex items-center justify-center text-gray-500 font-bold hover:shadow-lg transition cursor-default">IEEE</div>
                    </div>
                    <a href="#" class="text-vitGold hover:text-white underline transition">View Publication Policy &rarr;</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration -->
    <section id="registration" class="py-16 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-vitBlue mb-8 reveal">Registration Fees</h2>
            <div class="flex flex-wrap justify-center gap-6">
                <!-- Card 1 -->
                <div class="reveal delay-100 w-full md:w-80 border rounded-xl p-6 shadow-sm hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
                    <h3 class="text-lg font-bold text-gray-700">Indian Authors</h3>
                    <div class="text-4xl font-bold text-vitBlue my-4">₹ 6,000</div>
                    <p class="text-sm text-gray-500 mb-6">For Students / Scholars</p>
                    <ul class="text-left text-sm space-y-2 mb-6 text-gray-600">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Conference Kit</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Access to all sessions</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Lunch & Refreshments</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Certificate</li>
                    </ul>
                    <a href="#" class="block w-full py-2 border-2 border-vitBlue text-vitBlue font-bold rounded hover:bg-vitBlue hover:text-white transition">Register Now</a>
                </div>

                 <!-- Card 2 -->
                 <div class="reveal delay-200 w-full md:w-80 border-2 border-vitGold rounded-xl p-6 shadow-md relative transform md:-translate-y-4 bg-white hover:shadow-2xl transition duration-300 hover:scale-105 z-10">
                    <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-vitGold text-white text-xs px-3 py-1 rounded-full font-bold uppercase tracking-wider shadow-lg">Recommended</div>
                    <h3 class="text-lg font-bold text-gray-700">Industry / Faculty</h3>
                    <div class="text-4xl font-bold text-vitBlue my-4">₹ 8,000</div>
                    <p class="text-sm text-gray-500 mb-6">Indian Delegates</p>
                    <ul class="text-left text-sm space-y-2 mb-6 text-gray-600">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Conference Kit</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Networking Dinner</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Publication Fee Included</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Certificate</li>
                    </ul>
                    <a href="#" class="block w-full py-2 bg-vitGold text-white font-bold rounded hover:bg-orange-600 transition shadow-md">Register Now</a>
                </div>

                 <!-- Card 3 -->
                 <div class="reveal delay-300 w-full md:w-80 border rounded-xl p-6 shadow-sm hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
                    <h3 class="text-lg font-bold text-gray-700">Foreign Authors</h3>
                    <div class="text-4xl font-bold text-vitBlue my-4">$ 250</div>
                    <p class="text-sm text-gray-500 mb-6">International Delegates</p>
                    <ul class="text-left text-sm space-y-2 mb-6 text-gray-600">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Virtual Presentation Option</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Access to proceedings</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Lunch & Refreshments</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Certificate</li>
                    </ul>
                    <a href="#" class="block w-full py-2 border-2 border-vitBlue text-vitBlue font-bold rounded hover:bg-vitBlue hover:text-white transition">Register Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900 text-gray-300 py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-white text-lg font-bold mb-4">ICETT'26</h3>
                    <p class="text-sm leading-relaxed mb-4">
                        International Conference on Emerging Trends and Transformation. A premier event for technology enthusiasts and researchers.
                    </p>
                    <div class="flex space-x-3">
                        <a href="#" class="w-8 h-8 rounded bg-gray-700 flex items-center justify-center hover:bg-vitGold text-white transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="w-8 h-8 rounded bg-gray-700 flex items-center justify-center hover:bg-vitGold text-white transition"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="w-8 h-8 rounded bg-gray-700 flex items-center justify-center hover:bg-vitGold text-white transition"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div>
                    <h3 class="text-white text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-vitGold transition">Call for Papers</a></li>
                        <li><a href="#" class="hover:text-vitGold transition">Committee</a></li>
                        <li><a href="#" class="hover:text-vitGold transition">Submission Guidelines</a></li>
                        <li><a href="#" class="hover:text-vitGold transition">Previous Conferences</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white text-lg font-bold mb-4">Contact Us</h3>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-start"><i class="fas fa-map-marker-alt mt-1 mr-2 text-vitGold"></i> SCOPE, VIT-AP University, G-30, Inavolu, Beside NCAP, Amaravati, Andhra Pradesh 522237</li>
                        <li class="flex items-center"><i class="fas fa-envelope mr-2 text-vitGold"></i> icett26@vitap.ac.in</li>
                        <li class="flex items-center"><i class="fas fa-globe mr-2 text-vitGold"></i> www.icett.in</li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white text-lg font-bold mb-4">Location</h3>
                    <!-- Embedded Google Map for VIT-AP University, Amaravati -->
                    <div class="w-full h-32 rounded overflow-hidden">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24966.132504625242!2d80.4952518904973!3d16.497978884765793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a35f27d40f21c55%3A0x1490eacd54859850!2sVIT-AP%20University!5e1!3m2!1sen!2sin!4v1765620738359!5m2!1sen!2sin"
                            width="100%" height="100%" style="border:0; min-height: 8rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            title="VIT-AP University Location"></iframe>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-sm text-gray-500">
                &copy; 2026 VIT-AP University. All Rights Reserved. Designed for ICETT'26.
            </div>
        </div>
    </footer>

    <!-- Reveal Animation Script -->
    <script>
        function reveal() {
            var reveals = document.querySelectorAll(".reveal");
            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 100;
                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                }
            }
        }
        window.addEventListener("scroll", reveal);
        // Trigger once on load
        reveal();
    </script>

</body>
</html>