<template>
    <section>
        <div class="container">
            <h2>
                Quer saber <br>
                mais sobre  <br>
                <span>
                    algum imóvel?
                </span>
            </h2>
            <a href="" class="default-button">ENVIE UM WHATS</a>
        </div>
    </section>
</template>

<script>

    export default{
        name:'whats'
    } 
</script>

<style lang="scss" scoped>
    @import 'node_modules/bootstrap/scss/bootstrap';
    @import "../../sass/variables.scss";
    section{
        width: 100%;
        height: 510px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url('/images/bg/001.jpg');
        background-attachment: fixed;
        padding: 0;
        .container{
            display: flex;
            align-items: flex-start;
            justify-content: center;
            height: 100%;
            flex-direction: column;
            h2{
                color:white;
                font-size: 60px;
                font-weight: 200;
                span{
                    font-weight: 800;
                }
            }
            a{
                margin-top: 40px;
            }
        }
        
    }
    @media(max-width:1500px){
        section{
            .container{
                h2{
                    font-size: 50px;
                }
            }
        }
    }
    @media(max-width:900px){
        section{
            height: 300px;
            .container{
                h2{
                    font-size: 24px;
                }
                a{
                    margin-top: 5px;
                }
            }
        }
    }
    @media(max-width:600px){
        section{
            height: 200px;
            .container{
                h2{
                    font-size: 24px;
                }
                a{
                    margin-top: 5px;
                }
            }
        }
    }

</style>
