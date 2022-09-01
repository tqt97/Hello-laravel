<div class="mb-5">
    <form action="{{ route('posts.index') }}">
        <div class="w-full shadow-md p-5 rounded-lg bg-white">
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-3 gap-4">
                <div class="relative">
                    <div class="absolute flex items-center ml-2 h-full">
                        <x-icon.search class="text-gray-500 dark:text-gray-400" />
                    </div>
                    <input type="text" name="search"
                        @if (request()->get('search')) value="{{ request()->get('search') }}" @endif
                        placeholder="Search by post name ..."
                        class="px-8 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                </div>
                <select name="category_id"
                    class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                    <option value=""> -- Select category -- </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if (request()->get('category_id')) {{ request()->get('category_id') == $category->id ? 'selected' : '' }} @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <select name="user_id"
                    class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                    <option value=""> -- Select author-- </option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"
                            @if (request()->get('user_id')) {{ request()->get('user_id') == $user->id ? 'selected' : '' }} @endif>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end items-right mt-4">
                <x-button.search />
                <x-link.reset href="{{ route('posts.index') }}" title="Reset filter" />
            </div>
        </div>
    </form>
</div>
