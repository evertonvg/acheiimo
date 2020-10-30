<template>
    <section class="imovel"> 
        <div class="container pb-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a :href="index">Home</a></li>
                <li class="breadcrumb-item" v-show="previous!=index && previous!=winhref"><a :href="previous">Imóveis</a></li>
                <li class="breadcrumb-item active">CÓD {{dados.id}}</li>
            </ol>

            <h2 v-if="dados.chamada!=null">{{dados.chamada}}</h2>
            <h2 v-else>Imóvel</h2>
            <div class="row ">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 reference" v-if="JSON.parse(dados.slides).length!=0">
                    <VueSlickCarousel  v-bind="settings" ref="carousel">
                        <div class="item" v-for="img in JSON.parse(dados.slides)" :key="img.image">
                            <img  :src="mainroute+img.image" :alt="img.title"  class="item-image">
                            <div class="protect" :style="`background-image:url(${index}/images/watermark/watermark.png)`"></div>
                        </div>
                    </VueSlickCarousel>
                    <a href="javascript:void(0);"  @click="showPrev" class="prev"><al /></a>
                    <a href="javascript:void(0);"  @click="showNext" class="next"><ar /></a>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 reference" v-else>
                    <img src="http://localhost:3000/images/notfound/LogoAchei.png"  :alt="dados.chamada">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 dadosimo">
                    <p class="tipocity">
                        <span v-if="dados.tipo">{{dados.tipo.tipo}}</span> á venda 
                        <span v-if="dados.tipo && dados.bairro!=null" >|</span> 
                        <span v-if="dados.bairro!=null">{{dados.bairro}}</span>
                        <span v-if="dados.bairro!=null && dados.cidade!=null">|</span>
                        <span v-if="dados.cidade!=null">{{dados.cidade}}</span>
                    </p>
                    <p class="proximo">Próximo ao {{dados.bairro}}</p>
                    <p class="valor" v-show="dados.valor_venda_float!=null && dados.valor_venda_float!=''">
                        {{parseInt(dados.valor_venda_float.toString().substring(0, dados.valor_venda_float.toString().length - 2))
                        .toLocaleString('pt-BR', {style: 'currency',currency: 'BRL',currencyDisplay: 'symbol'})}}
                    </p>
                    <p class="numbers">
                        <span v-show="dados.dormitorios>0">{{dados.dormitorios}} dormitório(s)</span> 
                        <span v-show="dados.dormitorios>0 && dados.garagens>0"> | </span>
                        <span v-show="dados.garagens>0">{{dados.garagens}} Vaga(s) de garagem</span> 
                    </p>
                    <a href="javascript:void(0);" @click="scrollform" class="default-button borderled">
                        TENHO INTERESSE
                    </a>
                </div>
            </div>
        </div>

        <div class="container descricao mb-5" v-show="descricao!=null">
            <h3>Descrição do imóvel</h3>
            <span ref="descricaoimo">
                {{this.descricao.trim()}}
            </span>
            
        </div>
        <div class="container caracteristicas mb-5" v-show="dados.caracteristicas.length>0">
            <h3 class="text-left">Características</h3>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3" v-for="i in dados.caracteristicas" :key="i.caracteristica">
                    {{i.caracteristica}} 
                </div>   
            </div>
        </div>
        
        <div class="container caracteristicas detalhes mb-5" ref="caract" >
            <h3 class="text-left">Detalhes</h3>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 " v-if="dados.valor_condominio!='0.00' && dados.valor_condominio!='0,00' && dados.valor_condominio!=null && dados.valor_condominio!=''" >
                    Valor de condomínio : R$ {{dados.valor_condominio}}
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3"  v-if="dados.iptu != null"  >
                    Tipo de iptu: {{dados.iptu.tipo}} 
                </div>   
                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 " v-if="dados.valor_iptu!='0.00' && dados.valor_iptu!='0,00' && dados.valor_iptu!=null && dados.valor_iptu!=''" >
                    Valor de IPTU : R$ {{dados.valor_iptu}}
                </div> 
                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3"  v-if="dados.ano_construcao!=null && dados.ano_construcao!='' && dados.ano_construcao!='0.00' && dados.ano_construcao!='0,00'" >
                    Ano de construção: {{dados.ano_construcao}}
                </div> 
                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3"  v-if="dados.ultima_reforma!=null && dados.ultima_reforma!=''" >
                    Última reforma: {{dados.ultima_reforma}}
                </div> 
                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3"  v-if="dados.area_total!=null && dados.area_total!='' && dados.area_total!='0.00' && dados.area_total!='0,00'" >
                    Áreal total: {{dados.area_total}} m²
                </div> 
                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3"  v-if="dados.area_util!=null && dados.area_util!='' && dados.area_util!='0.00' && dados.area_util!='0,00'" >
                    Área útil: {{dados.area_util}} m²
                </div> 
                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3"  v-if="dados.dimensao_terreno!=null && dados.dimensao_terreno!=''" >
                    Dimensão do terreno: {{dados.dimensao_terreno}} 
                </div> 

            </div>
        </div>
       
        <div class="container contato" id="interesse" ref="inter">
            <form :action="rota" method="post " class="row" ref="formsend">
                <h3>Tenho Interesse</h3>
                <input type="hidden" name="assunto"  :value="`Tenho interesse - Imóvel ${dados.id}`">
                
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="input">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" @focus="labelfocus" @blur="labelblur" ref="nameinput" v-model="nome">
                        <div class="error">
                            {{errorname}}
                        </div>
                    </div>
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" @focus="labelfocus" @blur="labelblur" ref="emailinput" v-model="email">
                        <div class="error">
                            {{erroremail}}
                        </div>
                    </div>
                    <div class="input">
                        <label for="phone">Telefone</label>
                        <input type="text" name="telefone" id="phone" @focus="labelfocus" @blur="labelblur" v-mask="'(##)#####-####'" ref="phoneinput" v-model="telefone">
                        <div class="error">
                            {{errorphone}}
                        </div>
                    </div>
                </div>

                
                <div class="col-12">
                    <input type="submit" class="default-button borderled float-right mt-5" value="ENVIAR" @click="validate">
                </div>
            </form>
        </div>
    </section>
