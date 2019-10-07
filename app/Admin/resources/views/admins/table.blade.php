<div class="table-responsive">
    <table class="table" id="admins-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
        {{--}}<th>Password</th>
        <th>Remember Token</th>--}}
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <tr>
                <td>{!! $admin->id !!}</td>
                <td>{!! $admin->email !!}</td>
            {{--}}<td>{!! $admin->password !!}</td>--}}
            {{--}}<td>{!! $admin->remember_token !!}</td>--}}
                <td>
                    {!! Form::open(['route' => ['admins.destroy', $admin->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('admins.show', [$admin->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('admins.edit', [$admin->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
