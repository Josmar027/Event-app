<x-main-layout>
    <!-- component -->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Todos los eventos
            </h1>

            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2"> {{-- Mostrar grid de eventos --}}
                @foreach ($events as $event)
                    <div
                        class="lg:flex bg-white dark:shadow-none dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20">
                        <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                            src="{{ asset('/storage/' . $event->image) }}" alt="{{ $event->title }}">

                        <div class="flex flex-col justify-between py-6 lg:mx-6">
                            <a href="{{ route('eventShow', $event->id) }}"
                                class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                                {{ $event->title }}
                            </a>

                            <span
                                class="text-sm text-white dark:text-white-300 bg-sky-950 rounded-md p-2 border-white">{{ $event->country->name }}</span>
                            <span class="flex flex-wrap space-x-2">
                                @foreach ($event->tags as $tag)
                                    <p class="text-sm text-gray-800 p-1 bg-sky-200 rounded-md">{{ $tag->name }}</p>
                                @endforeach
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $events->links() }}
        </div>
    </section>
</x-main-layout>