</template>
<script>
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
import al from './logos/arrow-left'
import ar from './logos/arrow-right'
export default {
    name: 'imovel',
    props:['imovel','index','previous','mainroute','descricao','rota'],
    components: { VueSlickCarousel,al,ar },
    data:
        function(){
            return{
                dados : JSON.parse(this.imovel),
                winhref:window.location.href,
                settings:{
                    arrows: false,
                    dots: false,
                    fade:true
                },
                nome:'',
                email:'',
                telefone:'',
                mensagem:'',
                errorname:'',
                erroremail:'',
                errorphone:'',
                errormessage:'',
                emailregex:/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            }
        },
    methods:{
        showNext() {
            this.$refs.carousel.next()
        },
        showPrev() {
            this.$refs.carousel.prev()
        },
        labelfocus(el){
            el.target.parentNode.childNodes[0].style.transform = 'translate(-45px, 10px) scale(0.7)'
        },
        labelblur(el){
            if( el.target.parentNode.childNodes[2].value!=''){
                el.target.parentNode.childNodes[0].style.transform = 'translate(-45px, 10px) scale(0.7)'
            }else{
                el.target.parentNode.childNodes[0].style.transform = 'translate(0,30px) scale(1)'
            }
        },
        validate(el){
            el.preventDefault()
            let send = true

            if(this.nome==''){
                this.$refs.nameinput.classList.add('inputerror')
                this.errorname = '(Preencha esse campo)'
                send = false
            }else if(this.nome.length<5){
                this.$refs.nameinput.classList.add('inputerror')
                this.errorname = '(Minimo de 5 caracteres)'
                send = false
            }else{
                this.$refs.nameinput.classList.remove('inputerror')
                this.errorname = ''
            }

            if(this.email==''){
                this.$refs.emailinput.classList.add('inputerror')
                this.erroremail = '(Preencha esse campo)'
                send = false
            }else if(!this.emailregex.test(this.email)){
                this.$refs.emailinput.classList.add('inputerror')
                this.erroremail = '(Preencha com um email válido)'
                send = false
            }else{
                this.$refs.emailinput.classList.remove('inputerror')
                this.erroremail = ''
            }

            if(this.telefone==''){
                this.$refs.phoneinput.classList.add('inputerror')
                this.errorphone = '(Preencha esse campo)'
                send = false
            }else if(this.telefone.length<13){
                this.$refs.phoneinput.classList.add('inputerror')
                this.errorphone = '(Preencha com um número válido)'
                send = false
            }else{
                this.$refs.phoneinput.classList.remove('inputerror')
                this.errorphone = ''
            }

            
            if(send==true){
                this.$refs.formsend.submit()
            }
        },
        setcarac(){
            this.showcarac = true
        },
        scrollform(){
            window.scrollTo(0, this.$refs.inter.offsetTop-100)
        }
    },
    mounted(){
        if(this.$refs.caract.innerHTML.length<170){
            this.$refs.caract.style.display = 'none'
        }
        
        this.$refs.descricaoimo.innerHTML = String(this.descricao.trim())
        console.log(String(this.descricao.trim()))
    }  
    
}
</script>

