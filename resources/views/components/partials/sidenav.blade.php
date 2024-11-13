<aside class="col-span-1 space-y-6 text-gray-600">

    <div class="p-4 space-y-4 bg-white shadow rounded-lg">
        <div class=" pb-4 border-b">
            {{-- Start Discusson Button --}}
            <a href="{{ route('threads.create') }}" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-yellow-500 border border-transparent rounded hover:bg-yellow-400 active:bg-yellow-600 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25" }}>
                {{ __('Buat Thread') }}
            </a>


        </div>
        <div class="pb-4 space-y-4">
            <p class="text-sm text-gray-500">
                Buat thread baru untuk memulai topik.
            </p>
        </div>

    {{-- Categories --}}
    <div class="p-4 space-y-4 bg-white shadow rounded-lg">
        <div class="pb-4 mb-4 border-b border-gray-200">
            <h2 class="font-bold uppercase">Kategori</h2>
        </div>
        <ul class="space-y-4">
            @foreach ($categories as $data)
            <li>
                <a href="{{ route('threads.sort', $data->slug) }}" class="flex items-center justify-between">
                    {{$data->name}}
                    <span class="px-2 text-white bg-green-300 rounded">
                        @php ($slug = $data->slug)
                        {{ $count = App\Models\Thread::whereHas('category', function (Illuminate\Database\Eloquent\Builder $q) use($slug) {$q->where('slug', '=', $slug);})->count()}}
                    </span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="p-4 space-y-4 bg-white shadow rounded-lg">
        <ul class="space-y-4 text-gray-500">
            <li>
                <a href="{{ '/popular/weeks' }}" class="flex items-center space-x-2">
                    <x-heroicon-s-star class="w-5 h-5 text-yellow-500" />
                    <span>Popular this week</span>
                </a>
            </li>
            <li>
                <a href="{{ '/popular/all' }}" class="flex items-center space-x-2">
                    <x-heroicon-s-fire class="w-5 h-5 text-red-600" />
                    <span>Popular all time</span>
                </a>
            </li>
            <li>
                <a href="{{ '/no-replies' }}" class="flex items-center space-x-2">
                    <x-heroicon-s-chat class="w-5 h-5 text-blue-400" />
                    <span>Reply</span>
                </a>
            </li>
        </ul>
    </div>


</aside>