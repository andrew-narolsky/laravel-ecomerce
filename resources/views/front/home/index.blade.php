@extends('front.layout')

@section('title', __('Купить нужные материалы для наращивания в Украине? Интернет-магазин 4nailart'))
@section('description', __('Вы хотите купить нужные материалы для наращивания в Украине? 💝 Интернет-магазин 4nailart. 💋 Качественный товар по доступным ценам. 🚚 Доставка по всей Украине . 📞 Звоните нам +38(096)001-67-40'))

@section('content')
    <div class="products-catagories-area clearfix">

        <style>
            .grid {
                display: grid;
                grid-template-columns: repeat(12, 1fr);
                grid-auto-rows: minmax(120px, auto);
            }

            .grid .products-element {
                grid-column: span 4;
                background-size: cover;
                position: relative;
            }

            .grid .products-element:nth-child(1) {
                grid-row: span 4;
            }

            .grid .products-element:nth-child(2) {
                grid-row: span 6;
            }

            .grid .products-element:nth-child(3) {
                grid-row: span 5;
            }

            .grid .products-element:nth-child(4) {
                grid-row: span 4;
            }

            .grid .products-element:nth-child(5) {
                grid-row: span 4;
            }

            .grid .products-element:nth-child(6) {
                grid-row: span 4;
            }

            .grid .products-element:nth-child(7) {
                grid-row: span 6;
            }

            .grid .products-element:nth-child(8) {
                grid-row: span 5;
            }

            .grid .products-element:nth-child(9) {
                grid-row: span 4;
            }

            .grid .products-element .hover-content {
                position: absolute;
                top: 40px;
                left: 40px;
                z-index: 10;
            }

            .grid .products-element .hover-content .line {
                width: 80px;
                height: 3px;
                background-color: #fbb710;
                display: block;
                margin-bottom: 15px;
            }

            .grid .products-element .hover-content h4 {
                color: #3c3c3c;
                line-height: 1.3;
                font-weight: 400;
            }

            .grid .products-element a:after {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                content: '';
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1;
                opacity: 0;
                visibility: visible;
            }

            .grid .products-element a:hover:after {
                opacity: 1;
                -webkit-transition: all .5s;
                transition: all .5s;
            }

            .grid .products-element a:hover .hover-content h4 {
                color: #FFFFFF;
            }

            .grid .products-element a {
                display: block;
                height: 100%;
                position: relative;
            }

        </style>

        <div class="grid">
            @foreach($categories as $category)
                <div class="products-element" style="background-image: url('{{ Storage::url($category->image) }}')">
                    <a href="{{ route('category', $category->slug) }}">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <h4>{{ $category->title }}</h4>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('newsletter')
    @include('front.newsletter')
@endsection
