
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight text-center">
            {{ __('Submit News') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-indigo-100 via-blue-100 to-purple-200 py-12 flex items-center justify-center">
        <div class="max-w-2xl w-full sm:px-6 lg:px-8">
            <div class="bg-white shadow-2xl rounded-2xl overflow-hidden p-8">
                @if(session('success'))
                    <p class="text-green-600 font-medium mb-4 text-center">{{ session('success') }}</p>
                @endif

                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="title">Title</label>
                        <input id="title" name="title" type="text" required
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-3 px-4">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="content">Content</label>
                        <textarea id="content" name="content" rows="5" required
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-3 px-4"></textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="image">Image (optional)</label>
                        <input id="image" name="image" type="file"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-2 px-3">
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                            class="w-full sm:w-auto bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-600 hover:to-purple-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out">
                            Submit News
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

