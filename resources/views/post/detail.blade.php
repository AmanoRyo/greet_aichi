<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('詳細') }}
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="my-4">
            <div class="flex justify-between mt-8">
                    <p class="text-gray-600">{{ $post->user->name }}</p>
                    <p class="text-gray-600">#{{ $post->category }}</p>
                    <p class="text-gray-600">{{ $post->updated_at }}</p>
            </div>
            <h1 class="text-lg font-bold mb-2 border-bottom">Question</h1>
            <h2 class="text-lg font-bold mb-2">{{ $post->title }}</h2>
            <p class="text-gray-1000 mt-4">{{ $post->body }}</p>
        </div>
    </div>
</x-app-layout>
