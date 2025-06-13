<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Verify Your Email Address') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (session('resent'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                <p class="mb-4">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                <p>
                    {{ __('If you did not receive the email') }},
                    <form class="inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="text-blue-600 hover:text-blue-800 underline">{{ __('click here to request another') }}</button>.
                    </form>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
