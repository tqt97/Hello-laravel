<a
    {{ $attributes->merge(['class' => 'inline-flex items-center py-2.5 px-2.5 ml-2 text-sm font-medium text-white bg-gray-500 rounded-lg border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800']) }}>
    <x-icon.reset />
    {{ $slot }}
</a>
