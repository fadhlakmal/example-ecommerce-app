<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-pink-50">
    @include('layouts.navbar')

    <section class="px-20 py-8">
        <h1 class="text-3xl font-bold text-martinique-700">Your Cart</h1>

        @if($cart && $cart->items->count() > 0)
            <table class="table-auto w-full mt-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Item</th>
                        <th class="px-4 py-2">Quantity</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->items as $cartItem)
                    <tr>
                        <td class="border px-4 py-2">{{ $cartItem->item->name }}</td>
                        <td class="border px-4 py-2">{{ $cartItem->quantity }}</td>
                        <td class="border px-4 py-2">{{ $cartItem->item->price }}</td>
                        <td class="border px-4 py-2">{{ $cartItem->item->price * $cartItem->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <form action="{{ route('cart.checkout') }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Checkout</button>
            </form>

        @else
            <p class="mt-6 text-gray-600">Your cart is empty.</p>
        @endif
    </section>
</body>
</html>
