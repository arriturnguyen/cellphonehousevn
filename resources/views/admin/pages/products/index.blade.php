@extends('admin.layout.master')
@section('title',__('product.admin.show.title') )
@section('body')
<!-- Hover Rows -->
<div class="row clearfix">
  @include('admin.includes.message')
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <div class="header">
            <h2>{{__('product.admin.show.form_title')}}</h2>
            <a href="{{ route('admin.products.create') }}"
              class="btn bg-green waves-effect" style="margin-top: 30px;"> <i
              class="material-icons">playlist_add</i> <span>{{ __('product.admin.show.create_product') }}</span>
            </a>
        </div>
        <div class="body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>{{__('product.admin.show.images')}}</th>
                <th>{{__('product.admin.show.name')}}</th>
                <th>{{__('product.admin.show.price')}}</th>
                <th>{{__('product.admin.show.old_price')}}</th>
                <th>{{__('product.admin.show.status')}}</th>
                <th>{{__('product.admin.show.in_stock')}}</th>
                <th>{{__('product.admin.show.description')}}</th>
                <th>{{__('product.admin.show.edit')}}</th>
                <th>{{__('product.admin.show.delete')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <th>{{ $product->id }}</th>
                @if ($product->images != NULL)
                  <th style="width: 35%;"><img class="img-responsive thumbnail" src="{{ $product->images[0] }}" style="object-fit: contain;"></th>
                @else
                  <th><img class="img-responsive thumbnail" src="images/products/no-image.jpg"></th>
                @endif
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price) }} ₫</td>
                <td>{{ number_format($product->old_price) }} ₫</td>
                <td>
                  <?php switch ($product->status) {
                      case "1":
                          echo "In stock";
                          break;
                      case "2":
                          echo "Out of stock";
                          break;
                      case "3":
                          echo "Coming soon";
                          break;
                      default:
                          echo "Unknown";
                  }?>
                </td>
                <td>{{ $product->in_stock }}</td>
                <td><a id="description" class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float"
                   href="{{route('admin.products.show', $product->id)}}"><i class="material-icons">remove_red_eye</i></a></td>
                <td><a
                  href="{{route('admin.products.edit', $product->id)}}"
                  class="btn bg-yellow btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">border_color</i>
                </a></td>
                <td><form onsubmit="return confirm('{{__('product.admin.show.delete_confirm')}}');" 
                          class="col-md-4" id="deleteProduct-{{ $product->id }}" 
                          action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
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
          {{ $products->render() }}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #END# Hover Rows -->
@endsection
