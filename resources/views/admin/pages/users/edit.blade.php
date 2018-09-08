@extends('admin.layout.master')
@section('title',__('user.admin.edit.title') )
@section('body')
<!-- Hover Rows -->
<div class="row clearfix">
  @include('admin.includes.message')
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <h2 class="card-inside-title">{{ __('user.admin.edit.form_title') }}</h2>
        <div class="row clearfix">
          <div class="col-sm-12">
            <form id="demo-form2" method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                <div class="form-group">
                  <label for="full_name">{{ __('user.admin.name') }}</label>
                  <div class="form-line">
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">{{ __('user.admin.email') }}</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" readonly="true" placeholder="" />
                </div>
                <div class="form-group">
                  <label for="address">{{ __('user.admin.address') }}</label>
                  <div class="form-line">
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" placeholder="{{ __('user.admin.create.enter_phone') }}" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="phone">{{ __('user.admin.phone') }}</label>
                  <div class="form-line">
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" placeholder="{{ __('user.admin.create.enter_phone') }}" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label">{{ __('user.admin.role') }}</label>
                    <select name="user_type" class="form-control">
                      <option value="1" @if ($user->user_type == 1) selected @endif>{{__('user.admin.show.role_admin')}}</option>
                      <option value="2" @if ($user->user_type == 2) selected @endif>{{__('user.admin.show.role_user')}}</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="demo-radio-button">
                    <label for="active">{{ __('user.admin.active') }}</label><br>
                      <input name="active" type="radio" class="with-gap" id="radio_3" value="1" @if ($user->active == 1) checked @endif>
                      <label for="radio_3">{{ __('user.admin.active') }}</label>
                      <input name="active" type="radio" class="with-gap" id="radio_4" value="0" @if ($user->active == 0) checked @endif>
                      <label for="radio_4">{{ __('user.admin.inactive') }}</label>
                  </div>
                </div>                
              <button type="submit" id="submit" name="submit" class="btn btn-success">{{ __('user.admin.edit.update_user') }}</button>&nbsp;
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #END# Hover Rows -->
@endsection
