<x-guest-layout>
    @section('title', $page->title)
    <div class="hero py-10 bg-transparent">
        <div class="hero-content text-center">
            <div class="max-w-xl">
                <h1 class="text-5xl font-bold">{{ $page->title }}</h1>
            </div>
        </div>
    </div>
    <div class="card card-compact w-full bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">{{ $page->title }}</h2>
            {!! $page->content !!}
        </div>
    </div>
</x-guest-layout>
