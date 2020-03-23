<label for="parent_id">Родительская категория</label>
{{ $delimiter = "-" }}
{{ $i = 0 }}
<select class="select" name="parent_id">
    <option value="0"> ---- </option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->title }}</option>
        @if($category->children->isNotEmpty())
            @include('category._categories', ['categories' => $category->children])
        @endif
    @endforeach
</select>


