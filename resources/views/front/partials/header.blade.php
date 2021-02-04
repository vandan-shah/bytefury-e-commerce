<header class="text-gray-600 body-font">
    <div class="container flex flex-col flex-wrap items-center p-5 mx-auto md:flex-row">
      <a href="/home" class="flex items-center mb-4 font-medium text-gray-900 title-font md:mb-0">
        {{-- <svg xmlns="https://wallpaper-house.com/data/out/9/wallpaper2you_357025.jpg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 p-2 text-white rounded-full" viewBox="0 0 24 24">
          <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </svg> --}}
        <span class="ml-3 text-xl">NeoCyber!</span>
      </a>
      <nav class="flex flex-wrap items-center justify-center text-base md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400">
        @foreach ($categories as $category)
            <a href="{{ route('category.product', [$category->id]) }}" class="mr-5 hover:text-gray-900">{{ $category->name }}</a>
        @endforeach
      </nav>
      {{-- <a href="{{ route('customerlogin') }}" class="inline-flex items-center px-3 py-1 mt-4 mr-1 text-base bg-gray-100 border-0 rounded focus:outline-none hover:bg-gray-200 md:mt-0"> --}}
        @auth
          <a href="/profile" class="inline-flex items-center px-3 py-1 mt-4 mr-1 text-base border-0 rounded outline-gray-200 focus:outline-gray-200 hover:bg-gray-200 md:mt-0">
            {{ Auth::user()->name }}
            <i class="ml-3 fas fa-user"></i>
          </a>
        @endauth
        @guest
          <a href="{{ route('customerlogin') }}" class="inline-flex items-center px-3 py-1 mt-4 mr-1 text-base bg-gray-100 border-0 rounded focus:outline-none hover:bg-gray-200 md:mt-0">
            Login
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        @endguest
        {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg> --}}
      {{-- </a> --}}
      <a href="{{route('cart.index')}}" class="inline-flex items-center px-3 py-1 mt-4 text-base bg-gray-100 border-0 rounded focus:outline-none hover:bg-gray-200 md:mt-0">
        Cart({{ ShoppingCart::count() }})
        {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24"> --}}
            <i class="ml-3 fas fa-shopping-cart"></i>
{{-- 
        <div class="alert alert-danger"  role="alert">
            {{ShoppingCart::count()}}
        </div> --}}
            {{ShoppingCart::countRows()}}
        </div>
          {{-- <path d="M5 12h14M12 5l7 7-7 7"></path> --}}
        {{-- </svg> --}}
        </a>
    </div>
</header>
