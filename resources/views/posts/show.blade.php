<x-app-layout>

    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>

        <div class="mb-2 text-lg text-gray-500">
            {!!$post->extract!!}
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- Contenido principal --}}
            <div class='lg:col-span-2'>

                <figure>
                   @if ($post->image)
                         <img class="object-cover object-center w-full h-80" src="{{Storage::url($post->image->url)}}" alt="">
                   @else
                         <img class="object-cover object-center w-full h-80" src="https://cdn.pixabay.com/photo/2018/11/19/15/06/bridge-3825439_960_720.jpg" alt="">
                   @endif
                </figure>

                <div class="mt-4 text-base text-gray-500">
                    {!!$post->body!!}
                </div>

            </div>

            {{-- Contenido relacionado --}}
            <aside>
                <h1 class="mb-4 text-2xl font-bold text-gray-600">Más en {{ $post->category->name}}</h1>

                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{route('posts.show', $similar)}}">

                                @if ($similar->image)
                                     <img class="object-cover object-center w-1/4 h-20" src="{{Storage::url($similar->image->url)}}" alt="">
                                @else
                                     <img class="object-cover object-center w-1/4 h-20" src="https://cdn.pixabay.com/photo/2018/11/19/15/06/bridge-3825439_960_720.jpg" alt="">
                                @endif


                                <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>
    </div>
</x-app-layout>
