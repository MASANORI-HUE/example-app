@props([
    'images' => []
])

@if(count($images) > 0)
    <div x-data="{}" class="px-2">
        <div class="flex justify-center -mx-2">
            @foreach($images as $image)
                <div class="w-1/6 px-2 mt-5">
                    <div class="bg-gray-400">
                        <a @click="$dispatch('img-modal', { imgModalSrc: '{{ $image->url }}' })" class="cursor-pointer">
                            <img alt="{{ $image->name }}" class="object-fit w-full" src="{{ $image->url }}">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

@once
    <div x-data="{ imgModal : false, imgModalSrc : '' }"
        @img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc;">
        <div x-cloak x-show="imgModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" @click="imgModal = false"
            class="fixed w-full h-full inset-0 z-50 overflow-hidden flex justify-center items-center bg-black/75">
            <div @click.stop class="flex flex-col max-w-full max-h-full overflow-auto p-4">
                <div class="z-50">
                    <button @click="imgModal = false" class="float-right p-2 outline-none focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 text-white">
                            <path fill-rule="evenodd"
                                d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="flex justify-center items-center flex-1">
                    <img class="object-contain max-w-full max-h-full" :alt="imgModalSrc" :src="imgModalSrc">
                </div>
            </div>
        </div>
    </div>
    @push('css')
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
    @endpush
@endonce