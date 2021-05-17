@extends('dashboard.base')

@section('css')
    <link href="{{ asset('css/manage.scss') }}" rel="stylesheet">
@endsection

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Manage</h4></div>
            <div class="card-body">
                <button>1</button>
                <button>2</button>
                <button>3</button>
      </div>
    </div>
  </div>
</div>


<style>
    #cropp-img-img{
        max-width:500px;
        max-height:500px;
    }

</style>

@endsection



@section('javascript')
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/cropper.js') }}"></script>
<script src="{{ asset('js/media.js') }}"></script>
<script src="{{ asset('js/media-cropp.js') }}"></script>

@endsection
