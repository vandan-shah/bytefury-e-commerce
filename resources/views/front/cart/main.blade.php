{{-- <body class="bg-gray-100">
    <div class="container mx-auto mt-10">
      <div class="flex my-10 shadow-md">
        <div class="w-3/4 px-10 py-10 bg-white">
          <div class="flex justify-between pb-8 border-b">
            <h1 class="text-2xl font-semibold">Shopping Cart</h1>
            <h2 class="text-2xl font-semibold">{{ShoppingCart::count()}} Items</h2>
          </div>
          <div class="flex mt-10 mb-5">
            <h3 class="w-2/5 text-xs font-semibold text-gray-600 uppercase">Product Details</h3>
            <h3 class="w-1/5 text-xs font-semibold text-center text-gray-600 uppercase">Quantity</h3>
            <h3 class="w-1/5 text-xs font-semibold text-center text-gray-600 uppercase">Price</h3>
            <h3 class="w-1/5 text-xs font-semibold text-center text-gray-600 uppercase">Total</h3>
          </div>
          <div class="flex items-center px-6 py-5 -mx-8 hover:bg-gray-100">
            <div class="flex w-2/5">
              <!-- product -->
              <div class="w-20">
                <img class="h-24" src="https://drive.google.com/uc?id=18KkAVkGFvaGNqPy2DIvTqmUH_nk39o3z" alt="" />
              </div>
              <div class="flex flex-col justify-between flex-grow ml-4">
                <span class="text-sm font-bold">Iphone 6S</span>
                <span class="text-xs text-red-500">Apple</span>
                <a href="#" class="text-xs font-semibold text-gray-500 hover:text-red-500">Remove</a>
              </div>
            </div>
            <div class="flex justify-center w-1/5">
              <a class="mt-1.5">
                <svg class="w-3 text-gray-600 fill-current" viewBox="0 0 448 512">
                  <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                </svg>
              </a>
              <input class="w-8 mx-2 text-center border" type="text" value="1" />
              <a class="mt-1.5">
                <svg class="w-3 text-gray-600 fill-current" viewBox="0 0 448 512">
                  <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                </svg>
              </a>
            </div>
            <span class="w-1/5 text-sm font-semibold text-center">$400.00</span>
            <span class="w-1/5 text-sm font-semibold text-center">$400.00</span>
          </div>
          <a href="/home" class="flex mt-10 text-sm font-semibold text-indigo-600">
            <svg class="w-4 mr-2 text-indigo-600 fill-current" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" /></svg>
            Continue Shopping
          </a>
        </div>
        <div id="summary" class="w-1/4 px-8 py-10 bg-gray-100">
          <h1 class="text-2xl font-semibold">Order Summary</h1>
          <div class="mt-8 border-t">
            <div class="flex justify-between py-6 text-sm font-semibold uppercase">
              <span>Total cost</span>
              <span>$600</span>
            </div>
            <button class="w-full py-3 text-sm font-semibold text-white uppercase bg-indigo-500 hover:bg-indigo-600">Checkout</button>
          </div>
        </div>
      </div>
    </div>
  </body> --}}


 <head>
        <style scoped>
        .abc {
            float: right;
            margin: 1rem;
        }
        </style>
        <title>Blog</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<div class="container">
<h3>Your Product List page is here</h3>


<table class="table">
  <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Brand</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Total</th>
        <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cartitems as $item)
    <tr>
        <td>{{$item->name}}</td>

        <td>
            @if (isset($item[0]) && isset($item[0]['brand']))
                {{$item[0]['brand']}}
            @endif
        </td>

        <td>

            <form action ="{{'/cart/'.$item->__raw_id}}" method="POST">
                @csrf
                @method('PUT')
                {{-- <input type="text" name="qty" value="{{$item->qty}}"> --}}
                <input type="number" value="1" min="1" max="10"  name="qty" value="{{$item->qty}}">
                <input type="submit" class="btn btn-sm btn-default" value="Edit">

            </form>

        </td>
        <td>{{$item->price}}</td>
        <td>{{$item->total}}</td>
        <td>
            <form action="{{'/cart/'.$item->__raw_id}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-sm btn-default" value="Remove">
            </form>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>


