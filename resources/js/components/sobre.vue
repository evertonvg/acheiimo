<template>
    <section>
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a :href="index">Home</a></li>
                <li class="breadcrumb-item active">A Imobiliária</li>
            </ol>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <h1>
                        <span>Sobre a</span> <br> 
                         Achei <br> Imóveis
                        <!-- <img src="/images/logo/LogoAchei.png" alt="Achei imóveis"> -->
                    </h1>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <h2>Tudo tem um começo e por aqui não seria diferente</h2>
                    <p>
                        Inicialmente amigos, hoje sócios, Laura Caruccio e Glasdow Cordeiro, 
                        ambos com vasta experiência no ramo imobiliário, após muitas conversas decidiram se unir para começar um sonho e assim nasceu a ACHEI Imóveis. 
                    </p>
                    <p>
                        Nossa equipe é formada por profissionais capacitados e com expertise de mercado, seja para morar ou investir, aqui nós buscamos conhecer o cliente, 
                        identificar as suas necessidades, indicar os melhores imóveis e acompanhar todos os processos burocráticos. 
                    </p>
                    <p>
                        Comprar um imóvel é um dos momentos mais importantes na vida de uma pessoa e muitas vezes de uma família, para nós é uma honra poder ser o agente 
                        de transformação e estar ao seu lado nesse momento inesquecível.
                    </p>
                    <p>
                        Nós queremos entregar o melhor para nossos clientes, com agilidade, comprometimento e dedicação, atender com excelência é um de nossos pilares,
                        aqui você conta com um time de especialistas e juntos nós vamos achar o imóvel certo para você e sua família.
                    </p>
                    
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    props:['index'],
}
</script>
<style lang="scss" scoped>
    @import 'node_modules/bootstrap/scss/bootstrap';
    @import "../../sass/variables.scss";
    .breadcrumb-item{
        a{
            color:#6c757d;
            &:hover{
                text-decoration: none;
            }
        }
    }
    .breadcrumb-item.active{
        font-weight: 600;
    }
    .breadcrumb-item + .breadcrumb-item::before{
        content:'|';
    }
    section{
        background-color: #e9ecef;
        h1{
            color:$verde-forte;
            font-size: 40px;
            font-weight: 800;
            line-height: 36px;
            margin-left: 14px;
                margin-top: -10px;
            span{
                color:$cinza-texto;
                font-size: 24px;
                font-weight: 200;
            }
        }
        h2{
            color: #117581;
        }
        p{
            color: $cinza-texto;
        }
    }
    @media(max-width:600px){
        .breadcrumb{
            padding: 0.75rem 0;
        }
        section{
            h1{
                margin-left: 0;
                margin-bottom: 30px;
            }
        }
    }
</style>