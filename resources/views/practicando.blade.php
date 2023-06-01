<x-layout>
    
    <x-panel>
        <x-splade-state>
            <p>
                Esto es un contenido que esta siendo compartido desde el controller:
                <p class="font-semibold" v-text="state.shared.variable_compartida"></p>
            </p>
        </x-splade-state>

        <div class="border-b-[1px] border-slate-300">&nbsp;</div> {{-- Divisor --}}
        
        <x-splade-toggle>
            <button @click.prevent="toggle">mostrar posts ....</button>
            <x-splade-lazy show="toggled">
                <x-slot:placeholder>
                    The Post are loading...
                </x-slot:placeholder>
                @foreach ($posts as $item)
                    <p>{{$item->titulo}}</p>
                @endforeach
            </x-splade-lazy>
        </x-splade-toggle>

        <div class="border-b-[1px] border-slate-300">&nbsp;</div> {{-- Divisor --}}

        <p class="text-2xl">
            Component DATA
        </p>
        <div class="mt-3">
            <x-splade-data>
                <input class="rounded-lg" type="text" v-model="data.name">
                <p>tu nombre es: <span v-text="data.name"></span> </p>
            </x-splade-data>
            
            <x-splade-data default="{name: 'Defauld data as Json Javascript'}">
                <input type="text" class="rounded-lg" v-model="data.name">
                <p>Data Default Json: <span v-text="data.name"></span> </p>
            </x-splade-data>
            
            <x-splade-data :default="['name'=>'Defauld data as Array PHP']">
                <input type="text" class="rounded-lg" v-model="data.name">
                <p>Data Default PHP array: <span v-text="data.name"></span> </p>
            </x-splade-data>

            <x-splade-data :default="\App\Models\Post::first()">
            {{-- <x-splade-data :default="\App\Models\Post::latest()->limit(3)->get()"> --}}
                {{-- <div v-for="data in p">
                    <p v-text="p.titulo"></p>
                </div> --}}
                <input type="text" class="rounded-lg" v-model="data.titulo">
                <p>Data Default Model First Post: <span v-text="data.titulo"></span> </p>
            </x-splade-data>
        </div>

        <div>
            <p class="text-2xl">
                Remember
            </p>
            <x-splade-data remember="menu" default="{tab1:false, tab2:false,tabs3:false}">
                <div class="flex gap-2">
                    <button class="p-3 rounded-md text-white bg-green-800" @click.prevent="data.tab1 = !data.tab1"> Tab1</button >
                    <button class="p-3 rounded-md text-white bg-green-800" @click.prevent="data.tab2 = !data.tab2"> Tab2</button>
                    <button class="p-3 rounded-md text-white bg-green-800" @click.prevent="data.tab3 = !data.tab3"> Tab3</button>
                </div>
                <aside v-show="data.tab1"> contenido Tab1</aside>
                <aside v-show="data.tab2"> contenido Tab2</aside>
                <aside v-show="data.tab3"> contenido Tab3</aside>
            </x-splade-data>

            <x-splade-data remember="cookie-popup" local-storage default="{accepted:false}">
                <div v-if="!data.accepted">
                    <p>Cookie Warning , You must Accept de Cookies</p>
                </div>
                <button class="p-2 rounded-lg text-white bg-blue-500" @click.prevent="data.accepted = true">Accept Cookies</button>
            </x-splade-data>
        </div>

        <div class="border-b-[1px] border-slate-300">&nbsp;</div> {{-- Divisor --}}

        <div class="mt-2">
            Global Store.
            <x-splade-data store="navigation" default="{opened:false}" />

            <button class="p-1 rounded-lg text-white bg-slate-500" @click.prevent="navigation.opened = !navigation.opened"> Open </button>
            
            <nav v-show="navigation.opened">
                esto se muestra con variables del global store.
            </nav>
        </div>

        <div class="border-b-[1px] border-slate-300 mb-3">&nbsp;</div> {{-- Divisor --}}

        <div>
            <p class="text-2xl"> Defer data</p>
            <div>
                <x-splade-defer url="https://api.forismatic.com/api/1.0/?method=getQuote&lang=en&format=jsonp&jsonp=?">
                    <p v-show="processing">Loading Data......</p>
                    <p v-if="response.data" v-text="response.data.message"></p>
                    <button class="p-1 text-white rounded-md bg-green-500" @click.prevent="reload">New Qoute</button>
                </x-splade-defer>
            </div>
        </div>

        <div>
            <span> Transition</span>
            <div>
                <x-splade-toggle>
                    <button class="p-2 text-white rounded-md bg-green-500" @click.prevent="toggle">Toggle message</button>
                    <x-splade-transition 
                    show="toggled"
                    enter="transition-opacity duration-75"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="transition-opacity duration-150"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                    >
                        Welcome!
                    </x-splade-transition >
                </x-splade-toggle>
                
            </div>
        </div>


        <div class="border-b-[1px] border-slate-300 mb-3">&nbsp;</div> {{-- Divisor --}}

        <div>
            <p class="text-2xl">Custom VUE component</p>
            <div>
                <Counter v-slot="{count, increase,decrease}">
                    <button class="p-2 text-white rounded-md bg-red-500" @click="decrease">-</button>
                    <button class="p-2 text-white rounded-md bg-blue-500" v-text="count"></button>
                    <button class="p-2 text-white rounded-md bg-green-500" @click="increase">+</button>
                </Counter>
            </div>
        </div>
        
    </x-panel>
</x-layout>