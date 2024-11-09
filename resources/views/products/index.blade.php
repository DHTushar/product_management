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
            <h2 class="text-red-500 text-xl">Products</h2>
            <a href="/products/create" class="bg-green-600 text-white rounded py-2 px-4">Add New Porduct</a>
        </div>
        @if (session('success'))
            <h2 class="text-green-600" py-5 mx-auto>{{session('success')}}</h2>  
        @endif
        <div class="">
          <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
              <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                  <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Product ID</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr class="odd:bg-white even:bg-gray-100">
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-800">{{ $product->id }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-800">{{ $product->product_id }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-800">{{ $product->name }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-800">{{ $product->description }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-800">{{ $product->price }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-800">{{ $product->stock }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-800"><img src="images/{{ $product->image }}" width="80px" alt=""></td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium">
                               <a href="{{route('edit', $product->id)}}" class="bg-green-600 text-white rounded py-2 px-4">Edit</a>
                               <a href="#" onclick="deleteProduct{{$product->id}}" class="bg-red-600 text-white rounded py-2 px-4">Delete</a>

                               <form id="delete-product-from-{{$product->id}}" action="{{route('destroy', $product->id)}}" method="POST">
                                @csrf
                                @method('delete')
                               </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>                
                </div>
              </div>
            </div>
          </div>
        </div>
</body>
</html>

<script>
  function deleteProduct(id) {
      if (confirm("Are you sure you want to delete this product?")) {
          document.getElementById("delete-product-from-" + id).submit();
      }
  }
</script>

