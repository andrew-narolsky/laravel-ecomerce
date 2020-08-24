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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Редактирование товара') }}</li>
                </ol>
            </nav>
            <!-- //breadcrumbs -->

            <section class="forms">

                <div class="card card_border py-2 mb-4">

                    <div class="cards__heading flex__box">
                        @include('admin.messages')
                    </div>

                    <div class="cards__heading flex__box">
                        <h3>{{ __('Редактирование товара') }}</h3>
                    </div>

                    <div class="card-body">

                        {{Form::open([
                            'route'	=> ['products.update', $product->id],
                            'files'	=>	true,
                            'method' => 'put'
                        ])}}

                        <div class="form-row">
                            <div class="form-group col-lg-8">
                                <div class="mb-4">
                                    <label class="input__label">{{ __('Название') }}</label>
                                    <input type="text" class="form-control input-style" name="title" value="{{ $product->title }}" placeholder="{{ __('Название') }}">
                                    @error('title')
                                    <small class="form-text error-message">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="input__label">{{ __('Цена') }}</label>
                                    <input type="text" class="form-control input-style" name="price" value="{{ $product->price }}" placeholder="{{ __('Цена') }}">
                                    @error('price')
                                    <small class="form-text error-message">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="inputState" class="input__label">{{ __('Главная категория') }}</label>
                                    <select name="category_id" class="form-control input-style js-example-basic-multiple">
                                        @include('admin.products._categories')
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputContent" class="input__label">{{ __('Описание') }}</label>
                                    <textarea class="form-control input-style" name="text" placeholder="Enter content">{{ $product->text }}</textarea>
                                </div>

                                <div class="form-check check-remember check-me-out mb-4">
                                    {{Form::checkbox('status', '1', $product->status, ['class'=>'form-check-input checkbox', 'id'=>'exampleStatus'])}}
                                    <label class="form-check-label checkmark" for="exampleStatus">{{ __('Товар в наличии') }}</label>
                                </div>
                                <div class="form-check check-remember check-me-out mb-4">
                                    {{Form::checkbox('is_featured', '1', $product->is_featured, ['class'=>'form-check-input checkbox', 'id'=>'exampleFeatured'])}}
                                    <label class="form-check-label checkmark" for="exampleFeatured">{{ __('Товар рекомедован') }}</label>
                                </div>

                                <div class="box box-default box-solid">
                                    <div class="box-header">
                                        <label style="margin-top: 20px; font-size: 18px;">{{ __('Модификации товара') }}</label>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-block btn-action btn-danger"><i class="icon fa fa-minus-circle"></i></button>
                                                </div>
                                                <div class="col-md-10"></div>
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-block btn-action btn-success"><i class="icon fa fa-plus-circle"></i></button>
                                                </div>
                                            </div>

                                            @forelse($offers as $key => $offer)
                                                <div class="row modification" data-id="{{ $key }}">
                                                    <div class="col-md-6">
                                                        <input type="text" name="offers[{{$key }}][title]" class="form-control" placeholder="{{ __('Модификация товара') }}" value="{{ $offer->title }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="offers[{{ $key }}][price]" class="form-control" placeholder="{{ __('Цена') }}" value="{{ $offer->price }}">
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="row modification" data-id="1">
                                                    <div class="col-md-6">
                                                        <input type="text" name="offers[1][title]" class="form-control" placeholder="{{ __('Модификация товара') }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="offers[1][price]" class="form-control" placeholder="{{ __('Цена') }}">
                                                    </div>
                                                </div>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="form-group col-lg-3">

                                <label style="margin-top: 20px; font-size: 18px;">{{ __('Изображение') }}</label>

                                <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                    <label>{{ __('Очистить изображение') }} <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="image" accept="*" aria-label="Choose File">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        @isset($product->image)
                                            <input type="hidden" id="getImage" value="{{ Storage::url($product->image) }}" />
                                        @else
                                            <input type="hidden" id="getImage" value="{{ Storage::url('no-image.jpg') }}" />
                                        @endif
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>

                                <label style="margin-top: 20px; font-size: 18px;">{{ __('Гелерея') }}</label>

                                <div class="custom-file-container">
                                    <div class="flex__images custom-file-container__image-pr current__gallery">
                                        @forelse($galleries[0]->galleries as $item)
                                            <div class="custom-file-container__image-multi-preview" style="background-image: url({{ Storage::url('products/' . $product->slug . '/' . $item->image) }})">
                                                <span class="delete__image" data-image="{{ $item->image }}" data-id="{{ $product->id }}" data-slug="{{ $product->slug }}">
                                                    <span>×</span>
                                                </span>
                                            </div>
                                        @empty
                                            <p>{{ __('Изображений гелереи нет...') }}</p>
                                        @endforelse
                                    </div>
                                </div>

                                <label style="margin-top: 20px; font-size: 18px;">{{ __('Загрузить еще изображения') }}</label>

                                <div class="custom-file-container" data-upload-id="myUniqueUploadIds">
                                    <label>{{ __('Очистить изображения') }} <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">×</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="gallery[]" accept="*" multiple="multiple" aria-label="Choose File">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                                        <span class="custom-file-container__custom-file__custom-file-control">Custom Placeholder Copy<span class="custom-file-container__custom-file__custom-file-control__button"> Custom Button Copy </span>
                                        </span></label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="input__label">{{ __('Seo H1') }}</label>
                            <input type="text" class="form-control input-style" name="seo_h1" value="{{ $product->seo_h1 }}" placeholder="{{ __('Seo H1') }}">
                        </div>
                        <div class="form-group">
                            <label class="input__label">{{ __('Seo Title') }}</label>
                            <input type="text" class="form-control input-style" name="seo_title" value="{{ $product->seo_title }}" placeholder="{{ __('Seo Title') }}">
                        </div>
                        <div class="form-group">
                            <label class="input__label">{{ __('Seo Description') }}</label>
                            <input type="text" class="form-control input-style" name="seo_description" value="{{ $product->seo_description }}" placeholder="{{ __('Seo Description') }}">
                        </div>

                        <input type="hidden" id="slug" value="{{ $product->slug }}" />
                        <button type="submit" class="btn btn-success btn-style mt-4">{{ __('Сохранить') }}</button>

                        {{Form::close()}}

                    </div>

                </div>

            </section>
            <!-- //cards -->

        </div>
        <!-- //content -->
    </div>

    <script src="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.js"></script>

    <script>

        // var arr = [{"id":7,"product_id":32,"image":"noviy-tovar-2-1.png","created_at":"2020-05-31 22:14:51","updated_at":"2020-05-31 22:14:51"}, {"id":8,"product_id":32,"image":"noviy-tovar-2-2.jpeg","created_at":"2020-05-31 22:14:51","updated_at":"2020-05-31 22:14:51"}]

        var importedBaseImage = document.getElementById('getImage').value;
        // var importedBaseImages = document.getElementById('getImages').value;
        // var slug = document.getElementById('slug').value;
        // importedBaseImages = JSON.parse(importedBaseImages);
        // var arr = [];
        // importedBaseImages.forEach(function(item, i, importedBaseImages) {
        //     arr[i] = '/uploads/products/' + slug + '/' + item.image;
        // });
        var upload = new FileUploadWithPreview('myUniqueUploadId', {
            showDeleteButtonOnImages: true,
            text: {
                chooseFile: 'Выберите изображение',
                browse: 'Загрузить',
                selectedCount: 'Custom Files Selected Copy',
            },
            images: {
                baseImage: importedBaseImage,
            },
        })

        // var importedBaseImages = document.getElementById('getImages').value;
        var upload2 = new FileUploadWithPreview('myUniqueUploadIds', {
            showDeleteButtonOnImages: true,
            text: {
                chooseFile: 'Выберите изображения',
                browse: 'Загрузить',
                selectedCount: 'Custom Files Selected Copy',
            },
            // presetFiles: arr,
        })
        upload2.cachedFileArray;
    </script>

    <style>
        .delete__image {
            left: -6px;
            background: #EDEDE8;
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            text-align: center;
            margin-top: -6px;
            box-shadow: 0 4px 10px 0 rgba(51, 51, 51, 0.25);
        }
        .delete__image span {
            color: #6a6a53;
            display: block;
            margin-top: -2px;
        }
        .delete__image:hover {
            cursor: pointer;
            background: #cbcbbd;
        }
    </style>
@endsection
