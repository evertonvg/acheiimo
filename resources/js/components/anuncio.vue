<template>
    <section>
       
        <h2>Quer anunciar <span>o seu imóvel?</span></h2> <a href="" class="default-button">SAIBA MAIS</a>
    </section>
</template>

<script>

    export default{
        name:'anuncio'
    } 
</script>

<style lang="scss" scoped>
    @import 'node_modules/bootstrap/scss/bootstrap';
    @import "../../sass/variables.scss";
    section{
        width: 100%;
        height: 300px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url('/images/bg/002.jpg');
        background-attachment: fixed;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        h2{
            color: white;
            font-size: 40px;
            font-weight: 200;
            span{
                font-weight: 800;
            }
        }
        a{
            margin-left: 40px;
        }
    }
    @media(max-width:900px){
        section{
            height: 140px;
            h2{
                font-size: 24px;
            }
        }
    }
    @media(max-width:600px){
        section{
           flex-direction: column;
           a{
               margin: 0;
           }
        }
    }

</style>
