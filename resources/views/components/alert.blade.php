@if (session()->has('success'))
    <div class="bg-green-100 border-green-400 text-gren-700 px-4 py-3 rounded relative" role="alert">
        {{ session('success')}}
         </div>
@endif

@if (session()->has('message'))
    <div class="bg-yellow-100 border-green-400 text-gren-700 px-4 py-3 rounded relative" role="alert">
        {{ session('message')}}
         </div>
@endif

@if (session()->has('error'))
    <div class="bg-red-100 border-green-400 text-gren-700 px-4 py-3 rounded relative" role="alert">
        {{ session('error')}}
         </div>
@endif