<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      記事の更新
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="w-full mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="/update" method="POST">
            @csrf
            @method('PATCH')
            <div>
              記事ID：{{ $article->id }}
              <input type="hidden" name="id" id="id" value="{{ $article->id }}">
            </div>
            <div class="py-2">
              <label for="title">タイトル</label>
              <input required type="text" name="title" id="title" value="{{ $article->article_title }}">
            </div>
            <div class="py-2">
              <div>
                <label for="content">本文</label>
              </div>
              <textarea required name="content" id="content" cols="60" rows="20" value="{{ $article->article_content }}"></textarea>
            </div>
            <div>
              <button type="button" onclick="location.href='/dashboard'" class="px-4 py-2 m-2 bg-gray-500 hover:bg-gray-400 font-bold text-white border transition rounded">戻る</button>
              <button type="submit" class="px-4 py-2 m-2 bg-blue-500 hover:bg-white font-bold text-white hover:text-blue-500 border border-blue-500 transition rounded">更新する</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    const article_content = '{{ $article->article_content }}'

    getTextareaData()
    function getTextareaData() {
      document.getElementById('content').value = article_content
    }
  </script>
</x-app-layout>