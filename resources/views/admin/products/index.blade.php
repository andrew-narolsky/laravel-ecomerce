@extends('admin.layout')
@section('content')
    <div class="main-content">
        <!-- content -->
        <div class="container-fluid content-top-gap">
            <!-- breadcrumbs -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb my-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('Панель администратора') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Товары') }}</li>
                </ol>
            </nav>
            <!-- //breadcrumbs -->

            <!-- cards -->
            <section class="template-cards">

                <div class="card card_border mb-5">
                    <div class="cards__heading flex__box">
                        <h3>{{ __('Товары') }}</h3>
                        <a href="{{ route('products.create') }}" class="btn-success btn-style"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Создать товар') }}</a>
                    </div>

                    <div class="cards__heading flex__box">
                        <div class="form-group col-lg-3 col-md-6 px-2 mb-4">
                            <select name="category_id" id="selectCategory" class="form-control input-style js-example-basic-multiple">
                                <option value="0">{{ __('Выберите категорию') }}</option>
                                @include('admin.products._options')
                            </select>
                        </div>
                        <div class="form-group col-lg-9 col-md-6 px-2 mb-4 text-right">
                            <button onclick="resetFilter()" class="btn-primary btn-style border-0">{{ __('Очистить фильтр') }}</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row px-2">
                            @forelse($products as $product)
                                <div class="col-lg-3 col-md-4 px-2 mb-4">
                                    <div class="card card_border">
                                        <div class="content">
                                            <div class="content-overlay"></div>
                                            @isset($product->image)
                                                <img src="{{ Storage::url($product->image) }}" class="img-fluid">
                                            @else
                                                <img src="{{ Storage::url('no-image.jpg') }}" class="img-fluid">
                                            @endif
                                            <div class="content-details fadeIn-top">
                                                <a href="{{ route('products.edit', $product) }}" class="btn-primary btn-success btn-style m-1"><span class="fa fa-pencil-square-o"></span></a>
                                                @if($product->category)
                                                <a href="{{ route('product', [$product->category->slug, $product->slug]) }}" class="btn-primary btn-style m-1">
                                                    <span class="fa fa-eye"></span>
                                                </a>
                                                @endif
                                                {{ Form::open(['route'=>['products.destroy', $product], 'method'=>'delete', 'class'=>'btn-primary btn-danger btn-style m-1']) }}
                                                <button onclick="return confirm('вы уверены?')" type="submit" class="btn-primary btn-danger btn-style border-0">
                                                    <span class="fa fa-times"></span>
                                                </button>
                                                {{ Form::close() }}
                                            </div>
                                        </div>
                                        <div class="card-footer text-muted chart-grid__footer p-4">
                                            <a class="card__title" href="{{ route('products.show', $product->id) }}">{{ $product->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-3 col-md-4 px-2 mb-4">
                                    <p>{{ __('Товаров нет...') }}</p>
                                </div>
                            @endforelse
                        </div>
                        {{$products->links()}}
                    </div>

                </div>

            </section>
            <!-- //cards -->

        </div>
        <!-- //content -->
    </div>
@endsection
