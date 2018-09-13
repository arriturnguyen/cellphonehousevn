@extends('admin.layout.master')
@section('title', __('store.admin.detail_title'))
@section('body')
<div class="row clearfix">
  @include('admin.includes.message')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
      <div class="header">
        <h2>{{__('store.admin.detail_title') .': '.$store->name}}</h2>
        <a href="{{ route('admin.stores.create') }}"
            class="btn bg-green waves-effect" style="margin-top: 30px;"> <i
            class="material-icons">add</i><span>{{ __('store.admin.add.create') }}</span>
        </a>
      </div>
      <div class="body">
        <div class="row clearfix">
        	<div class="col-sm-3">
           <h4>{{__('store.admin.name')}}:</h4>
          </div>
          <div class="col-sm-9">
            <p class="font-22">{{ $store->name }}</p>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-sm-3">
            <h4>{{__('store.admin.address')}}:</h4>
          </div>
          <div class="col-sm-9">
            <p class="font-20">{{$store->address}}</p>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-sm-3">
            <h4>{{__('store.admin.phone')}}:</h4>
          </div>
          <div class="col-sm-9">
            <p class="font-20">{{ $store->phone }}</p>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-sm-3">
            <h4>{{__('store.admin.uptime')}}:</h4>
          </div>
          <div class="col-sm-9">
            <p class="font-20">{{ $store->shopOpenStatus->time_open }} - {{ $store->shopOpenStatus->time_close }}</p>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-sm-3">
            <h4>{{__('store.admin.describe')}}:</h4>
          </div>
          <div class="col-sm-9">
            <p class="font-20">{{ $store->describe }}</p>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-sm-3">
            <h4>{{__('store.admin.image')}}:</h4>
          </div>
          <div class="col-sm-9">
            <img class="img-responsive thumbnail" src="{{ $store->image }}">
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-sm-12">
            <a href="{{ route('admin.stores.edit', $store->id) }}" class="btn bg-blue waves-effect" style="margin-top: 30px;">
              <i class="material-icons">border_color</i><span>{{ __('store.admin.table.edit') }}</span>
            </a>
          </div>
        </div>
      </div>
		</div>
	</div>
</div>
@endsection
