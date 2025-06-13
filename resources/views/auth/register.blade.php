<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(270deg, #e0f2fe, #ede9fe, #e0f2fe);
            background-size: 600% 600%;
            animation: gradientBG 12s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden transform transition hover:scale-105 duration-300">
            <!-- Header with wave + icon -->
            <div class="relative bg-gradient-to-r from-indigo-500 to-purple-600 h-32">
                <div class="absolute inset-0">
                    <svg class="absolute bottom-0 left-0 right-0 text-white opacity-30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="currentColor" fill-opacity="1" d="M0,160L30,160C60,160,120,160,180,186.7C240,213,300,267,360,261.3C420,256,480,192,540,149.3C600,107,660,85,720,101.3C780,117,840,171,900,165.3C960,160,1020,96,1080,80C1140,64,1200,96,1260,106.7C1320,117,1380,107,1410,101.3L1440,96L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
                    </svg>
                </div>
                <div class="absolute top-6 left-0 right-0 flex justify-center">
                    <div class="bg-white rounded-full h-16 w-16 flex items-center justify-center shadow-md">
                        <svg class="h-8 w-8 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="px-8 pt-12 pb-8">
                <h2 class="text-center text-3xl font-extrabold text-gray-900 mb-2">Create Account</h2>
                <p class="text-center text-sm text-gray-600 mb-6">Join our community today</p>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM3 20a7 7 0 0114 0H3z"/>
                                </svg>
                            </div>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                            </div>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input id="password" name="password" type="password" required
                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            I agree to the 
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Terms of Service</a> 
                            and 
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Privacy Policy</a>
                        </label>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-md text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200">
                            Register
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-gray-50 text-center py-4">
                <p class="text-sm text-gray-600">Already have an account? 
                    <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>