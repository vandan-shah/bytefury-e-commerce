<section class="overflow-hidden text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap mx-auto lg:w-4/5">
            <img alt="ecommerce" class="object-cover object-center w-full h-64 rounded lg:w-1/2 lg:h-auto" src="{{ $product->url }}" />
            <div class="w-full mt-6 lg:w-1/2 lg:pl-10 lg:py-6 lg:mt-0">
              <h2 class="text-sm tracking-widest text-gray-500 title-font" name="brand_name">{{ $product->brand->name }}</h2>
              <h1 class="mb-1 text-3xl font-medium text-gray-900 title-font" name="product_name">{{ $product->name }}</h1>
              <p class="leading-relaxed">{{ $product->description }}</p>
              <div class="flex items-center pb-5 mt-6 mb-5 border-b-2 border-gray-100"></div>
              <div class="flex">
                <span class="text-2xl font-medium text-gray-900 title-font" name="product_price">{{ $product->price}}</span>

                    <input type="number" value="1" min="1" max="10"  name="quantity"/>

                <a href="{{route('cart.edit',$product->id)}}" class="flex px-6 py-2 ml-auto text-white bg-indigo-500 border-0 rounded add-to-cart-btn focus:outline-none hover:bg-indigo-600">Add to Cart</a>
              </div>
            </div>
      </div>
    </div>
</section>
