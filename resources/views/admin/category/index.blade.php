<x-app-layout>
    <x-slot name="title">
        {{ __('List categories') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List categories') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('categories.create') }}"
                class="inline-flex items-center mb-5 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                {{ __('Add new') }}
            </a>

            @include('admin.category.filters')
            <div class="bg-white p-5 overflow-auto shadow-xl sm:rounded-lg">

                <table class="min-w-max w-full table-auto">
                    <thead class="">
                        <tr class="bg-gray-800 text-gray-50 text-md leading-normal">
                            <th class="py-3 px-6 text-center"> {{ __('No.') }}</th>
                            <th class="py-3 px-6 text-left"> {{ __('Name') }}</th>
                            <th class="py-3 px-6 text-left"> {{ __('Slug') }}</th>
                            <th class="py-3 px-6 text-left">{{ __('Created at') }}</th>
                            <th class="py-3 px-6 text-center">{{ __('Status') }}</th>
                            <th class="py-3 px-6 text-center">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @forelse ($categories as $index=>$category)
                            <tr
                                class="hover:bg-gray-100 border-b border-b-slate-200 hover:text-black hover:border-b-slate-300">
                                <td class="py-3 px-6 text-center">
                                    {{ $index + $categories->firstItem() }}
                                </td>
                                <td class="py-3 px-6 text-left">


                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            {{ $category->name }}
                                        </div>
                                        <span class="text-right font-bold text-cyan-500">
                                            ({{ $category->posts()->count() }})
                                        </span>
                                        <a
                                            href="{{ route('posts.index') }}?search=&category_id={{ $category->id }}&user_id=">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                                            </svg>


                                        </a>
                                    </div>

                                </td>
                                <td class="py-3 px-6 text-left">
                                    {{ $category->slug }}
                                </td>
                                <td class="py-3 px-6 text-left">
                                    {{ $category->created_at }}
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if ($category->active === 1)
                                        <span
                                            class="bg-green-500 text-white py-1 px-3 rounded-full text-xs">{{ __('Active') }}</span>
                                    @else
                                        <span
                                            class="bg-red-500 text-white py-1 px-3 rounded-full text-xs">{{ __('Inactive') }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div
                                            class="w-4 mr-2 transform text-blue-500 hover:text-blue-600 hover:scale-110">
                                            <a href="{{ route('categories.edit', $category) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="mr-2 transform text-red-500 hover:text-red-600 hover:scale-110">
                                            <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">

                                                <button type="submit"
                                                    onclick="return confirm('Do you want to delete this item ?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        class="w-4" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="text-gray-400 text-center font-bold mt-6">
                                        {{ __('No data were found...') }}</div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <div class="mt-5 mb-2 mx-2">
                    {{ $categories->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
