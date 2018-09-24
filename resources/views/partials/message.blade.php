<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="body">
    @if ($errors->any())
      <div class="alert bg-red alert-dismissible" role="alert" style="color: white; background-color: #fb483a">
        <button type="button" class="close" data-dismiss="alert"
          aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li><br>
        @endforeach
      </div>
    @endif
    @if (session('message'))
      <div class="alert bg-green alert-dismissible" role="alert" style="color: white;  background-color: #2b982b">
        <button type="button" class="close" data-dismiss="alert"
          aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <!-- Delete cart & hide button submit order -->
        <script type="text/javascript">
          $(document).ready(function() {
              localStorage.clear();
              $('#order-submit-button').fadeOut(300);
          });
        </script>
        {{session('message')}}
      </div>
    @endif
    @if (session('alert'))
      <div class="alert bg-red alert-dismissible" role="alert" style="color: red; background-color: #ff9600">
        <button type="button" class="close" data-dismiss="alert"
          aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        {{session('alert')}}
      </div>
    @endif
  </div>
</div>
