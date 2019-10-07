<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    {!! Form::select('parent_id', ['0'=>'None'] + $categories ,[], ['class' => 'form-control']) !!}
</div>

{{--}}
<!-- Lft Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lft', 'Lft:') !!}
    {!! Form::number('lft', null, ['class' => 'form-control']) !!}
</div>

<!-- Rgt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rgt', 'Rgt:') !!}
    {!! Form::number('rgt', null, ['class' => 'form-control']) !!}
</div>

<!-- Depth Field -->
<div class="form-group col-sm-6">
    {!! Form::label('depth', 'Depth:') !!}
    {!! Form::number('depth', null, ['class' => 'form-control']) !!}
</div>

--}}

<!-- Default Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('default_name', 'Default Name:') !!}
    {!! Form::text('default_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order', 'Order:') !!}
    {!! Form::number('order', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Name Field -->
<div class="form-group col-sm-6">

  @if(@$edit && $category->image_name != "")

      <table class="table table-bordered">
        <tr>
          <td>Image</td>
          <td>Image name</td>
          <td>Delete</td>
        </tr>

        <tr>
          <td><img src="{{ asset('uploads/images/categories/'.$category->image_name)}}" width="100px" /></td>
          <td>{{ $category->image_name }}</td>
          <td>{!! Form::checkbox('chk_delete', $category->id, null) !!}</td>
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
    <a href="{!! route('categories.index') !!}" class="btn btn-default">Cancel</a>
</div>
