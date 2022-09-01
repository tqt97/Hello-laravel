<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List tags') }}
        </h2>
    </x-slot>

    <x-wrap.container>
        <x-link.add href="{{ route('tags.create') }}" />

        @include('admin.tag.filters')

        @php
            include '../resources/views/admin/tag/thead.php';
        @endphp

        <x-table.table :thead="$thead" :items="$tags">
            @foreach ($tags as $index => $tag)
                <tr class="hover:bg-gray-100 border-b border-b-slate-200 hover:text-black hover:border-b-slate-300">
                    <x-table.td :checkbox="true">
                        <input type="checkbox" name="check[]" id="">
                    </x-table.td>
                    <x-table.td :center="true">
                        {{ $index + $tags->firstItem() }}
                    </x-table.td>
                    <x-table.td>
                        {{ $tag->name }}
                    </x-table.td>
                    <x-table.td>
                        {{ $tag->created_at }}
                    </x-table.td>
                    <x-table.td :center="true">
                        <div class="flex item-center justify-center">
                            <div class="mr-4 transform text-cyan-600 hover:text-cyan-700 hover:scale-110">
                                <x-link.edit href="{{ route('tags.edit', $tag) }}" />
                            </div>
                            <div class="transform text-red-600 hover:text-red-700 hover:scale-110">
                                <x-form.confirm-delete action="{{ route('tags.destroy', $tag) }}" />
                            </div>
                        </div>
                    </x-table.td>
                </tr>
            @endforeach
        </x-table.table>
    </x-wrap.container>
</x-app-layout>
