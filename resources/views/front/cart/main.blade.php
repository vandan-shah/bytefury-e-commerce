<body class="bg-gray-100">
  <div class="container mx-auto mt-10">
    @if (!$cartitems->isEmpty())
      <div class="flex my-10 shadow-md">
        <div class="w-3/4 px-10 py-10 bg-white">
          <div class="flex justify-between pb-8 border-b">
            <h1 class="text-2xl font-semibold">Shopping Cart</h1>
            <h2 class="text-2xl font-semibold">{{ ShoppingCart::countRows() }} Items</h2>
          </div>

          <div class="flex mt-10 mb-5">
            <h3 class="w-2/5 text-xs font-semibold text-gray-600 uppercase">Product Details</h3>
            <h3 class="w-1/5 text-xs font-semibold text-center text-gray-600 uppercase">Quantity</h3>
            <h3 class="w-1/5 text-xs font-semibold text-center text-gray-600 uppercase">Price</h3>
            <h3 class="w-1/5 text-xs font-semibold text-center text-gray-600 uppercase">Total</h3>
          </div>

          @foreach($cartitems as $item)
            <div class="flex items-center px-6 py-5 -mx-8 hover:bg-gray-100">
              <div class="flex w-2/5">
                <!-- product -->
                <div class="w-20">
                  <img class="h-24" src="{{$item[0]['url']}}" alt="pimage" />
                </div>
                <div class="flex flex-col justify-between flex-grow ml-4">
                  <span class="text-sm font-bold">{{ $item->name }}</span>
                  <span class="text-xs text-red-500">{{ $item[0]['brand'] }}</span>
                  <form action="{{'/cart/'.$item->__raw_id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="text-xs font-semibold text-gray-500 bg-white hover:text-red-500" value="Remove" />
                  </form>
                </div>
              </div>


              <div class="flex justify-center w-1/5">
                <form action ="{{'/cart/'.$item->__raw_id}}" method="POST">
                  @csrf
                  @method('PUT')
                  <input class="w-8 mx-2 text-center border" name="qty" type="number" value="{{$item->qty}}" min="1" max="10" />
                  <button type="submit" class="bg-white cursor-pointer">Update</button>
                </form>
              </div>

              <span class="w-1/5 text-sm font-semibold text-center"><i class="fas fa-rupee-sign"></i> {{ $item->price }}</span>
              <span class="w-1/5 text-sm font-semibold text-center"><i class="fas fa-rupee-sign"></i> {{ $item->total }}</span>
            </div>
          @endforeach


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
              <span><i class="fas fa-rupee-sign"></i> {{ ShoppingCart::totalPrice() }}</span>
            </div>

            <form action="{{route('cart.store')}}" method="POST">
              @csrf
              <button type="submit" class="w-full py-3 text-sm font-semibold text-white uppercase bg-indigo-500 hover:bg-indigo-600">Checkout</button>
            </form>
          </div>
        </div>
      </div>
    @else
      <div class="my-48 text-center">
        <img class="mx-auto" src="assets/img/emptycart.png" alt="empty"><br>
        <a href="/allproducts" class="text-lg font-semibold text-indigo-600 allproduct">
          Continue Shopping
        </a>
      </div>
    @endif
  </div>
</body>