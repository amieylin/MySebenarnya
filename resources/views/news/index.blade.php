<x-layouts.news>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-news-header />
            
            <div class="glass rounded-3xl shadow-2xl p-8 border border-white/30">
                <div class="mb-6 text-center">
                    <h2 class="text-3xl font-extrabold text-indigo-700">📰 Latest News</h2>
                    <p class="text-gray-600">Stay updated with the latest information</p>
                </div>

                @if(count($news) > 0)
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($news as $item)
                            <div class="glass rounded-2xl shadow-lg p-6 border border-white/20 hover:shadow-xl transition duration-300">
                                @if($item->image)
                                    <div class="mb-4 rounded-xl overflow-hidden h-48">
                                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                    </div>
                                @endif
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="text-xl font-bold text-indigo-700">{{ $item->title }}</h3>
                                    <span class="px-3 py-1 rounded-full text-xs font-medium border {{ $item->getStatusColorClass() }}">
                                        {{ $item->getStatusLabel() }}
                                    </span>
                                </div>
                                <p class="text-gray-600 mb-4">{{ Str::limit($item->content, 100) }}</p>
                                
                                @if($item->encounter_date || $item->name || $item->email)
                                    <div class="mb-4 p-3 bg-indigo-50 rounded-lg">
                                        @if($item->encounter_date)
                                            <p class="text-sm text-gray-600">
                                                <span class="font-semibold">Encounter Date:</span> {{ $item->encounter_date->format('F d, Y') }}
                                            </p>
                                        @endif
                                        
                                        @if($item->name)
                                            <p class="text-sm text-gray-600">
                                                <span class="font-semibold">Submitted by:</span> {{ $item->name }}
                                            </p>
                                        @endif
                                        
                                        @if($item->email)
                                            <p class="text-sm text-gray-600">
                                                <span class="font-semibold">Contact:</span> {{ $item->email }}
                                            </p>
                                        @endif
                                    </div>
                                @endif
                                
                                <div class="flex justify-between items-center">
                                    <div class="text-sm text-gray-500">
                                        {{ $item->created_at->format('F d, Y') }}
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('news.edit', $item) }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded-lg text-sm transition duration-300">
                                            Edit
                                        </a>
                                        <form action="{{ route('news.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this news?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm transition duration-300">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <p class="text-xl text-gray-600">No news available yet.</p>
                        <a href="{{ route('news.create') }}" class="mt-4 inline-block bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-600 hover:to-purple-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg transform transition duration-300 ease-in-out hover:scale-105">
                            Submit Your First News
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.news>