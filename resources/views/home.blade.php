<x-layout>
    <x-slot name="header">
        {{ __('Home') }}
    </x-slot>

    <x-panel class="flex flex-col items-center pt-16 pb-16">
        <x-application-logo class="block h-12 w-auto" />

        <div class="mt-8 text-2xl">
            Welcome to your Splade application!
        </div>

        <p class="mt-7">
            <Link href="/docs">Docs</Link>
        </p>
        
        <p class="mt-7 p-1 px-4 bg-lime-800 rounded-lg font-bold text-white">
            <Link modal href="/docs">Docs as Modal</Link>
        </p>
        
        <p class="mt-7 p-1 px-4 bg-zinc-800 rounded-lg font-bold text-white">
            <Link slideover href="/docs">Docs as slide</Link>
        </p> 

        {{-- CONTENEDOR DE UN MODAL PERSONALIZADO . --}}
        <p class="mt-7 p-1 px-4 bg-orange-600 rounded-lg font-bold text-white">
            <Link href="#renier"> Nuevo contenido Ejemplo Modal</Link>
        </p>
        <x-splade-modal name="renier" modal max-width="7xl">
            <p> esto es un nuevo contenido Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet aut quam eligendi veniam voluptatem ex quas mollitia ipsam nulla magnam? Illum, reprehenderit.</p>
        </x-splade-modal>

        <x-dropdown class="mt-7 p-1 px-4 bg-purple-600 rounded-lg font-bold text-white">
            <x-slot name="trigger">
                hola
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link>
                    Editar
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>
        
    </x-panel>

    <x-panel class="flex flex-col pt-16 pb-16">
        <h1 class="text-2xl">
            Ejemplos de toggle
        </h1>

        <div class="mt-5">
            <x-splade-toggle>
                <button class="p-1 px-5 bg-green-700 text-white font-bold rounded-lg " @click="toggle">Mostrar / Ocultar contenido</button>
                <p v-show="!toggled">Contenido Corto....</p>
                <p v-show="toggled">Contenido Largo Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit assumenda porro officiis, doloribus totam repudiandae, eveniet sapiente vitae in culpa ullam, obcaecati dolor suscipit. Reprehenderit ducimus velit corrupti nostrum nam, obcaecati rerum adipisci odit et consectetur blanditiis voluptas cumque maxime perspiciatis. Delectus atque voluptatibus rerum cumque, accusantium eius voluptates quidem? Iure voluptate aperiam magnam doloremque illum beatae at architecto.|</p>
            </x-splade-toggle>
        </div>
        <div class="border-b-[1px] border-slate-300">&nbsp;</div> {{-- Divisor --}}
        <div class="mt-5">
            <x-splade-toggle>
                <button v-show="!toggled" class="p-1 px-5 bg-green-700 text-white font-bold rounded-lg " @click="setToggle(true)">Mostrar contenido</button>
                <button v-show="toggled" class="p-1 px-5 bg-slate-900 text-white font-bold rounded-lg " @click="setToggle(false)">Ocultar contenido</button>
                <p v-show="!toggled">Contenido Corto....</p>
                <p v-show="toggled">Contenido Largo Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit assumenda porro officiis, doloribus totam repudiandae, eveniet sapiente vitae in culpa ullam, obcaecati dolor suscipit. Reprehenderit ducimus velit corrupti nostrum nam, obcaecati rerum adipisci odit et consectetur blanditiis voluptas cumque maxime perspiciatis. Delectus atque voluptatibus rerum cumque, accusantium eius voluptates quidem? Iure voluptate aperiam magnam doloremque illum beatae at architecto.|</p>
            </x-splade-toggle>
        </div>
        <div class="border-b-[1px] border-slate-300">&nbsp;</div> {{-- Divisor --}}
        <div class="mt-5">
            <x-splade-data :default="['show'=>true]" remember="content" local-storage>
                <button v-show="!data.show" class="p-1 px-5 bg-green-700 text-white font-bold rounded-lg " @click="data.show = true">Mostrar contenido Default - Data: (<span v-text="data.show"></span>)</button>
                <button v-show="data.show" class="p-1 px-5 bg-slate-900 text-white font-bold rounded-lg " @click="data.show = false">Ocultar contenido Default - Data: (<span v-text="data.show"></span>)</button>
                <p v-show="!data.show">Contenido Corto....</p>
                <p v-show="data.show">Contenido Largo Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit assumenda porro officiis, doloribus totam repudiandae, eveniet sapiente vitae in culpa ullam, obcaecati dolor suscipit. Reprehenderit ducimus velit corrupti nostrum nam, obcaecati rerum adipisci odit et consectetur blanditiis voluptas cumque maxime perspiciatis. Delectus atque voluptatibus rerum cumque, accusantium eius voluptates quidem? Iure voluptate aperiam magnam doloremque illum beatae at architecto.|</p>
            </x-splade-data>
        </div>
    </x-panel>
    
</x-layout>