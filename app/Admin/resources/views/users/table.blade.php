<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
              <th>ID</th>
                <th>Full Name</th>
        <th>Phone</th>
        <th>Phone Verified At</th>

        <th>Is Active</th>
        <th>Phone Verify</th>
        <th>Membership Id</th>
        <th>Supplier Id</th>

                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
              <td>{!! $user->id !!}</td>
                <td>{!! $user->full_name !!}</td>
            <td>{!! $user->phone !!}</td>
            <td>{!! $user->phone_verified_at !!}</td>

            <td>{!! $user->is_active !!}</td>
            <td>{!! $user->phone_verify !!}</td>
            <td>{!! $user->membership_id !!}</td>
            <td>{!! $user->supplier_id !!}</td>


                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
