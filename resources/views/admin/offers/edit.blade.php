@extends('admin.layout')
@section('content')
    <div class="main-content">
        <!-- content -->
        <div class="container-fluid content-top-gap">
            <!-- breadcrumbs -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb my-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('Панель администратора') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('Товары') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.edit', $product) }}">{{ $product->title }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Редактирование товарного предложения') }}</li>
                </ol>
            </nav>
            <!-- //breadcrumbs -->

            <section class="forms">

                <div class="card card_border py-2 mb-4">
                    <div class="cards__heading flex__box">
                        <h3>{{ __('Редактирование товарного предложения') }}</h3>
                    </div>
                    <div class="card-body">

                        {{Form::open([
                            'route'	=> ['offers.update', $product, $offer],
                            'files'	=>	true,
                            'method' => 'put'
                        ])}}
                        <div class="form-row">
                            <div class="form-group col-lg-12">

                                @foreach($properties as $property)
                                    <div class="mb-4">
                                        <label for="inputState" class="input__label">{{ $property->title }}</label>
                                        {{Form::select('property_id[' . $property->id . ']',
                                            $property->propertyOptions()->pluck('title', 'id')->all(),
                                            $selectedProperties,
                                            ['class' => 'form-control input-style nice-select'])
                                        }}
                                    </div>
                                @endforeach

                                <div class="mb-4">
                                    <label for="exampleInputTitle" class="input__label">{{ __('Ціна') }}</label>
                                    <input type="text" class="form-control input-style" name="price" value="{{ $offer->price }}"
                                           aria-describedby="titleHelp" placeholder="{{ __('Ціна') }}">
                                    @error('price')
                                    <small class="form-text error-message">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-style mt-4">{{ __('Сохранить') }}</button>
                        {{Form::close()}}

                    </div>
                </div>

            </section>
            <!-- //cards -->

        </div>
        <!-- //content -->
    </div>

@endsection
