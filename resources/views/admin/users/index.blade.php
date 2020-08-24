@extends('admin.layout')
@section('content')
    <div class="main-content">
        <!-- content -->
        <div class="container-fluid content-top-gap">
            <!-- breadcrumbs -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb my-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('Панель администратора') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Список пользователей') }}</li>
                </ol>
            </nav>
            <!-- //breadcrumbs -->

            <!-- cards -->
            <section class="template-cards">

                <div class="card card_border mb-5">
                    <div class="cards__heading flex__box">
                        <h3>{{ __('Список пользователей') }}</h3>
                    </div>

                    @if(!$users->isEmpty())
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Имя') }}</th>
                                    <th>{{ __('E-mail') }}</th>
                                    <th>{{ __('Роль пользователя') }}</th>
                                    <th>{{ __('Действие') }}</th>
                                </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->is_admin)
                                            {{ __('Администратор') }}
                                        @else
                                            {{ __('Пользователь') }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-success" href="{{ route('users.show', $user->id) }}" type="button">{{ __('Просмотр') }}</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                    @else
                        <div class="card-body">
                            <p>{{ __('Пользователй нет...') }}</p>
                        </div>
                    @endif
                </div>

            </section>
            <!-- //cards -->

        </div>
        <!-- //content -->
    </div>
@endsection
