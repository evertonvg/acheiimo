<template>
    <a @click="searchp=!searchp;pesquisa()">
        <svg xmlns="http://www.w3.org/2000/svg" 
        xmlns:xlink="http://www.w3.org/1999/xlink" 
        aria-hidden="true" focusable="false"  style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" 
        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
        <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6z" 
        /><path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z" 
        /></svg>
    </a>
</template>
<script>
import mixinss from '../mixins/mixins.js'
export default {
    // mixins:[mixinss],
    name:'searchbutton',
    data:
    function(){
        return{
            searchp:false
        }
    },
    methods:{
        pesquisa(){

            if(this.searchp==true){
                document.querySelector('header').style.height='80vh'

                // document.querySelector('.search').style.display='flex'
                mixinss.methods.fadeIn(document.querySelector('.search'), 0.3, 'flex')
                document.querySelector('.search').style.height='20vh'
                
            }else{
               document.querySelector('header').style.height='100vh'
               document.querySelector('.search').style.height='0'
               mixinss.methods.fadeOut(document.querySelector('.search'), 0.3, 'none')
            }
        }
    },
    mounted(){

    }
    
}
</script>
<style lang="scss" scoped>
    @import 'node_modules/bootstrap/scss/bootstrap';
    @import "../../sass/variables.scss";
    a{
        position: fixed;
        cursor: pointer;
        bottom: 50px;
        right: 50px;
        padding: 10px;
        border-radius: 50px;
        background-color:$verde-menu;
        z-index: 11;
        border: 1px solid $verde-menu;
        transition: 0.3s ease all;
        &:hover{
            background-color:white;
            svg{
                fill:$verde-menu !important;
            }
        }
        svg{
            fill:white !important;
            height: 50px !important;
            width: 50px !important;
        }
    }
    @media(max-width: 600px){
        a{
            bottom:20px;
            left: 20px;
        }
    }
</style>