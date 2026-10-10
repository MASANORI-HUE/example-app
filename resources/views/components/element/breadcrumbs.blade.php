@props([
    'breadcrumbs' => [
        [
            'href' => '/',
            'label' => 'TOP'
        ]
    ]
])
<nav class="text-black mx-4 my-3" aria-label="Breadcrumb">
    <ol class="list-none p-0 inline-flex">
        @foreach($breadcrumbs as $breadcrumb)
            @if ($loop->last)
                <li>
                    <a href="{{ $breadcrumb['href'] }}" class="text-gray-500" aria-current="page">{{ $breadcrumb['label'] }}</a>
                </li>
            @else
                <li class="flex items-center">
                    <a href="{{ $breadcrumb['href'] }}" class="hover:underline">{{ $breadcrumb['label'] }}</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                    </svg>
                </li>
            @endif
        @endforeach
    </ol>
</nav>