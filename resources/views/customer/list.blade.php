{{-- {{ $user->name }}
{{ $user->address }}
{{ $user->name }} --}}

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
        <div class="container items-center px-5 py-12 mx-auto lg:w-3/6">
          <form method="POST" action="profile" class="flex flex-col w-full p-8 mt-10 bg-gray-100 rounded-lg md:ml-auto md:mt-0">
            @csrf
            {{-- @method('PUT') --}}
            <h2 class="mb-5 text-lg font-medium text-center text-gray-900 title-font">USER PROFILE</h2>
            <div class="relative mb-4">
              <label for="name" class="text-sm leading-7 text-gray-600">Name</label>
              <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" />
            </div>
            <div class="relative mb-4">
              <label for="email" class="text-sm leading-7 text-gray-600">Email</label>
              <input type="email" id="email" name="email" value="{{ $user->email }}" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" />
            </div>
            <div class="relative mb-4">
              <label for="gender" class="text-sm leading-7 text-gray-600">Gender</label>
              <select id="gender" name="gender" value="{{ $user->gender }}" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" />
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
            <div class="relative mb-4">
              <label for="address" class="text-sm leading-7 text-gray-600">Address</label>
              <textarea type="text" id="address" name="address" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" />
              {{ $user->address }}
              </textarea>
            </div>
            <div class="relative mb-4">
              <label for="number" class="text-sm leading-7 text-gray-600">Mobile Number</label>
              <input type="number" id="number" name="number" value="{{ $user->number }}" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" />
            </div>
            <div class="relative mb-4">
              <label for="password" class="text-sm leading-7 text-gray-600">Password</label>
              <input type="password" id="password" name="password" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" />
            </div>
            <button type="submit" class="px-8 py-2 text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">Update Profile</button>
          </form>
        </div>
    </section>
</body>
</html>
