<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Parisienne&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="{{mix('/front/css/front.css')}}" rel="stylesheet" type="text/css">
    
    <title>NeoCyber!</title>
</head>
<body>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto items-center lg:w-3/6">
          <form method="POST" action="customerregistration" class="bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
            @csrf
            <h2 class="text-gray-900 text-lg font-medium title-font mb-5 text-center">REGISTRATION FORM</h2>
            <div class="relative mb-4">
              <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
              <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
              @error('name')
                <div class="text-red-700">{{ $message }}</div>
              @enderror
            </div>
            <div class="relative mb-4">
              <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
              <input type="text" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
              @error('email')
                  <div class="text-red-700">{{ $message }}</div>
              @enderror
            </div>
            <div class="relative mb-4">
              <label for="gender" class="leading-7 text-sm text-gray-600">Gender</label>
              <select id="gender" name="gender" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
            <div class="relative mb-4">
              <label for="address" class="leading-7 text-sm text-gray-600">Address</label>
              <textarea type="text" id="address" name="address" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
              </textarea>
              @error('address')
                <div class="text-red-700">{{ $message }}</div>
              @enderror
            </div>
            <div class="relative mb-4">
              <label for="number" class="leading-7 text-sm text-gray-600">Mobile Number</label>
              <input type="number" id="number" name="number" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
              @error('number')
                <div class="text-red-700">{{ $message }}</div>
              @enderror
            </div>
            <div class="relative mb-4">
              <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
              <input type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
              @error('password')
                <div class="text-red-700">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
          </form>
        </div>
    </section>
</body> 
</html>