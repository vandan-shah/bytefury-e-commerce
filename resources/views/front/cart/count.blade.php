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
                            <img class="h-24" src="{{ $item->url }}" alt="pimage" />
                        </div>
                        <div class="flex flex-col justify-between flex-grow ml-4">
                            <span class="text-sm font-bold">{{ $item->name }}</span>
                            <span class="text-xs text-red-500">{{ $item[0]['brand'] }}</span>
                            <form action="{{'/cart/'.$item->__raw_id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="bg-white text-xs font-semibold text-gray-500 hover:text-red-500" value="Remove" />
                            </form>
                        </div>
                    </div>
            
                    <count price="{{ $item->price }}" inline-template>
                        <div class="flex justify-center w-1/5">
              
                
                            <button @click="decrement()" class="mt-1.5">
                                <svg class="w-3 text-gray-600 fill-current" viewBox="0 0 448 512">
                                    <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                </svg>
                            </button>
                            <input class="w-8 mx-2 text-center border" type="text" value="1" min="1" max="10" v-model="count">
                            <button @click="increment" class="mt-1.5">
                                <svg class="w-3 text-gray-600 fill-current" viewBox="0 0 448 512">
                                    <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                </svg>
                            </button>
                            <span class="w-1/5 text-sm font-semibold text-center"><i class="fas fa-rupee-sign"></i> {{ $item->price }}
                            </span>
                            <span class="w-1/5 text-sm font-semibold text-center"><i class="fas fa-rupee-sign"></i> @{{ totalPrice }}
                            </span>
                        
                        </div>
                        
                        
                    
                    </count>
                </div>          
                @endforeach

          
                <a href="/home" class="flex mt-10 text-sm font-semibold text-indigo-600">
                    <svg class="w-4 mr-2 text-indigo-600 fill-current" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                    </svg>
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
                    <button class="w-full py-3 text-sm font-semibold text-white uppercase bg-indigo-500 hover:bg-indigo-600">Checkout
                    </button>
                </div>
            </div>
        </div>
    @else
        <div class="text-center">
            <img class="mx-auto" src="assets/img/empty.png" alt="empty"><br>
            <h2>Your Cart is empty!</h2>
            <a href="/home" class="mt-10 text-sm font-semibold text-indigo-600">
            Continue Shopping
            </a>
        </div>
    @endif
    </div>
</body>