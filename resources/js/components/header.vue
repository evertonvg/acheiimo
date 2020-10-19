<template>
    <header id="header">
        <VueSlickCarousel  v-bind="settings" ref="carousel">
            <div v-for="head in heads" :key="head.id" :class="head.class">
                    <div class="container" >
                        <div class="row">
                            <div class="col-12">
                                <h1>
                                    <span>Muito</span> mais  <br>
                                    que <span>apenas</span> <br>
                                    <span>imóveis</span>
                                </h1>
                            </div>
                        </div>
                    </div>       
            </div>   
       </VueSlickCarousel>
    </header>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel';
import 'vue-slick-carousel/dist/vue-slick-carousel.css';
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css';

export default {
        name: 'banner',
        components: { VueSlickCarousel },
        data: function(){
           return{
                heads: [
                        {   
                            id:1,
                            bg:'/images/bg/banner-1.png',
                            class:'bg1'
                        },
                        {
                            id:2,
                            bg:'/images/bg/banner-2.png',
                            class:'bg2'
                        },
                        {
                            id:3,
                            bg:'/images/bg/banner-3.png',
                            class:'bg3'
                        },
                        {
                            id:4,
                            bg:'/images/bg/banner-4.png',
                            class:'bg4'
                        },
                        {
                            id:5,
                            bg:'/images/bg/banner-5.png',
                            class:'bg5'
                        },
                        {
                            id:6,
                            bg:'/images/bg/banner-6.png',
                            class:'bg6'
                        },
                        {
                            id:7,
                            bg:'/images/bg/banner-7.png',
                            class:'bg7'
                        },
                        {
                            id:8,
                            bg:'/images/bg/banner-8.png',
                            class:'bg8'
                        }
                    ],
            settings:{
                        arrows: false,
                        dots: false,
                        fade:true
                    },
            protocol:window.location.protocol
            }
        },
        mounted:function(){

        }
            
                    
        
        
    }
</script>

<style lang="scss" >
    @import 'node_modules/bootstrap/scss/bootstrap';
    @import "../../sass/variables.scss";
        .slick-slider{
            height: 100% !important;
        }
        .slick-list{
            height: 100% !important; 
        }
        .slick-track{
            height: 100% !important;
        }
        .slick-slide{
            height: 100% !important;
            div{

                height: 100% !important;
                background-size: cover;
                background-repeat: no-repeat;
            }
        }
        .bg1{
            background-image: url('/images/bg/banner-1.png'); 
            background-size: cover;
            background-position: center;
        }
        .bg2{
            background-image: url('/images/bg/banner-2.png'); 
            background-size: cover;
            background-position: center; 
        }
        .bg3{
            background-image: url('/images/bg/banner-3.png');
            background-size: cover; 
            background-position: center; 
        }
        .bg4{
            background-image: url('/images/bg/banner-4.png'); 
            background-size: cover;
            background-position: center;
        }
        .bg5{
            background-image: url('/images/bg/banner-5.png'); 
            background-size: cover;
            background-position: center;
        }
        .bg6{
            background-image: url('/images/bg/banner-6.png'); 
            background-size: cover;
            background-position: center; 
        }
        .bg7{
            background-image: url('/images/bg/banner-7.png'); 
            background-size: cover;
            background-position: center;
        }
        .bg8{
            background-image: url('/images/bg/banner-8.png'); 
            background-size: cover;
            background-position: center;
        }
        header{
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width:100%;
            height: 80vh;
            transition: 0.3s ease all;
            .container{
                height: 100%;
                .row{
                    height: 100%;
                    
                    div{
                        display: flex;
                        align-items: center;
                        justify-content: flex-start;
                        flex-direction: row;
                        height: 100%;
                        h1{
                            color:$verde-texto;
                            font-weight: 200;
                            font-size: 60px;
                            margin-left: 100px;
                            span{
                                font-weight: 800;
                            }
                        }
                    }
                }
                div{
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                }
            }
    }
    @media(max-width:1440px){
        header{
            .container{
                .row{
                    div{
                        h1{
                            font-size: 44px;
                            
                        }
                    }
                }
            }
        }
        
    }

  
    @media(max-width:600px){
        header{
            .container{
                .row{
                    div{
                        h1{
                            margin: 0;
                            font-size: 40px;
                        }
                    }
                }
            }
        }
        .bg1{
            background-position: center;
            background-size: cover;
        }
    }
</style>
