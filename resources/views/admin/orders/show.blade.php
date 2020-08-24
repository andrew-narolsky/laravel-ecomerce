@extends('admin.layout')
@section('content')
    <div class="main-content">
        <!-- content -->
        <div class="container-fluid content-top-gap">
            <!-- breadcrumbs -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb my-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('Панель администратора') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">{{ __('Заказы') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Заказ №') . $order->id }}</li>
                </ol>
            </nav>
            <!-- //breadcrumbs -->

            <!-- cards -->
            <section class="template-cards">

                <div class="card card_border mb-5">
                    <div class="cards__heading flex__box">
                        <h3>{{ __('Заказ №') . $order->id }}</h3>

                        @if(!$order->status)
                            <form action="{{ route('order-complete', $order) }}" method="POST">
                                <button class="btn-success btn-style m-1">
                                    {{ __('Подтвердить') }}
                                </button>
                                @csrf
                            </form>
                        @endif

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            @include('admin.messages')

                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>{{ __('Дата создания') }}</td>
                                        <td>{{ $order->created_at->format('d.m.Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Дата изменения') }}</td>
                                        <td>{{ $order->updated_at->format('d.m.Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Имя заказчика') }}</td>
                                        <td>{{ $order->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Телефон заказчика') }}</td>
                                        <td>{{ $order->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Статус') }}</td>
                                        <td>
                                            @if(!$order->status)
                                                {{ __('Новый') }}
                                            @else
                                                {{ __('Обработан') }}
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="cards__heading flex__box">
                        <h3>{{ __('Заказынне товары') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>{{ __('Изображение') }}</th>
                                        <th>{{ __('Название') }}</th>
                                        <th class="text-center">{{ __('Цена, ед.') }}</th>
                                        <th class="text-center">{{ __('К-во') }}</th>
                                        <th class="text-center">{{ __('Стоимость') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($order->products as $product)
                                    <tr>
                                        <td class="text-center">{{ $product->id }}</td>
                                        <td>
                                            <a href="{{ route('product', [$product->category->slug, $product->slug]) }}">
                                                <img src="{{ $product->getImage() }}" alt="{{ $product->title }}" style="width: 100px; height: 100px; object-fit: cover">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('product', [$product->category->slug, $product->slug]) }}">{{ $product->pivot->title }}</a>
                                        </td>
                                        <td class="text-center">{{ $product->pivot->price . __(' грн.') }}</td>
                                        <td class="text-center">{{ $product->pivot->quantity }}</td>
                                        <td class="text-center">{{ $product->pivot->price *  $product->pivot->quantity . __(' грн.') }}</td>
                                    </tr>
                                @endforeach
                                    <tr class="active">
                                        <td colspan="5">
                                            <b>{{ __('Всего товаров:') }}</b>
                                        </td>
                                        <td class="text-center"><b>{{ $order->quantity . __(' тов.') }}</b></td>
                                    </tr>
                                    <tr class="active">
                                        <td colspan="5">
                                            <b>{{ __('Общая стоимость:') }}</b>
                                        </td>
                                        <td class="text-center"><b>{{ $order->total . __(' грн.') }}</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </section>
            <!-- //cards -->

        </div>
        <!-- //content -->
    </div>
@endsection
