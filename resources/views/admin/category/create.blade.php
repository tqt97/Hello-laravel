<x-app-layout>
    <x-slot name="title">
        {{ __('Add category') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-xl sm:rounded-lg p-8">
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div>
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="slug" value="{{ __('Slug') }}" />
                        <x-jet-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                            :value="old('slug')" />
                        <x-jet-input-error for="slug" class="mt-2" />
                    </div>

                    <div class="block mt-4">
                        <label for="active" class="flex items-center">
                            <x-jet-checkbox id="active" name="active" value="1" checked />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Active') }}</span>
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
