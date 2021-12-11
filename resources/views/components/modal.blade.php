<div x-data="{ isOpen: false  }">
    <div
        x-cloak
        x-show="isOpen"
        x-on:toggle.window="isOpen = !isOpen" 
        class="absolute z-50 inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div class="max-w-sm p-6 bg-white">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">{{ $title?? 'Modal title' }}</h3>
                <svg
                    @click="isOpen = false" 
                    xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
    
            </div>
            <div class="mt-4">
                <form action="{{ $url }}" method="POST" class="space-y-4">
                    @csrf
                    @method($method)
                    {{ $slot }}
                    <button type="button" class="px-4 py-2 text-white bg-red-600 rounded" @click="isOpen = false">{{ $cancleButton ?? 'Cancle' }}</button>
                    <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded">{{ $saveButton ?? 'Save' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>