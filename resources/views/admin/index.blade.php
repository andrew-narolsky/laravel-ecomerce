@extends('admin.layout')
@section('content')
    <div class="main-content">
        <!-- content -->
        <div class="container-fluid content-top-gap">

            <!-- statistics data -->
            <div class="statistics">
                <div class="row">
                    <div class="col-xl-6 pr-xl-2">
                        <div class="row">
                            <div class="col-sm-6 pr-sm-2 statistics-grid">
                                <div class="card card_border border-primary-top p-4">
                                    <i class="lnr lnr-users"> </i>
                                    <h3 class="text-primary number">{{ $users_count . __(' польз.') }}</h3>
                                    <p class="stat-text">{{ __('Пользователи') }}</p>
                                </div>
                            </div>
                            <div class="col-sm-6 pl-sm-2 statistics-grid">
                                <div class="card card_border border-primary-top p-4">
                                    <i class="lnr lnr-shirt"> </i>
                                    <h3 class="text-secondary number">{{ $products_count . __(' шт.') }}</h3>
                                    <p class="stat-text">{{ __('Товары') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 pl-xl-2">
                        <div class="row">
                            <div class="col-sm-6 pr-sm-2 statistics-grid">
                                <div class="card card_border border-primary-top p-4">
                                    <i class="lnr lnr-store"> </i>
                                    <h3 class="text-success number">{{ $orders_price . __(' грн.') }}</h3>
                                    <p class="stat-text">{{ __('Продажи') }}</p>
                                </div>
                            </div>
                            <div class="col-sm-6 pl-sm-2 statistics-grid">
                                <div class="card card_border border-primary-top p-4">
                                    <i class="lnr lnr-cart"> </i>
                                    <h3 class="text-danger number">{{ $orders_count . __(' шт.') }}</h3>
                                    <p class="stat-text">{{ __('Заказы') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //statistics data -->

            <!-- cards -->
            <section class="template-cards">

                <div class="card card_border mb-5">
                    <div class="cards__heading flex__box">
                        <h3>{{ __('Заказы') }}</h3>
                    </div>

                    @if(!$orders->isEmpty())
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Имя') }}</th>
                                    <th>{{ __('Телефон') }}</th>
                                    <th>{{ __('Дата') }}</th>
                                    <th>{{ __('Статус') }}</th>
                                    <th>{{ __('Сумма') }}</th>
                                    <th>{{ __('Действие') }}</th>
                                </tr>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id}}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->created_at->format('d.m.Y') }}</td>
                                        <td>
                                            @if(!$order->status)
                                                {{ __('Новый') }}
                                            @else
                                                {{ __('Обработан') }}
                                            @endif
                                        </td>
                                        <td>{{ $order->total . __(' грн.') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-success" href="{{ route('orders.show', $order->id) }}" type="button">{{ __('Відкрити') }}</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $orders->links() }}
                        </div>
                    @else
                        <div class="card-body">
                            <p>{{ __('Заказов нет...') }}</p>
                        </div>
                    @endif
                </div>

            </section>
            <!-- //cards -->

        </div>
        <!-- //content -->
    </div>
@endsection
