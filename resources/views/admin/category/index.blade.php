<x-app-layout>
    <x-slot name="title">
        {{ __('List categories') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List categories') }}
        </h2>
    </x-slot>

    <x-wrap.container>
        <x-link.add href="{{ route('categories.create') }}" />

        @include('admin.category.filters')

        @php
            include '../resources/views/admin/category/thead.php';
        @endphp

        <x-table.table :thead="$thead" :items="$categories">
            @foreach ($categories as $index => $category)
                <tr class="hover:bg-gray-100 border-b border-b-slate-200 hover:text-black hover:border-b-slate-300">
                    <x-table.td :checkbox="true">
                        <input type="checkbox" name="check[]" id="">
                    </x-table.td>
                    <x-table.td :center="true">
                        {{ $index + $categories->firstItem() }}
                    </x-table.td>
                    <x-table.td class="group-link-underline">
                        <div class="flex items-center">
                            <x-link.link-title
                                href="{{ route('posts.index') }}?search=&category_id={{ $category->id }}&user_id=">
                                {{ $category->name }}
                                <span class="text-xs text-black">
                                    ({{ $category->posts()->count() }})
                                </span>
                            </x-link.link-title>
                        </div>
                    </x-table.td>
                    <x-table.td>
                        {{ $category->slug }}
                    </x-table.td>
                    <x-table.td>
                        {{ $category->created_at }}
                    </x-table.td>
                    <x-table.td :center="true">
                        <x-link.link-status href="">
                            {!! $category->getActive() !!}
                        </x-link.link-status>
                    </x-table.td>
                    <x-table.td :center="true">
                        <div class="flex item-center justify-center">
                            <div class="mr-4 transform text-cyan-600 hover:text-cyan-700 hover:scale-110">
                                <x-link.edit href="{{ route('categories.edit', $category) }}" />
                            </div>
                            <div class="transform text-red-600 hover:text-red-700 hover:scale-110">
                                <x-form.confirm-delete action="{{ route('categories.destroy', $category) }}" />
                            </div>
                        </div>
                    </x-table.td>
                </tr>
            @endforeach
        </x-table.table>
    </x-wrap.container>
</x-app-layout>
