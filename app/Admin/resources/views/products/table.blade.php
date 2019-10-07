<div class="table-responsive">
    <table class="table" id="products-table">
        <thead>
            <tr>
              <th>ID</th>
                <th>Name</th>
        <th>Unit Price</th>
        <th>Sale Price</th>
        <th>Description</th>
        <th>Images</th>
        <th>Unit Id</th>
        <th>Category Id</th>
        <th>Is Active</th>
        <th>Is Promoted</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
              <td>{!! $product->id !!}</td>
                <td>{!! $product->name !!}</td>
            <td>{!! $product->unit_price !!}</td>
            <td>{!! $product->sale_price !!}</td>
            <td>{!! $product->description !!}</td>
            <td>
              @if($product->images->first()['image_name'])
              <img src="{{ asset('uploads/images/products/'.$product->images->first()['image_name'])}}" height="70px" />
              @endif
            </td>
            <td>{!! $product->unit_id !!}</td>
            <td>{!! $product->category_id !!}</td>
            <td>{!! $product->is_active !!}</td>
            <td>{!! $product->is_promoted !!}</td>
                <td>
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
