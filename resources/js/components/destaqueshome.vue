<template>
    <section>
        <h1 class="text-center">
            Imóveis <span>em Destaque</span>
        </h1>
        <p class="text-center">
            Confira alguns imóveis que <br>
            separamos para você.
        </p>
        <div class="reference">
            <VueSlickCarousel  v-bind="settings" ref="carousel">
                <div class="item " v-for="d in dest" :key="d.id">
                    <a :href="link+'imoveis/'+d.id" >
                        <!-- <img :src="'http:'+mainroute+d.imagem_capa" :alt="d.chamada"> -->
                        <canvas :id="'canvas'+d.id"></canvas>
                    
                    </a> 
                </div>
                  
            </VueSlickCarousel>
            <a href="javascript:void(0);" @click="showPrev" class="prev"><al /></a>
            <a href="javascript:void(0);" @click="showNext" class="next"><ar /></a>
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
            dest:JSON.parse(this.destaquesimo),
            settings:{
                arrows: false,
                dots: false,
                fade:false,
                slidesToShow: 3,
                slidesToScroll: 1
            },
        }
    },
    methods:{
        showNext() {
            this.$refs.carousel.next()
        },
        showPrev() {
            this.$refs.carousel.prev()
        },
    },
    mounted:function(){
        this.dest.forEach(el => {
            let canvas = document.querySelector('#canvas'+el.id)  
            canvas.width = '100%'
            canvas.height = '450px'

            // let ctx = canvas.getContext('2d')
            // let Image = new Image()
            // image.src = 'http:'+mainroute+el.imagem_capa
            // ctx.drawImage(image,20,20,300,160)
        });
        
    }
}
</script>
<style lang="scss">
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
            max-width: 1440px;
            position: relative;
            height: 540px;
            .prev,.next{
                position: absolute;
                top: 50%;
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
                a{
                    width: 100%;
                    height: 100%;
                }
            }

                
            
        }
    }
</style>