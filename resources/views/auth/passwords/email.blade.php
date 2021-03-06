@extends('front.layout')

@section('title', __('Восстановление пароля на сайте. Интернет-магазин 4nailart'))
@section('description', __('Восстановление пароля на сайте. 💝 Интернет-магазин 4nailart. 💋 Качественный товар по доступным ценам. 🚚 Доставка по всей Украине . 📞 Звоните нам +38(096)001-67-40'))

@section('content')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2>{{ __('Восстановление пароля на сайте') }}</h2>
                        </div>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn amado-btn">
                                        {{ __('Отправить ссылку на восстановление') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
