<div x-data="{ tooltip: false }" class="relative z-30 ">
<input  x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
    {{ $attributes }}
    class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"> 
@error($attributes['name'])
    <small class="text-red-600">{{ $message }}</small>
@enderror


    <div class="relative" x-cloak x-show.transition.origin.top="tooltip">
        <div class="absolute -top-20 right-0 z-10 w-32 p-2 -mt-1 text-sm leading-tight text-white   bg-blue-600 rounded-lg shadow-lg">
            {{ str_replace('_', ' ',$attributes['name']) }}
        </div>
    </div>
</div>