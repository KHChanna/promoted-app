<div class="table-responsive">
    <table class="table" id="banners-table">
        <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Image</th>
              <th>Target URL</th>
              <th>Expiry Date</th>
              <th>Is Active</th>
              <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($banners as $banner)
            <tr>
              <td>{!! $banner->id !!}</td>
              <td>{!! $banner->title !!}</td>
              <td>
                @if($banner->image_name != "")
                <img src="{{ asset('uploads/images/banners/'.$banner->image_name)}}" height="70px" />
                @endif

              </td>
              <td>{!! $banner->target_url !!}</td>
              <td>{!! $banner->expiry_date !!}</td>
              <td>{!! $banner->is_active !!}</td>



                <td>
                    {!! Form::open(['route' => ['banners.destroy', $banner->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('banners.show', [$banner->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('banners.edit', [$banner->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
