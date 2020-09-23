
<template>
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
             aria-hidden="true" focusable="false"  style="-ms-transform: 
             rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" 
             preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M9.005 4l8 8l-8 8L7 
             18l6.005-6L7 6z"  fill-rule="evenodd"/></svg>
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