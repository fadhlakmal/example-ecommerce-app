<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>

<body class="bg-pink-50">
    @include('layouts.navbar')
    <div class="px-20 py-8">
        <div class="flex md:flex-row flex-col justify-between gap-2">
            <h1 class="text-3xl font-bold text-martinique-700 text-center">Produk</h1>
            <a href="{{ route('items.create') }}" class="text-center rounded-lg py-2 px-6 text-pink-900 bg-pink-500 hover:bg-pink-700 hover:text-pink-50">
                Tambah Produk
            </a>
        </div>
        <div class="grid md:grid-cols-4 gap-4">
        @foreach ($items as $item)
            <a href="{{ route('items.show', $item->id) }}">
                <div class="mt-4 h-[350px] bg-white border border-gray-200 rounded-lg shadow p-5 flex flex-col gap-2">
                    <img class="p-8" src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->name }}">
                    <h2 class="text-xl font-semibold tracking-tight text-martinique-700">{{ $item->name }}</h2>
                    <span class="text-xl font-bold text-martinique-700">Rp{{  $item->price }}</span>                    
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/>
                        </svg>    
                        <p>{{ $item->city }}</p>
                    </div>
                    {{-- <p>{{ $item->rating }}</p> --}}
                </div>
            </a>
            @endforeach
        </div>
    </div>
</body>

</html>
