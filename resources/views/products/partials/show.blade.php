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
    <h1>show</h1>

    <h3>Produit : {{$product->name}} / Price : {{$product->price}}</h3>
    <h4>Stock : {{$product->stock}}</h4>
    <img src="{{$product->img}}" alt="" width="250px">
</body>
</html>