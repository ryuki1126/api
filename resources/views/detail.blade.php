<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      記事内容
    </h2>
  </x-slot>

  @if(session('status'))
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
      <span class="block sm:inline">{{ session('status') }}</span>
    </div>
  @endif

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div>
            <h3>{{ $article->article_title }}</h3>
          </div>
          <div>
            <p>{{ $article->article_content }}</p>
          </div>
          <div class="flex items-center">
            <div class="m-2">
              <button onclick="location.href='/dashboard'" class="bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 m-2 rounded" type="button">
                戻る
              </button>
            </div>
            <div class="m-2">
              <button onclick="location.href='/edit/{{ $article->id }}'" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 m-2 rounded" type="button">
                更新する
              </button>
            </div>
            <div class="m-2">
              <form action="/remove/{{ $article->id }}" method="POST">
                @csrf
                @method('delete')
                  <button class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 m-2 rounded" type="submit">
                    削除
                  </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>