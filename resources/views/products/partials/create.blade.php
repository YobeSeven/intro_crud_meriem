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
    <h1>Create Product</h1>

    <form action="{{route("products.store")}}" method="POST">
        @csrf
        <div>
            <label for="name">Name of product</label>
            <input type="text" name="name" id="name" value="{{old("name")}}">
        </div>
        <div>
            <label for="price">Price of Product</label>
            <input type="number" name="price" id="price" value="{{old("price")}}">
        </div>
        <div>
            <label for="stock">stock of product</label>
            <input type="number" name="stock" id="stock" value="{{old("stock")}}">
        </div>
        <div>
            <label for="img">img of product</label>
            <input type="text" name="img" id="img" value="{{old("img")}}">
        </div>
        <button type="submit">Create a product</button>
    </form>
</body>
</html>