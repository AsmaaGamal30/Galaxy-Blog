<?php
/** @var $posts \Iluminate\Pagination\LengthAwarePaginator */
?>
<x-app-layout :meta-description="'The Galaxy tech blog'">
    <div class="container max-w-3xl mx-auto  py-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Latest Post --}}
            <div class="col-span-2">
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pd-1 border-b-2 border-blue-500 mb-3">
                    Latest Post
                </h2>
                <div>
                    <x-post-item :post="$latestPost" />
                </div>
            </div>

            {{-- Popular 3 posts --}}
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pd-1 border-b-2 border-blue-500 mb-3">
                    plpular posts
                </h2>
                <div>
                    @foreach ($popularPosts as $post)
                        <div class="grid grid-cols-4 gap-2 mb-4">
                            <a href="{{ route('view', $post) }}" class="pt-2">
                                <img src="{{ $post->getThumbnail() }}" alt="{{ $post->title }}">
                            </a>
                            <div class="col-span-3">
                                <a href="{{ route('view', $post) }}">
                                    <h3 class="text-sm uppercase whitespace-nowrap truncate">
                                        {{ $post->title }}
                                    </h3>
                                </a>
                                <div class="text-xs">
                                    {{ $post->shortBody(10) }}
                                </div>
                                <a href="{{ route('view', $post) }}"
                                    class="text-xs uppercase text-gray-800 hover:text-black">Continue Reading <i
                                        class="fas fa-arrow-right"></i></a>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        {{-- Recommended posts --}}
        <div class="mb-8">
            <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                Recommended Posts
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                @foreach ($recommendedPosts as $post)
                    <x-post-item :post="$post" :show-author="false" />
                @endforeach
            </div>
        </div>

        {{-- Latest categories --}}

        @foreach ($categories as $category)
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                    Category "{{ $category->title }}"
                    <a href="{{ route('by-category', $category) }}">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </h2>

                <div class="mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        @foreach ($category->publishedPosts()->limit(3)->get() as $post)
                            <x-post-item :post="$post" :show-author="false" />
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</x-app-layout>
