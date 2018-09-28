@extends('admin.layout.master')
@section('title',__('product.admin.create.title') )
@section('body')
<!-- Hover Rows -->
<div class="row clearfix">
  @include('admin.includes.message')
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <h2 class="card-inside-title">{{ __('product.admin.create.form_title') }}</h2>
        <div class="row clearfix">
          <div class="col-sm-12">
            <form id="demo-form2" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="name">{{ __('product.admin.create.name') }} <span class="text-danger">*</span></label>
                <div class="form-line">
                  <input type="text" name="name" class="form-control" value="{{ old('name')}}" placeholder="" required />
                </div>
              </div>
              <div class="form-group">
                <label for="category_id">{{ __('product.admin.create.category_id') }} <span class="text-danger">*</span></label>
                <div class="form-line">
                  <!-- <input type="text" name="category_id" class="form-control" value="{{ old('category_id')}}" placeholder="" /> -->
                    <select name="category_id" class="form-control">
                      <option value="">--- Choose a category ---</option>
                      @foreach ($categories as $id => $name)
                        <option value="{{ $id }}" {{old('category_id') == $id ? 'selected' : ''}}>{{ $name }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label for="price">{{ __('product.admin.create.price') }} <span class="text-danger">*</span></label>
                <div class="form-line">
                  <input type="text" name="price" class="form-control" value="{{ old('price')}}" placeholder="" required />
                </div>
              </div>
              <div class="form-group">
                <label for="old_price">{{ __('product.admin.create.old_price') }} <span class="text-danger">*</span></label>
                <div class="form-line">
                  <input type="text" name="old_price" class="form-control" value="{{ old('old_price')}}" placeholder="" required />
                </div>
              </div>
              <div class="form-group">
                <label for="description">{{ __('product.admin.create.description') }} <span class="text-danger">*</span></label>
                <div class="form-line">
                  <!-- <input type="text" name="description" class="form-control" placeholder="" /> -->
                  <textarea type="text" name="description" class="form-control" placeholder="" required>{{ old('description')}}</textarea>
                </div>
              </div>
              <div class="form-group">
                  <label for="image[]">{{ __('product.admin.create.images') }} <span class="text-danger">*</span></label>
                  <div class="form-line">
                    <input type="file" name="image[]" class="form-control" multiple required />
                  </div>
              </div>
              <div class="form-group">
                <div class="demo-radio-button">
                  <label for="status">{{ __('product.admin.create.status') }} <span class="text-danger">*</span></label><br>
                  <input name="status" type="radio" id="radio_1" value="1" @if (old('status') == 1) checked @endif>
                  <label for="radio_1">{{ __('product.admin.create.in_stock') }}</label>
                  <input name="status" type="radio" id="radio_2" value="2" @if (old('status') == 2) checked @endif>
                  <label for="radio_2">{{ __('product.admin.create.out_stock') }}</label>
                  <input name="status" type="radio" id="radio_3" value="3" @if (old('status') == 3) checked @endif>
                  <label for="radio_3">{{ __('product.admin.create.coming_soon') }}</label>
                </div>
              </div>
              
              <div class="form-group">
                <label for="in_stock">{{ __('product.admin.create.in_stock') }} <span class="text-danger">*</span></label>
                  <div class="form-line">
                    <input type="text" name="in_stock" class="form-control" value="{{ old('in_stock')}}" placeholder="" required />
                  </div>
              </div>
              <button type="submit" id="submit" name="submit" class="btn btn-success">{{ __('product.admin.create.create_product') }}</button>&nbsp;
              <a href="{{ route('admin.products.index') }}" name="submit" class="btn btn-info waves-effect">{{ __('index.form_cancel') }}</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #END# Hover Rows -->

@endsection
