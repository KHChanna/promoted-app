<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Unit Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_price', 'Unit Price:') !!}
    {!! Form::text('unit_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Sale Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_price', 'Sale Price:') !!}
    {!! Form::text('sale_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>




<!-- Image Field -->
<div class="form-group col-sm-6">
    @if(@$edit)
      @if(count($product->images)>0)
        <table class="table table-bordered">
          <tr>
            <td>Image</td>
            <td>Image name</td>
            <td>Delete</td>
          </tr>
          @foreach($product->images as $image)
          <tr>
            <td><img src="{{ asset('uploads/images/products/'.$image['image_name'])}}" width="100px" /></td>
            <td>{{ $image['image_name'] }}</td>
            <td>{!! Form::checkbox('chk_delete[]', $image['id'], null) !!}</td>
          </tr>
          @endforeach
        </table>

      @endif
    @endif
    {!! Form::label('images', 'Images:') !!}
    {!! Form::file('images[]', ['class' => 'form-control', 'multiple'=>'multiple','accept'=>'image/*']) !!}
</div>

<!-- Unit Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_id', 'Unit Id:') !!}
    {!! Form::select('unit_id', ['0'=>'None'] + $units, @$edit? $product->unit_id : [], ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    {!! Form::select('category_id', ['0'=>'None'] + $categories, @$edit? $product->category_id : [], ['class' => 'form-control']) !!}
</div>


<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Is Active:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_active', 0) !!}
        {!! Form::checkbox('is_active', '1', null) !!} 1
    </label>
</div>



<!-- Is Promoted Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_promoted', 'Is Promoted:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_promoted', 0) !!}
        {!! Form::checkbox('is_promoted', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
</div>
