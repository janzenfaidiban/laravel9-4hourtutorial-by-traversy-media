<x-layout>


    <x-card class="p-10">

    
        <header class="text-center my-9">
            <h1 class="text-3xl font-bold my-6 uppercase" > Manage Data </h1>
            <p>You can see only all your data</p>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($listings->isEmpty())
                @foreach($listings as $listing) 
                
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg" >
                        <img src="{{$listing->logo ? asset('storage/'. $listing->logo) : asset('/images/no-image.png')}}" alt="Image" class="hidden w-48 md:block">
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg" >
                        <a href="/listings/{{$listing->id}}" class="font-medium text-2xl"> {{$listing->title}} </a>
                        <p class="text-xs capitalize my-2">{{$listing->tags}}</p>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg" >
                        <a href="/listings/{{$listing->id}}/edit" class="text-gray-600 px-6 py-2 rounded-xl" ><i class="fa-solid fa-pen-to-square" ></i> Edit</a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg" >
                        <a href="/listings/{{$listing->id}}" class="text-gray-600 px-6 py-2 rounded-xl" ><i class="fa-solid fa-eye" ></i> Edit</a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <form action="/listings/{{$listing->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No listings Found</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>

    </x-card>

    <div class="my-6 mb-9 p-4">
        {{$listings->links()}}
    </div>

</x-layout>