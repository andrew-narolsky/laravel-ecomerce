@foreach($tree as $item)
    <option value="{{ $item['id'] }}"
        @if($item['id'] == $product->category_id)
            selected=""
        @endif
    >{{ $delimiter }} {{ $item['title'] }}</option>

    @isset($item['children'])
        @include('admin.products._categories',
        [
            'tree' => $item['children'],
            'delimiter' => ' - ' . $delimiter
        ])
    @endisset
@endforeach
