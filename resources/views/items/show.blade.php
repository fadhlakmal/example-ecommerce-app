<img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->name }}">
<h2>{{ $item->name }}</h2>
<p>{{ $item->description }}</p>
<p>Rp{{ $item->price }}</p>
<P>Kota: {{ $item->city }}</P>
<p>Rating: {{ $item->rating }}</p>
<p>Stok: {{ $item->stock }}</p>

<form action="{{ route('items.buy', $item->id) }}" method="POST">
    @csrf
    <button type="submit" {{ $item->stock <= 0 ? 'disabled' : '' }} >Beli</button>
</form>

<form action="{{ route('items') }}" method="GET">
    @csrf
    <button type="submit">Kembali</button>
</form>

<form action="{{ route('items.edit', $item->id) }}" method="GET">
    @csrf
    <button type="submit">Edit</button>
</form>

<form action="{{ route('items.destroy', $item->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Anda yakin akan menghapus barang?');">Hapus Barang</button>
</form>
