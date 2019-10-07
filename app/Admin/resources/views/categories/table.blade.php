<div class="table-responsive">
    <table class="table" id="categories-table">
        <thead>
            <tr>
              <th>ID</th>
                <th>Parent Id</th>

        <th>Default Name</th>
        <th>Slug</th>
        <th>Order</th>
        <th>Image</th>
        <th>Is Active</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
              <td>{!! $category->id !!}</td>
                <td>{!! $category->parent_id !!}</td>

            <td>{!! $category->default_name !!}</td>
            <td>{!! $category->slug !!}</td>
            <td>{!! $category->order !!}</td>
            <td>
              @if($category->image_name != "")
              <img src="{{ asset('uploads/images/categories/'.$category->image_name)}}" height="70px" />
              @endif

            </td>
            <td>{!! $category->is_active !!}</td>
                <td>
                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('categories.show', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('categories.edit', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
