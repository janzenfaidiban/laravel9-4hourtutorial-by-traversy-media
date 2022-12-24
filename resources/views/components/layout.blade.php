<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laragigs</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="">

    <nav class="fixed w-full flex justify-between space-x-4 shadow shadow-bottom bg-indigo-900">
        <div>
            <a href="/" class="font-bold px-3 py-2 text-gray-200 rounded-lg hover:text-slate-900">
                <img src="{{asset('images/kopicoding-logo-white.png')}}" class="w-32 ml-4">
            </a>
        </div>
        <div class="flex items-center">
            @auth
                
            <span class=" capitalize mr-4 text-gray-200">
                Welcome <b class="font-bold">{{auth()->user()->name}}</b>
            </span>

            <a href="/listings/manage" class="px-3 py-2 text-gray-200 rounded-lg hover:bg-indigo-100 hover:text-indigo-800"><i class="fa-solid fa-gear"></i> Manage Listings</a>
            
            <form action="/logout" class="inline" method="POST">
                @csrf
                <button type="submit" class="px-3 py-2 text-gray-200 rounded-lg hover:bg-indigo-100 hover:text-indigo-800">
                    <i class="fa-solid fa-door-closed"></i> Logout
                </button>
            </form>

            @else 

            <a href="/register" class="px-3 py-2 text-gray-200 rounded-lg hover:bg-indigo-100 hover:text-indigo-800"><i class="fa-solid fa-user-plus"></i> Register</a>

            <a href="/login" class="px-3 py-2 text-gray-200 rounded-lg hover:bg-indigo-100 hover:text-indigo-800"><i class="fa-solid fa-sign-in"></i> Login</a>

            @endauth
            
        </div>
    </nav>

    <main class="mb-9 pb-9">
        {{$slot}}
    </main>

    <footer class="fixed bottom-0 opacity-90 bg-indigo-900 text-white h-24 mt-24 w-full left-0 bottom-0 flex items-center md:justify-between px-4">
        <p class="ml-2">Copyright &copy; 2022. Developted by <b>Janzen</b></p>
        <a href="/listings/create" class=" top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
    </footer>

    <x-flash-message />

</body>
</html>