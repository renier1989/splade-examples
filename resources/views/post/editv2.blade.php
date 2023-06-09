<x-splade-modal>
    <div>
        <p>
            Aqui edito los datos del post
        </p>
        <x-splade-form action="{{route('post.updatev2',$post)}}" method="PATCH" :default="$post">
            <x-splade-input name="titulo" label="titulo" ></x-splade-input>
            <x-splade-textarea name="contenido" label="contenido" autosize></x-splade-textarea>
            <x-splade-submit>Actualizar Post</x-splade-submit>
        </x-splade-form>
    </div>
</x-splade-modal>