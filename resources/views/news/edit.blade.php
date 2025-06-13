<x-layouts.news>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-news-header />
            
            <div class="glass rounded-3xl shadow-2xl p-8 border border-white/30">
                <div class="mb-6 text-center">
                    <h2 class="text-3xl font-extrabold text-indigo-700">📝 Edit News</h2>
                    <p class="text-gray-600">Update your news post</p>
                </div>

                @if(session('success'))
                    <p class="text-green-600 font-medium mb-4 text-center">{{ session('success') }}</p>
                @endif

                <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-gray-800 text-sm font-semibold mb-2" for="title">Title</label>
                        <input id="title" name="title" type="text" value="{{ $news->title }}" required
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-3 px-4">
                    </div>

                    <div>
                        <label class="block text-gray-800 text-sm font-semibold mb-2" for="content">Content</label>
                        <textarea id="content" name="content" rows="5" required
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-3 px-4">{{ $news->content }}</textarea>
                    </div>
                    
                    <div>
                        <label class="block text-gray-800 text-sm font-semibold mb-2" for="encounter_date">Encounter Date</label>
                        <input id="encounter_date" name="encounter_date" type="date" value="{{ $news->encounter_date ? $news->encounter_date->format('Y-m-d') : '' }}"
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-3 px-4">
                    </div>
                    
                    <div>
                        <label class="block text-gray-800 text-sm font-semibold mb-2" for="name">Your Name</label>
                        <input id="name" name="name" type="text" value="{{ $news->name }}"
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-3 px-4">
                    </div>
                    
                    <div>
                        <label class="block text-gray-800 text-sm font-semibold mb-2" for="email">Your Email</label>
                        <input id="email" name="email" type="email" value="{{ $news->email }}"
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-3 px-4">
                    </div>
                    
                    <div>
                        <label class="block text-gray-800 text-sm font-semibold mb-2" for="status">Verification Status</label>
                        <select id="status" name="status" 
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-3 px-4">
                            @foreach(App\Models\News::getStatuses() as $value => $label)
                                <option value="{{ $value }}" {{ $news->status === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-800 text-sm font-semibold mb-2" for="image">Image (optional)</label>
                        @if($news->image)
                            <div class="mb-3">
                                <p class="text-sm text-gray-600 mb-2">Current image:</p>
                                <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="h-32 rounded-lg object-cover">
                            </div>
                        @endif
                        <input id="image" name="image" type="file"
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 py-2 px-3">
                        <p class="text-sm text-gray-500 mt-1">Upload a new image to replace the current one</p>
                    </div>

                    <div class="flex justify-center space-x-4">
                        <a href="{{ route('news.index') }}"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-3 px-6 rounded-xl shadow-lg transform transition duration-300 ease-in-out hover:scale-105">
                            Cancel
                        </a>
                        <button type="submit"
                            class="bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-600 hover:to-purple-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg transform transition duration-300 ease-in-out hover:scale-105">
                            Update News
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.news>