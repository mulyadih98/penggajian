<div x-data="{}">
    <button @click="$dispatch('toggle')" {{ $attributes->merge(['class' =>"px-6 py-2 text-white bg-blue-600 rounded-md shadow-xl"]) }} type="button">
        {{ $slot }}
    </button>
</div>