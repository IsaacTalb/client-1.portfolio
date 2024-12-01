@extends('layouts.front')

@section('title', 'Isaac | Home Page')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tippy.js@6.3.7/dist/tippy.css" />
    <style>
        .swiper-container {
            position: relative; /* Ensure swiper container is positioned relative */
        }

        .swiper-button-next, .swiper-button-prev {
            position: absolute; /* Position buttons absolutely within the swiper */
            top: 50%; /* Center vertically */
            transform: translateY(-50%); /* Adjust for perfect centering */
            z-index: 10; /* Ensure buttons appear above the images */
        }

        .next-arrow, .prev-arrow{
            color: white;


        }

        .swiper-button-next {
            right: 10px; /* Place on the right side */
        }

        .swiper-button-prev {
            left: 10px; /* Place on the left side */
        }

        .swiper-pagination {
            position: absolute; /* Ensure pagination is over the images */
            bottom: 10px;
            left: 0;
            right: 0;
            text-align: center;
        }

        @media (max-width: 768px) {
            .swiper-button-next, .swiper-button-prev {
                top: 70%; /* Adjust for smaller screens */
            }
        }



    </style>
@endsection

@section('content')
<div class="max-w-7xl mx-auto p-6">

    <!-- Hero Section -->
    <div class="text-center py-16 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg mb-12">
        <h1 class="text-5xl font-bold mb-4 animate__animated animate__fadeIn">Transform Your Digital Journey with Isaac!</h1>
        <p class="text-lg font-light px-6 mb-6 animate__animated animate__fadeIn animate__delay-1s">" Isaac Talb is a visionary developer, communicator, and tech enthusiast dedicated to empowering individuals and businesses with impactful solutions. Let’s build the future together! "</p>
        <a href="{{ route('contact') }}" class="bg-white text-blue-600 px-6 py-3 rounded-full font-medium shadow-lg hover:bg-gray-100 animate__animated animate__fadeIn animate__delay-2s">Reach Out</a>
    </div>

    <!-- About Me Section -->
    <div class="mb-16" id="about">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Join My Mission</h2>
        <p class="text-gray-600 text-lg text-center leading-relaxed max-w-3xl mx-auto">
        Isaac's passion for innovation and communication:
            "With a background in Media and Communication and expertise in Laravel development, I combine creativity and technical skills to craft solutions that matter. My mission is to help individuals and organizations realize their potential through the power of technology and storytelling."
        </p>
    </div>

    <!-- Services Section -->
    <div class="mb-16" id="services">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">What I Do</h2>
        <p class="text-gray-600 text-lg text-center leading-relaxed max-w-3xl mx-auto">
            My goal is to bridge the gap between technology and human connection, creating meaningful solutions for today’s challenges.
        </p>
        <br>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-6 bg-white shadow-lg rounded-lg text-center">
                <h3 class="text-2xl font-bold mb-4">Crafting Scalable Web Solutions</h3>
                <p class="text-gray-600">I specialize in developing robust, secure, and user-friendly web applications using modern frameworks like Laravel. Whether you’re building an e-commerce platform, a content management system, or an API, I’m here to bring your ideas to life.</p>
            </div>
            <div class="p-6 bg-white shadow-lg rounded-lg text-center">
                <h3 class="text-2xl font-bold mb-4">Empowering Through Media and Communication</h3>
                <p class="text-gray-600">With a focus on transnational audiences, I craft strategies that resonate. From storytelling to leveraging digital platforms, I help you connect with your audience meaningfully.</p>
            </div>
            <div class="p-6 bg-white shadow-lg rounded-lg text-center">
                <h3 class="text-2xl font-bold mb-4">Exploring Open-Source Possibilities</h3>
                <p class="text-gray-600">I believe in the power of collaboration and open-source technology. By utilizing free, community-driven tools, I ensure accessible and sustainable solutions for your projects.</p>
            </div>
        </div>
    </div>

    <!-- Portfolio Section -->
    <div class="mb-16" id="portfolio">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Recent Updates</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($contents as $content)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Section Title -->
                    <div class="p-4">
                        <h3 class="text-2xl font-bold text-gray-700 mb-2">{!! $content->section_title !!}</h3>
                        <p class="text-gray-600 mb-2">{!! Str::limit(strip_tags($content->section_content), 500) !!}</p>
                        <!-- <p><strong>Created At:</strong> {{ $content->created_at->format('M d, Y h:i A') }}</p> -->
                        <!-- <p><strong>Last Updated:</strong> {{ $content->updated_at->format('M d, Y h:i A') }}</p> -->
                        <p><em>Posted : {{ $content->created_at->diffForHumans() }}</em></p>
                    </div>

                    <!-- Images -->
                    @if ($content->images)
                    <div class="swiper-container w-full max-w-800 mx-auto">
                        <div class="swiper-wrapper">
                            @foreach (json_decode($content->images, true) as $image)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $content->section_title }}" class="w-full h-auto rounded-lg">
                                </div>
                            @endforeach
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- Add Navigation -->
                        <!-- Next Button -->
                        <div class="swiper-button-next  text-black rounded-full p-3 shadow-lg flex items-center justify-center w-12 h-12">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class=" next-arrow w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6l6 6-6 6" />
                            </svg>
                        </div>

                        <!-- Prev Button -->
                        <div class="swiper-button-prev  text-black rounded-full p-3 shadow-lg flex items-center justify-center w-12 h-12">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="prev-arrow w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 6l-6 6 6 6" />
                            </svg>
                        </div>

                    </div>
                    @endif


                    <!-- Video -->

                    @if ($content->video_url)
                        <div class="relative aspect-w-16 aspect-h-9">
                            <iframe 
                                class="absolute inset-0 w-full h-full" 
                                src="{{ $content->video_url }}" 
                                frameborder="0" 
                                allowfullscreen
                            ></iframe>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="mb-16" id="testimonials">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">What Clients Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-6 bg-gray-50 shadow-lg rounded-lg">
                <p class="text-gray-600 italic">" Isaac’s technical expertise helped us optimize our backend processes and elevate our user experience. A true professional with an innovative touch. "</p>
                <h4 class="text-gray-800 font-bold mt-4">— Emanuel Johnson, Project Manager</h4>
            </div>
            <div class="p-6 bg-gray-50 shadow-lg rounded-lg">
                <p class="text-gray-600 italic">" Isaac's ability to translate complex requirements into simple, effective solutions is remarkable. He’s a valuable asset to any team. "</p>
                <h4 class="text-gray-800 font-bold mt-4">— Emily Roberts, Founder of Thrive Digital</h4>
            </div>
            <div class="p-6 bg-gray-50 shadow-lg rounded-lg">
                <p class="text-gray-600 italic">" Working with Isaac was a game-changer for our startup. His commitment to delivering top-notch work is truly inspiring. "</p>
                <h4 class="text-gray-800 font-bold mt-4">— Mark Allen, CEO at Bright Futures</h4>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="mb-16" id="contact">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Get in Touch</h2>
        <form action="{{ route('contact.store') }}" method="POST" class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-bold mb-2">Name</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2 rounded" placeholder="Let me know your name">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-bold mb-2">Mail</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded" placeholder="Your email address">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-sm font-bold mb-2">Message / Questions / Feedback</label>
                <textarea name="message" id="message" class="w-full border border-gray-300 p-2 rounded"></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow-lg hover:bg-blue-700">Send</button>
        </form>
    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
       new Swiper('.swiper-container', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            slidesPerView: 1,
            spaceBetween: 10,
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
        });
    });
</script>
@endpush
