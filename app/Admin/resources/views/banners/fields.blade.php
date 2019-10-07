<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>


<!-- Target URL Field -->
<div class="form-group col-sm-6">
    {!! Form::label('target_url', 'Target URL:') !!}
    {!! Form::text('target_url', null, ['class' => 'form-control']) !!}
</div>


<!-- Phone Verified At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expiry_date', 'Expiry Date:') !!}
    {!! Form::text('expiry_date', null, ['class' => 'form-control','id'=>'expiry_date']) !!}
</div>


@section('scripts')
    <script type="text/javascript">
        $('#expiry_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection


<!-- Image Name Field -->
<div class="form-group col-sm-6">

  @if(@$edit && $banner->image_name != "")

      <table class="table table-bordered">
        <tr>
          <td>Image</td>
          <td>Image name</td>
          <td>Delete</td>
        </tr>

        <tr>
          <td><img src="{{ asset('uploads/images/banners/'.$banner->image_name)}}" width="100px" /></td>
          <td>{{ $banner->image_name }}</td>
          <td>{!! Form::checkbox('chk_delete', $banner->id, null) !!}</td>
        </tr>

      </table>


  @else

  {!! Form::label('image', 'Image:') !!}
  {!! Form::file('image', ['class' => 'form-control','accept'=>'image/*']) !!}

  @endif
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Is Active:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_active', 0) !!}
        {!! Form::checkbox('is_active', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('banners.index') !!}" class="btn btn-default">Cancel</a>
</div>
