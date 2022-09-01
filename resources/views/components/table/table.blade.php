@props([
    'thead' => [],
    'items' => [],
])


<table class="min-w-max w-full table-auto">
    <thead class="">
        <tr class="bg-gray-800 text-gray-50 text-md leading-normal">
            <th scope="col" class="py-3 pl-6 text-center">
                <input type="checkbox" name="check[]" id="">
            </th>
            @foreach ($thead as $th)
                <x-table.th class="{{ $th['class'] }}">
                    {{ __($th['label']) }}
                </x-table.th>
            @endforeach
        </tr>
    </thead>
    <tbody class="text-gray-600 text-sm font-light">

        @if ($items->count() > 0)
            {{ $slot }}
        @else
            <tr>
                <td colspan="{{ count($thead) + 1 }}">
                    <div class="text-gray-400 text-center font-bold mt-6">
                        {{ __('No data were found...') }}</div>
                </td>
            </tr>
        @endif
    </tbody>
</table>

<x-table.pagination :items="$items" />
