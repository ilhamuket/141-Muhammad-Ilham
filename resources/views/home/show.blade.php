@extends('layouts.home')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mt-6">
        <div class="px-10 py-6 bg-white rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <span class="font-light text-gray-600">{{ $article->created_at->format('d M, Y') }}</span>
                <a href="#" class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500">{{ $article->category->name }}</a>
            </div>
            <div class="mt-2">
                <a href="#" class="text-2xl text-gray-700 font-bold hover:underline">{{ $article->title }}</a>
                <div class="mt-2 text-gray-600">{!! $article->content !!}</div>
            </div>
            <div class="flex justify-between items-center mt-4">
                <div class="flex items-center">
                    <img src="{{ $article->user->profile_photo ? asset($article->user->profile_photo) : 'https://png.pngtree.com/png-vector/20191101/ourmid/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg' }}" alt="avatar" class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block">
                    <h1 class="text-gray-700 font-bold hover:underline">{{ $article->user->name }}</h1>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <h2 class="text-lg font-semibold text-gray-700">Comments</h2>
            <div class="mt-4 max-h-96 overflow-y-auto">
                <ul>
                    @forelse($article->comments as $comment)
                    <li class="border-b border-gray-200 py-2">
                        <div class="flex items-center">
                            <img src="{{ $comment->user->profile_photo ? asset($comment->user->profile_photo) : 'https://png.pngtree.com/png-vector/20191101/ourmid/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg' }}" alt="avatar" class="w-8 h-8 object-cover rounded-full mr-2">
                            <span class="text-gray-700 font-semibold">{{ $comment->user->name }}</span>
                        </div>
                        <p class="text-gray-600 mt-1">{{ $comment->content }}</p>
                    </li>
                    @empty
                    <li class="py-2 text-gray-600">No comments found.</li>
                    @endforelse
                </ul>
            </div>
        </div>
        

        @auth
        <div class="mt-6">
            <h2 class="text-lg font-semibold text-gray-700">Write a Comment</h2>
            <form action="{{ route('comments.store', ['article' => $article->id]) }}" method="POST" class="mt-4">
                @csrf
                
                <textarea name="content" id="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                <button type="submit" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Submit</button>
            </form>
        </div>
        @else
        <div class="mt-6">
            <p class="text-gray-600">Please <a href="{{ route('login') }}" class="text-blue-500 hover:underline">login</a> to write a comment.</p>
        </div>
        @endauth
        
    </div>
</div>
@endsection
