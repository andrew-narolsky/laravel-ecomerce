@extends('admin.layout')
@section('content')
    <div class="main-content">
        <!-- content -->
        <div class="container-fluid content-top-gap">
            <!-- breadcrumbs -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb my-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('Панель администратора') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Список пользователей') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Пользователь №') . $user->id }}</li>
                </ol>
            </nav>
            <!-- //breadcrumbs -->

            <!-- cards -->
            <section class="template-cards">

                <div class="card card_border mb-5">
                    <div class="cards__heading flex__box">
                        <h3>{{ __('Пользователь №') . $user->id }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            @include('admin.messages')

                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>{{ __('Имя') }}</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('E-mail') }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Роль пользователя') }}</td>
                                        <td>
                                            @if($user->is_admin)
                                                {{ __('Администратор') }}
                                            @else
                                                {{ __('Пользователь') }}
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </section>
            <!-- //cards -->

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

        </div>
        <!-- //content -->
    </div>
@endsection
