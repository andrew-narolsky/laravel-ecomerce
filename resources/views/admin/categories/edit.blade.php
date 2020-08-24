@extends('admin.layout')
@section('content')
    <div class="main-content">
        <!-- content -->
        <div class="container-fluid content-top-gap">
            <!-- breadcrumbs -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb my-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('Панель администратора') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{ __('Категории') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Редактирование категории') }}</li>
                </ol>
            </nav>
            <!-- //breadcrumbs -->

            <section class="forms">

                <div class="card card_border py-2 mb-4">
                    <div class="cards__heading flex__box">
                        <h3>{{ __('Редактирование категории') }}</h3>
                    </div>
                    <div class="card-body">

                    {{Form::open([
                        'route'	=> ['categories.update', $category->id],
                        'files'	=>	true,
                        'method' => 'put'
                    ])}}
                        <div class="form-row">
                            <div class="form-group col-lg-8">
                                <div class="mb-4">
                                    <label for="exampleInputTitle" class="input__label">{{ __('Название') }}</label>
                                    <input type="text" class="form-control input-style" name="title" value="{{ $category->title }}"
                                           aria-describedby="titleHelp" placeholder="{{ __('Название') }}">
                                    @error('title')
                                    <small class="form-text error-message">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div>
                                    <label for="inputState" class="input__label">{{ __('Родительская категория') }}</label>
                                    <select name="parent_id" class="form-control input-style nice-select">
                                        <option value="0">{{ __('Без родительско категории') }}</option>
                                        @include('admin.categories._options')
                                    </select>
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
                                        <input type="hidden" id="getImage" value="{{ Storage::url($category->image) }}" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputContent" class="input__label">{{ __('Описание') }}</label>
                            <textarea class="form-control input-style" name="text" placeholder="Enter content">{{ $category->text }}</textarea>
                        </div>
                        <div class="form-check check-remember check-me-out mb-4">
                            {{Form::checkbox('is_featured', '1', $category->is_featured, ['class'=>'form-check-input checkbox', 'id'=>'exampleFeatured'])}}
                            <label class="form-check-label checkmark" for="exampleFeatured">{{ __('Показать на главной') }}</label>
                        </div>
                        <div class="form-group">
                            <label class="input__label">{{ __('Seo H1') }}</label>
                            <input type="text" class="form-control input-style" name="seo_h1" value="{{ $category->seo_h1 }}" placeholder="{{ __('Seo H1') }}">
                        </div>
                        <div class="form-group">
                            <label class="input__label">{{ __('Seo Title') }}</label>
                            <input type="text" class="form-control input-style" name="seo_title" value="{{ $category->seo_title }}" placeholder="{{ __('Seo Title') }}">
                        </div>
                        <div class="form-group">
                            <label class="input__label">{{ __('Seo Description') }}</label>
                            <input type="text" class="form-control input-style" name="seo_description" value="{{ $category->seo_description }}" placeholder="{{ __('Seo Description') }}">
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

    <script src="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.js"></script>

    <script>
        var importedBaseImage = document.getElementById('getImage').value;
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
    </script>

@endsection
