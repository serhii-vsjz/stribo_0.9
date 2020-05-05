<div class="navigate">
<a href="{{ route('category.index') }}">Все категории</a>

@isset($currentCategory->parent_id)
@include('category._subNavigate', ['subCurrentCategory' => $currentCategory->parent])
->
<a href="{{ route('category.show', ['category' => $currentCategory]) }}">{{ $currentCategory->title }}</a>
@endisset

<hr style="border: 1px solid #817c7f; margin-bottom: 10px">
</div>
