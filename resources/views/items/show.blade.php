<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class='bg-pink-50'>
    @include('layouts.navbar')
    <div class="px-20 py-8">
        <a href="{{ route('items') }}" class="flex w-fit text-center rounded-lg py-2 px-6 text-pink-900 bg-pink-500 hover:bg-pink-700 hover:text-pink-50 gap-2 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
            Kembali
    </a>
    <div class="flex flex-col justify-center items-center">
        <div class="flex flex-col gap-2 items-center">
            <img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->name }}">
            <h2>{{ $item->name }}</h2>
            <p>{{ $item->description }}</p>
            <p>Rp{{ $item->price }}</p>
            <p>Kota : {{ $item->city }}</p>
            <p>Rating : {{ $item->rating }}</p>
            <p>Stok : {{ $item->stock }}</p>
        </div>

    {{-- <form action="{{ route('items.buy', $item->id) }}" method="POST">
        @csrf
        <button type="submit" {{ $item->stock <= 0 ? 'disabled' : '' }} >Beli</button>
    </form> --}}

    <form action="{{ route('cart.add', $item->id) }}" method="POST">
        @csrf
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="1" min="1" class="border rounded py-2 px-3 text-gray-700">
        <button type="submit" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Add to Cart</button>
    </form>

    <div class="flex mt-2">
        <form action="{{ route('items.edit', $item->id) }}" method="GET">
            @csrf
        <button type="submit" class="mr-2 text-center rounded-lg py-2 px-6 text-pink-900 bg-pink-500 hover:bg-pink-700 hover:text-pink-50">Edit Barang</button>
    </form>

    <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="flex flex-col">
        @csrf
        @method('DELETE')
        <button
        type="submit"
        onclick="return confirm('Anda yakin akan menghapus barang?');"
        class="ml-2 text-center rounded-lg py-2 px-6 text-pink-900 bg-pink-500 hover:bg-pink-700 hover:text-pink-50"
        >
        Hapus Barang
    </button>
</form>
</div>
</div>
</div>
</body>
</html>

