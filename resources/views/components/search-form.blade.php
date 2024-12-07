<form method="GET" action="{{ route('book.index') }}">
    <div class="flex items-center space-x-2">
        <input type="text" name="query" value="{{ $query }}" placeholder="Search books..." class="border p-2 rounded-md">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Search</button>
    </div>
</form>
