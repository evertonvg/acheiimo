@extends('voyager::master')
@section('content')
<div class="container-fluid">
    <h1 class="page-title">
        <i class="voyager-shop"></i> {{$case}} {{$case_complemento}}
    </h1>
    <a
        @if($case=='imóveis')
            href="http://acheiimoveis.imb.br/dev/admin/imoveis/create"
        @else
            href="http://acheiimoveis.imb.br/dev/admin/negotiations/create"
        @endif

        class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>Adicionar</span>
    </a>
</div>


<table class="table">
 <thead>
    @if($case == 'imóveis')
    <tr>
      <th scope="col">id</th>
      <th scope="col">chamada</th>
      <th scope="col">Dono</th>
      <th scope="col">imagem de capa</th>
      <th scope="col">endereço</th>
      <th scope="col">Cidade</th>
    </tr>
</thead>
  <tbody>
    @foreach($imoveis as $imovel)
    <tr>
      <td>{{$imovel->id}}</td>
      <td>{{$imovel->chamada}}</td>
      <td>{{$imovel->proprietario->nome}}</td>
      <td> <img src="{{asset('laravel/storage/app/public/'.$imovel->imagem_capa)}}" alt="{{$imovel->chamada}}" width="100px"> </td>
      <td>{{$imovel->endereco}}</td>
      <td>{{$imovel->cidade}}</td>
    </tr>
    @endforeach
</tbody>

@else
<tr>
  <th scope="col">id</th>
  <th scope="col">id do imóvel</th>
  <th scope="col">interessado</th>

</tr>
</thead>
<tbody>
@foreach($imoveis as $imovel)
<tr>
  <td>{{$imovel->id}}</td>
  <td>{{$imovel->imovel_id}}</td>
  <td>{{$imovel->interessado->nome}}</td>
  
</tr>
@endforeach
</tbody>
@endif


</table>
@endsection
