<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-100 via-blue-100 to-purple-200">

    <div class="max-w-md w-full bg-white rounded-2xl shadow-2xl overflow-hidden">
        <!-- Header with optional wave / gradient -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-500 p-6 text-center">
            <h1 class="text-3xl font-bold text-white">Welcome Back</h1>
            <p class="text-sm text-indigo-100 mt-1">Sign in to access your account</p>
        </div>

        <div class="px-8 pt-8 pb-6">
            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input id="email" type="email" name="email" required autofocus
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Forgot your password?
                            </a>
                        </div>
                    @endif
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg
                        shadow-md text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600
                        hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2
                        focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                        Sign In
                    </button>
                </div>
            </form>

            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="bg-white px-2 text-gray-500">Or continue with</span>
                    </div>
                </div>
                <!-- Example: social buttons could go here -->
                <div class="mt-4 grid grid-cols-2 gap-3">
                    <button class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md
                        shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Google
                    </button>
                    <button class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md
                        shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Facebook
                    </button>
                </div>
            </div>
        </div>

        <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 text-center">
            <p class="text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Create one</a>
            </p>
        </div>
    </div>

</body>
</html>
