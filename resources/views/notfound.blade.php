<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
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

    <title>Achei Imóveis - inicio</title>
</head>
<body>
    <div id="app">
        <wpp-component wpp="https://api.whatsapp.com/send?phone=5553999660421&text=Ol%C3%A1%2C%20gostaria%20de%20atendimento."></wpp-component>
        <menu-component transform="false"
            index="{{route('index')}}"
            imobiliaria="{{route('imobiliaria')}}" 
            imoveis="{{route('imoveis')}}?id=&cidade=&dormitorios=0&garagens=talvez&minvalue=0.00&maxvalue=5000000.00" 
            anuncie="{{route('anuncie')}}" 
            contato="{{route('contato')}}">
        </menu-component>
        <section>
            <div class="container">
                <img src="{{asset('images/Tela-erro.png')}}" alt="" style="max-width: 100%">
            </div>
            <p class="text-center innererror">

            </p>
        </section>

        <anuncio-component rota="{{route('anuncie')}}"></anuncio-component>
        <footer-component index="{{route('index')}}"></footer-component>
        <cookie-component></cookie-component>
     </div>

<script src="{{asset('js/app-vue.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script>
    let countdownerror = 10
    let innererror = document.querySelector('.innererror');
    let timeerror = setInterval(()=>{
        innererror.innerHTML = 'você será redirecionado em '+countdownerror+' segundos'
        if(countdownerror==0){
            clearInterval(timeerror)
            window.location.href = `{{route('index')}}`
        }
        countdownerror--
        
    },1000)
</script>
</body>
</html>