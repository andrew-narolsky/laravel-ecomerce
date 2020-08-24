@extends('admin.layout')
@section('content')
    <div class="main-content">
        <!-- content -->
        <div class="container-fluid content-top-gap">
            <!-- breadcrumbs -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb my-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('Панель администратора') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Категории') }}</li>
                </ol>
            </nav>
            <!-- //breadcrumbs -->

            <!-- cards -->
            <section class="template-cards">

                <div class="card card_border mb-5">
                    <div class="cards__heading flex__box">
                        <h3>{{ __('Категории') }}</h3>
                        <a href="{{ route('categories.create') }}" class="btn-success btn-style"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Создать категорию') }}</a>
                    </div>
                    <div class="card-body">

                        @include('admin.messages')

                        <div class="row px-2" id="category__list">

                            <div class="category__block table__header" style="width: 100%;">
                                <div class="title">
                                    <div class="open__button"></div>
                                    <div class="name">{{ __('Название') }}</div>
                                    <div class="action">{{ __('Действие') }}</div>
                                </div>
                            </div>

                            @include('admin.categories._categories')

                        </div>
                    </div>
                </div>

            </section>
            <!-- //cards -->

        </div>
        <!-- //content -->
    </div>
@endsection
