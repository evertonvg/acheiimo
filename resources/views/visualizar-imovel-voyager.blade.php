@extends('voyager::master')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}">
   

        <header class="voyager-custom-header"> 
            <div class="container">
                <h1>VENDAS</h1>
                <h2>CÒDIGO DO IMÓVEL: {{ $imovel->id}}</h2>
            </div>
        </header>
                    
        <div class="container">
            <div class="row">
                @if(count($json)!=0)
                <div class="fakepadding"></div>
                <div class="arrowreference">
                <a href="" class="left"><i class="fas fa-arrow-alt-circle-left "></i></a>
                <a href="" class="right"><i class="fas fa-arrow-alt-circle-right "></i></a>
                    <section class="slick-fotos">
                        @foreach($json as $j)
                            <div class="slick-items">
                                <img src="{{Voyager::image($j->image)}}" alt="{{Voyager::image($j->image)}}">
                                <p>{{Voyager::image($j->title)}}</p>
                            </div>
                        @endforeach
                    </section>
                    
                    @endif
                </div>
                

                <div class="infos">
                    <h1 class="text-left">@if(isset($imovel->tipo->tipo)) {{$imovel->tipo->tipo}} - @endif   @if($imovel->chamada!='') {{$imovel->chamada}} @endif</h1>

                    <p>
                        Valor de Venda: @if($imovel->valor_venda!='') R$ {{$imovel->valor_venda}} @endif
                    </p>
                    <p>
                        Tipo de IPTU: @if(isset($imovel->iptu->tipo)) {{$imovel->iptu->tipo}} @endif
                    </p>
                    <p>
                        Valor de IPTU: R$ {{$imovel->valor_iptu}}
                    </p>
                    
                    

            

                        <ul>
                            <li>
                                <span>Dormitórios</span> <i class="fas fa-bed"></i> <span>{{$imovel->dormitorios}}</span>
                            </li>
                            <li>
                               <span> Suites</span> <i class="fas fa-user-tie"></i> <span>{{$imovel->Suite}}</span>
                            </li>
                            <li>
                                <span>Salas</span> <i class="fas fa-person-booth"></i> <span>{{$imovel->salas}}</span>
                            </li>
                            <li>
                                <span>Garagens</span> <i class="fas fa-warehouse"></i> <span>{{$imovel->garagens}}</span>
                            </li>
                            <li>
                                <span>Banheiros</span> <i class="fas fa-toilet"></i> <span>{{$imovel->banheiros}}</span>
                            </li>
                            
                        </ul>

                        
                   
                </div>
                <div class="descricao">
                            <h2 class="text-left espec">ESPECIFICAÇÕES</h2>
                            <p>
                                Ano de construção: {{$imovel->ano_construcao}}
                            </p>
                            <p>
                                Última reforma: {{$imovel->ultima_reforma}}
                            </p>
                            <p>
                                Dimensão do terreno: {{$imovel->dimensao_terreno}}
                            </p>
                            <p>
                                Área útil: {{$imovel->area_util}}
                            </p>
                            <p>
                                Área total: {{$imovel->area_total}}
                            </p>
                            
                            
                            <p>
                                Posição solar: @if(isset($imovel->solar->posicao)) {{$imovel->solar->posicao}} @endif
                            </p>



                            <a href="{{route('gerarpdf',$imovel->id)}}"><i class="fas fa-file-pdf" target="_blank"></i></a>
                </div>
            </div>
        </div>

        <div class="container descricao2 ">
            <h2 class="text-left desc">DESCRIÇÃO</h2>
                <p>
                    {!! 
                        $imovel->descricao           
                    !!}
                </p>
        </div>

        <div class="container caracteristicas ">
            <div class="row">
                <div class="caracteristicas">
                    <h2 class="text-left car">CARACTERÍSTICAS</h2>
                                    @foreach($imovel->caracteristicas as $c)
                                        <p>
                                        {{$c->caracteristica}}
                                        </p>
                                    @endforeach
                </div>                     
            </div>
        </div>


        <div class="container caracteristicas ">
            <div class="row">
                <div class="caracteristicas">
                    <h2 class="text-left car">CARACTERÍSTICAS DO CONDOMÍNIO</h2>
                                    @forelse($imovel->caracteristicascond as $c)
                                        <p>
                                        {{$c->caracteristica}}
                                        </p>
                                    @empty 
                                        <p>
                                            Não foram encontradas caracteristicas.
                                        </p>
                                    @endforelse
                </div>                     
            </div>
        </div>

        <div class="container endereco">
            <div class="row">
                <div class="endereco">
                    <h2 class="text-left lock">DADOS DO PROPRIETÁRIO</h2>
                    <p>
                        {{-- <i class="fas fa-map-marker-alt"></i>
                         {{$imovel->endereco}} 
                         @if($imovel->condominio!='') , edificio {{$imovel->condominio}}, @endif 
                         número {{$imovel->numero}}, 
                        @if($imovel->complemento!='') {{$imovel->complemento}}, @endif
                         bairro {{$imovel->bairro}} <br>
                         CEP {{$imovel->cep}} - 
                         {{$imovel->cidade}} @if($imovel->estado!='') / {{$imovel->estado}}   @endif
                         @if($imovel->google!='')
                         <a href="{{$imovel->google}}" target="_blank"><i class="fas fa-external-link-square-alt"></i></a>
                         @endif --}}
                         Nome: {{$imovel->proprietario->nome}} <br>
                         Email: {{$imovel->proprietario->email}} <br>
                         Telefone: {{$imovel->proprietario->fone}} <br>
                         WhatsApp: {{$imovel->proprietario->wpp}} <br> 
                    </p> 
                </div> 
            </div>
        </div>

        <div class="container endereco">
            <div class="row">
                <div class="endereco">
                    <h2 class="text-left lock">LOCALIZAÇÃO</h2>
                    <p>
                        <i class="fas fa-map-marker-alt"></i>
                         {{$imovel->endereco}} 
                         @if($imovel->condominio!='') , edificio {{$imovel->condominio}}, @endif 
                         número {{$imovel->numero}}, 
                        @if($imovel->complemento!='') {{$imovel->complemento}}, @endif
                         bairro {{$imovel->bairro}} <br>
                         CEP {{$imovel->cep}} - 
                         {{$imovel->cidade}} @if($imovel->estado!='') / {{$imovel->estado}}   @endif
                         @if($imovel->google!='')
                         <a href="{{$imovel->google}}" target="_blank"><i class="fas fa-external-link-square-alt"></i></a>
                         @endif
                    </p> 
                </div> 
            </div>
        </div>

      



    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/voyager-slick.js')}}"></script>
@endsection
