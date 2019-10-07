<div class="table-responsive">
    <table class="table" id="shops-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Supplier Id</th>
        <th>Name</th>
        <th>About</th>
        <th>Logo Image</th>
        <th>Cover Image</th>
        <th>Phone</th>
        <th>Country Id</th>
        <th>City Province Id</th>
        <th>District Id</th>
        <th>Address</th>
        <th>Lat</th>
        <th>Lng</th>
        <th>Membership Id</th>
        <th>Is Active</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shops as $shop)
            <tr>
                <td>{!! $shop->user_id !!}</td>
            <td>{!! $shop->supplier_id !!}</td>
            <td>{!! $shop->name !!}</td>
            <td>{!! $shop->about !!}</td>
            <td>{!! $shop->logo_image !!}</td>
            <td>{!! $shop->cover_image !!}</td>
            <td>{!! $shop->phone !!}</td>
            <td>{!! $shop->country_id !!}</td>
            <td>{!! $shop->city_province_id !!}</td>
            <td>{!! $shop->district_id !!}</td>
            <td>{!! $shop->address !!}</td>
            <td>{!! $shop->lat !!}</td>
            <td>{!! $shop->lng !!}</td>
            <td>{!! $shop->membership_id !!}</td>
            <td>{!! $shop->is_active !!}</td>
            <td>{!! $shop->status !!}</td>
                <td>
                    {!! Form::open(['route' => ['shops.destroy', $shop->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('shops.show', [$shop->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('shops.edit', [$shop->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
