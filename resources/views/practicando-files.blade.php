<x-layout>
    <x-panel>
        <p class="text-2xl">
            Vista para practicar Files
        </p>
        <div class="border-b-[1px] border-slate-300 mb-5">&nbsp;</div> {{-- Divisor --}}
        <div>
            <label for="">Multiple Files</label>
            <x-splade-form :default="['documents' => []]" label="Multiple Documents">
                <x-splade-file name="documents[]" multiple> Choose Multiple Files</x-splade-file>
            </x-splade-form>
        </div>
        
        <div class="border-b-[1px] border-slate-300 mb-5">&nbsp;</div> {{-- Divisor --}}

        <div>
            <label for="">Select an image and showing its previwe</label>
            <x-splade-form >
                <x-splade-file name="avatar" :show-filename="false">Select an Image..</x-splade-file>
                <img class="w-[50%]" v-if="form.avatar" :src="form.$fileAsUrl('avatar')" />
                {{-- <pre v-text="form.avatar"></pre> --}}
            </x-splade-form>
        </div>

        <div class="border-b-[1px] border-slate-300 mb-5">&nbsp;</div> {{-- Divisor --}}

        <div>
            <label for="">A more stylize file selector</label>
            <x-splade-form>
                <x-splade-file name="avatar2" filepond placeholder="You can Drop or select a file by clicking here"/>
            </x-splade-form>
        </div>
        <div>
            <label for="">Same as previous but with multiple selection</label>
            <x-splade-form :default="['avatars'=> []]">
                <x-splade-file name="avatars[]" multiple filepond accept="image/png" preview placeholder="You can Drop or select Multiple files by clicking here"/>
            </x-splade-form>
        </div>

        <div class="border-b-[1px] border-slate-300 mb-5">&nbsp;</div> {{-- Divisor --}}
        <div>
            <label for="">Adding files from a remote url</label>
            <x-splade-form>
                <x-splade-file filepond server preview name="avatar2" />

                <x-splade-input name="remote_url" label="Remore URL" />
                {{-- <pre v-text="form.avatar2"></pre> --}}
                <button class="p-2 text-white bg-green-500 rounded-md" @click.prevent="form.$addFile('avatar2', form.remote_url)"> Add Remore URL</button>
            </x-splade-form>
        </div>

        <div class="border-b-[1px] border-slate-300 mb-5">&nbsp;</div> {{-- Divisor --}}

        <div>
            <label for="">Uploading files to the server</label>
            <div>
                <x-splade-form :action="route('upload-file')">
                    <x-splade-file filepond server preview name="file"></x-splade-file>

                    <x-splade-submit> Upload File</x-splade-submit>
                </x-splade-form>
            </div>
        </div>

    </x-panel>
</x-layout>