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
    <h1>Page Products</h1>

    @foreach ($products as $product)
        <div>
            <h3>{{$product->name}}</h3>
            <a href="{{route("products.show" , $product->id)}}">Show more details</a>
            <br>
            <a href="{{route("products.edit" , $product->id)}}">Edit {{$product->name}}</a>
            <form action="" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit">Delete product</button>
            </form>
        </div>
        <hr>
    @endforeach
</body>
</html>