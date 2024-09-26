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
    <section class="px-20 py-8 flex flex-col gap-8">
        <div class="flex flex-col items-start gap-4 w-fit">
            <a href="{{ route('items') }}" class="flex w-fit text-center rounded-lg py-2 px-6 text-pink-900 bg-pink-500 hover:bg-pink-700 hover:text-pink-50 gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                Kembali
            </a>
            <h1 class="text-3xl font-bold text-martinique-700">Tambah Barang</h1>
        </div>
        <form action="{{ route('items.update', $id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
            @csrf
            
            <div class="flex flex-col gap-1">
                <label for="name" class="text-sm font-medium leading-none">Nama: </label>
                <input type="text" id="name" name="name" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-koromiko-500 focus:border-koromiko-500 block w-full p-2.5 invalid:border-red-500 invalid:focus:border-red-300 invalid:focus:ring-red-500 py-2 px-4" value="{{ old('name', $item->name ?? '') }}"/>
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="description" class="text-sm font-medium leading-none">Deskripsi: </label>
                <textarea id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-koromiko-500 focus:border-koromiko-500 block w-full p-2.5 invalid:border-red-500 invalid:focus:border-red-300 invalid:focus:ring-red-500 py-2 px-4" >{{ old('description', $item->description ?? '') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="price" class="text-sm font-medium leading-none">Harga: </label>
                <input type="number" id="price" name="price" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-koromiko-500 focus:border-koromiko-500 block w-full p-2.5 invalid:border-red-500 invalid:focus:border-red-300 invalid:focus:ring-red-500 py-2 px-4" value="{{ old('price', $item->price ?? '') }}">
                @error('price')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
                
            <div class="flex flex-col gap-1">    
                <label for="stock" class="text-sm font-medium leading-none">Stok: </label>
                <input type="number" step="1" id="stock" name="stock" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-koromiko-500 focus:border-koromiko-500 block w-full p-2.5 invalid:border-red-500 invalid:focus:border-red-300 invalid:focus:ring-red-500 py-2 px-4" value="{{ old('stock', $item->stock ?? '') }}">
                @error('stock')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="city" class="text-sm font-medium leading-none">Kota:</label>
                <input type="text" id="city" name="city" placeholder="e.g. Surabaya" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-koromiko-500 focus:border-koromiko-500 block w-full p-2.5 invalid:border-red-500 invalid:focus:border-red-300 invalid:focus:ring-red-500 py-2 px-4 placeholder:px-2" value="{{ old('city', $item->city ?? '') }}">
                @error('city')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="image" class="text-sm font-medium leading-none">Image (If Any)</label>
                <input type="file" name="image" id="image" class="form-control block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                <img src="{{ asset('storage/images/' . $item->image) }}" alt="Current Image" class="w-32 h-32 object-cover rounded-lg">
                @error('image')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="text-center rounded-lg py-2 px-6 text-pink-900 bg-pink-500 hover:bg-pink-700 hover:text-pink-50">Simpan</button>
        </form>
    </section>
</body>

</html>
