<x-app-layout meta-title="About Galaxy Blog - About us" meta-description="Galaxy Blog idea">




    <section class="w-full  flex flex-col items-center px-3">

        <article class="w-full flex flex-col shadow my-4">
            <!-- Article Image -->
            <div class="hover:opacity-75">
                <img src="/storage/{{ $widget->image }}" class="w-full">
            </div>
            <div class="bg-white flex flex-col justify-start p-6">
                <h1 class="text-3xl font-bold hover:text-gray-700 pb-4"> {!! $widget->getTitle('about-us-page') !!}</h1>
                <div>
                    {!! $widget->getContent('about-us-page') !!}
                </div>
            </div>
        </article>

    </section>






</x-app-layout>
