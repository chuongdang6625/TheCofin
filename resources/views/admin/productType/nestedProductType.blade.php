@foreach($list_parent as $item)
    <option value="{{$item->id}}">{{slug.$item->productType_name}}</option>
    @if(count($item->getParent) > 0)
        @include('admin.productType.nestedProductType', ['list_parent' => $item->getParent, 'slug' => $slug.'-'])
    @endif
@endforeach