<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .card-item {
            width: 300px;
            height: 400px;
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
            text-align: left;
        }

        .card-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div>
        <a href="{{ route('items.create') }}">Tambah Barang</a>
    </div>

    <div class="card-container">
        @foreach ($items as $item)
            <div class="card-item">
                <img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->name }}">
                <h2>{{ $item->name }}</h2>
                <p>Rp{{ $item->price }}</p>
                <P>{{ $item->city }}</P>
                <p>{{ $item->rating }}</p>
                <a href="{{ route('items.show', $item->id) }}">Lihat Barang</a>
            </div>
        @endforeach
    </div>
</body>

</html>
