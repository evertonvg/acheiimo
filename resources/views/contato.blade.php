<!DOCTYPE html>
<html lang="pt-br">
<head>
@include('tags.tags')
<!-- meta tags  -->
<meta name="theme-color" content="">
<meta name="robots" content="index,follow">
<meta name="keywords" content="">
<meta name="author" content="Everton Vargas Guetierres">

<meta name="description" content="">
<meta itemprop="name" content="">
<meta itemprop="description" content="">
<meta itemprop="image" content="">

<meta property="og:locale" content="pt_BR">
<meta property="og:title" content=""/>
<meta property="og:type" content="product"/>
<meta property="og:description" content="" />
<meta property="og:image" content=""/>
<meta property="og:url" content=""/>
<meta property="og:site_name" content=""/>
<meta property="fb:admins" content=""/>
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="470">
<meta property="og:image:height" content="246">

<meta name="twitter:url" content="">
<meta name=”twitter:title” content="">
<meta name="twitter:description" content=""  >
<meta name="twitter:image" content="">
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content=""/>

<title>Achei Imóveis - Contato</title>

</head>

<body>
    @if(session('msg'))
        <p class="messageemail alert alert-success container fade show" role="alert" >
            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> --}}
            {{session('msg')}}
        </p>
    @endif

    <div id="app">
        <wpp-component wpp="https://api.whatsapp.com/send?phone=5553999660421&text=Ol%C3%A1%2C%20gostaria%20de%20atendimento."></wpp-component>
        <menu-component 
            index="{{route('index')}}"
            imobiliaria="{{route('imobiliaria')}}" 
            imoveis="{{route('imoveis')}}?id=&cidade=&dormitorios=0&garagens=talvez&minvalue=0.00&maxvalue=5000000.00" 
            anuncie="{{route('anuncie')}}" 
            contato="{{route('contato')}}"
            transform="false">
        </menu-component>
        <contato-component type="{{$type}}" rota="{{route('email')}}" index="{{route('index')}}"></contato-component>
        <whats-component></whats-component>
        <footer-component index="{{route('index')}}"></footer-component>
     </div>


<script src="{{asset('js/function.js')}}"></script>
<script src="{{asset('js/app-vue.js')}}"></script>
<script>
    let av = document.querySelector('.messageemail')

    if(av){
        setTimeout(()=>{
            fadeOut(av,0.3,'none')
        },10000)
    }
</script>

</body>
</html>