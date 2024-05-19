@extends('layouts.home')

@section('content')
    <div class="w-full lg:w-8/12">
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Artikel</h1>
            <div>
                <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option>Terbaru</option>
                    <option>Populer</option>
                </select>
            </div>
        </div>
        @forelse ($articles as $article)
            <div class="mt-6">
                <div class="max-w-4xl px-10 py-6 bg-white rounded-lg shadow-md">
                    <div class="flex justify-between items-center">
                        <span class="font-light text-gray-600">{{ $article->created_at->format('d M, Y') }}</span>
                        <a href="{{ route('home.index', ['category' => $article->category->id]) }}" class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500">{{ $article->category->name }}</a>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('home.show', $article) }}" class="text-2xl text-gray-700 font-bold hover:underline">{{ $article->title }}</a>
                        <div class="mt-2 text-gray-600">
                            {!! Str::limit(strip_tags($article->content), 150, '...') !!}
                        </div>                        
                    </div>
                    @if($article->image)
                    <div class="mt-4">
                        <img src="{{ asset($article->image) }}" alt="Article Image" class="rounded-lg object-cover w-full h-48">
                    </div>
        @endif
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('home.show', $article) }}" class="text-blue-500 hover:underline">Read more</a>
                        <div class="flex items-center">
                            <img src="{{ $article->user->profile_photo ? asset($article->user->profile_photo) : 'https://png.pngtree.com/png-vector/20191101/ourmid/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg' }}" alt="avatar" class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block">
                            <h1 class="text-gray-700 font-bold hover:underline">{{ $article->user->name }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-600">No articles available.</p>
        @endforelse

        <div class="mt-8">
            <div class="flex">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection
