<x-layouts.news>
    <div class="min-h-screen bg-gradient-to-br from-purple-200 via-indigo-100 to-pink-200 py-12 flex items-center justify-center">
        <div class="w-full max-w-2xl sm:px-6 lg:px-8">
            <x-news-header />

            <div class="bg-white/60 backdrop-blur-md rounded-3xl shadow-2xl p-8 border border-white/30">
                <div class="mb-6 text-center">
                    <h2 class="text-4xl font-extrabold text-indigo-700">📰 Submit News</h2>
                    <p class="text-gray-700">Share updates with the community</p>
                </div>

                @if(session('success'))
                    <p class="text-green-600 font-medium mb-4 text-center">{{ session('success') }}</p>
                @endif

                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-gray-800 text-sm font-semibold mb-1" for="title">Title</label>
                        <input id="title" name="title" type="text" required
                            class="w-full rounded-xl border-gray-300 shadow focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-3 px-4 transition">
                    </div>

                    <div>
                        <label class="block text-gray-800 text-sm font-semibold mb-1" for="content">Content</label>
                        <textarea id="content" name="content" rows="5" required
                            class="w-full rounded-xl border-gray-300 shadow focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-3 px-4 transition"></textarea>
                    </div>

                    <div>
                        <label class="block text-gray-800 text-sm font-semibold mb-1" for="encounter_date">Encounter Date</label>
                        <input id="encounter_date" name="encounter_date" type="date"
                            class="w-full rounded-xl border-gray-300 shadow focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-3 px-4 transition">
                    </div>

                    <div>
                        <label class="block text-gray-800 text-sm font-semibold mb-1" for="name">Your Name</label>
                        <input id="name" name="name" type="text"
                            class="w-full rounded-xl border-gray-300 shadow focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-3 px-4 transition">
                    </div>

                    <div>
                        <label class="block text-gray-800 text-sm font-semibold mb-1" for="email">Your Email</label>
                        <input id="email" name="email" type="email"
                            class="w-full rounded-xl border-gray-300 shadow focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-3 px-4 transition">
                    </div>

                    <div>
                        <label class="block text-gray-800 text-sm font-semibold mb-1" for="image">Image (optional)</label>
                        <input id="image" name="image" type="file"
                            class="w-full rounded-xl border-gray-300 shadow focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-2 px-3 transition">
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                            class="w-full sm:w-auto bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-600 hover:to-purple-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg transform transition duration-300 ease-in-out hover:scale-105">
                            🚀 Submit News
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.news>
