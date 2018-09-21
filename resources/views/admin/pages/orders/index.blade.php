@extends('admin.layout.master')
@section('title',__('order.admin.show.title') )
@section('body')
<!-- Hover Rows -->
<div class="row clearfix">
  @include('admin.includes.message')
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <div class="header">
            <h2>{{__('order.admin.list.title')}}</h2>
        </div>
        <div class="body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>{{__('order.admin.id')}}</th>
                <th>{{__('order.admin.user_name')}}</th>
                <th>{{__('order.admin.address')}}</th>
                <th>{{__('order.admin.phone')}}</th>
                <th>{{__('order.admin.amount')}}</th>
                <th>{{__('order.admin.status')}}</th>
                <th>{{__('order.admin.table.show')}}</th>
                <th>{{__('order.admin.table.delete')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
              <tr>
                <th>{{ $order->id }}</th>
                <td>{{ $order->user_name }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->amount }}</td>
                <td>{{ $order->processingStatus() }}</td>
                <td>
                  <a id="details" class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float" href="{{route('admin.orders.show', $order->id)}}">
                    <i class="material-icons">remove_red_eye</i>
                  </a>
                </td>
                <td>
                  <form onsubmit="return confirm('{{__('order.admin.message.msg_del')}}');" class="col-md-4" 
                  id="deleteorder-{{ $order->id }}" action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-circle waves-effect waves-circle waves-float" type="submit">
                      <i class="material-icons">delete_sweep</i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $orders->appends(\Request::except('page'))->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #END# Hover Rows -->
@endsection
