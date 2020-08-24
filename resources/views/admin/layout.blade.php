<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ __('Панель администратора') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/admin.css">

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css">
</head>

<body class="sidebar-menu-collapsed">
<div class="se-pre-con"></div>
<section>
    <!-- sidebar menu start -->
    <div class="sidebar-menu sticky-sidebar-menu">

        <!-- logo start -->
        <div class="logo">
            <h1><a href="{{ route('home') }}">4nailart</a></h1>
        </div>

        <!-- //image logo -->

        <div class="logo-icon text-center">
            <a href="{{ route('home') }}" title="{{ __('Сайт') }}"><img src="/images/logo.png" alt="logo-icon"> </a>
        </div>
        <!-- //logo end -->

        <div class="sidebar-menu-inner">

            <!-- sidebar nav start -->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="active">
                    <a href="{{ route('admin') }}"><i class="fa fa-tachometer"></i><span> {{ __('Панель администратора') }}</span></a>
                </li>
                <li class="menu-list">
                    <a href="#"><i class="fa fa-shopping-cart"></i>
                        <span>{{ __('Заказы') }} <i class="lnr lnr-chevron-right"></i></span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{ route('orders.index') }}">{{ __('Заказы') }}</a></li>
                        <li><a href="{{ route('new-orders') }}">{{ __('Новые заказы') }}</a></li>
                    </ul>
                </li>
                <li class="menu-list">
                    <a href="#"><i class="fa fa-th"></i>
                        <span>{{ __('Категории') }} <i class="lnr lnr-chevron-right"></i></span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{ route('categories.index') }}">{{ __('Категории') }}</a></li>
                        <li><a href="{{ route('categories.create') }}">{{ __('Создать категорию') }}</a></li>
                    </ul>
                </li>
                <li class="menu-list">
                    <a href="#"><i class="fa fa-shopping-bag"></i>
                        <span>{{ __('Товары') }} <i class="lnr lnr-chevron-right"></i></span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{ route('products.index') }}">{{ __('Товары') }}</a></li>
                        <li><a href="{{ route('products.create') }}">{{ __('Создать товар') }}</a></li>
                    </ul>
                </li>
                <li class="menu-list">
                    <a href="#"><i class="fa fa-users" aria-hidden="true"></i>
                        <span>{{ __('Список пользователей') }} <i class="lnr lnr-chevron-right"></i></span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{ route('users.index') }}">{{ __('Список пользователей') }}</a></li>
                    </ul>
                </li>
            </ul>
            <!-- //sidebar nav end -->
            <!-- toggle button start -->
            <a class="toggle-btn">
                <i class="fa fa-angle-double-left menu-collapsed__left"><span>{{ __('Открыть сайдбар') }}</span></i>
                <i class="fa fa-angle-double-right menu-collapsed__right"></i>
            </a>
            <!-- //toggle button end -->
        </div>
    </div>
    <!-- //sidebar menu end -->

    <!-- header-starts -->
    <div class="header sticky-header">

        <!-- notification menu start -->
        <div class="menu-right">
            <div class="navbar user-panel-top">
                <div class="search-box">
                    <form action="{{ route('search-results') }}" method="get">
                        <input class="search-input" name="query" placeholder="{{ __('Поиск...') }}" type="search" id="search">
                        <button class="search-submit" value=""><span class="fa fa-search"></span></button>
                    </form>
                </div>
                <div class="user-dropdown-details d-flex">
                    <div class="profile_details_left">
                        <ul class="nofitications-dropdown">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="lnr lnr-cart"> </i>
                                    <span class="badge blue">
{{--                                        {{ $new_orders_count }}--}}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--notification menu end -->
    </div>
    <!-- //header-ends -->

    <!-- main content start -->
    @yield('content')
    <!-- main content end-->
</section>
<!--footer section start-->
<footer class="dashboard">
    <p>&copy 2016 - {{ date('Y') }} 4nailart. Все права защищены</p>
</footer>
<!--footer section end-->
<!-- move top -->
<button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
    <span class="fa fa-angle-up"></span>
</button>

<script src="/js/admin.js"></script>

<script src="/plugins/ckeditor/ckeditor.js"></script>
<script src="/plugins/ckfinder/ckfinder.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        var editor = CKEDITOR.replaceAll();
        CKFinder.setupCKEditor( editor );

        $('body').on('click', '.open', function () {
            $(this).parents('.title').next('.children').toggleClass('active');
            $(this).parents('.title').toggleClass('active');
        });
    })

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

    $('body').on('click', '.delete__image', function () {
        let $this = $(this);
        let result = confirm('are you sure?');
        if (result) {
            $.ajax({
                type:'POST',
                url:'/admin/delete-gallery-image',
                data: {
                    '_token' : '<?php echo csrf_token() ?>',
                    'product_id' : $(this).data('id'),
                    'image' : $(this).data('image'),
                    'slug' : $(this).data('slug'),
                },
                success:function(data)
                {
                    if (data == 'ok') {
                        $this.parents('.custom-file-container__image-multi-preview').remove();
                        if (!$('.delete__image').length) {
                            $('.current__gallery').html('<p>Изображений пока что нет...</p>');
                        }
                    }
                }
            });
        }
        return false
    });

    $('.btn-action.btn-success').click(function(){
        var id = $('.row.modification:last-child').data('id');
        id++;
        if(id === 11) return false;
        $('.row.modification').parent().append(' <div class="row modification" data-id="' + id + '">\n' +
            '                                <div class="col-md-6">\n' +
            '                                    <input type="text" name="offers[' + id + '][title]" class="form-control" placeholder="{{ __('Модификация товара') }}" >\n' +
            '                                </div>\n' +
            '                                <div class="col-md-6">\n' +
            '                                    <input type="text" name="offers[' + id + '][price]" class="form-control" placeholder="{{ __('Цена') }}" >\n' +
            '                                </div>\n' +
            '                            </div>');
    });
    $('.btn-action.btn-danger').click(function(){
        var id = $('.row.modification:last-child').data('id');
        console.log(id);
        if(id === 1) return false;
        $('.row.modification:last-child').remove();
    });
</script>

<style>
    button {
        outline: none;
        border: none;
    }
    .modification .form-control {
        margin-top: 10px;
    }
    .select2.select2-container.select2-container--default {
        width: 100% !important;
    }
</style>

</body>
</html>
