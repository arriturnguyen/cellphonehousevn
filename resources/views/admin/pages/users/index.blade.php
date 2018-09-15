@extends('admin.layout.master')
@section('title',__('user.admin.show.title') )
@section('body')
<!-- Hover Rows -->
<div class="row clearfix">
  @include('admin.includes.message')
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <div class="header">
            <h2>{{__('user.admin.show.form_title')}}</h2>
            <a href="{{ route('admin.users.create') }}"
              class="btn bg-green waves-effect" style="margin-top: 30px;"> <i
              class="material-icons">person_add</i> <span>{{ __('user.admin.show.create_user') }}</span>
            </a>
        </div>
        <div class="body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>{{__('user.admin.name')}}</th>
                <th>{{__('user.admin.email')}}</th>
                <th>{{__('user.admin.role')}}</th>
                <th>{{__('user.admin.active')}}</th>
                <th>{{__('user.admin.show.edit')}}</th>
                <th>{{__('user.admin.show.delete')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                @if ($user->user_type == 1)
                  <td>{{__('user.admin.admin')}}</td>
                @else
                  <td>{{__('user.admin.user')}}</td>
                @endif
                @if ($user->active == 1)
                  <td>{{__('user.admin.active')}}</td>
                @else
                  <td>{{__('user.admin.inactive')}}</td>
                @endif
                <td><a
                  href="{{route('admin.users.edit', $user->id)}}"
                  class="btn bg-yellow btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">border_color</i>
                </a></td>
              <td><form onsubmit="return confirm('{{__('user.admin.show.delete_confirm')}}');" class="col-md-4" id="deleteUser-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-circle waves-effect waves-circle waves-float" type="submit">
                      <i class="material-icons">delete_sweep</i>
                    </button>
                  </form></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $users->render() }}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #END# Hover Rows -->
@endsection
