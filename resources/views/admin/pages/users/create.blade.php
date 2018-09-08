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
            <form id="demo-form2" method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <div class="form-line">
                  <input type="text" name="name" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <div class="form-line">
                  <input type="text" name="email" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <div class="form-line">
                  <input type="text" name="password" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <div class="form-line">
                  <input type="text" name="adress" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <div class="form-line">
                  <input type="text" name="phone" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <div class="demo-radio-button">
                  <label for="user_type">{{ __('user.admin.role') }}</label><br>
                  <input name="user_type" type="radio" id="radio_1" value="1">
                  <label for="radio_1">{{ __('user.admin.admin') }}</label>
                  <input name="user_type" type="radio" id="radio_2" value="2">
                  <label for="radio_2">{{ __('user.admin.user') }}</label>
                </div>
              </div>
              <div class="form-group">
                <label for="phone">{{ __('user.admin.phone') }}</label>
                <div class="form-line">
                  <input type="text" name="phone" class="form-control" placeholder="{{ __('user.admin.create.enter_phone') }}" />
                </div>
              </div>
              <div class="form-group">
                <label for="email">{{ __('user.admin.email') }}</label>
                <div class="form-line">
                  <input type="text" name="email" class="form-control" placeholder="{{ __('user.admin.create.enter_email') }}" />
                </div>
              </div>
              <div class="form-group">
                <label for="password">{{ __('user.admin.password') }}</label>
                <div class="form-line">
                    <input type="password" name="password" class="form-control" placeholder="{{ __('user.admin.create.enter_password') }}" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">{{ __('user.admin.role') }}</label>
                <select name="role_id" class="form-control">
                  <option value="1">Admin</option>
                  <option value="2">Shop Manager</option>
                  <option value="3">Customer</option>
                </select>
                </div>
              <button type="submit" id="submit" name="submit" class="btn btn-success">{{ __('user.admin.create.create_user') }}</button>&nbsp;
              <button class="btn btn-primary" type="reset">{{ __('user.admin.create.reset_user') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #END# Hover Rows -->
@endsection
