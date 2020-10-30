<template>
    <section>
        <h1 class="text-center">
            Imóveis <span>em Destaque</span>
        </h1>
        <p class="text-center">
            Confira alguns imóveis que <br> 
            separamos para você.
        </p>
        <div class="reference container">
            <h2 v-if="dest.length<=0">Não existem dados cadastrados no sistema</h2>
            <VueSlickCarousel  v-bind="settings" ref="carousel" v-else >
                <div class="item " v-for="d in dest" :key="d.id">
                    <a :href="link+'/imoveis/'+d.id" >
                        <div class="image" v-if="d.imagem_capa!=null" :style="`background-image:url(${mainroute+d.imagem_capa.replaceAll('\\', '/')}), url(${link}/images/notfound/LogoAchei.png)`">
                            <div class="protect" :style="`background-image:url(${link}/images/watermark/watermark.png)`"></div>
                            <div class="name">
                                {{d.tipo.tipo}} | {{d.bairro}}
                                <div class="cod">Cód {{d.id}}</div>
                            </div>
                        </div>
                        <div class="image" v-else :style="`background-image: url(${link}/images/notfound/LogoAchei.png)`">
                            <div class="protect" :style="`background-image:url(${link}/images/watermark/watermark.png)`"></div>
                            <div class="name">
                                {{d.tipo.tipo}} | {{d.bairro}}
                                <div class="cod">Cód {{d.id}}</div>
                            </div>
                        </div>
                        <div class="prox">Próximo a(o) {{d.bairro}}</div>
                        <div class="valor">{{parseInt(d.valor_venda_float.toString().substring(0, d.valor_venda_float.toString().length - 2)).toLocaleString('pt-BR', {style: 'currency',currency: 'BRL',currencyDisplay: 'symbol'})}}</div>
                        <div class="dormvaga">{{d.dormitorios}} dormitórios | {{d.garagens}} garagens</div>
                    </a> 
                </div>
                  
            </VueSlickCarousel>
            <!-- dest.length>3||window.innerWidth<600 -->
            <a href="javascript:void(0);"  @click="showPrev" class="prev"><al /></a>
            <a href="javascript:void(0);"  @click="showNext" class="next"><ar /></a>
        </div>
    </section>
</template>
<script>
import VueSlickCarousel from 'vue-slick-carousel';
import 'vue-slick-carousel/dist/vue-slick-carousel.css';
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css';
import al from './logos/arrow-left'
import ar from './logos/arrow-right'
export default {
    name: 'destaques',
    components: { VueSlickCarousel,al,ar },
    props:['mainroute','destaquesimo','link'],
    data:function(){
        return{
            extension:'',
            dest:JSON.parse(this.destaquesimo),
            settings:{
                
                arrows: false,
                dots: false,
                fade:false,
                slidesToShow: 3,
                slidesToScroll: 1,
                draggable:true,
                responsive: [
                    
                    {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                        }
                    },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        }
                    }
                ] 
            },
            protocol:window.location.protocol,
            
        }
    },
    methods:{
        showNext() {
            this.$refs.carousel.next()
        },
        showPrev() {
            this.$refs.carousel.prev()
        },
        effectimagein(el){
            // console.log()
            el.target.parentNode.querySelector('.fotohover').style.transform = 'scale(1.3)'
        },
        effectimageout(el){
            // console.log()
            el.target.parentNode.querySelector('.fotohover').style.transform = 'scale(1)'
        }
    },
    computed:{
        ext(el){
            let path = el
            return path
        }
    },
    mounted(){
        // let fotohover = document.querySelectorAll('.fotohover')
        // fotohover.forEach((el)=>{
        //     var ext = el.src.split('.').pop()
        //     el.src = `${el.src.slice(0, -4)}-capa.${ext}`
        // })
    }
}
</script>
<style lang="scss" scoped>
    @import 'node_modules/bootstrap/scss/bootstrap';
    @import "../../sass/variables.scss";
    section{
        background-color:#f5f6f8;
        h1{
            color: #0c5158;
            font-size: 48px;
            font-weight: 200;
            span{
                font-weight: 800;
            }
        }
        p{
            font-size: 30px;
            color:#9e9e9e;
            line-height: 1;
        }
        .reference{
            margin: 0 auto;
            position: relative;
            padding-bottom: 50px;
            margin-top: 50px;
            .prev,.next{
                position: absolute;
                top: 35%;
            }
            .prev{
                left:-50px;
                transform: translate(0,-50%);
                height: auto;
            }
            .next{
                right:-50px;
                transform: translate(0,-50%);
                height: auto;
            }
            .item{
                position: relative;
                width: 90% !important;
                margin-left: 5%;
                
                a{
                    &:hover{
                        text-decoration: none;
                    }
                    .image{
                        background-position: center;
                        background-size: cover;
                        background-repeat: no-repeat;
                        width: 300px;
                        margin: 0 auto;
                        height: 300px !important;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        overflow: hidden;
                        position: relative;
                        .protect{
                            position:absolute;
                            width: 100%;
                            height: 100%;
                            top: 0;
                            left: 0;
                            background-position: center;
                            background-size: cover;
                        }
                        img{
                            transition: 0.3s ease all;
                            width: 100%;
                            // height: 100%;
                            &:hover{
                                transform: scale(1.3);
                            }
                            
                        }
                        canvas{
                            transition: 0.3s ease all;
                            max-width: 100%;
                            background-color: white;
                            width: 100%;
                            height: 100%;
                            &:hover{
                                transform: scale(1.3);
                            }
                        }
                        .name{
                                position: absolute;
                                height:30px !important;
                                background-color: white;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                color:#3c7278;
                                font-size: 18px;
                                bottom: 0;
                                padding: 0 16px;
                                border-top-left-radius: 4px;
                                border-top-right-radius: 4px;
                                .cod{
                                    position: absolute;
                                    height:30px !important;
                                    padding: 0 12px;
                                    background-color: white;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    color:#22909f;
                                    font-size: 14px;
                                    top: -30px;
                                    border-top-left-radius: 4px;
                                    border-top-right-radius: 4px;
                                }
                            }
                            
                    }
                    .prox{
                        height: 40px !important;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 20px;
                        color: #454545;
                    }
                    .valor{
                        height: 24px !important;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 26px;
                        color:#117581;
                        font-weight: 600;
                        margin-top: 3px;
                        margin-bottom: 5px;
                    }
                    .dormvaga{
                        height: 30px !important;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 16px;
                        color:#454545;
                    }
                }
            }

                
            
        }
        
    }

    @media(max-width:1400px){
        section{
            h1{
                font-size: 42px;
            }
            p{
                font-size: 24px;
            }
            .reference{
                // max-width: 1200px;
                .item{
                    a{
                        .prox{
                            font-size: 20px;
                        }
                        .valor{

                        }
                        .image{
                            .name{
                                font-size: 18px;
                                .cod{
                                    // font-size: 16px;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

     @media(max-width:1200px){
        section{
            .reference{
                .item{
                    a{
                        .image{

                        }
                    }
                }
            }
        }
    }
     @media(max-width:900px){
        section{
            .reference{
            }
        }
    }
     @media(max-width:600px){
        section{
            .reference{
                // max-width: 600px;
                .prev{
                    left: 50px;
                    top: 34%;
                }
                .next{
                    right: 50px;
                    top: 34%;
                }
            }
        }
    }
</style>