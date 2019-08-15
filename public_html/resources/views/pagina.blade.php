@extends('Layouts/_layout')

@section('wrapper')
<link rel="stylesheet" href="../../../public/css/pagina.css">
<br/>
<br/>
<div class="container">
  <div class="col-xl-8 col-offset-2 col-sm-12 page">
    {!! $content !!}
  </div>
</div>

@endsection
