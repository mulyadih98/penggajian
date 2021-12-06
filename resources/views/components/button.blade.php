<button type="{{ $type }}" {{ $attributes->merge(['class' => "block px-2 py-2 font-medium tracking-wide  capitalize transition duration-300 ease-in-out transform rounded-md hover:bg-gray-300 focus:outline-none active:scale-95"]) }}>
    {{ $slot }}
 </button>