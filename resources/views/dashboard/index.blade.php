@extends('layouts.admin')

@section('content')
<body class="bg-primary">


    <!-- Main Content -->
    <div id="mainContent" class="content-transition lg:ml-64 pt-16">
        <!-- Dashboard Section -->
        <div id="dashboard" class="section-content p-6 fade-in">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-primary">Welcome back, {{ $user->nama }}! 👋</h2>
                <p class="text-secondary mt-2">Ready to continue your career journey? Here's your progress overview.</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="card-shadow rounded-lg p-6 hover-scale">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-secondary">MBTI Type</p>
                                @if ($mbtiResult)
                            <p class="text-2xl font-bold text-purple-600">{{ $mbtiResult->mbti_type }}</p>
                            <p class="text-xs text-secondary mt-1">{{ $mbtiResult->mbti_title }}</p>
                                @else
                            <p class="text-red-600">MBTI result not found.</p>
                                @endif
                        </div>
                        <div class="bg-purple-100 p-3 rounded-full">
                            <i class="fas fa-brain text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="card-shadow rounded-lg p-6 hover-scale">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-secondary">Goals Completed</p>
                            <p class="text-2xl font-bold text-green-600">7/12</p>
                            <p class="text-xs text-secondary mt-1">58% Complete</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-target text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="card-shadow rounded-lg p-6 hover-scale">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-secondary">Career Matches</p>
                            <p class="text-2xl font-bold text-blue-600">15</p>
                            <p class="text-xs text-secondary mt-1">Based on MBTI</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-briefcase text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="card-shadow rounded-lg p-6 hover-scale">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-secondary">Scholarships</p>
                            <p class="text-2xl font-bold text-yellow-600">8</p>
                            <p class="text-xs text-secondary mt-1">Available</p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <i class="fas fa-award text-yellow-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progress Overview -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="card-shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-primary mb-6">Career Development Progress</h3>
                    <div class="flex items-center justify-center mb-6">
                        <div class="relative">
                            <svg class="progress-ring w-32 h-32">
                                <circle cx="64" cy="64" r="56" stroke="var(--border-primary)" stroke-width="8" fill="transparent"></circle>
                                <circle cx="64" cy="64" r="56" stroke="#3b82f6" stroke-width="8" fill="transparent" 
                                        stroke-dasharray="351.86" stroke-dashoffset="105.56" class="progress-ring-circle"></circle>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="text-center">
                                    <span class="text-2xl font-bold text-primary">70%</span>
                                    <p class="text-xs text-secondary">Complete</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-secondary">Self Assessment</span>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">Complete</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-secondary">Career Exploration</span>
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">In Progress</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-secondary">Goal Setting</span>
                            <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs font-medium">Pending</span>
                        </div>
                    </div>
                </div>

                <div class="card-shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-primary mb-4">Recent Activities</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="bg-green-100 p-2 rounded-full">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-primary">Completed MBTI Assessment</p>
                                <p class="text-xs text-secondary">2 days ago</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="bg-blue-100 p-2 rounded-full">
                                <i class="fas fa-eye text-blue-600 text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-primary">Explored Psychology Career Path</p>
                                <p class="text-xs text-secondary">1 week ago</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="bg-purple-100 p-2 rounded-full">
                                <i class="fas fa-bookmark text-purple-600 text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-primary">Saved 3 Scholarship Opportunities</p>
                                <p class="text-xs text-secondary">1 week ago</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="bg-yellow-100 p-2 rounded-full">
                                <i class="fas fa-plus text-yellow-600 text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-primary">Set New Career Goal</p>
                                <p class="text-xs text-secondary">2 weeks ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card-shadow rounded-lg p-6 mb-8">
                <h3 class="text-lg font-semibold text-primary mb-6">Quick Actions</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <button onclick="showSection('mbti')" class="flex items-center space-x-3 p-4 border-2 border-dashed border-primary rounded-lg hover:border-purple-500 hover:bg-purple-50 transition-all">
                        <i class="fas fa-brain text-purple-600 text-xl"></i>
                        <div class="text-left">
                            <p class="font-medium text-primary">Retake MBTI</p>
                            <p class="text-sm text-secondary">Update your personality profile</p>
                        </div>
                    </button>
                    <button onclick="showSection('goals-progress')" class="flex items-center space-x-3 p-4 border-2 border-dashed border-primary rounded-lg hover:border-green-500 hover:bg-green-50 transition-all">
                        <i class="fas fa-plus text-green-600 text-xl"></i>
                        <div class="text-left">
                            <p class="font-medium text-primary">Set New Goal</p>
                            <p class="text-sm text-secondary">Add a career milestone</p>
                        </div>
                    </button>
                    <button onclick="showSection('scholarships')" class="flex items-center space-x-3 p-4 border-2 border-dashed border-primary rounded-lg hover:border-yellow-500 hover:bg-yellow-50 transition-all">
                        <i class="fas fa-search text-yellow-600 text-xl"></i>
                        <div class="text-left">
                            <p class="font-medium text-primary">Find Scholarships</p>
                            <p class="text-sm text-secondary">Discover funding opportunities</p>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Career Path Recommendations -->
            <div class="card-shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-primary mb-6">Recommended for You</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors cursor-pointer hover-scale" onclick="showSection('employment')">
                        <div class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto mb-3 flex items-center justify-center">
                            <i class="fas fa-building text-blue-600 text-xl"></i>
                        </div>
                        <h4 class="font-medium text-primary mb-2">Direct Employment</h4>
                        <p class="text-sm text-secondary">Start your career right after graduation</p>
                    </div>
                    
                    <div class="text-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors cursor-pointer hover-scale" onclick="showSection('higher-education')">
                        <div class="bg-green-100 p-4 rounded-full w-16 h-16 mx-auto mb-3 flex items-center justify-center">
                            <i class="fas fa-university text-green-600 text-xl"></i>
                        </div>
                        <h4 class="font-medium text-primary mb-2">Higher Education</h4>
                        <p class="text-sm text-secondary">Continue your studies at university</p>
                    </div>
                    
                    <div class="text-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors cursor-pointer hover-scale" onclick="showSection('entrepreneurship')">
                        <div class="bg-purple-100 p-4 rounded-full w-16 h-16 mx-auto mb-3 flex items-center justify-center">
                            <i class="fas fa-lightbulb text-purple-600 text-xl"></i>
                        </div>
                        <h4 class="font-medium text-primary mb-2">Entrepreneurship</h4>
                        <p class="text-sm text-secondary">Start your own business venture</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- MBTI Section -->
        <div id="mbti" class="section-content hidden p-6">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-primary">MBTI Personality Assessment</h2>
                <p class="text-secondary mt-2">Discover your personality type and get personalized career recommendations</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="card-shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-primary mb-6">Your Current MBTI Profile</h3>
                    <div class="text-center mb-6">
                        <div class="bg-purple-100 p-8 rounded-full w-32 h-32 mx-auto mb-4 flex items-center justify-center">
                            <span class="text-3xl font-bold text-purple-600">INFP</span>
                        </div>
                        <h4 class="text-xl font-semibold text-primary">The Mediator</h4>
                        <p class="text-secondary mt-2">Poetic, kind and altruistic people, always eager to help a good cause.</p>
                    </div>
                    
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm text-secondary">Introversion (I)</span>
                                <span class="text-sm font-medium text-primary">65%</span>
                            </div>
                            <div class="w-full bg-tertiary rounded-full h-2">
                                <div class="bg-purple-600 h-2 rounded-full progress-bar" style="width: 65%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm text-secondary">Intuition (N)</span>
                                <span class="text-sm font-medium text-primary">78%</span>
                            </div>
                            <div class="w-full bg-tertiary rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full progress-bar" style="width: 78%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm text-secondary">Feeling (F)</span>
                                <span class="text-sm font-medium text-primary">82%</span>
                            </div>
                            <div class="w-full bg-tertiary rounded-full h-2">
                                <div class="bg-green-600 h-2 rounded-full progress-bar" style="width: 82%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm text-secondary">Perceiving (P)</span>
                                <span class="text-sm font-medium text-primary">71%</span>
                            </div>
                            <div class="w-full bg-tertiary rounded-full h-2">
                                <div class="bg-yellow-600 h-2 rounded-full progress-bar" style="width: 71%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="w-full mt-6 btn-primary py-3 px-4 rounded-lg font-medium">
                        <i class="fas fa-redo mr-2"></i>Retake Assessment
                    </button>
                </div>

                <div class="card-shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-primary mb-6">Career Recommendations for INFP</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3 p-4 bg-tertiary rounded-lg hover:bg-accent transition-colors">
                            <div class="bg-red-100 p-2 rounded-full">
                                <i class="fas fa-heart text-red-600"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-primary">Psychology</h4>
                                <p class="text-sm text-secondary mt-1">Help others understand their emotions and behaviors</p>
                                <div class="flex items-center mt-2">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">95% Match</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3 p-4 bg-tertiary rounded-lg hover:bg-accent transition-colors">
                            <div class="bg-blue-100 p-2 rounded-full">
                                <i class="fas fa-pen text-blue-600"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-primary">Creative Writing</h4>
                                <p class="text-sm text-secondary mt-1">Express your creativity through storytelling</p>
                                <div class="flex items-center mt-2">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">92% Match</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3 p-4 bg-tertiary rounded-lg hover:bg-accent transition-colors">
                            <div class="bg-purple-100 p-2 rounded-full">
                                <i class="fas fa-hands-helping text-purple-600"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-primary">Social Work</h4>
                                <p class="text-sm text-secondary mt-1">Make a difference in people's lives</p>
                                <div class="flex items-center mt-2">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">89% Match</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3 p-4 bg-tertiary rounded-lg hover:bg-accent transition-colors">
                            <div class="bg-yellow-100 p-2 rounded-full">
                                <i class="fas fa-chalkboard-teacher text-yellow-600"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-primary">Teaching</h4>
                                <p class="text-sm text-secondary mt-1">Inspire and educate the next generation</p>
                                <div class="flex items-center mt-2">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">87% Match</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="w-full mt-6 btn-primary py-2 px-4 rounded-lg">
                        <i class="fas fa-search mr-2"></i>Explore All Matches
                    </button>
                </div>
            </div>

            <!-- MBTI Learning Resources -->
            <div class="card-shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-primary mb-4">Learn More About Your Type</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-4 border border-primary rounded-lg hover:border-purple-300 transition-colors hover-scale">
                        <i class="fas fa-book text-purple-600 text-2xl mb-3"></i>
                        <h4 class="font-medium text-primary mb-2">INFP Guide</h4>
                        <p class="text-sm text-secondary">Complete guide to understanding your personality</p>
                    </div>
                    <div class="p-4 border border-primary rounded-lg hover:border-blue-300 transition-colors hover-scale">
                        <i class="fas fa-users text-blue-600 text-2xl mb-3"></i>
                        <h4 class="font-medium text-primary mb-2">Relationships</h4>
                        <p class="text-sm text-secondary">How INFPs interact with others</p>
                    </div>
                    <div class="p-4 border border-primary rounded-lg hover:border-green-300 transition-colors hover-scale">
                        <i class="fas fa-chart-line text-green-600 text-2xl mb-3"></i>
                        <h4 class="font-medium text-primary mb-2">Growth Tips</h4>
                        <p class="text-sm text-secondary">Personal development strategies</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Employment Section -->
        <div id="employment" class="section-content hidden p-6">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-primary">Employment Opportunities</h2>
                <p class="text-secondary mt-2">Explore job opportunities and career paths that match your interests</p>
            </div>

            <!-- Job Search -->
            <div class="card-shadow rounded-lg p-6 mb-8">
                <h3 class="text-lg font-semibold text-primary mb-4">Find Your Perfect Job</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input type="text" placeholder="Job title or keyword" class="px-4 py-2 rounded-lg">
                    <select class="px-4 py-2 rounded-lg">
                        <option>All Industries</option>
                        <option>Technology</option>
                        <option>Healthcare</option>
                        <option>Education</option>
                        <option>Creative Arts</option>
                    </select>
                    <button class="btn-primary px-6 py-2 rounded-lg">
                        <i class="fas fa-search mr-2"></i>Search Jobs
                    </button>
                </div>
            </div>

            <!-- Featured Jobs -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="card-shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-primary mb-4">Recommended Jobs for INFP</h3>
                    <div class="space-y-4">
                        <div class="border border-primary rounded-lg p-4 hover:border-blue-300 transition-colors hover-scale">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-medium text-primary">Junior Counselor</h4>
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">New</span>
                            </div>
                            <p class="text-sm text-secondary mb-2">Mental Health Center</p>
                            <p class="text-sm text-secondary mb-3">Help individuals overcome personal challenges and develop coping strategies.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-blue-600">$35,000 - $45,000</span>
                                <button class="btn-primary px-3 py-1 rounded text-sm">Apply</button>
                            </div>
                        </div>

                        <div class="border border-primary rounded-lg p-4 hover:border-blue-300 transition-colors hover-scale">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-medium text-primary">Content Writer</h4>
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">Remote</span>
                            </div>
                            <p class="text-sm text-secondary mb-2">Creative Agency</p>
                            <p class="text-sm text-secondary mb-3">Create engaging content for various digital platforms and marketing campaigns.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-blue-600">$30,000 - $40,000</span>
                                <button class="btn-primary px-3 py-1 rounded text-sm">Apply</button>
                            </div>
                        </div>

                        <div class="border border-primary rounded-lg p-4 hover:border-blue-300 transition-colors hover-scale">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-medium text-primary">Teaching Assistant</h4>
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">Part-time</span>
                            </div>
                            <p class="text-sm text-secondary mb-2">Local Elementary School</p>
                            <p class="text-sm text-secondary mb-3">Support teachers in classroom activities and help students with learning.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-blue-600">$20,000 - $25,000</span>
                                <button class="btn-primary px-3 py-1 rounded text-sm">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-primary mb-4">Career Development Tips</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="bg-blue-100 p-2 rounded-full">
                                <i class="fas fa-file-alt text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Perfect Your Resume</h4>
                                <p class="text-sm text-secondary">Learn how to create a compelling resume that stands out</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="bg-green-100 p-2 rounded-full">
                                <i class="fas fa-comments text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Interview Skills</h4>
                                <p class="text-sm text-secondary">Master the art of job interviews and make great impressions</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="bg-purple-100 p-2 rounded-full">
                                <i class="fas fa-network-wired text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Professional Networking</h4>
                                <p class="text-sm text-secondary">Build meaningful professional relationships</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="bg-yellow-100 p-2 rounded-full">
                                <i class="fas fa-chart-line text-yellow-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Skill Development</h4>
                                <p class="text-sm text-secondary">Identify and develop in-demand skills for your field</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Industry Trends -->
            <div class="card-shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-primary mb-4">Industry Trends</h3>
                <div class="chart-container">
                    <canvas id="industryTrendsChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        <!-- Higher Education Section -->
        <div id="higher-education" class="section-content hidden p-6">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-primary">Higher Education</h2>
                <p class="text-secondary mt-2">Explore universities and degree programs that align with your career goals</p>
            </div>

            <!-- University Search -->
            <div class="card-shadow rounded-lg p-6 mb-8">
                <h3 class="text-lg font-semibold text-primary mb-4">Find Your Ideal University</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <input type="text" placeholder="University name" class="px-4 py-2 rounded-lg">
                    <select class="px-4 py-2 rounded-lg">
                        <option>All Programs</option>
                        <option>Psychology</option>
                        <option>Creative Arts</option>
                        <option>Social Work</option>
                        <option>Education</option>
                    </select>
                    <select class="px-4 py-2 rounded-lg">
                        <option>All Locations</option>
                        <option>Jakarta</option>
                        <option>Bandung</option>
                        <option>Yogyakarta</option>
                        <option>Surabaya</option>
                    </select>
                    <button class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                </div>
            </div>

            <!-- Recommended Programs -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="card-shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-primary mb-4">Recommended Programs for INFP</h3>
                    <div class="space-y-4">
                        <div class="border border-primary rounded-lg p-4 hover:border-green-300 transition-colors hover-scale">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-medium text-primary">Bachelor of Psychology</h4>
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">95% Match</span>
                            </div>
                            <p class="text-sm text-secondary mb-2">University of Indonesia</p>
                            <p class="text-sm text-secondary mb-3">4-year program focusing on human behavior, mental processes, and therapeutic techniques.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-green-600">Accredited A</span>
                                <button class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700">Learn More</button>
                            </div>
                        </div>

                        <div class="border border-primary rounded-lg p-4 hover:border-green-300 transition-colors hover-scale">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-medium text-primary">Bachelor of Social Work</h4>
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">92% Match</span>
                            </div>
                            <p class="text-sm text-secondary mb-2">Gadjah Mada University</p>
                            <p class="text-sm text-secondary mb-3">Comprehensive program in social welfare, community development, and human services.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-green-600">Accredited A</span>
                                <button class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700">Learn More</button>
                            </div>
                        </div>

                        <div class="border border-primary rounded-lg p-4 hover:border-green-300 transition-colors hover-scale">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-medium text-primary">Bachelor of Education</h4>
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">89% Match</span>
                            </div>
                            <p class="text-sm text-secondary mb-2">Indonesia University of Education</p>
                            <p class="text-sm text-secondary mb-3">Teacher preparation program with focus on educational psychology and pedagogy.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-green-600">Accredited A</span>
                                <button class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700">Learn More</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-primary mb-4">University Preparation</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="bg-blue-100 p-2 rounded-full">
                                <i class="fas fa-graduation-cap text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Entrance Exam Prep</h4>
                                <p class="text-sm text-secondary">Prepare for UTBK, SBMPTN, and other university entrance exams</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="bg-green-100 p-2 rounded-full">
                                <i class="fas fa-dollar-sign text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Financial Planning</h4>
                                <p class="text-sm text-secondary">Learn about tuition costs, living expenses, and financial aid options</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="bg-purple-100 p-2 rounded-full">
                                <i class="fas fa-file-alt text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Application Essays</h4>
                                <p class="text-sm text-secondary">Write compelling personal statements and application essays</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="bg-yellow-100 p-2 rounded-full">
                                <i class="fas fa-calendar text-yellow-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Application Timeline</h4>
                                <p class="text-sm text-secondary">Stay on track with important deadlines and requirements</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- University Comparison -->
            <div class="card-shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-primary mb-4">University Comparison</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-primary">
                                <th class="text-left py-3 px-4 text-primary">University</th>
                                <th class="text-left py-3 px-4 text-primary">Program</th>
                                <th class="text-left py-3 px-4 text-primary">Accreditation</th>
                                <th class="text-left py-3 px-4 text-primary">Tuition/Year</th>
                                <th class="text-left py-3 px-4 text-primary">Location</th>
                                <th class="text-left py-3 px-4 text-primary">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-primary hover:bg-tertiary">
                                <td class="py-3 px-4 font-medium text-primary">University of Indonesia</td>
                                <td class="py-3 px-4 text-secondary">Psychology</td>
                                <td class="py-3 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">A</span></td>
                                <td class="py-3 px-4 text-secondary">Rp 12,000,000</td>
                                <td class="py-3 px-4 text-secondary">Jakarta</td>
                                <td class="py-3 px-4"><button class="text-blue-600 hover:text-blue-800">Compare</button></td>
                            </tr>
                            <tr class="border-b border-primary hover:bg-tertiary">
                                <td class="py-3 px-4 font-medium text-primary">Gadjah Mada University</td>
                                <td class="py-3 px-4 text-secondary">Social Work</td>
                                <td class="py-3 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">A</span></td>
                                <td class="py-3 px-4 text-secondary">Rp 10,000,000</td>
                                <td class="py-3 px-4 text-secondary">Yogyakarta</td>
                                <td class="py-3 px-4"><button class="text-blue-600 hover:text-blue-800">Compare</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Entrepreneurship Section -->
        <div id="entrepreneurship" class="section-content hidden p-6">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-primary">Entrepreneurship</h2>
                <p class="text-secondary mt-2">Start your own business and create your own career path</p>
            </div>

            <!-- Business Ideas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="card-shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-primary mb-4">Business Ideas for INFP</h3>
                    <div class="space-y-4">
                        <div class="border border-primary rounded-lg p-4 hover:border-purple-300 transition-colors hover-scale">
                            <div class="flex items-start space-x-3">
                                <div class="bg-purple-100 p-2 rounded-full">
                                    <i class="fas fa-palette text-purple-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-medium text-primary">Creative Services</h4>
                                    <p class="text-sm text-secondary mt-1">Graphic design, writing, photography, or art services</p>
                                    <div class="flex items-center mt-2">
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Low Startup Cost</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border border-primary rounded-lg p-4 hover:border-purple-300 transition-colors hover-scale">
                            <div class="flex items-start space-x-3">
                                <div class="bg-blue-100 p-2 rounded-full">
                                    <i class="fas fa-heart text-blue-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-medium text-primary">Counseling Practice</h4>
                                    <p class="text-sm text-secondary mt-1">Private counseling or therapy practice</p>
                                    <div class="flex items-center mt-2">
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">Requires Certification</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border border-primary rounded-lg p-4 hover:border-purple-300 transition-colors hover-scale">
                            <div class="flex items-start space-x-3">
                                <div class="bg-green-100 p-2 rounded-full">
                                    <i class="fas fa-leaf text-green-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-medium text-primary">Sustainable Products</h4>
                                    <p class="text-sm text-secondary mt-1">Eco-friendly products or services</p>
                                    <div class="flex items-center mt-2">
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">Growing Market</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border border-primary rounded-lg p-4 hover:border-purple-300 transition-colors hover-scale">
                            <div class="flex items-start space-x-3">
                                <div class="bg-yellow-100 p-2 rounded-full">
                                    <i class="fas fa-book text-yellow-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-medium text-primary">Online Education</h4>
                                    <p class="text-sm text-secondary mt-1">Create and sell online courses or tutoring services</p>
                                    <div class="flex items-center mt-2">
                                        <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-xs">Scalable</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-primary mb-4">Startup Resources</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="bg-blue-100 p-2 rounded-full">
                                <i class="fas fa-lightbulb text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Business Plan Template</h4>
                                <p class="text-sm text-secondary">Step-by-step guide to creating your business plan</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="bg-green-100 p-2 rounded-full">
                                <i class="fas fa-dollar-sign text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Funding Options</h4>
                                <p class="text-sm text-secondary">Learn about loans, grants, and investor opportunities</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="bg-purple-100 p-2 rounded-full">
                                <i class="fas fa-users text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Mentorship Program</h4>
                                <p class="text-sm text-secondary">Connect with experienced entrepreneurs</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="bg-yellow-100 p-2 rounded-full">
                                <i class="fas fa-chart-line text-yellow-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Market Research Tools</h4>
                                <p class="text-sm text-secondary">Analyze your target market and competition</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Stories -->
            <div class="card-shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-primary mb-6">Success Stories</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-4 bg-tertiary rounded-lg">
                        <div class="flex items-center space-x-3 mb-3">
                            <img src="/placeholder.svg?height=40&width=40" alt="Success story" class="h-10 w-10 rounded-full">
                            <div>
                                <h4 class="font-medium text-primary">Sarah Chen</h4>
                                <p class="text-sm text-secondary">Graphic Design Studio</p>
                            </div>
                        </div>
                        <p class="text-sm text-secondary">"Started my design studio right after graduation. Now I have 5 employees and work with major brands!"</p>
                    </div>
                    
                    <div class="p-4 bg-tertiary rounded-lg">
                        <div class="flex items-center space-x-3 mb-3">
                            <img src="/placeholder.svg?height=40&width=40" alt="Success story" class="h-10 w-10 rounded-full">
                            <div>
                                <h4 class="font-medium text-primary">Michael Rodriguez</h4>
                                <p class="text-sm text-secondary">Online Education Platform</p>
                            </div>
                        </div>
                        <p class="text-sm text-secondary">"My online tutoring platform now serves over 10,000 students worldwide. Follow your passion!"</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Goals & Progress Section -->
        <div id="goals-progress" class="section-content hidden p-6">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-primary">Goals & Progress</h2>
                <p class="text-secondary mt-2">Set and track your career development milestones</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Add New Goal -->
                <div class="card-shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-primary mb-4">Set New Goal</h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-secondary mb-1">Goal Title</label>
                            <input type="text" class="w-full px-3 py-2 rounded-md" placeholder="e.g., Complete internship">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-secondary mb-1">Category</label>
                            <select class="w-full px-3 py-2 rounded-md">
                                <option>Education</option>
                                <option>Career</option>
                                <option>Skills</option>
                                <option>Personal</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-secondary mb-1">Target Date</label>
                            <input type="date" class="w-full px-3 py-2 rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-secondary mb-1">Description</label>
                            <textarea rows="3" class="w-full px-3 py-2 rounded-md" placeholder="Describe your goal..."></textarea>
                        </div>
                        <button type="submit" class="w-full btn-primary py-2 px-4 rounded-md">
                            <i class="fas fa-plus mr-2"></i>Add Goal
                        </button>
                    </form>
                </div>

                <!-- Current Goals -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="card-shadow rounded-lg p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-primary">Active Goals</h3>
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">5 Active</span>
                        </div>
                        
                        <div class="space-y-4">
                            <!-- Goal Item -->
                            <div class="border border-primary rounded-lg p-4 hover:border-blue-300 transition-colors hover-scale">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="font-medium text-primary">Complete Psychology Course</h4>
                                    <span class="text-sm text-secondary">Due: Dec 2024</span>
                                </div>
                                <p class="text-sm text-secondary mb-3">Finish online psychology fundamentals course to prepare for university</p>
                                <div class="mb-3">
                                    <div class="flex justify-between text-sm mb-1">
                                        <span class="text-secondary">Progress</span>
                                        <span class="font-medium text-primary">75%</span>
                                    </div>
                                    <div class="w-full bg-tertiary rounded-full h-2">
                                        <div class="bg-green-600 h-2 rounded-full progress-bar" style="width: 75%"></div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-medium">Education</span>
                                    <div class="flex space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- More goal items... -->
                            <div class="border border-primary rounded-lg p-4 hover:border-blue-300 transition-colors hover-scale">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="font-medium text-primary">Build Portfolio Website</h4>
                                    <span class="text-sm text-secondary">Due: Jan 2025</span>
                                </div>
                                <p class="text-sm text-secondary mb-3">Create a professional portfolio to showcase my creative work</p>
                                <div class="mb-3">
                                    <div class="flex justify-between text-sm mb-1">
                                        <span class="text-secondary">Progress</span>
                                        <span class="font-medium text-primary">40%</span>
                                    </div>
                                    <div class="w-full bg-tertiary rounded-full h-2">
                                        <div class="bg-blue-600 h-2 rounded-full progress-bar" style="width: 40%"></div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-medium">Skills</span>
                                    <div class="flex space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="border border-primary rounded-lg p-4 hover:border-blue-300 transition-colors hover-scale">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="font-medium text-primary">Apply for University</h4>
                                    <span class="text-sm text-secondary">Due: Mar 2025</span>
                                </div>
                                <p class="text-sm text-secondary mb-3">Submit applications to top 3 psychology programs</p>
                                <div class="mb-3">
                                    <div class="flex justify-between text-sm mb-1">
                                        <span class="text-secondary">Progress</span>
                                        <span class="font-medium text-primary">20%</span>
                                    </div>
                                    <div class="w-full bg-tertiary rounded-full h-2">
                                        <div class="bg-yellow-600 h-2 rounded-full progress-bar" style="width: 20%"></div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-xs font-medium">Career</span>
                                    <div class="flex space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Completed Goals -->
                    <div class="card-shadow rounded-lg p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-primary">Completed Goals</h3>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">7 Completed</span>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex items-center space-x-3 p-3 bg-green-50 rounded-lg">
                                <div class="bg-green-100 p-2 rounded-full">
                                    <i class="fas fa-check text-green-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-medium text-primary">Complete MBTI Assessment</h4>
                                    <p class="text-sm text-secondary">Completed on Nov 15, 2024</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-3 p-3 bg-green-50 rounded-lg">
                                <div class="bg-green-100 p-2 rounded-full">
                                    <i class="fas fa-check text-green-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-medium text-primary">Research Career Options</h4>
                                    <p class="text-sm text-secondary">Completed on Nov 10, 2024</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-3 p-3 bg-green-50 rounded-lg">
                                <div class="bg-green-100 p-2 rounded-full">
                                    <i class="fas fa-check text-green-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-medium text-primary">Join Career Guidance Program</h4>
                                    <p class="text-sm text-secondary">Completed on Nov 1, 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Resources & Tips Section -->
        <div id="resources" class="section-content hidden p-6">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-primary">Resources & Tips</h2>
                <p class="text-secondary mt-2">Helpful resources to guide your career development journey</p>
            </div>

            <!-- Resource Categories -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="card-shadow rounded-lg p-6 hover-scale">
                    <div class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-book text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-primary text-center mb-3">Study Guides</h3>
                    <p class="text-secondary text-center text-sm mb-4">Comprehensive guides for academic success</p>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span class="text-secondary">Effective Study Techniques</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span class="text-secondary">Time Management Tips</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span class="text-secondary">Exam Preparation Strategies</span>
                        </li>
                    </ul>
                </div>

                <div class="card-shadow rounded-lg p-6 hover-scale">
                    <div class="bg-green-100 p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-briefcase text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-primary text-center mb-3">Career Tools</h3>
                    <p class="text-secondary text-center text-sm mb-4">Tools to help you plan your career path</p>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span class="text-secondary">Resume Builder</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span class="text-secondary">Interview Simulator</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span class="text-secondary">Salary Calculator</span>
                        </li>
                    </ul>
                </div>

                <div class="card-shadow rounded-lg p-6 hover-scale">
                    <div class="bg-purple-100 p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-users text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-primary text-center mb-3">Community</h3>
                    <p class="text-secondary text-center text-sm mb-4">Connect with peers and mentors</p>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span class="text-secondary">Student Forums</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span class="text-secondary">Mentorship Program</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span class="text-secondary">Career Events</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Featured Articles -->
            <div class="card-shadow rounded-lg p-6 mb-8">
                <h3 class="text-lg font-semibold text-primary mb-6">Featured Articles</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <article class="border border-primary rounded-lg p-4 hover:border-blue-300 transition-colors hover-scale">
                        <img src="/placeholder.svg?height=200&width=300" alt="Career Planning" class="w-full h-32 object-cover rounded-lg mb-3">
                        <h4 class="font-medium text-primary mb-2">How to Choose the Right Career Path</h4>
                        <p class="text-sm text-secondary mb-3">A comprehensive guide to making informed career decisions based on your interests and skills.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-secondary">5 min read</span>
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Read More</button>
                        </div>
                    </article>

                    <article class="border border-primary rounded-lg p-4 hover:border-blue-300 transition-colors hover-scale">
                        <img src="/placeholder.svg?height=200&width=300" alt="University Prep" class="w-full h-32 object-cover rounded-lg mb-3">
                        <h4 class="font-medium text-primary mb-2">University Application Success Tips</h4>
                        <p class="text-sm text-secondary mb-3">Essential strategies for creating compelling university applications that stand out.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-secondary">7 min read</span>
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Read More</button>
                        </div>
                    </article>

                    <article class="border border-primary rounded-lg p-4 hover:border-blue-300 transition-colors hover-scale">
                        <img src="/placeholder.svg?height=200&width=300" alt="Job Interview" class="w-full h-32 object-cover rounded-lg mb-3">
                        <h4 class="font-medium text-primary mb-2">Mastering Job Interviews</h4>
                        <p class="text-sm text-secondary mb-3">Learn how to prepare for and excel in job interviews with confidence and professionalism.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-secondary">6 min read</span>
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Read More</button>
                        </div>
                    </article>

                    <article class="border border-primary rounded-lg p-4 hover:border-blue-300 transition-colors hover-scale">
                        <img src="/placeholder.svg?height=200&width=300" alt="Networking" class="w-full h-32 object-cover rounded-lg mb-3">
                        <h4 class="font-medium text-primary mb-2">Building Professional Networks</h4>
                        <p class="text-sm text-secondary mb-3">Discover effective strategies for building meaningful professional relationships.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-secondary">4 min read</span>
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Read More</button>
                        </div>
                    </article>
                </div>
            </div>

            <!-- Video Resources -->
            <div class="card-shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-primary mb-6">Video Resources</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="border border-primary rounded-lg p-4 hover-scale">
                        <div class="bg-tertiary rounded-lg h-32 mb-3 flex items-center justify-center">
                            <i class="fas fa-play-circle text-4xl text-secondary"></i>
                        </div>
                        <h4 class="font-medium text-primary mb-2">MBTI Explained</h4>
                        <p class="text-sm text-secondary mb-3">Understanding personality types and career matching</p>
                        <span class="text-xs text-secondary">12:30</span>
                    </div>

                    <div class="border border-primary rounded-lg p-4 hover-scale">
                        <div class="bg-tertiary rounded-lg h-32 mb-3 flex items-center justify-center">
                            <i class="fas fa-play-circle text-4xl text-secondary"></i>
                        </div>
                        <h4 class="font-medium text-primary mb-2">Resume Writing 101</h4>
                        <p class="text-sm text-secondary mb-3">Create a professional resume that gets noticed</p>
                        <span class="text-xs text-secondary">8:45</span>
                    </div>

                    <div class="border border-primary rounded-lg p-4 hover-scale">
                        <div class="bg-tertiary rounded-lg h-32 mb-3 flex items-center justify-center">
                            <i class="fas fa-play-circle text-4xl text-secondary"></i>
                        </div>
                        <h4 class="font-medium text-primary mb-2">University Life</h4>
                        <p class="text-sm text-secondary mb-3">What to expect in your first year of university</p>
                        <span class="text-xs text-secondary">15:20</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scholarships Section -->
        <div id="scholarships" class="section-content hidden p-6">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-primary">Scholarship Opportunities</h2>
                <p class="text-secondary mt-2">Find financial aid opportunities to support your education</p>
            </div>

            <!-- Scholarship Search -->
            <div class="card-shadow rounded-lg p-6 mb-8">
                <h3 class="text-lg font-semibold text-primary mb-4">Find Scholarships</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <input type="text" placeholder="Scholarship name" class="px-4 py-2 rounded-lg">
                    <select class="px-4 py-2 rounded-lg">
                        <option>All Fields</option>
                        <option>Psychology</option>
                        <option>Education</option>
                        <option>Arts & Creative</option>
                        <option>Social Work</option>
                    </select>
                    <select class="px-4 py-2 rounded-lg">
                        <option>All Amounts</option>
                        <option>Under $1,000</option>
                        <option>$1,000 - $5,000</option>
                        <option>$5,000 - $10,000</option>
                        <option>Over $10,000</option>
                    </select>
                    <button class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-colors">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                </div>
            </div>

            <!-- Available Scholarships -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="card-shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-primary mb-6">Recommended for You</h3>
                    <div class="space-y-4">
                        <div class="border border-primary rounded-lg p-4 hover:border-yellow-300 transition-colors hover-scale">
                            <div class="flex justify-between items-start mb-3">
                                <h4 class="font-medium text-primary">Psychology Excellence Scholarship</h4>
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">95% Match</span>
                            </div>
                            <p class="text-sm text-secondary mb-2">Indonesian Psychology Association</p>
                            <p class="text-sm text-secondary mb-3">For students pursuing psychology degrees with academic excellence and community service.</p>
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-lg font-bold text-yellow-600">$5,000</span>
                                <span class="text-sm text-red-600">Deadline: March 15, 2025</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex space-x-2">
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">GPA 3.5+</span>
                                    <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-xs">Community Service</span>
                                </div>
                                <button class="bg-yellow-600 text-white px-3 py-1 rounded text-sm hover:bg-yellow-700">Apply</button>
                            </div>
                        </div>

                        <div class="border border-primary rounded-lg p-4 hover:border-yellow-300 transition-colors hover-scale">
                            <div class="flex justify-between items-start mb-3">
                                <h4 class="font-medium text-primary">Creative Arts Grant</h4>
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">88% Match</span>
                            </div>
                            <p class="text-sm text-secondary mb-2">National Arts Foundation</p>
                            <p class="text-sm text-secondary mb-3">Supporting creative students in visual arts, writing, and design programs.</p>
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-lg font-bold text-yellow-600">$3,000</span>
                                <span class="text-sm text-red-600">Deadline: April 30, 2025</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex space-x-2">
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Portfolio Required</span>
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Financial Need</span>
                                </div>
                                <button class="bg-yellow-600 text-white px-3 py-1 rounded text-sm hover:bg-yellow-700">Apply</button>
                            </div>
                        </div>

                        <div class="border border-primary rounded-lg p-4 hover:border-yellow-300 transition-colors hover-scale">
                            <div class="flex justify-between items-start mb-3">
                                <h4 class="font-medium text-primary">Social Impact Scholarship</h4>
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">92% Match</span>
                            </div>
                            <p class="text-sm text-secondary mb-2">Community Development Fund</p>
                            <p class="text-sm text-secondary mb-3">For students committed to social work and community development.</p>
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-lg font-bold text-yellow-600">$4,500</span>
                                <span class="text-sm text-red-600">Deadline: February 28, 2025</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex space-x-2">
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Essay Required</span>
                                    <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-xs">Volunteer Work</span>
                                </div>
                                <button class="bg-yellow-600 text-white px-3 py-1 rounded text-sm hover:bg-yellow-700">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-primary mb-6">Application Tips</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="bg-blue-100 p-2 rounded-full">
                                <i class="fas fa-calendar text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Start Early</h4>
                                <p class="text-sm text-secondary">Begin your applications at least 2-3 months before deadlines</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="bg-green-100 p-2 rounded-full">
                                <i class="fas fa-file-alt text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Strong Essays</h4>
                                <p class="text-sm text-secondary">Write compelling personal statements that showcase your passion</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="bg-purple-100 p-2 rounded-full">
                                <i class="fas fa-users text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Get References</h4>
                                <p class="text-sm text-secondary">Ask teachers and mentors for strong recommendation letters</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="bg-yellow-100 p-2 rounded-full">
                                <i class="fas fa-check text-yellow-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-primary">Meet Requirements</h4>
                                <p class="text-sm text-secondary">Carefully review and fulfill all eligibility criteria</p>
                            </div>
                        </div>
                    </div>

                    <!-- Scholarship Calendar -->
                    <div class="mt-6 p-4 bg-tertiary rounded-lg">
                        <h4 class="font-medium text-primary mb-3">Upcoming Deadlines</h4>
                        <div class="space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-secondary">Social Impact Scholarship</span>
                                <span class="font-medium text-red-600">Feb 28</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-secondary">Psychology Excellence</span>
                                <span class="font-medium text-red-600">Mar 15</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-secondary">Creative Arts Grant</span>
                                <span class="font-medium text-red-600">Apr 30</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scholarship Statistics -->
            <div class="card-shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-primary mb-4">Scholarship Statistics</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600 mb-2">245</div>
                        <p class="text-sm text-secondary">Available Scholarships</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-green-600 mb-2">$2.5M</div>
                        <p class="text-sm text-secondary">Total Funding Available</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-purple-600 mb-2">1,247</div>
                        <p class="text-sm text-secondary">Students Helped</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-yellow-600 mb-2">78%</div>
                        <p class="text-sm text-secondary">Success Rate</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="mobileOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>
@endsection