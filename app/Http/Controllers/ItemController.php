<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        $items = Item::all();

        return view('items.index', compact('items'));
    }

    public function create() {
        return view('items.create');
    }

    public function store(Request $request): RedirectResponse {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'rating' => 'numeric|between:0,5',
            'kota_asal' => 'string',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg',
        ]);

        $item = new Item;

        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->rating = 0.0;
        $item->city = $request->city;

        if ($request->hasFile('image')) {
            $item->image_url = $request->file('image')->store('images', 'public');
        }

        $item->save();

        return redirect()->route('items')->with('alert-success', 'Item Berhasil Ditambahkan');
    }

    public function show(string $id) {
        $item = Item::findOrFail($id);

        return view('items.show', compact('item'));
    }

    public function destroy(string $id) {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items')->with('alert-success', 'Item Berhasil Dihapus');
    }

    public function edit(string $id) {
        $item = Item::findOrFail($id);

        return view('items.edit', compact('item', 'id'));
    }

    public function update(Request $request, string $id) {

        $request->validate([
            'name' => 'string|max:255|nullable',
            'description' => 'string|nullable',
            'price' => 'numeric|nullable',
            'stock' => 'numeric|nullable',
            'rating' => 'numeric|between:0,5|nullable',
            'kota_asal' => 'string|nullable',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|nullable',
        ]);

        $item = Item::findOrFail($id);

        $item->name = $request->name ?? $item->name;
        $item->description = $request->description ?? $item->description;
        $item->price = $request->price ?? $item->price;
        $item->stock = $request->stock ?? $item->stock;
        $item->rating = $request->rating ?? $item->rating;
        $item->city = $request->city ?? $item->city;

        if ($request->hasFile('image')) {
            $item->image_url = $request->file('image')->store('images', 'public');
        }

        $item->save();

        return redirect()->route('items.show', $id)->with('alert-success', 'Item Berhasil Diubah');
    }

    public function buy(string $id) {
        $item = Item::findOrFail($id);

        if ($item->stock <= 0) {
            return redirect()->route('items.show', $id)->with('alert-success', 'Item Habis');
        }

        $item->stock--;
        $item->save();

        return redirect()->route('items.show', $id)->with('alert-success', 'Item Dibeli');
    }
}
