<template>
    <section>
        <div class="container">
            <div class=" row">
                <div class="col-12 mt-5 " >
                    <button class="default-button borderled float-right" @click="showsearch">{{newsearch}}</button>
                </div>
            </div>
            <h2 class="text-center">{{results.total}} imóveis à venda encontrados</h2>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 item" v-for="d in results.data" :key="d.id">
                    <!-- {{r.chamada}} -->
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
            </div>
        </div>
    </section>
</template>

<script>
import search from './search.vue'
import mixinss from '../mixins/mixins.js'
export default {

    props:['mainroute','resultados','link'],
    data:function(){
        return{
            results : JSON.parse(this.resultados),
            newsearch : 'NOVA PESQUISA'
        }
    },
    methods:{
        showsearch(){
            if(this.newsearch=='NOVA PESQUISA'){
                mixinss.methods.fadeIn(document.querySelector('.search'), 0.3, 'block')
                this.newsearch = 'DISPENSAR PESQUISA'
            }
            else {
                mixinss.methods.fadeOut(document.querySelector('.search'), 0.3, 'none')
                this.newsearch = 'NOVA PESQUISA'
            }
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
<style lang="scss">
    @import 'node_modules/bootstrap/scss/bootstrap';
    @import "../../sass/variables.scss";
    h2{
        color:$verde-forte;
        margin-top: 50px;
    }
    .links{
        display: block;
        text-align: center;
        nav{
            display: block;
            max-width: 320px;
            margin:0 auto;
            ul{
                display: flex;
                align-items: center;
                justify-content: center;
                padding-bottom: 60px;
            }
            
        }
        ul{
                display: flex;
                align-items: center;
                justify-content: center;
                padding-bottom: 60px;
                max-width: 320px;
                margin:0 auto;
                
            }
    }
    .page-item.active{
        .page-link{
            background-color:$verde-forte;
            border:none;
        }
    }
    .page-item{
        .page-link{
            color:$verde-forte;
            border:none;
        }
    }
    .item{
        position: relative;
        // width: 90% !important;
        margin-top: 30px;
        
        a{
            &:hover{
                text-decoration: none;
            }
            .image{
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                width: 300px !important;
                height: 300px !important;
                margin: 0 auto;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                position: relative;
                .protect{
                    position:absolute;
                    width: 300px;
                    height: 300px;
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
                        // width: 80%;
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
</style>