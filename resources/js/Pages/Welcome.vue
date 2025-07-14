<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-slate-900 to-slate-800 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <img src="/images/download.png" alt="Logo" class="w-20 h-10 rounded-lg" />
                    <span class="font-semibold text-xl">Task Management</span>
                </div>
                <div class="flex space-x-4">
                    <Link
                        v-if="canLogin"
                        :href="route('login')"
                        class="px-4 py-2 rounded-md text-sm font-medium hover:bg-slate-700 transition-colors duration-200"
                    >
                        Login
                    </Link>
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700 transition-colors duration-200"
                    >
                        Register
                    </Link>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Main Content -->
            <div class="text-center mb-16">
                <h1 class="text-5xl font-bold text-slate-900 mb-6 leading-tight">
                    Welcome to
                    <span class="text-blue-600">Cytonn</span>
                    Task Management
                </h1>
                <p class="text-xl text-slate-600 max-w-2xl mx-auto mb-8 leading-relaxed">
                    Streamline your workflow with our intuitive task management system. 
                    Organize, track, and complete your tasks efficiently.
                </p>
                
                <!-- CTA Button -->
                <div class="mb-12">
                    <Link
                        v-if="canRegister && !$page.props.auth.user"
                        :href="route('register')"
                        class="inline-flex items-center px-8 py-3 bg-blue-600 text-white text-lg font-semibold rounded-lg hover:bg-blue-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl"
                    >
                        Get Started
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </Link>
                </div>
            </div>

            <!-- Features Grid -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">Create Tasks</h3>
                    <p class="text-slate-600">Add new tasks with detailed descriptions, deadlines, and priority levels.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">Track Progress</h3>
                    <p class="text-slate-600">Monitor task status and progress with visual indicators and updates.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">Manage Easily</h3>
                    <p class="text-slate-600">Edit, delete, and organize your tasks with a user-friendly interface.</p>
                </div>
            </div>

            <!-- Getting Started Section -->
            <div class="bg-white rounded-2xl shadow-lg p-8 max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold text-slate-900 mb-6 text-center">How to Get Started</h2>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold mt-1">1</div>
                            <div>
                                <h4 class="font-semibold text-slate-900">Create Your Account</h4>
                                <p class="text-slate-600 text-sm">Register or log in to access your personal dashboard.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold mt-1">2</div>
                            <div>
                                <h4 class="font-semibold text-slate-900">Add New Tasks</h4>
                                <p class="text-slate-600 text-sm">Click "Add New Task" and fill in your task details.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold mt-1">3</div>
                            <div>
                                <h4 class="font-semibold text-slate-900">Set Details</h4>
                                <p class="text-slate-600 text-sm">Include title, description, status, and deadline information.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold mt-1">4</div>
                            <div>
                                <h4 class="font-semibold text-slate-900">Save & Organize</h4>
                                <p class="text-slate-600 text-sm">Save tasks to your list and organize them by priority.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold mt-1">5</div>
                            <div>
                                <h4 class="font-semibold text-slate-900">Edit & Update</h4>
                                <p class="text-slate-600 text-sm">Modify or delete tasks anytime from your dashboard.</p>
                            </div>
                        </div>
                        
                        <div class="bg-amber-50 border border-amber-200 rounded-lg p-3 mt-4">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-amber-700 text-sm font-medium">Tip: Refresh the page if new tasks don't appear immediately.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>