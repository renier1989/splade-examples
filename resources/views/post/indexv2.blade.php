<x-layout>
    <x-slot name="header">
        {{__('Posts Version 2')}}
    </x-slot>

    <x-panel>
        <div>
            Tabla creada de otra forma mas sencilla
            <Link slideover href="{{route('post.add')}}" class=" flex justify-center items-center w-[50%] p-2 bg-green-500 rounded-md text-white">
                Agregar post
            </Link>
            
        </div>
        <x-splade-table :for="$posts">
            <x-splade-cell actions>
                <div class="flex space-x-2">
                    <Link slideover class="cursor-pointer hover:text-indigo-600 hover:underline" href="{{route('post.editv2',$item)}}"> Editar</Link>
                    <Link class="cursor-pointer hover:text-indigo-600 hover:underline"> Eliminar</Link>
                    <Link class="cursor-pointer hover:text-indigo-600 hover:underline" href="{{route('post.show',$item)}}" > Detalle</Link>
                </div>
            </x-splade-cell>
            <x-slot:empty-state> <p class="flex justify-center items-center py-10 text-gray-600 font-semibold"> Sin resultado para mostrar</p></x-slot>
        </x-splade-table>
    </x-panel>
</x-layout>