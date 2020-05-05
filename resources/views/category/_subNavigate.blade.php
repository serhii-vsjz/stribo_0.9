@isset($subCurrentCategory->parent_id)

    @isset($subCurrentCategory->parent->parent_id)
        @include('category._subNavigate', ['subCurrentCategory' => $subCurrentCategory->parent])
    @endisset

    >
    <a class="link" href="{{ route('category.show', ['category' => $subCurrentCategory]) }}">{{ $subCurrentCategory->title }}</a>
@endisset

