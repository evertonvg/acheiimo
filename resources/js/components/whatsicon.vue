<template>
    <a :href="wpp" target="_blank">
        <wpp></wpp>
    </a>
</template>
<script>
import wpp from './logos/wpp'
export default {
    components: {wpp},
    props:['wpp'],
    
}
</script>
<style lang="scss" scoped>
    @import 'node_modules/bootstrap/scss/bootstrap';
    @import "../../sass/variables.scss";
    a{
        position: fixed;
        bottom: 50px;
        left: 50px;
        padding: 10px;
        border-radius: 50px;
        background-color:$verde-menu;
        z-index: 11;
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