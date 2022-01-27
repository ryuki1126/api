<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  @if(session('status'))
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
      <span class="block sm:inline">{{ session('status') }}</span>
    </div>
  @endif

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="overflow-hidden sm:rounded-lg">
        <div>
          @foreach($articles as $article)
            <div class="w-full flex justify-between p-6 m-2  shadow-sm  bg-white border-b border-gray-200">
              <div>
                <h3 class="text-xl">{{ $article->article_title }}</h3>
                <div class="flex pt-4">
                  <button onclick="location.href='/detail/{{ $article->id }}'" class="shadow bg-gray-500 border border-gray-500 transition hover:bg-white hover:text-gray-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 m-2 rounded" type="button">
                    詳細
                  </button>
                  <button onclick="location.href='/edit/{{ $article->id }}'" class="shadow bg-blue-500 border border-blue-500 transition hover:bg-white hover:text-blue-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 m-2 rounded" type="button">
                    更新する
                  </button>
                </div>
              </div>
              <div>
                <div class="flex pt-12">
                  <div class="px-2">
                    <p>作成日</p>
                    <span>{{ $article->created_at }}</span>
                  </div>
                  <div class="px-2">
                    <p>更新日</p>
                    <span>{{ $article->updated_at }}</span>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="flex justify-center mt-3">
          {{ $articles->links() }}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
