@extends('admin.layout.master')
@section('title', __('category.admin.title'))
@section('body')
<div class="row clearfix">
	<!-- Advanced Validation -->
  <div class="row clearfix">
    @include('admin.includes.message')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
          <h2>
            {{__('category.admin.add.title') }}
          </h2>
        </div>
        <div class="body">
          <form id="form_advanced_validation" method="POST"
            action="{{route('admin.categories.store')}}">
            @csrf
            @method('POST')
            <div class="row clearfix">
              <div class="col-sm-6">
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="name"
                    minlength="3"> <label class="form-label">{{__('category.admin.table.name') }}</label>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <select class="form-control show-tick" name="parent_id" tabindex="-98">
                  <option value="0">-- Please select category --</option>
                  @foreach ($categoriesParent as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <button class="btn btn-success waves-effect" type="submit">Create</button>
            <a href="{{ route('admin.categories.index') }}" name="submit" class="btn btn-info waves-effect">{{ __('index.form_cancel') }}</a>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- #END# Advanced Validation -->
</div>
@endsection
