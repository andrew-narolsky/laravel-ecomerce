@foreach($tree as $item)

    @if(isset($item['children']))
        <div class="category__block" style="width: 100%;">
            <div class="title">
                <div class="open__button open"></div>
                <div class="name">{{ $item['title'] }}</div>
                <div class="action">
                    <a href="{{ route('categories.edit', $item['id']) }}" class="bg-success btn-style"><span class="fa fa-pencil" style="color: #fff"></span></a>
                    <a href="{{ route('categories.show', $item['id']) }}" class="btn-primary btn-style"><span class="fa fa-eye" style="color: #fff"></span></a>
                    {{ Form::open(['route'=>['categories.destroy', $item['id']], 'method'=>'delete', 'class'=>'btn-primary btn-danger btn-style']) }}
                    <button onclick="return confirm('Вы уверены?')" type="submit" class="btn-primary btn-danger btn-style border-0">
                        <span class="fa fa-times"></span>
                    </button>
                    {{ Form::close() }}
                </div>
            </div>
    @else
        <div class="category__block" style="width: 100%;">
            <div class="title">
                <div class="open__button"></div>
                <div class="name">{{ $item['title'] }}</div>
                <div class="action">
                    <a href="{{ route('categories.edit', $item['id']) }}" class="bg-success btn-style"><span class="fa fa-pencil" style="color: #fff"></span></a>
                    <a href="{{ route('categories.show', $item['id']) }}" class="btn-primary btn-style"><span class="fa fa-eye" style="color: #fff"></span></a>
                    {{ Form::open(['route'=>['categories.destroy', $item['id']], 'method'=>'delete', 'class'=>'btn-primary btn-danger btn-style']) }}
                    <button onclick="return confirm('Вы уверены??')" type="submit" class="btn-primary btn-danger btn-style border-0">
                        <span class="fa fa-times"></span>
                    </button>
                    {{ Form::close() }}
                </div>
            </div>
    @endif

    @isset($item['children'])
        <div class="children">
            @include('admin.categories._categories',['tree' => $item['children']])
        </div>
    @endisset

    </div>
@endforeach
