<x-main-layout>
    <!-- component -->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Todas las imagenes
            </h1>

            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                {{-- Mostrar grid de eventos --}}
                @foreach ($galleries as $gallery)
                    <div
                        class="flex items-center justify-center bg-white dark:shadow-none dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20">

                        <img class="object-cover w-1/2 h-56 rounded-l-lg lg:w-64"
                            src="{{ asset('/storage/' . $gallery->image) }}" alt="{{ $gallery->caption }}">

                        <div class="p-4 w-1/2">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $gallery->caption }}
                            </h2>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $galleries->links() }}
        </div>
    </section>
</x-main-layout>
