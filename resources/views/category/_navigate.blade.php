<div class="navigate">
<a class="link" href="{{ route('category.index') }}">Все категории</a>

@isset($currentCategory->parent_id)
@include('category._subNavigate', ['subCurrentCategory' => $currentCategory->parent])
>
<a class="link" href="{{ route('category.show', ['category' => $currentCategory]) }}">{{ $currentCategory->title }}</a>
@endisset

<hr class="line">
</div>
