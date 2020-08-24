@foreach($tree as $item)
    <option value="{{ $item['id'] }}"
    @isset($product->id)
        @if($product->categories->contains('id', $item['id']))
            selected=""
        @endif
    @endisset
    >{{ $delimiter }} {{ $item['title'] }}</option>

    @isset($item['children'])
        @include('admin.products._options',
        [
            'tree' => $item['children'],
            'delimiter' => ' - ' . $delimiter
        ])
    @endisset
@endforeach
