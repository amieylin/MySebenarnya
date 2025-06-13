<div class="bg-gradient-to-r from-indigo-600 to-purple-600 py-6 px-4 sm:px-6 lg:px-8 mb-8 rounded-xl shadow-lg">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col sm:flex-row justify-between items-center">
            <h1 class="text-3xl font-extrabold text-white mb-4 sm:mb-0">
                📰 News Center
            </h1>
            <div class="flex space-x-4">
                <a href="{{ route('news.create') }}" class="bg-white text-indigo-600 hover:bg-indigo-100 font-bold py-2 px-4 rounded-lg shadow transform transition duration-300 ease-in-out hover:scale-105">
                    ✏️ Add News
                </a>
                <a href="{{ route('news.index') }}" class="bg-white text-purple-600 hover:bg-purple-100 font-bold py-2 px-4 rounded-lg shadow transform transition duration-300 ease-in-out hover:scale-105">
                    👁️ View News
                </a>
            </div>
        </div>
    </div>
</div>