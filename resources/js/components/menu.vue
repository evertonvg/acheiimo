<template>
    <nav ref="navmenu" :class="{'scroll':transform=='false'}">
        <div class="container">
            <a :href="index">
                <img src="/images/logo/LogoAchei.png" alt="Logo Achei Imóveis">
            </a>
            <ul>
                <li>
                    <a :href="imobiliaria">A IMOBILIÁRIA</a>
                </li>
                <li>
                    <a :href="imoveis">IMÓVEIS</a>
                </li>
                <li>
                    <a :href="anuncie">ANUNCIE</a>
                </li>
                <li>
                    <a :href="contato" class="menu-button">FALE CONOSCO</a>
                </li>
            </ul>
            <div class="menuopen">
                <ul>
                    <li>
                        <a :href="imobiliaria">A IMOBILIÁRIA</a>
                    </li>
                    <li>
                        <a :href="imoveis">IMÓVEIS</a>
                    </li>
                    <li>
                        <a :href="anuncie">ANUNCIE</a>
                    </li>
                    <li>
                        <a :href="contato">FALE CONOSCO</a>
                    </li>
                    
                </ul>
            </div>
            <div class="compmenuopen"></div>
            <div class="content">
                
            <div for="check" class="checkin" v-on:click="openclosemenu">
                <input type="checkbox" id="check">
                <span class="hamburguer"></span>
                
            </div>
    
        </div>
        </div>
    </nav>
</template>
<script>
import mixinss from '../mixins/mixins.js'
export default {
    mixins:[mixinss],
    name:'menunav',
    props:['index','imobiliaria','imoveis','anuncie','contato','transform'],
    // computed: {
    //     menuSelector() {
    //         document.querySelector('nav')
    //     }
    // },
    methods:{
        
        scroll:()=>{
            let menu = document.querySelector('nav')
           
            if (window.pageYOffset > 100) {
                menu.classList.add('scroll')
 
            } else {
                menu.classList.remove('scroll')
            }
        },
        openclosemenu:()=>{
            let lis = document.querySelector('.menuopen > ul')
            let check = document.querySelector('#check')
            let menuopen = document.querySelector('.menuopen')
            let compmenuopen = document.querySelector('.compmenuopen')
            
            if(window.innerWidth<=990){
                if(check.checked==false){
                    check.checked=true
                    document.body.style.overflowY = 'hidden'
                    menuopen.classList.add('open')
                    compmenuopen.classList.add('open')
                    mixinss.methods.fadeIn(lis, 0.6, 'block')
                }else{
                    check.checked=false
                    document.body.style.overflowY = 'auto'
                    menuopen.classList.remove('open')
                    compmenuopen.classList.remove('open')
                    mixinss.methods.fadeOut(lis, 0.1, 'none')

                }
            }
        }
    },
    
    created:  function() {
        if(this.transform=='true'){
            window.addEventListener('scroll', this.scroll);
        }
    },
    mounted() {

    },
}
</script>
<style lang="scss" scoped>
    @import 'node_modules/bootstrap/scss/bootstrap';
    @import "../../sass/variables.scss";
    nav{
        position: fixed;
        width: 100%;
        top: 0;
        left:0;
        height: 140px;
        z-index: 999;
        transition: 0.3s ease all;

        .container{
            height: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            img{
                width:200px;
            }
            ul{
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                padding:0;
                margin:0;
                transition: 1s ease all;
                li{
                    list-style: none;
                    margin-left: 50px;
                    a{
                        text-decoration: none;
                        transition:0.3s ease all;
                        color:$verde-menu;
                        font-size: 16px;
                        &:hover{
                            text-decoration: none;
                            color:$verde-forte;
                        }
                    }
                }
            }
        .menuopen{
            width: 0;
            height: 100vh;
            background-color:$verde-forte;
            position: absolute;
            top:0;
            right:0;
            transition: all .3s cubic-bezier(0.000, 0.995, 0.990, 1.000) .3s;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            ul{
                display: none;
                li{
                    margin:30px;
                    a{
                        color:white;
                        &:hover{
                           color:$verde-menu;
                        }
                    }
                }
            }
        }
        .compmenuopen{
            width: 0;
            height: 100vh;
            position: absolute;
            top:0;
            left:0;
            background-color:rgba($color: #000000, $alpha: 0.5);
            transition: all .3s cubic-bezier(0.000, 0.995, 0.990, 1.000) .3s;
        }
        .open{
            width:70%;  
        }
        .compmenuopen.open{
            width:30%; 
        }

        .content{
            display:none;
            height: 50px;
            width: 30px;
            margin-top: 30px;
            z-index: 999;
            
            cursor: pointer;
                div{
                    width: 100%;
                    height: 100%;
                    position: relative;
                    input[type=checkbox] {
                    display: none;
                    &:checked ~ span{
                        transform: rotate(45deg);
                        background-color: white;
                    }
                    &:checked ~ span:before{
                        transform: rotate(90deg);
                        top: 0;
                        background-color: white;
                    }
                    &:checked ~ span:after{
                        transform: rotate(90deg);
                        bottom: 0;
                        background-color: white;
                    }
                    &:checked~.menuopen{
                        width: 100vw;
                        height: 100vh;
                    }
                }
                
                span{
                    width: 30px;
                    height: 4px;
                    color: $verde-forte;
                    background-color: currentColor;
                    position: absolute;
                    top: 0;
                    left: 0;
                    transition: all 0.3s ease-in-out;
                    &:before{
                        display: block;
                        content: "";
                        position: absolute;
                        top: -10px;
                        left: 0;
                        width: 30px;
                        height: 4px;
                        background-color: currentColor;
                        transition: all 0.3s ease-in-out;
                    }
                    &:after{
                        display: block;
                        content: "";
                        position: absolute;
                        bottom: -10px;
                        left: 0;
                        width: 30px;
                        height: 4px;
                        background-color: currentColor;
                        transition: all 0.3s ease-in-out;
                    }
                }
            }
        }    
        }
    }
    .scroll{
        background-color:$bg-white;
        box-shadow: 0 6px 7.84px 0.16px rgba(33, 33, 33, 0.1);
        height: 100px;
    }

    @media(max-width:990px){
        nav{
            .container{
                ul{
                    display: none;
                    opacity: 0;
                }
                .content{
                    display:block;
                }
            }
        }
    }
    @media(max-width:600px){
        nav{
            height: 100px;
            .container{
                img{
                    width: 150px;
                }
                .content{
                    margin-top: 40px;
                }
            }
        }
        nav.scroll{
            height: 75px;
        }
    }

</style>