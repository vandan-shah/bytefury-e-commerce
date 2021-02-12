<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap -m-4">
      
      @foreach ($products as $product)
        
        <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
          
          <a href="{{ route('product.id', [$product->id]) }}" class="block relative h-48 rounded overflow-hidden">
            <img alt="product" class="object-cover object-center h-full block" src="{{ $product->url }}">
          </a>
          
          <div class="mt-4">
            
            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $product->brand->name }}
            </h3>
            
            <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
            
            <p class="mt-1"><i class="fas fa-rupee-sign"></i> {{ $product->price }}</p>
          
          </div>
        
        </div>
      
      @endforeach
      
    </div>
  </div>
</section>