@extends('admin.layouts.app')

@section('content')
{{--

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
--}}


<div class="upload">
    <form action="{{ route('admin.products.upload') }}" enctype="multipart/form-data" method="POST" >
        @csrf
        <label>Загрузить товары с Excel файл</label>
        <input type="file" name="excel">
        <input type="submit">
    </form>
</div>
<div class="form-edit">
    <form id="form_edit" action="{{ route('admin.products.update', ['category' => $currentCategory]) }}" enctype="multipart/form-data" method="POST">
        @csrf
    </form>
</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $currentCategory!=''?$currentCategory->title:"Все продукты"}} (Режим редактирования)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">


            {{--From this point, the display of all product characteristics tables begins--}}

            @foreach($attributesByGroups as $tableName => $attributes)
                <table class="table" id="table">
                    <caption>{{ __($tableName) }}</caption>
                    <tr>
                        <td>
                            {{ __('Vendor') }}
                        </td>
                        @foreach($attributes as $attribute)
                            <td>
                                {{ $attribute->name }}
                            </td>
                        @endforeach
                    </tr>

                    @foreach($products as $product)
                        <tr>
                            <td>
                                {{ $product->vendor }}
                            </td>
                            @foreach($attributes as $attribute)
                                <td class="td" name="{{ $product . '-' . $attribute->id }}">
                                    @if($product->getAttributeValueById($attribute->id))
                                        {{ $product->getAttributeValueById($attribute->id) }}
                                    @else
                                        -
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            @endforeach
        </div>
    </div>
</div>

<button form="form_edit" type="submit">Сохранить изменения</button>



    <script>
        const buttons = document.querySelectorAll('.td');
        buttons.forEach((button) => {
            button.addEventListener('click', (e) => {

                // Получаем елемент на который кликнули
                const el = e.target;

                // Сохраняем и очищаем значение ячейки
                const text = el.textContent.trim();
                el.textContent = '';


                // переменная формы для привязки

                const form = document.querySelector('#form_edit');


                // Создаем элемент
                const input = document.createElement('input');
                el.appendChild(input);
                input.value = text;
                input.name = 'test';
                input.focus();

                form.oninput(input)
            })
        })
    </script>
@endsection
