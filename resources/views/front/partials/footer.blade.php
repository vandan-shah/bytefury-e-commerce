<footer class="text-gray-600 body-font">
  <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
    <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
      <span class="ml-3 text-xl">NeoCyber!</span>
    </a>
    <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2021 NeoCyber — All Rights Reserved </p>
    <a href="/about_us" class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4 flex-1 md:border-l md:border-gray-400 hover:text-gray-900">About Us </a>
    <a href="{{route('customerlogout')}}" class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-red-400 rounded text-base mt-4 md:mt-0 mr-1 hover:text-gray-900">
      @auth
        <i class="fas fa-sign-out-alt mr-2"></i> Logout
      @endauth
      @guest
          
      @endguest
    </a>
  </div>
</footer>
