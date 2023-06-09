<x-splade-modal>
    <div>
        <p>
            Aqui Creo el nuevo post
        </p>
        <x-splade-form action="{{route('post.storev2')}}" method="POST">
            <x-splade-input name="titulo" label="titulo" ></x-splade-input>
            <x-splade-textarea name="contenido" label="contenido" autosize></x-splade-textarea>
            <x-splade-submit>Crear Post</x-splade-submit>
        </x-splade-form>
    </div>
</x-splade-modal>