<div class="mb-5">
    <form class="flex items-center" action="{{ route('categories.index') }}">
        <label for="search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <x-icon.search class="text-gray-500 dark:text-gray-400" />
            </div>
            <input type="text" id="search" name="search"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                @if (request()->get('search')) value="{{ request()->get('search') }}" @endif
                placeholder="Search by name ...">
            <x-button.filter />
        </div>
        {{-- <x-button.search /> --}}
        <x-link.reset href="{{ route('categories.index') }}" title="Reset filter" />
    </form>
</div>
