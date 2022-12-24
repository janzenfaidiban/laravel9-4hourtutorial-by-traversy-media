<x-layout>
    @include('partials._hero')
    @include('partials._search')


    <div class="grid md:grid-cols-2 gap-2">

    @unless(count($listings) == 0)


    @foreach($listings as $listing)
        <x-listing-card :listing="$listing" />
    @endforeach

    @else 
        <p>No listings found here...</p>
    @endunless

    </div>

    <div class="my-6 mb-9 p-4">
        {{$listings->links()}}
    </div>

</x-layout>