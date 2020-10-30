<template>
    <div ref="cookie"  v-if="isShow">
        <span>Utilizamos cookies para oferecer melhor experiência, melhorar o desempenho, analisar como você interage em nosso site e personalizar conteúdo.</span>
        <a href="javascript:void(0)" title="cookies alright" @click="acceptCookies">Aceitar Cookies</a>
    </div>
</template>
<script>
import mixinss from '../mixins/mixins.js'
import Cookies from 'js-cookie'
export default {
    name:'cookies',
    mixins:[mixinss],
    data() {
    return {
            isShow: true
        }
    },

    methods:{
        sessionpermission(){
            mixinss.methods.fadeOut(this.$refs.cookie, 0.3, 'none')
        },
        verifyCookies() {
            return Cookies.get('accepted-cookies') ? true : false;
        },
        
        acceptCookies(){
            Cookies.set('accepted-cookies', { title: 'Cookies Accepted', date: new Date().toLocaleDateString('pt-BR') }, { expires: 45 })
            this.sessionpermission()
        }
    },
     created() {
        if(this.verifyCookies()) {
            this.isShow = false;
        }
    },
}
</script>
<style lang="scss" scoped>
    div{
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 64px;
        border: 1px solid white;
        background-color: rgba($color: #000000, $alpha: 0.7);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        padding: 0 15px;
        z-index: 12;
        span{
            color:white;
            font-size: 12.5px;
        }
        a{
            color: black;
            background-color: white;
            text-decoration: none;
            transition: 0.3s ease all;
            border-radius: 2px;
            padding: 5px 30px;
            font-size: 12.5px;
            font-weight: 200;
            margin-top: 5px;
            &:hover{
               text-decoration: none; 
            }
        }
    }
    @media(min-width:600px){
        div{
            padding: 0 5%;
            height: 100px;
            span,a{
                font-size: 16px;
            }
            a{
                margin-top: 10px;
            }
        }
    }
</style>