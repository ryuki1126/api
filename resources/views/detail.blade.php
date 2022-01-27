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
          <div class="text-xl font-bold">
            <h3>{{ $article->article_title }}</h3>
          </div>
          <div class="pt-4">
            {{ $content }}
          </div>
          <div class="flex items-center pt-8">
            <div class="mx-2">
              <button onclick="location.href='/dashboard'" class="bg-gray-500 border border-gray-500 transition hover:bg-white hover:text-gray-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 m-2 rounded" type="button">
                戻る
              </button>
            </div>
            <div class="mx-2">
              <button onclick="location.href='/edit/{{ $article->id }}'" class="shadow bg-blue-500 border border-blue-500 transition hover:bg-white hover:text-blue-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 m-2 rounded" type="button">
                更新する
              </button>
            </div>
            <div class="mx-2">
              <button onclick="openModal()" class="shadow bg-red-500 border border-red-500 transition hover:bg-white hover:text-red-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 m-2 rounded" type="submit">
                削除
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="modal-content" class="hidden w-1/2 h-1/2 p-6 fixed top-1/4 left-1/4 bg-gray-100 z-20">
    <p class="text-xl">本当に削除しますか?</p>
    <div class="flex pt-10">
      <div class="mx-2">
        <form action="/remove/{{ $article->id }}" method="POST">
          @csrf
          @method('delete')
            <button class="shadow bg-red-500 border border-red-500 transition hover:bg-white hover:text-red-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 m-2 rounded" type="submit">
              削除
            </button>
        </form>
      </div>
      <div class="mx-2">
        <button onclick="closeModal()" class="shadow bg-blue-500 border border-blue-500 transition hover:bg-white hover:text-blue-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 m-2 rounded" type="button">
          いいえ
        </button>
      </div>
    </div>
    <div class="pt-10">
      <p>
        削除された記事は復元することができません。<br>
        削除は十分注意して実行して下さい。
      </p>
    </div>
  </div>
  <div id="modal-overlay" class="hidden z-10 fixed top-0 left-0 w-full h-screen bg-black opacity-75" onclick="closeModal()"></div>
  <script>
    const modal_content = document.getElementById('modal-content')
    const modal_overlay = document.getElementById('modal-overlay')
    function openModal(){
      modal_content.classList.remove('hidden')
      modal_overlay.classList.remove('hidden')
    }

    function closeModal(){
      modal_content.classList.add('hidden')
      modal_overlay.classList.add('hidden')
    }



  </script>
</x-app-layout>