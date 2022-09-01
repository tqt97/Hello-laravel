<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List posts') }}
        </h2>
    </x-slot>
    <x-wrap.container>
        <x-link.add href="{{ route('posts.create') }}" />

        @include('admin.post.filters')

        @php
            include '../resources/views/admin/post/thead.php';
        @endphp

        <x-table.table :thead="$thead" :items="$posts">
            @foreach ($posts as $index => $post)
                <tr class="hover:bg-gray-100 border-b border-b-slate-200 hover:text-black hover:border-b-slate-300">
                    <x-table.td :checkbox="true">
                        <input type="checkbox" name="check[]" id="">
                    </x-table.td>
                    <x-table.td :center="true">
                        {{ $index + $posts->firstItem() }}
                    </x-table.td>
                    <x-table.td>
                        <div class="flex items-center">
                            <div class="mr-2">
                                @if (Str::startsWith($post->image, 'https://via.placeholder.com/'))
                                    <img class="w-6 h-6 rounded-full" src="{{ $post->image }}" />
                                @else
                                    <img class="w-6 h-6 rounded-full" src="{{ asset('storage/posts/' . $post->image) }}"
                                        alt="image post">
                                @endif
                            </div>
                            <span class="font-medium">{{ $post->title }}</span>
                        </div>
                    </x-table.td>
                    <x-table.td>
                        {{ $post->category->name }}
                    </x-table.td>
                    <x-table.td>
                        {{ $post->created_at }}
                    </x-table.td>
                    <x-table.td>
                        {{ $post->author->name }}
                    </x-table.td>
                    <x-table.td :center="true">
                        <x-link.link-status href="">
                            {!! $post->getActive() !!}
                        </x-link.link-status>
                    </x-table.td>
                    <x-table.td :center="true">
                        <x-link.link-status href="">
                            {!! $post->getFeature() !!}
                        </x-link.link-status>
                    </x-table.td>
                    <x-table.td :center="true">
                        <div class="flex item-center justify-center">
                            <div class="mr-4 transform text-cyan-600 hover:text-cyan-700 hover:scale-110">
                                <x-link.edit href="{{ route('posts.edit', $post) }}" />
                            </div>
                            <div class="transform text-red-600 hover:text-red-700 hover:scale-110">
                                <x-form.confirm-delete action="{{ route('posts.destroy', $post) }}" />
                            </div>
                        </div>
                    </x-table.td>
                </tr>
            @endforeach
        </x-table.table>
    </x-wrap.container>
</x-app-layout>
