<x-app-layout>
    @include('admin.post.css')
    <x-slot name="title">
        {{ __('Edit post') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-xl sm:rounded-lg p-8">
                <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="title" value="{{ __('Title') }}" />
                            <x-jet-input id="title" name="title" class="block mt-1 w-full" type="text"
                                value="{{ $post->title }}" />
                            <x-jet-input-error for="title" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="slug" value="{{ __('Slug') }}" />
                            <x-jet-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                                value="{{ $post->slug }}" />
                            <x-jet-input-error for="slug" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="category_id" value="{{ __('Category') }}" />
                            <select name="category_id" id="category_id"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="category_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="tags" value="{{ __('Tags') }}" />
                            <select multiple
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                name="tags[]" id="tags">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" @selected($post->tags->contains($tag->id))>
                                        {{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="description" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="description" value="{{ __('Description') }}" />
                        <textarea
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                            name="description" id="description" cols="30" rows="3">{{ $post->description }}</textarea>
                        <x-jet-input-error for="description" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="image" value="{{ __('Image') }}" />
                        <div class="mt-1 rounded-md border-2 border-dashed border-gray-300 px-2 py-4">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-icon.image />
                                    <div class="text-sm text-gray-600">
                                        <x-jet-input id="image" class="block mt-1 w-full" type="file"
                                            accept="image/*" onchange="loadFile(event)" name="image"
                                            :value="old('image')" />
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <img id="output" width="30%" height="auto" />
                                    @if (Str::startsWith($post->image, 'https://via.placeholder.com/'))
                                        <img width="30%" height="auto" src="{{ $post->image }}" />
                                    @else
                                        <img width="30%" height="auto"
                                            src="{{ asset('storage/posts/' . $post->image) }}" alt="image post">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <x-jet-input-error for="image" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-6 gap-6 mt-4">
                        <div class="col-span-6 sm:col-span-3">
                            <fieldset>
                                <div class="text-base font-medium text-gray-900" aria-hidden="true">
                                    {{ __('Active') }}
                                </div>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-start">
                                        <div class="flex h-5 items-center">
                                            <input id="active" name="active" value="1" type="checkbox"
                                                {{ $post->active == 1 ? 'checked' : '' }}
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="active" class="font-medium text-gray-700">Yes</label>
                                            <p class="text-gray-500">
                                                {{ __('Check to toggle Active/Inactive') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <fieldset>
                                <div class="text-base font-medium text-gray-900" aria-hidden="true">
                                    {{ __('Feature') }}
                                </div>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-start">
                                        <div class="flex h-5 items-center">
                                            <input id="feature" name="feature" type="checkbox" value="1"
                                                {{ $post->feature == 1 ? 'checked' : '' }}
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="feature" class="font-medium text-gray-700">Yes</label>
                                            <p class="text-gray-500">
                                                {{ __('Check to toggle feature') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-jet-button>
                            {{ __('Update') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#tags').select2({
            placeholder: 'Select tag',
            allowClear: true
        });
        $('#category_id').select2({
            placeholder: 'Select category',
            allowClear: true
        });
        $('#title').mouseout(function(e) {
            $.get('{{ route('generate_slug.post') }}', {
                    'title': $(this).val()
                },
                function(data) {
                    $('#slug').val(data.slug);
                }
            );
        });
    </script>


</x-app-layout>
