<x-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>
    <x-panel>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden  sm:rounded-lg">
                <h1 class="text-2xl">
                    Ejemplo Data del primer post en BD
                </h1>
                
                <div class="bg-red-50 p-2 rounded-md shadow-sm mt-2 flex gap-2">
                    <x-splade-data :default="\App\Models\Post::first()" >
                        Este texto es el del primer Post en la BD: <p class="font-bold" v-text="data.titulo"></p>
                    </x-splade-data>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden  sm:rounded-lg">
                
            </div>
        </div>
    </x-panel>
</x-layout>