<x-app-layout>
    <x-slot name="title">
        {{ __('Create post') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-xl sm:rounded-lg p-8">
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-jet-label for="title" value="{{ __('Title') }}" />
                        <x-jet-input id="title" name="title" class="block mt-1 w-full" type="text"
                            :value="old('title')" />
                        <x-jet-input-error for="title" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="slug" value="{{ __('Slug') }}" />
                        <x-jet-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                            :value="old('slug')" />
                        <x-jet-input-error for="slug" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="category_id" value="{{ __('Category') }}" />
                        <select name="category_id" id="category_id"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="category_id" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="description" value="{{ __('Description') }}" />
                        <textarea
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                            name="description" id="description" cols="30" rows="3">{{ old('description') }}</textarea>
                        <x-jet-input-error for="description" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="image" value="{{ __('Image') }}" />
                        <x-jet-input id="image" class="block mt-1 w-full" type="file" name="image"
                            :value="old('image')" />
                        <x-jet-input-error for="image" class="mt-2" />
                    </div>
                    <div class="block mt-4">
                        <label for="active" class="flex items-center">
                            <x-jet-checkbox id="active" name="active" value="1" checked />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Active') }}</span>
                        </label>
                    </div>
                    <div class="block mt-4">
                        <label for="feature" class="flex items-center">
                            <x-jet-checkbox id="feature" name="feature" value="1" checked />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Feature') }}</span>
                        </label>
                    </div>
                    <div class="mt-4">
                        <x-jet-button>
                            {{ __('Save') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
