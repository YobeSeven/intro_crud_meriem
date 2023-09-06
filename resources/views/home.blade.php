<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello world</h1>
    <nav>
        <a href="{{route("home")}}">Home</a>
        <a href="{{route("paniers.index")}}">Panier</a>
        <a href="{{route("products.index")}}">Products Page</a>
        <a href="{{route("products.create")}}">Product create</a>
    </nav>

    @foreach ($products as $product)
        <div>
            <h1>{{$product->name}} : {{$product->stock}}</h1>
            
            @if ($product->stock > 0)
                <form action="{{route("paniers.addFromProduct" , $product->id)}}" method="post">
                    @csrf
                    @method("PUT")
                    <button type="submit">Add to panier</button>
                </form>
            @endif

            @php
                $panier = $paniers->where("product" , $product->name)->first();
            @endphp
            <h1>{{$panier}}</h1>
            @if ($panier)
                <form action="{{route("paniers.removeFromPanier" , $panier->id)}}" method="POST">
                    @csrf
                    @method("PUT")
                    <button type="submit">Remove from panier</button>
                </form>
            @endif
        </div>
    @endforeach
</body>
</html>