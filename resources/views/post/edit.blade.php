<x-layout>
    <x-slot name="header">
        {{__('Post')}}
    </x-slot>

    
    <div class="mx-[20%] mt-5">

        <div>
            Edit Post: {{$post->titulo}}
        </div>
        <x-splade-form :default="$post" :action="route('post.update',$post)" class="space-y-4">
            
            <x-splade-input name="titulo" label="Title"/>
            <x-splade-textarea name="contenido" autosize label="Content" />
            
            {{-- extra examples --}}
            <hr>
            <div> Extras Just for examples</div>
            <x-splade-select name="things_code" label="Select with Choices and Multiple" :options="$things" choices multiple />
            
            <x-splade-checkbox name="agree_terms" label="Agree with terms?"  />
            
            <x-splade-group name="roles" label="Roles example HardCoded with 2 roles selections" inline> 
                <x-splade-checkbox name="roles[]" label="editor" value="editor" />
                <x-splade-checkbox name="roles[]" label="writer" value="writer" />
            </x-splade-group>

            <x-splade-checkboxes name="roless" label="Roles Example form an Array from the Controller" :options="$roles" />

            <x-splade-input name="dat_of_birth" label="Day of Birth" date />    


            <x-splade-submit />
    
        </x-splade-form>
    </div>
    
    
</x-layout>