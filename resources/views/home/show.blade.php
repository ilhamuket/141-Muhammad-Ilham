    @extends('layouts.home')

    @section('content')
    <div class="w-full lg:w-8/12">
       
            <div class="mt-6">
                <div class="max-w-4xl px-10 py-6 bg-white rounded-lg shadow-md">
                    <div class="flex justify-between items-center">
                        <span class="font-light text-gray-600">{{ $article->created_at->format('d M, Y') }}</span>
                        <a href="#" class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500">{{ $article->category->name }}</a>
                    </div>
                    <div class="mt-2">
                        <a href="#" class="text-2xl text-gray-700 font-bold hover:underline">{{ $article->title }}</a>
                        <p class="mt-2 text-gray-600">{{$article->content }}</p>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div class="flex items-center">
                            <img src="{{ $article->user->profile_photo ? asset($article->user->profile_photo) : 'https://png.pngtree.com/png-vector/20191101/ourmid/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg' }}" alt="avatar" class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block">
                            <h1 class="text-gray-700 font-bold hover:underline">{{ $article->user->name }}</h1>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
