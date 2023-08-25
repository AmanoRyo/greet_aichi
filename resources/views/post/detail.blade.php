<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('お悩み') }}
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="my-4">
            <div class="flex justify-between mt-8">
                    <p class="text-gray-600">{{ $post->user->name }}</p>
                    <p class="text-gray-600">{{ $post->user->city }}</p>
                    <p class="text-gray-600">#{{ $post->category }}</p>
                    <p class="text-gray-600">{{ $post->updated_at }}</p>
            </div>
            <h1 class="text-2xl font-bold mb-2 border-bottom">Question</h1>
            <h2 class="text-lg font-bold mb-2">{{ $post->title }}</h2>
            <p class="text-gray-1000 mt-4">{{ $post->body }}</p>
        </div>

        <div class="mb-4">
            <form action="{{ route('ans.index',  ['id' => $post->id]) }}" method="get">
                <h1 class="text-2xl font-bold mb-2 border-bottom">Answer</h1>
                <div class="my-4">
                    @if (!empty($post))
                        <ul>
                            @foreach ($post->answers as $ans)
                                <li class="mb-6 bg-white border rounded-lg p-4">
                                    <p class="text-gray-1000 mt-4">{{ $ans->body }}</p>
                                    <div class="flex justify-between mt-8">
                                        <p class="text-gray-600">{{ $ans->user->name }}</p>
                                        <p class="text-gray-600">{{ $ans->updated_at }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="flex justify-center items-center h-full">
                            <p class="text-lg text-gray-600">回答はありません。</p>
                        </div>
                    @endif
                </div>
            </form>
        </div>
        <form action="{{ route('ans.store',  ['id' => $post->id]) }}" method="post">
            @csrf
            <label for="body" class="block text-gray-700 text-sm font-bold mb-2">回答</label>
            <textarea name="body" id="body" rows="6" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required></textarea>
            <div class="flex justify-end">
                <button type="submit" class="py-2 px-4 btn btn-primary">投稿する</button>
            </div>
        </form>
    </div>
</x-app-layout>
