<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="max-w-4xl mx-auto">
            <div class="max-w-4xl mx-auto flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold">Create New Categories</h2>
                <a href="{{ route('category.index') }}" class="text-blue-500 hover:underline">Back to Articles</a>
            </div>
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                    @enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-white hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-500 focus:ring-opacity-50">Create Article</button>
                </div>                
            </form>
        </div>
    </div>
</x-app-layout>