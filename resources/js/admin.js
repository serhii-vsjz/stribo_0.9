$(document).ready(function () {

    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    $('#save').on('click',function(){

        let category = $('#category').val();
        let vendor = $('#vendor').val();
        let route = "{{ route('product.store') }}";

        $.ajax({
            url: route,
            type: "POST",
            data: {category:category,vendor:vendor},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (data) {

                $('#addArticle').modal('hide');

                $('#articles-wrap').removeClass('hidden').addClass('show');

                $('.alert').removeClass('show').addClass('hidden');

                var str = '<tr><td>'+data['id']+

                    '</td><td><a href="/product/'+data['id']+'">'+data['vendor']+'</a>'+

                    '</td><td><a href="/product/'+data['id']+'" class="delete" data="'+data['id']+'">Удалить</a></td></tr>';

                $('.table > tbody:last').append(str);
            },

            error: function (msg) {
                alert('Ошибка');
            }
        });
    });

    /* delete product */
    $('tbody').on('click','.delete',function(e){

        e.preventDefault();

        let url = $(this).data('href');
        let el = $(this).parents('tr');

        $.ajax({
            url: url,
            type: "DELETE",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {

                el.detach();
            },
            error: function (msg) {
                alert('Ошибка');
            }
        });
    });
});
