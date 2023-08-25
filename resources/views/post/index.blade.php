<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿一覧') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="my-4">
            <a href="{{ route('post.create') }}" class="inline-block py-2 px-4 btn btn-primary text-decoration-none">
                {{ __('投稿する') }}
            </a>

            <a href="{{ route('myposts') }}" class="inline-block ml-4 py-2 px-4 btn btn-secondary text-decoration-none">
                {{ __('自分の投稿を確認する') }}
            </a>
        </div>
    </div>

    <style>
        .card {
            transition: transform 0.3s, box-shadow 0.3s, border-bottom 0.3s; /* アニメーションの速度を調整 */
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            border-bottom: 2px solid transparent; /* 赤線の初期スタイルを設定 */
        }

        .card:hover {
            transform: translateY(-3px); /* Y軸方向に少し上に移動 */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            border-bottom-color: #eb4646; /* マウスオーバー時の赤線の色を設定 */
        }
    </style>

    

    <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="my-4 flex justify-center items-center">
            @if (!empty($posts))
                <ul class="w-full">
                    @foreach ($posts as $index => $post)
                        <li class="mb-4">
                            <div class="card bg-red-400 overflow-hidden shadow-sm sm:rounded-lg rounded-lg">
                                <a href="{{ route('post.detail', ['id' => $post->id]) }}" class="bg-white border-b border-gray-200 p-6 block w-full text-left
                                font-semibold hover:bg-gray-100 text-decoration-none flex flex-col rounded-lg">
                                    <h1 class="text-xl font-bold mb-2 {{ $index % 2 === 0 ? 'text-color-fa8072' : '' }}">{{ $post->title }}</h1>
                                    <h2 class="text-sm mb-2 border-bottom {{ $index % 2 === 0 ? 'text-color-fa8072' : '' }}">{{ Illuminate\Support\Str::limit($post->body, 100, '...') }}</h2>
                                    <div class="flex justify-between mt-2">
                                        <p class="text-gray-400">{{ $post->user->name }}</p>
                                        <p class="text-gray-400">#{{ $post->category }}</p>
                                        <p class="text-gray-400">{{ $post->updated_at }}</p>
                                    </div>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="flex justify-center items-center h-full">
                    <p class="text-lg text-gray-600">投稿はありません。</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
