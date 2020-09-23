
<template>
    <svg xmlns="http://www.w3.org/2000/svg" 
            xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" 
            focusable="false"  style="-ms-transform: rotate(360deg);
             -webkit-transform: rotate(360deg); transform: rotate(360deg);" 
             preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path 
             d="M15 4l2 2l-6 6l6 6l-2 2l-8-8z"  fill-rule="evenodd"/></svg>
</template>
<script>
export default {
    
}
</script>
<style scoped lang="scss">
    @import "../../../sass/variables.scss";
    svg{
        fill:#d1d1d1;
        transition: 0.3s ease all;
         width:45px;
         height:45px;
        &:hover{
            fill:$verde-fraco;
        }
    }
</style>