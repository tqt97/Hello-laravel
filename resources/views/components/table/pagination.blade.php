@props([
    'items' => [],
])
<div class="mt-5 mb-2 mx-2">
    {{ $items->appends($_GET)->links() }}
</div>
