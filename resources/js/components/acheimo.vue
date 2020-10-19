<template>
    <section>
        <div class="slider">
            <div class="arrowreference">
                <VueSlickCarousel  v-bind="settings" ref="carousel">
                    <img :src="image.src" alt="" v-for="image in images" :key="image.id">
                </VueSlickCarousel>
                <a href="javascript:void(0);" @click="showPrev" class="left">
                    <al></al>
                </a>
                <a href="javascript:void(0);" @click="showNext" class="right">
                    <ar></ar>
                </a>
            </div>
        </div>
        <div class="conteudo">
            <h3>Achei Imóveis</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur 
                adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua. 
            </p>
            <p>
                Quis ipsum suspendisse ultrices gravida. Risus 
                commodoviverra maecenas accumsan lacus 
                vel facilisis. 
            </p>
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
    name: 'acheiimo',
    components: { VueSlickCarousel,al,ar },
    data: function(){
        return{
            images:[
                {
                    id:1,
                    src:'/images/acheiimo/slide1.png'
                },
                {
                    id:2,
                    src:'/images/acheiimo/slide1.png'
                }
            ],
            settings:{
                        arrows: false,
                        dots: false,
                        fade:true
                    },
            }
        },
        methods: {
            showNext() {
                this.$refs.carousel.next()
            },
            showPrev() {
                this.$refs.carousel.prev()
            },
        }
    }
    

</script>
<style lang="scss" scoped>
    section{
        padding:120px 140px;
        display: flex;
        .slider{
            width: 50%;
            .arrowreference{
                height: 100%;
                position: relative;
                .left{
                    position: absolute;
                    bottom: -60px;
                    right: 50px;
                }
                .right{
                    position: absolute;
                    bottom: -60px;
                    right: 0;
                }
            }
        }
        .conteudo{
            width: 50%;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding-left: 130px;
            flex-direction: column;
            h3{
                font-size: 40px;
                color: #0c5158;
                font-weight: 800;
            }
            p{
                font-size: 24px;
                color:#9d9d9c;
                line-height: 26px;
            }
        }
    }
    @media(max-width:1440px){
        section{
            .conteudo{
                padding-left: 60px;
                p{
                    font-size: 20px;
                }
            }
        }
    }
    @media(max-width:1200px){
        section{
            padding: 120px 60px;
            .conteudo{
                padding-left: 60px;
                p{
                    font-size: 20px;
                }
            }
        }
    }
    @media(max-width:900px){
        section{
            padding: 120px 20px;
            .conteudo{
                padding-left: 30px;
                p{
                    font-size: 18px;
                }
            }
        }
    }
    @media(max-width:600px){
        section{
            flex-direction: column;
            .slider,.conteudo{
                width: 100%;
            }
            .conteudo{
                margin-top: 60px;
            }
        }
    }
</style>