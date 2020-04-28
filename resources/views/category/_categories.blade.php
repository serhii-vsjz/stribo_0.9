@foreach($categories as $categoryItem)
    <option value="{{ $categoryItem->id }}"

    @isset ($category->id)
        @if(Route::is('category.edit'))
            @if($category->parent_id == $categoryItem->id)
                selected=""
            @endif
        @else
            @if ($category->id == $categoryItem->id)
                selected=""
            @endif
        @endif
    @endisset
    >
        {{ $delimiter ?? '' }}{{ $categoryItem->title ?? '' }}
    </option>

    @isset($categoryItem->children)
        @include('category._categories', [
        'categories' => $categoryItem->children,
        'delimiter' => '-' . $delimiter ?? '',
        ])
    @endisset

@endforeach
