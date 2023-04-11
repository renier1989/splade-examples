<x-layout>
    <x-slot name="header">
        {{__('Post')}}
    </x-slot>

    <x-panel>
        <div>
            {{$post->titulo}}
        </div>
        <div>
            {{$post->contenido}}
        </div>
    </x-panel>

</x-layout>