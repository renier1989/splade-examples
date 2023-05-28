<x-layout>
    <x-slot name="header">
        {{__('Posts')}}
    </x-slot>

    <x-panel>

        <div>
            <x-splade-table :for="$posts" >
                <x-splade-cell action as="$post">
                    <x-dropdown>
                        <x-slot name="trigger">
                            ||||||||
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="{{route('post.show',$post->id)}}">
                                Details
                            </x-dropdown-link>
                            <x-dropdown-link href="{{route('post.edit',$post->id)}}">
                                Edit
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </x-splade-cell>
            </x-splade-table>
        </div>



    </x-panel>

</x-layout>