
<template>
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" 
    focusable="false" width="30px" height="30px" 
    style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" 
    preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32">
    <path d="M16 4C9.383 4 4 9.383 4 16s5.383 12 12 12s12-5.383 12-12S22.617 4 16 4zm0 2c5.535 0 10 4.465 10 10s-4.465 10-10 10S6 21.535 6 16S10.465 6 16 6zm-1 2v9h7v-2h-5V8z" 
    /></svg>
</template>
<script>
export default {
    
}
</script>
<style scoped lang="scss">
    @import "../../../sass/variables.scss";
    svg{
        fill:$verde-fraco;
        transition: 0.3s ease all;
        &:hover{
            fill:$verde-fraco;
        }
    }
</style>