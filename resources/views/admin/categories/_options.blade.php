@foreach($tree as $item)
    <option value="{{ $item['id'] }}"
    @isset($category->id)
        @if($category->parent_id == $item['id'])
            selected=""
        @endif
        @if($category->id == $item['id'])
            disabled=""
        @endif
    @endisset
    >{{ $delimiter }} {{ $item['title'] }}</option>

    @isset($item['children'])
        @include('admin.categories._options',
        [
            'tree' => $item['children'],
            'delimiter' => ' - ' . $delimiter
        ])
    @endisset
@endforeach
