@extends('admin.layout.master')
@section('title',__('user.admin.create.title') )
@section('body')
<!-- Hover Rows -->
<div class="row clearfix">
  @include('admin.includes.message')
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <h2 class="card-inside-title">{{ __('user.admin.create.form_title') }}</h2>
        <div class="row clearfix">
          <div class="col-sm-12">
            <form id="form-user-reg" method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="name">Name <span class="text-danger">*</span></label>
                <div class="form-line">
                  <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder=""/>
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <div class="form-line">
                  <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="password">Password <span class="text-danger">*</span></label>
                <div class="form-line">
                  <input type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <div class="form-line">
                  <input type="text" name="adress" class="form-control" value="{{old('adress')}}" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <div class="form-line">
                  <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <div class="demo-radio-button">
                  <label for="user_type">{{ __('user.admin.role') }} <span class="text-danger">*</span></label><br>
                  <input name="user_type" type="radio" id="radio_1" value="1" @if (old('user_type') == 1) checked @endif>
                  <label for="radio_1">{{ __('user.admin.admin') }}</label>
                  <input name="user_type" type="radio" id="radio_2" value="2" @if (old('user_type') == 2) checked @endif>
                  <label for="radio_2">{{ __('user.admin.user') }}</label>
                </div>
              </div>
              <div class="form-group">
                <div class="demo-radio-button">
                    <label for="active">{{ __('user.admin.active') }} <span class="text-danger">*</span></label><br>
                      <input name="active" type="radio" class="with-gap" id="radio_3" value="1" @if (old('active') == 1) checked @endif>
                      <label for="radio_3">{{ __('user.admin.active') }}</label>
                      <input name="active" type="radio" class="with-gap" id="radio_4" value="0" @if (old('active') == 0) checked @endif>
                      <label for="radio_4">{{ __('user.admin.inactive') }}</label>
                  </div>
                </div>
              <button type="submit" id="submit" name="submit" class="btn btn-success">{{ __('user.admin.create.create_user') }}</button>&nbsp;
              <a href="{{ route('admin.users.index') }}" name="submit" class="btn btn-info waves-effect">{{ __('index.form_cancel') }}</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #END# Hover Rows -->

@endsection

