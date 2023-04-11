<x-layout>
    <x-slot name="header">
        {{ __('Docs') }}
    </x-slot>

    <x-panel>
        <h1 class="text-2xl">Hi developer!</h1>
        <p class="text-lg mt-2">You'll find the docs at <a target="_blank" class="underline" href="https://splade.dev/docs">splade.dev/docs</a></p>

        {{-- CONTENT USED FOR A MODAL --}}
        <x-splade-modal >
            <div>
                <h1 class="text-2xl">Hola esto es un titulo</h1>
                <p class="text-lg mt-2">
                    Esto es un contenido Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, quae veniam.
                </p>
            </div>
        </x-splade-modal>
    </x-panel>
</x-layout>