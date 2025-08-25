@extends('layouts.admin')

@section('content')
<div id="mainContent" class="content-transition lg:ml-64 pt-16 bg-primary min-h-screen">
    <div class="section-content p-6 fade-in max-w-7xl mx-auto">

        {{-- HEADER --}}
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-primary">Entrepreneurship</h1>
                <p class="text-secondary mt-2">Explore business ideas tailored to your interest or MBTI personality type.</p>
            </div>
            <div class="flex items-center gap-4">
                <i class="fas fa-bell text-slate-500 cursor-pointer"></i>
                <div class="w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center text-white text-sm">MM</div>
            </div>
        </div>
    
        {{-- HERO --}}
        <div class="hero-section bg-indigo-50 rounded-2xl p-6 mb-6">
            <h2 class="text-xl font-bold mb-2">Start Your Entrepreneurial Journey</h2>
            <p class="text-slate-600">
                Discover business opportunities that align with your ISTJ personality. 
                Build systematic, structured businesses that leverage your natural strengths in organization and reliability.
            </p>
        </div>
    
        {{-- TABS --}}
        <div class="card-shadow rounded-lg p-4 mb-8 bg-card transition">
            <button onclick="showTab('business')"id="tab-business" class="tab-btn"> Business Ideas </button>
            <button onclick="showTab('market')" id="tab-market" class="tab-btn"> Market Research </button>
            <button onclick="showTab('plan')" id="tab-plan" class="tab-btn"> Business Plan </button>
            <button onclick="showTab('funding')" id="tab-funding" class="tab-btn"> Funding </button>
        </div>

        <div class="flex gap-4 mb-6 border-b"></div>

         {{-- GRID ENTREPRENEURSHIP IDEAS --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">

        <!-- Card -->
        <div class="card-shadow rounded-lg p-6 hover-scale bg-card transition">
            <!-- Header -->
            <div class="flex items-center justify-between mb-3">
                <h3 class="text-xl font-semibold text-primary">Software Agency</h3>
                <span class="px-3 py-1 rounded-full text-sm bg-green-700 text-white">Beginner</span>
            </div>
            
            <!-- Description -->
            <p class="text-sm text-secondary mb-4">
                Build reliable software for SMEs with documentation-focused delivery.
            </p>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-3 mb-4 text-sm">
                <div>
                    <p class="text-sm text-secondary">Startup Cost</p>
                    <p class="text-primary font-medium">$5K-15K</p>
                </div>
                <div>
                    <p class="text-sm text-secondary">Break-even</p>
                    <p class="text-primary font-medium">6-12 mo</p>
                </div>
                <div>
                    <p class="text-sm text-secondary">Growth</p>
                    <p class="text-primary font-medium">High</p>
                </div>
            </div>

            <!-- Tags -->
            <div class="flex flex-wrap gap-2 mb-4">
                <span class="px-3 py-1 rounded-full text-xs bg-blue-700 text-white">Technology</span>
                <span class="px-3 py-1 rounded-full text-xs bg-purple-700 text-white">B2B</span>
                <span class="px-3 py-1 rounded-full text-xs bg-indigo-700 text-white">Scalable</span>
                <span class="px-3 py-1 rounded-full text-xs bg-green-700 text-white">ISTJ Match</span>
            </div>

            <!-- Button -->
            <button class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-500 transition">
                Learn More
            </button>
        </div>

            {{-- Card 2 --}}
            <div class="card-shadow rounded-lg p-6 hover-scale bg-card transition">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-xl font-semibold text-primary">Organic Cafe</h3>
                    <span class="px-3 py-1 rounded-full text-sm bg-yellow-600 text-white">Intermediate</span>
                </div>
                
                <p class="text-sm text-secondary mb-4">
                    Open a café specializing in organic, sustainable, and eco-friendly menu.
                </p>

                <div class="grid grid-cols-3 gap-3 mb-4 text-sm">
                    <div>
                        <p class="text-sm text-secondary">Startup Cost</p>
                        <p class="text-primary font-medium">$20K-40K</p>
                    </div>
                    <div>
                        <p class="text-sm text-secondary">Break-even</p>
                        <p class="text-primary font-medium">12-18 mo</p>
                    </div>
                    <div>
                        <p class="text-sm text-secondary">Growth</p>
                        <p class="text-primary font-medium">Medium</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-3 py-1 rounded-full text-xs bg-green-700 text-white">Food</span>
                    <span class="px-3 py-1 rounded-full text-xs bg-amber-700 text-white">Eco</span>
                    <span class="px-3 py-1 rounded-full text-xs bg-lime-700 text-white">Community</span>
                </div>

                <button class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-500">
                    Learn More
                </button>
            </div>

            {{-- Card 3 --}}
            <div class="card-shadow rounded-lg p-6 hover-scale bg-card transition">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-xl font-semibold text-primary">E-commerce Store</h3>
                    <span class="px-3 py-1 rounded-full text-sm bg-red-700 text-white">Advanced</span>
                </div>
                
                <p class="text-sm text-secondary mb-4">
                    Create an online marketplace focusing on niche products for Gen Z.
                </p>

                <div class="grid grid-cols-3 gap-3 mb-4 text-sm">
                    <div>
                        <p class="text-sm text-secondary">Startup Cost</p>
                        <p class="text-primary font-medium">$10K+</p>
                    </div>
                    <div>
                        <p class="text-sm text-secondary">Break-even</p>
                        <p class="text-primary font-medium">6-9 mo</p>
                    </div>
                    <div>
                        <p class="text-sm text-secondary">Growth</p>
                        <p class="text-primary font-medium">High</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-3 py-1 rounded-full text-xs bg-pink-700 text-white">Retail</span>
                    <span class="px-3 py-1 rounded-full text-xs bg-blue-700 text-white">Digital</span>
                    <span class="px-3 py-1 rounded-full text-xs bg-purple-700 text-white">Scalable</span>
                </div>

                <button class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-500">
                    Learn More
                </button>
            </div>

            {{-- Card 4 --}}
            <div class="card-shadow rounded-lg p-6 hover-scale bg-card transition">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-xl font-semibold text-primary">Freelance Design Studio</h3>
                    <span class="px-3 py-1 rounded-full text-sm bg-green-700 text-white">Beginner</span>
                </div>
                
                <p class="text-sm text-secondary mb-4">
                    Start a creative studio for branding, UI/UX, and digital content.
                </p>

                <div class="grid grid-cols-3 gap-3 mb-4 text-sm">
                    <div>
                        <p class="text-sm text-secondary">Startup Cost</p>
                        <p class="text-primary font-medium">Low</p>
                    </div>
                    <div>
                        <p class="text-sm text-secondary">Break-even</p>
                        <p class="text-primary font-medium">3-6 mo</p>
                    </div>
                    <div>
                        <p class="text-sm text-secondary">Growth</p>
                        <p class="text-primary font-medium">Medium</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-3 py-1 rounded-full text-xs bg-purple-700 text-white">Creative</span>
                    <span class="px-3 py-1 rounded-full text-xs bg-indigo-700 text-white">Freelance</span>
                </div>

                <button class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-500">
                    Learn More
                </button>
            </div>

            {{-- Card 5 --}}
            <div class="card-shadow rounded-lg p-6 hover-scale bg-card transition">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-xl font-semibold text-primary">Fitness App</h3>
                    <span class="px-3 py-1 rounded-full text-sm bg-yellow-600 text-white">Intermediate</span>
                </div>
                
                <p class="text-sm text-secondary mb-4">
                    Build a personalized fitness app with AI-based workout recommendations.
                </p>

                <div class="grid grid-cols-3 gap-3 mb-4 text-sm">
                    <div>
                        <p class="text-sm text-secondary">Startup Cost</p>
                        <p class="text-primary font-medium">$15K-30K</p>
                    </div>
                    <div>
                        <p class="text-sm text-secondary">Break-even</p>
                        <p class="text-primary font-medium">12 mo</p>
                    </div>
                    <div>
                        <p class="text-sm text-secondary">Growth</p>
                        <p class="text-primary font-medium">High</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-3 py-1 rounded-full text-xs bg-blue-700 text-white">Health</span>
                    <span class="px-3 py-1 rounded-full text-xs bg-indigo-700 text-white">Tech</span>
                    <span class="px-3 py-1 rounded-full text-xs bg-pink-700 text-white">App</span>
                </div>

                <button class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-500">
                    Learn More
                </button>
            </div>

            {{-- Card 6 --}}
            <div class="card-shadow rounded-lg p-6 hover-scale bg-card transition">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-xl font-semibold text-primary">Online Course Platform</h3>
                    <span class="px-3 py-1 rounded-full text-sm bg-red-700 text-white">Advanced</span>
                </div>
                
                <p class="text-sm text-secondary mb-4">
                    Build an e-learning platform with curated instructors and affordable courses.
                </p>

                <div class="grid grid-cols-3 gap-3 mb-4 text-sm">
                    <div>
                        <p class="text-sm text-secondary">Startup Cost</p>
                        <p class="text-primary font-medium">$25K+</p>
                    </div>
                    <div>
                        <p class="text-sm text-secondary">Break-even</p>
                        <p class="text-primary font-medium">18 mo</p>
                    </div>
                    <div>
                        <p class="text-sm text-secondary">Growth</p>
                        <p class="text-primary font-medium">High</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-3 py-1 rounded-full text-xs bg-blue-700 text-white">Education</span>
                    <span class="px-3 py-1 rounded-full text-xs bg-purple-700 text-white">Digital</span>
                    <span class="px-3 py-1 rounded-full text-xs bg-green-700 text-white">Scalable</span>
                </div>

                <button class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-500">
                    Learn More
                </button>
            </div>
    
        </div>

        <br>
         <div class="flex gap-4 mb-6 border-b">
        </div>
         <div class="flex gap-4 mb-6 border-b">
        </div>
        
        {{-- RESOURCES --}}
        <div class="card-shadow rounded-lg p-4 mb-8 bg-card transition">
            <h2 class="text-lg font-bold text-primary mb-4">Entrepreneurship Resources</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="resource-item card-shadow rounded-lg p-4 hover-scale bg-card transition">
                    <i class="fas fa-book-open text-indigo-500 text-2xl mb-2"></i>
                    <h4 class="text-lg font-semibold text-primary">Business Plan Templates</h4>
                    <p class="text-sm text-secondary flex items-center gap-1">Structured templates designed for systematic business planning</p>
                </div>
                <div class="resource-item card-shadow rounded-lg p-4 hover-scale bg-card transition">
                    <i class="fas fa-chart-line text-indigo-500 text-2xl mb-2"></i>
                    <h4 class="text-lg font-semibold text-primary">Market Research Tools</h4>
                    <p class="text-sm text-secondary flex items-center gap-1">Data-driven tools for thorough market analysis</p>
                </div>
                <div class="resource-item card-shadow rounded-lg p-4 hover-scale bg-card transition">
                    <i class="fas fa-users text-indigo-500 text-2xl mb-2"></i>
                    <h4 class="text-lg font-semibold text-primary">Mentorship Program</h4>
                    <p class="text-sm text-secondary flex items-center gap-1">Connect with experienced entrepreneurs for guidance</p>
                </div>
                <div class="resource-item card-shadow rounded-lg p-4 hover-scale bg-card transition">
                    <i class="fas fa-dollar-sign text-indigo-500 text-2xl mb-2"></i>
                    <h4 class="text-lg font-semibold text-primary">Funding Directory</h4>
                    <p class="text-sm text-secondary flex items-center gap-1">Comprehensive list of funding sources and investors</p>
                </div>
            </div>
        </div>

        {{-- BUSINESS IDEAS (dummy data) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="card-shadow rounded-lg p-6 hover-scale bg-card transition">
                <h3 class="font-semibold text-lg text-primary">Coffee Shop Franchise</h3>
                <p class="text-sm text-secondary gap-1 mb-2">Scalable business with strong market demand.</p>
                <span class="text-indigo-500 text-sm">Estimated Investment: Rp 50-100jt</span>
            </div>
            <div class="card-shadow rounded-lg p-6 hover-scale bg-card transition">
                <h3 class="font-semibold text-lg text-primary">Digital Marketing Agency</h3>
                <p class="text-sm text-secondary gap-1 mb-2">Help SMEs grow with SEO & social media campaigns.</p>
                <span class="text-indigo-500 text-sm">Estimated Investment: Rp 20-50jt</span>
            </div>
            <div class="card-shadow rounded-lg p-6 hover-scale bg-card transition">
                <h3 class="font-semibold text-lg text-primary">Fashion E-Commerce</h3>
                <p class="text-sm text-secondary gap-1 mb-2">Target Gen Z with fast-fashion online store.</p>
                <span class="text-indigo-500 text-sm">Estimated Investment: Rp 30-80jt</span>
            </div>
        </div>

    </div>
</div>
@endsection
