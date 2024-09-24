<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 600px;
        }

        input, textarea {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>
        Tambah Barang
    </h1>
    <div>
        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Nama: </label>
            <input type="text" id="name" name="name" required>

            <label for="description">Deskripsi: </label>
            <textarea id="description" name="description"></textarea>

            <label for="price">Harga: </label>
            <input type="number" id="price" name="price" required>

            <label for="stock">Stok: </label>
            <input type="number" step="1" id="stock" name="stock" required>

            <label for="city">Kota:</label>
            <input type="text" id="city" name="city" placeholder="e.g. Surabaya">

            <label for="image">Image (If Any)</label>
            <input type="file" name="image" id="image" class="form-control">

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
