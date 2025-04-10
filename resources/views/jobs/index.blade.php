<x-layout>
    <x-slot name="heading">
        Jobs Listing Page
    </x-slot>
    <h1>Hello, This is the Jobs Page.</h1>
    <br> <br>
    <p>These are our available jobs:</p>
<ul>
<div class = "space-y-4">
    @foreach($jobs as $job)
    <li>
        <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200">
        <div class = "font-bold text-blue-500 text-sm">{{$job -> employer -> name}} </div>
            <div>
                <strong>{{$job['title']}} : </strong> Pays {{ $job['salary'] }} per year.
            </div>
        </a>
    </li>
    @endforeach

    <div>
        {{ $jobs->links() }}
    </div>
</div
</ul>
</x-layout>