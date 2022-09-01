@props(['action'])


<form action="{{ $action }}" method="POST" style="display: inline-block;">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" onclick="return confirm('Do you want to delete this item ?')">
        <x-icon.trash />
    </button>
</form>
