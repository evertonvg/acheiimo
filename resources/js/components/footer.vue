<template>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mainlog">
                    <a :href="index">
                        <img src="/images/logo/LogoAchei.png" alt="Achei imóveis" class="logo">
                    </a>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 infos">
            
                    <div class="icon">
                        <pin/>
                    </div> 
                    <div class="inf">
                        XV de Novembro, 607 | Sala 73 <br>
                        Centro | Pelotas - RS 
                    </div>  
                
                    <div class="icon miniinf">
                        <phone/>
                    </div>
                    <div class="inf miniinf">
                        (53) 3029-0421
                    </div>
                
                    <div class="icon miniinf">
                        <wpp/>
                    </div>
                    <div class="inf miniinf">
                        (53) 9XXXX-XXXX
                    </div>
                 

                </div>
                <div class="col-sm-12 col-md-5 col-lg-3 col-xl-3 infos ">
                    <div class="icon">
                        <clock/>
                    </div>
                    <div class="inf">
                        Segunda à Sexta-feira <br>
                        Xh às Xh <br>
                        Sábados <br>
                        Xh às Xh <br>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-right sociais">
                    <a href="" target="_blank" title="facebook">
                        <facebook/>
                    </a>
                    <a href="" target="_blank" title="instagram">
                        <instagram/>
                    </a>
                </div>
                <div class="col-12 text-center human">
                    <a href="https://human2be.com.br/" target="_blank" title="human2be">
                        <h2b></h2b>
                    </a>
                </div> 
            </div>
        </div>
    </footer>
</template>

<script>
import facebook from './logos/facebook'
import instagram from './logos/instagram'
import h2b from './logos/h2b'
import pin from './logos/pin'
import phone from './logos/phone'
import wpp from './logos/wpp'
import clock from './logos/clock'
    export default{
        components: {facebook,instagram,h2b,pin,phone,wpp,clock},
        name:'foot',
        props:['index']
    } 
</script>

<style lang="scss" scoped>
    @import 'node_modules/bootstrap/scss/bootstrap';
    @import "../../sass/variables.scss";

        footer{
            padding: 125px 0;
            .container{
                .row{
                    .logo{
                        width: 200px;
                    }
                    .sociais{
                        a{
                            margin-left:20px;
                        }
                    }
                    .human{
                        margin-top: 50px;;
                    }
                    .infos{
                        
                        .icon{
                            float: left;
                            width: 15%;
                            clear: right;
                            height: 40px;
                            
                        }
                        .inf{
                            float: left;
                            width: 85%;
                            clear: right;
                            height: 40px;
                            margin-bottom: 15px;
                            font-size: 18px;
                            color:#0c5158;
                            font-weight: 500;
                        }
                        .miniinf{
                            height: 20px;
                        }
                        
                    }
                }
            }
        }

        @media(max-width:900px){
            footer{
                padding: 75px 0;
                .container{
                    .row{
                        .mainlog{
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            padding-bottom: 30px;
                        }
                        .sociais{
                            a{
                                margin-left: 10px;
                            }
                        }
                    }
                }
            }
        }

</style>
