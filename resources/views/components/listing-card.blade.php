@props(['listing'])

<x-card>
    <div class="flex gap-4">
        <img src="{{$listing->logo ? asset('storage/'. $listing->logo) : asset('/images/no-image.png')}}" alt="Image" class="hidden w-48 md:block">
        <div>
            <h2 class="text-4xl font-bold">
                <a href="/listings/{{$listing['id']}}">
                    {{$listing['title']}}
                </a>
            </h2>
            <div class="text-xl my-3">{{$listing->company}}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot text-sm"></i> {{$listing->location}}
            </div>
        </div>
    </div>
</x-card>