<style lang="scss" scoped>
    @import 'node_modules/bootstrap/scss/bootstrap';
    @import "../../sass/variables.scss";
    .slick-slide div {
        height: 100% !important;
        background-size: cover !important;
        background-repeat: no-repeat !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }
    .protect{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .imovel{
        background-color: #f5f6f8;
        margin-top: 100px;
        .breadcrumb{
            padding: 0;
            background-color: transparent;
        }
        h2{
            padding-bottom: 50px;
            color: $verde-texto;
            font-size: 2.5rem;
        }
        h3{
            font-size: 28px;
            color: $verde-texto;
            font-weight: 400;
            padding-bottom: 50px;
        }
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
        .item-image{
            max-width: 100%;
            max-height: 100%;
        }
        
        .reference{
            position: relative;
            height: 450px;
            .item{
                margin-top: 0;
            }
            .prev,.next{
                position: absolute;
                top: 50%;

            }
            .prev{
                left:50px;
                transform: translate(0,-50%) ;
                height: auto;
            }
            .next{
                right:50px;
                transform: translate(0,-50%) ;
                height: auto;
            }
        }
        .dadosimo{
            position: relative;
            padding-bottom: 70px;
            a{
                position: absolute;
                bottom: 0;
            }
            .tipocity{
                font-size: 16px;
                color: #a0a092;
                font-weight: 200;
            }
            .proximo{
                font-size: 24px;
                color: #a0a092;
            }
            .valor{
                color: $verde-forte;
                font-weight: 400;
                font-size: 40px;
            }
            .numbers{
                margin-top: 20px;
                font-weight: 400;
                font-size: 20px;
                color: #3c96ab;
            }
        }
        form{
                background-color: white;
                padding: 50px 50px;
                border-radius: 40px;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
                .input{
                    position: relative;
                    input:-webkit-autofill {
                        -webkit-box-shadow: 0 0 0 30px white inset;
                        -webkit-text-fill-color: black ;
                    }
                    input,textarea{
                        border: none;
                        width: 100%;
                        transition: 0.3s ease all;
                    }
                    textarea{
                        height: 200px;
                        resize: none;
                        border-bottom: 1px solid $verde-forte;
                        margin-bottom: 30px;
                    }
                    label{
                        font-size: 16px;
                        font-weight: 800;
                        width: 300px;
                        transform: translate(0px, 30px);
                        display: block;
                        color: $verde-forte;     
                        transition: 0.3s ease all;
                                       
                    }
                    input{
                        border-bottom: 1px solid $verde-forte;
                        margin-bottom: 30px;
                    }
                    .inputerror{
                        color:#e90000;
                        border-bottom: 1px solid #e90000;
                        -webkit-text-fill-color: #e90000;
                    }
                    .error{
                        position: absolute;
                        bottom: 14px;
                        left: 0;
                        color:#e90000;
                        font-size: 10.4px;
                    }

                }
            }

        .descricao{
            background-color: white;
            padding: 50px 50px;
            border-top-right-radius: 40px;
            border-bottom-right-radius: 40px;
            div{
                margin: 10px 0;
            } 
            p{
                font-size: 20px;
                color: #a0a092;
            }
        }
        .caracteristicas{
            background-color: white;
            // border-top-left-radius: 40px;
            border-top-right-radius: 40px;
            padding: 50px 50px;
            color:#a0a092;
            text-align: center;
            div{
                margin: 10px 0;
            }
        }
        .detalhes{
            border-radius: none;
            border-top-right-radius: 0;
            border-bottom-right-radius: 40px;
            border-bottom-left-radius: 40px;
        }
    }
    @media(max-width:900px){
        .imovel{
            .reference{
                height: auto;
            }
        }
    }
    @media(max-width:600px){
        .imovel{
            margin-top: 75px;
        }
    }
</style>