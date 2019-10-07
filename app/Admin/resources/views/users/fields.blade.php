<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_name', 'Full Name:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Verified At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_verified_at', 'Phone Verified At:') !!}
    {!! Form::text('phone_verified_at', null, ['class' => 'form-control','id'=>'phone_verified_at']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#phone_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Is Active:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_active', 0) !!}
        {!! Form::checkbox('is_active', '1', null) !!} 1
    </label>
</div>

<!-- Phone Verify Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_verify', 'Phone Verify:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('phone_verify', 0) !!}
        {!! Form::checkbox('phone_verify', '1', null) !!} 1
    </label>
</div>

<!-- Membership Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('membership_id', 'Membership Id:') !!}
    {!! Form::number('membership_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Supplier Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supplier_id', 'Supplier Id:') !!}
    {!! Form::number('supplier_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Remember Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}
</div>

<!-- Fcm Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fcm_token', 'Fcm Token:') !!}
    {!! Form::text('fcm_token', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
