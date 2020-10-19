<template>
    <div class="codpesquisa" @click="closecod" > 
        <div class="boxpesquisa" @click.stop>
            <div class="head">
                <label for="id">BUSCA POR CÓDIGO</label> 
            </div>
            <div class="foot">
                <form :action="formroute" method="GET">
                    <input type="hidden" name="tipo" value="">
                    <input type="hidden" name="cidade" value="">
                    <input type="hidden" name="bairro" value="">
                    <input type="hidden" name="dormitorios" value="0">
                    <input type="hidden" name="garagens" value="">
                    <input type="hidden" name="minvalue" value="0">
                    <input type="hidden" name="maxvalue" value="5000000">
                    <input type="number" name="id" id="id" placeholder="DIGITE O CÓDIGO" ref="numbercod"  v-model="valuecod" max="9999" maxlength="4" >
                    <input type="submit" value="BUSCAR" class="pesquisar" :disabled="valuecod==''">
                    <!-- :disabled=" isDisable() ?true:false " -->
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import mixinss from '../mixins/mixins.js'
export default {
    name:'cod',
    mixins:[mixinss],
    props:['formroute'],
    data:
    function(){
        return{
            valuecod:''
        }
    },
    methods:{
        closecod(el){
            mixinss.methods.fadeOut(el.target, 0.6, 'none')
            document.body.style.overflowY = 'auto'

        },
        opencod(el){
            mixinss.methods.fadeIn(el, 0.6, 'flex')
            document.body.style.overflowY = 'hidden'
        },

    },
    computed:{
        isDisable(){
            return this.$refs.numbercod;
        }
    },
    mounted:function(){
        
    }
    
}
</script>

<style lang="scss" scoped>
    @import 'node_modules/bootstrap/scss/bootstrap';
    @import "../../sass/variables.scss";
    .codpesquisa {
        z-index: 11111;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.6);
        width: 100%;
        height: 100vh;
        display: none;
        border-radius: 2px;
        align-items: center;
        justify-content: center;
        .boxpesquisa {
            background-color: white;
            width: 520px;
            height: 320px;
            .head {
                height: 66px;
                padding-left: 10px;
                padding-top: 20px;
                text-align: center;
                width: 100%;
                color: white;
                background-color: $verde-fraco;
                .codpesquisa .boxpesquisa .head label {
                    font-size: 24px;
                    font-weight: 900;
                }
            }
            .foot {
                height: 90%;
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                form {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    input[type=submit] {
                        border-radius: 2px;
                        color: white;
                        text-transform: uppercase;
                        background-color:  $verde-fraco;
                        border: none;
                        padding: 20px 40px;
                        &:disabled{
                            background-color:  #7a8f99;
                        }
                    }
                    input[type=number] {
                        width: 150px;
                        border-radius: 2px;
                        margin-bottom: 30px;
                        height: 45px;
                        width: 240px;
                        border: 2px solid #909292;
                        padding-left: 10px;
                        color: #909292;
                    }
                }
            }
        }
    }
    @media(max-width:600px){
        .codpesquisa {
            .boxpesquisa{
                width: 300px;
            }
        }
    }
</style>