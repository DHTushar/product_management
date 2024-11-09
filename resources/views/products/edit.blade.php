<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style type="text/tailwindcss">
        @layer utilities {
          .container{
            @apply px-10 mx-auto
          }
        }
      </style>
    <title>Product Management</title>
</head>
<body>
    <div class="container">
        <div class="flex justify-between my-5">
            <h2 class="text-red-500 text-xl">Edit - {{$product->name}}</h2>

            <a href="/products" class="bg-green-600 text-white rounded py-2 px-4">Back to Products</a>
        </div>
        <div>
            <form action="{{route('update', $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-5">
                    <label for="">Product id</label>
                    <input type="text" name="product_id" placeholder="Product id" value="{{$product->product_id}}">
                    @error('product_id')
                        <p class="text-red-600">{{$message}}</p>
                    @enderror
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Name" value="{{$product->name}}">
                    @error('name')
                        <p class="text-red-600">{{$message}}</p>
                    @enderror
                    <label for="">Description</label>
                    <input type="text" name="description" placeholder="Description" value="{{$product->description}}">
                    @error('description')
                        <p class="text-red-600">{{$message}}</p>
                    @enderror
                    <label for="">Price</label>
                    <input type="text" name="price" placeholder="price" value="{{$product->price}}">
                    @error('price')
                        <p class="text-red-600">{{$message}}</p>
                    @enderror
                    <label for="">Stock</label>
                    <input type="text" name="stock" placeholder="Stock" value="{{$product->stock}}">
                    @error('stock')
                        <p class="text-red-600">{{$message}}</p>
                    @enderror
                    <label for="">Iamge</label>
                    <input type="file" name="image" placeholder="Image" value="{{old('image')}}">
                    <div>
                        <input type="submit" class="bg-green-500 text-white py-2 px-4 rounded inline-block">
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</body>
</html>



