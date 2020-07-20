<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Stribo - Admin Panel</title>

    <!-- Custom fonts for this template-->
    {{--<link href={{ asset("fontawesome-free/css/all.min.css") }} rel="stylesheet" type="text/css">--}}

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href={{ asset("css/admin.css") }} rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

@include('admin.layouts.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('admin.layouts.topbar')

            <!-- Begin Page Content -->
            <div class="container-fluid">

                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        @include('admin.layouts.footer')

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

@include('admin.layouts.scroll_to_top')

@include('admin.layouts.logout_modal')

<!-- Bootstrap core JavaScript-->
{{--<script src={{ asset("js/admin.js") }}></script>--}}
{{--

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

--}}

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src={{ asset("https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js") }}></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="{{ asset('js/bootstrap.js') }}"></script>

<script>

    /* add product*/
    $(function() {

        $('#save').on('click',function(){

            let category = $('#category').val();
            let vendor = $('#vendor').val();

            $.ajax({
                url: '{{ route('product.store') }}',
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

</script>

</body>

</html>
