<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="{{route("home")}}">Home</a>
        <a href="{{route("paniers.index")}}">Panier</a>
        <a href="{{route("products.index")}}">Products Page</a>
        <a href="{{route("products.create")}}">Product create</a>
    </nav>
    <h1>Panier</h1>

    @foreach ($paniers as $panier)
        <h1>{{$panier->product}} : {{$panier->number}}</h1>

        @php
            $product = $products->where("name" , $panier->product)->first();
        @endphp
        @if ($product->stock > 0)
            <form action="{{route("paniers.addFromProduct" , $product->id)}}" method="post">
                @csrf
                @method("PUT")
                <button type="submit">Add</button>
            </form>
        @endif

        <form action="{{route("paniers.removeFromPanier" , $panier->id)}}" method="POST">
            @csrf
            @method("PUT")
            <button type="submit">remove</button>
        </form>

    @endforeach
</body>
</html>