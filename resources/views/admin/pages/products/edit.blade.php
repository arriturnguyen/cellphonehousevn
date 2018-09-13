@extends('admin.layout.master')
@section('title',__('product.admin.edit.title') )
@section('body')
<!-- Hover Rows -->
<div class="row clearfix">
  @include('admin.includes.message')
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <h2 class="card-inside-title">{{ __('product.admin.edit.form_title') }}</h2>
        <div class="row clearfix">
          <div class="col-sm-12">
            <form id="demo-form2" method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                <div class="form-group">
                  <label for="name">{{ __('product.admin.edit.name') }}</label>
                  <div class="form-line">
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="category_id">{{ __('product.admin.edit.category_id') }}</label>
                    <input type="text" name="category_id" class="form-control" value="{{ $product->category_id }}" placeholder="" />
                </div>
                <div class="form-group">
                  <label for="price">{{ __('product.admin.edit.price') }}</label>
                  <div class="form-line">
                    <input type="text" name="price" class="form-control" value="{{ $product->price }}" placeholder="" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="old_price">{{ __('product.admin.edit.old_price') }}</label>
                  <div class="form-line">
                    <input type="text" name="old_price" class="form-control" value="{{ $product->old_price }}" placeholder="" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="description">{{ __('product.admin.edit.description') }}</label>
                  <div class="form-line">
                    <input type="text" name="description" class="form-control" value="{{ $product->description }}" placeholder="" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="images">{{ __('product.admin.edit.images') }}</label>
                  <div class="form-line">
                    <input type="text" name="images" class="form-control" value="{{ $product->images }}" placeholder="" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label">{{ __('product.admin.edit.status') }}</label>
                    <select name="status" class="form-control">
                      <option value="1" @if ($product->status == 1) selected @endif>{{__('product.admin.edit.in_stock')}}</option>
                      <option value="2" @if ($product->status == 2) selected @endif>{{__('product.admin.edit.out_stock')}}</option>
                      <option value="2" @if ($product->status == 3) selected @endif>{{__('product.admin.edit.coming_soon')}}</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="in_stock">{{ __('product.admin.edit.in_stock') }}</label>
                  <div class="form-line">
                    <input type="text" name="in_stock" class="form-control" value="{{ $product->in_stock }}" placeholder="" />
                  </div>
                </div>                
              <button type="submit" id="submit" name="submit" class="btn btn-success">{{ __('product.admin.edit.update_product') }}</button>&nbsp;
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #END# Hover Rows -->
@endsection
