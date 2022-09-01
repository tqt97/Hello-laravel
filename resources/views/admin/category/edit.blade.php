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
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" value="{{ $category->name }}" />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="slug" value="{{ __('Slug') }}" />
                            <x-jet-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                                :value="old('slug')" value="{{ $category->slug }}" readonly />
                            <x-jet-input-error for="slug" class="mt-2" />
                        </div>
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
                                                {{ $category->active == 1 ? 'checked' : '' }}
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
    @include('admin.category.generate_slug')
</x-app-layout>
