<div class="-mx-8 w-4/12 hidden lg:block">
  <div class="px-8">
      <h1 class="mb-4 text-xl font-bold text-gray-700">Penulis</h1>
      <div class="flex flex-col bg-white max-w-sm px-6 py-4 mx-auto rounded-lg shadow-md">
          <ul class="-mx-4">
              @foreach ($authors as $author)
                  <li class="flex items-center mt-6">
                      <img src="{{ $author->profile_photo ? asset($author->profile_photo) : 'https://via.placeholder.com/40' }}" alt="avatar" class="w-10 h-10 object-cover rounded-full mx-4">
                      <p>
                          <a href="#" class="text-gray-700 font-bold mx-1 hover:underline">{{ $author->name }}</a>
                          <span class="text-gray-700 text-sm font-light">Created {{ $author->articles_count }} Posts</span>
                      </p>
                  </li>
              @endforeach
          </ul>
      </div>
  </div>
  <div class="mt-10 px-8">
      <h1 class="mb-4 text-xl font-bold text-gray-700">Kategori</h1>
      <div class="flex flex-col bg-white px-4 py-6 max-w-sm mx-auto rounded-lg shadow-md">
          <ul>
              @foreach ($categories as $category)
                  <li class="mt-2">
                      <a href="#" class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">{{ $category->name }}</a>
                  </li>
              @endforeach
          </ul>
      </div>
  </div>
  <div class="mt-10 px-8">
      <h1 class="mb-4 text-xl font-bold text-gray-700">Artikel Terbaru</h1>
      <div class="flex flex-col bg-white px-8 py-6 max-w-sm mx-auto rounded-lg shadow-md">
          @foreach ($articles as $article)
              <div class="flex justify-center items-center">
                  <a href="#" class="px-2 py-1 bg-gray-600 text-sm text-green-100 rounded hover:bg-gray-500">{{ $article->category->name }}</a>
              </div>
              <div class="mt-4">
                  <a href="{{ route('home.show', $article) }}" class="text-lg text-gray-700 font-medium hover:underline">{{ $article->title }}</a>
              </div>
              <div class="flex justify-between items-center mt-4">
                  <div class="flex items-center">
                      <img src="{{ $article->user->profile_photo ? asset($article->user->profile_photo) : 'https://via.placeholder.com/40' }}" alt="avatar" class="w-8 h-8 object-cover rounded-full">
                      <a href="#" class="text-gray-700 text-sm mx-3 hover:underline">{{ $article->user->name }}</a>
                  </div>
                  <span class="font-light text-sm text-gray-600">{{ $article->created_at->format('d M Y') }}</span>
              </div>
          @endforeach
      </div>
  </div>
</div>
