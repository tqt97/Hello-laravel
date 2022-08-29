<x-app-layout>
    <x-slot name="title">
        {{ __('Edit category') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-xl sm:rounded-lg p-8">

                <form method="POST" action="{{ route('categories.update', $category) }}">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" value="{{ $category->name }}" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="slug" value="{{ __('Slug') }}" />
                        <x-jet-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                            value="{{ $category->slug }}" />
                        <x-jet-input-error for="slug" class="mt-2" />

                    </div>

                    <div class="block mt-4">
                        <label for="active" class="flex items-center">
                            <input type="checkbox" name="active" id="active"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                {{ $category->active == 1 ? 'checked' : '' }} value="1">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Active') }}</span>
                        </label>
                    </div>
                    <div class="mt-4">
                        <x-jet-button>
                            {{ __('Edit') }}
                        </x-jet-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
