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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Новые заказы') }}</li>
                </ol>
            </nav>
            <!-- //breadcrumbs -->

            <!-- cards -->
            <section class="template-cards">

                <div class="card card_border mb-5">
                    <div class="cards__heading flex__box">
                        <h3>{{ __('Новые заказы') }}</h3>
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
                                                <a class="btn btn-success" href="{{ route('orders.show', $order->id) }}" type="button">{{ __('Просмотр') }}</a>
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
