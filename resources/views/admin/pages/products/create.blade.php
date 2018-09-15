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
                <label for="name">{{ __('product.admin.create.name') }}</label>
                <div class="form-line">
                  <input type="text" name="name" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="category_id">{{ __('product.admin.create.category_id') }}</label>
                <div class="form-line">
                  <input type="text" name="category_id" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="price">{{ __('product.admin.create.price') }}</label>
                <div class="form-line">
                  <input type="text" name="price" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="old_price">{{ __('product.admin.create.old_price') }}</label>
                <div class="form-line">
                  <input type="text" name="old_price" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="description">{{ __('product.admin.create.description') }}</label>
                <div class="form-line">
                  <input type="text" name="description" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                  <label for="image[]">{{ __('product.admin.create.images') }}</label>
                  <div class="form-line">
                    <input type="file" name="image[]" class="form-control" multiple/>
                  </div>
              </div>
              <div class="form-group">
                <div class="demo-radio-button">
                  <label for="status">{{ __('product.admin.create.status') }}</label><br>
                  <input name="status" type="radio" id="radio_1" value="1">
                  <label for="radio_1">{{ __('product.admin.create.in_stock') }}</label>
                  <input name="status" type="radio" id="radio_2" value="2">
                  <label for="radio_2">{{ __('product.admin.create.out_stock') }}</label>
                  <input name="status" type="radio" id="radio_3" value="3">
                  <label for="radio_3">{{ __('product.admin.create.coming_soon') }}</label>
                </div>
              </div>
              
              <div class="form-group">
                <label for="in_stock">{{ __('product.admin.create.in_stock') }}</label>
                  <div class="form-line">
                    <input type="text" name="in_stock" class="form-control" placeholder="" />
                  </div>
              </div>
              <button type="submit" id="submit" name="submit" class="btn btn-success">{{ __('product.admin.create.create_product') }}</button>&nbsp;
              <button class="btn btn-primary" type="reset">{{ __('product.admin.create.reset_product') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #END# Hover Rows -->
@endsection
