<template>
    <div class="search">
        <cod ref="cod" />
       <form action="">
           <div class="typeimo">
               <div class="xis" @click="closeitens">X</div>
               <h2>Tipos de imóveis</h2>
               <div class="el">
                   <ul>
                       <li v-for="el in tipos" :key="el.id">
                           <input type="checkbox" :value="el.id" name="tipos" :id="'tipo'+el.id" @click="innertipo" :data-val="el.tipo"> <label :for="'tipo'+el.id">{{el.tipo.normalize("NFD").replace(/[áÁéÉ]/g,function(c) { return this.chars[c]; })}}</label>
                       </li>
                   </ul>
               </div>
           </div>
           <div class="bairroimo">
               <div class="xis" @click="closeitens">X</div>
               <h2>Bairros</h2>
               <div class="el">
                   <h2 v-if="bairros.length<=0">
                       Não há uma cidade selecionada ou não existem bairros para a cidade selecionada.
                   </h2>
                   <ul v-else>
                      <li v-for="el in bairros" :key="el.id">
                           <input type="checkbox" :value="el" name="bairros" :id="'bairro'+el" @click="innerbairro" :data-val="el"> <label :for="'bairro'+el">{{el.normalize("NFD")}}</label>
                       </li>
                   </ul>
               </div>
           </div>

           <button type="button" name="buscarid" @click="focuscod">BUSCAR POR CÓDIGO</button>
           <div class="selectfield">
               <label for="tipo">Tipo de imóvel?</label>
               <button name="tipo" id="tipo"  type="button" @click="opentipo">  
                   {{innerbuttontipo}}
               </button>
           </div>
           <div class="selectfield">
               <label for="cidade">Onde?</label>
               <select name="cidade" id="cidade" @change="changemethod">
                   <option value="">Cidade</option>
                   <option v-for="el in uniquecitys" :key="el">{{el.normalize("NFD")}}</option>
               </select>
           </div>
           <div class="selectfield">
               <label for="bairro">Qual bairro?</label>
               <button name="" id="bairro" type="button" @click="openbairro" >
                   {{innerbuttonbairro}}
               </button>
           </div>
           <div class="selectfield quartovagafield">
               <select name="dormitorios" >
                   <option value="">Quartos</option>
                   <option value="1">1+</option>
                   <option value="2">2+</option>
                   <option value="3">3+</option>
                   <option value="4">4+</option>
               </select>
           </div>
           <div class="selectfield quartovagafield">
   
               <select name="vagas" >
                   <option value="">Vagas</option>
                   <option value="sim">Sim</option>
                   <option value="nao">Não</option>
               </select>
           </div>
           <div class="selectfield valorfield vnus">
                <v-nus :config="config" :value="values" @update="values = $event" 
               color="white"
               
                />
                <div class="firstv">
                    <input type="hidden" :value="values[0]" name="minvalue">
                    {{  parseInt(values[0]).toLocaleString('pt-BR', {style: 'currency',currency: 'BRL',currencyDisplay: 'symbol'}) }}
                </div>
                <div class="lastv">
                    <input type="hidden" :value="values[1]" name="maxvalue">
                    {{  parseInt(values[1]).toLocaleString('pt-BR', {style: 'currency',currency: 'BRL',currencyDisplay: 'symbol'}) }}
                </div>
           </div>
           <div class="sub">
               <input type="submit" value="BUSCAR" class="menu-button form">
           </div>
       </form>
    </div>
</template>

<script>

import cod from './cod'

export default {
    name:'search',
    components:{cod},
    props:['minimo','maximo','tiposimo','dadosimo'],
    data: function(){
            return{
                config: {
                connect: [true, true, true],
                connectColors: ["gray", "#117581", "gray"],
                color:'red',
                thumbColor:'red',
                thumbShow:true,
                range: {
                    'min': [0, 10000],
                    '10%': [100000, 20000],
                    '50%': [1000000, 100000],
                    'max': [5000000]
                    }
                },
                values: [this.minimo, this.maximo],
                tipos: JSON.parse(this.tiposimo),
                dados: JSON.parse(this.dadosimo),
                bairros:[],
                buttontipos:[],
                buttonbairros:[],
                innerbuttontipo:'Tipo',
                innerbuttonbairro:'Bairro',
                chars: {
                    "á" : "&aacute;",
                    "Á" : "&Aacute;",
                    "é" : "&eacute;",
                    "É" : "&Eacute;",
                    "ó" : "&oacute;"
                }
        }
            
    },
    computed:{
        uniquecitys:function(keyname){
            let output = [];

            this.dados.forEach(function(el){
                if (output.indexOf(el.cidade) === -1  && el.cidade!='' && el.cidade!=null) {
                    output.push(el.cidade);
                }
            });

            return output.sort();
        }
    },
    methods:{
        opentipo(){
            let bairroimo = document.querySelector('.bairroimo')
            let typeimo = document.querySelector('.typeimo')
            bairroimo.classList.remove('open')
            if(!typeimo.classList.contains('open')){
                typeimo.classList.add('open')
            }else{
                typeimo.classList.remove('open')
            }
        },
        openbairro(){
            let bairroimo = document.querySelector('.bairroimo')
            let typeimo = document.querySelector('.typeimo')
            typeimo.classList.remove('open')
            if(!bairroimo.classList.contains('open')){
                bairroimo.classList.add('open')
            }else{
                bairroimo.classList.remove('open')
            }
        },
        closeitens(){
            let bairroimo = document.querySelector('.bairroimo')
            let typeimo = document.querySelector('.typeimo')
            bairroimo.classList.remove('open')
            typeimo.classList.remove('open')
        },
        innertipo(el){
            if(el.target.checked==true){
                this.buttontipos.push(el.target.dataset.val.normalize("NFD"))
            }            
            else{
                for (let i = 0; i < this.buttontipos.length; i++) {
                    if (this.buttontipos[i] == el.target.dataset.val.normalize("NFD")) {
                        this.buttontipos.splice(i, 1)
                    }
                }
            }
            if(this.buttontipos.length==0){
                this.innerbuttontipo = 'Tipo'
            }else{
                this.innerbuttontipo = ''
                for (let i=0; i < this.buttontipos.length; i++){
                    if(i>=3){
                        this.innerbuttontipo = `${this.innerbuttontipo}...`
                    }else{
                        if(i==this.buttontipos.length-1){
                            this.innerbuttontipo = `${this.innerbuttontipo} ${this.buttontipos[i]}`
                        }else{
                            this.innerbuttontipo = `${this.innerbuttontipo} ${this.buttontipos[i]},`
                        }
                    }
                }
            }
        },
        innerbairro(el){
            
            if(el.target.checked==true){
                this.buttonbairros.push(el.target.dataset.val.normalize("NFD"))
            }            
            else{
                for (let i = 0; i < this.buttonbairros.length; i++) {
                    if (this.buttonbairros[i] == el.target.dataset.val.normalize("NFD")) {
                        this.buttonbairros.splice(i, 1)
                    }
                }
            }
            if(this.buttonbairros.length==0){
                this.innerbuttonbairro = 'Bairro'
            }else{
                this.innerbuttonbairro = ''
                for (let i=0; i < this.buttonbairros.length; i++){
                    if(i>=3){
                        this.innerbuttonbairro = `${this.innerbuttonbairro}...`
                    }else{
                        if(i==this.buttonbairros.length-1){
                            this.innerbuttonbairro = `${this.innerbuttonbairro} ${this.buttonbairros[i]}`
                        }else{
                            this.innerbuttonbairro = `${this.innerbuttonbairro} ${this.buttonbairros[i]},`
                        }
                    }
                }
            }
            

        },
        changemethod(el){
            this.bairros = []
            this.innerbuttonbairro = 'Bairro'
            this.$http.get(`api/bairros/${el.target.value}`)
            
            .then(resp =>{
                let content = this 
                resp.data.forEach(function(el){
                    if (content.bairros.indexOf(el.bairro) === -1  && el.bairro!='' && el.bairro!=null) {
                        content.bairros.push(el.bairro);
                    }
                });

                

            })
            this.bairros.sort()
        },
        focuscod(){
            this.$refs.cod.opencod(this.$refs.cod.$el)
        }
    },
    
    created:  function() {
        
    }, 
    mounted: function(){
        let dots = document.querySelectorAll('.noUi-touch-area ')
        dots.forEach(element => {
            element.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" 
            xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" 
            focusable="false" width="15px" height="25px" margin-right="-5px" style="-ms-transform: rotate(360deg);
             -webkit-transform: rotate(360deg); transform: rotate(360deg);" 
             preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path 
             d="M15 4l2 2l-6 6l6 6l-2 2l-8-8z" fill="#117581" fill-rule="evenodd"/></svg>
             
             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
             aria-hidden="true" focusable="false" margin-left="-5px" width="15px" height="25px" style="-ms-transform: 
             rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" 
             preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M9.005 4l8 8l-8 8L7 
             18l6.005-6L7 6z" fill="#117581" fill-rule="evenodd"/></svg>
             `
        });

        

    }

}   
</script>

<style lang="scss" scoped>
    @import 'node_modules/bootstrap/scss/bootstrap';
    @import "../../sass/variables.scss";
        
        .search{
            height: 30vh;
            background-color: $bg-white;
            position: relative;
            display: flex;
            align-items: flex-end;
            justify-content: flex-end;

            form{
                position: relative;
                min-width: 1000px;
                max-width: 1000px;
                background-color: white;
                margin: 0 auto;
                border-top-left-radius: 200px;
                border-top-right-radius: 40px;
                padding-top: 70px;
                padding-left: 100px;
                padding-right: 100px;
                padding-bottom: 70px;
                .typeimo,.bairroimo{
                    position: fixed;
                    top: 0;
                    right: 0;
                    width: 0;
                    height: 100vh;
                    overflow: hidden;
                    background-color: $verde-menu;
                    z-index: 1000;
                    transition: 0.3s ease all;
                    
                    .xis{
                        position: absolute;
                        width: 50px;
                        height: 50px;
                        border:2px solid white;
                        border-radius: 3px;
                        top: 20px;
                        right: 20px;
                        color:white;
                        font-size: 30px;
                        cursor: pointer;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                    h2{
                        font-size: 20px;
                        color: white;
                        padding-top:70px;
                        padding-left: 20px;
                    }
                }
                .typeimo.open,.bairroimo.open{
                    width: 370px;
                    overflow-y: scroll;
                }
                button[name=buscarid]{
                    position: absolute;
                    top: 0;
                    right: 0;
                    color:black;
                    font-size: 12px;
                    font-weight: 500;
                    background-color: #d1d1d1;
                    padding: 25px 45px;
                    border: none;
                    border-top-right-radius: 40px;
                    border-top-left-radius: 40px;
                    border-bottom-left-radius: 40px;
                    outline: none;
                }
                .sub{
                    width: 100%;
                    text-align: center;
                    padding-top: 40px;
                    float: none;
                    clear: both;
                }
                .selectfield{
                    width: 33.33%;
                    float: left;
                    label{
                        width: 90%; 
                        margin: 0 auto;
                        font-weight: 500;
                        font-size: 18px;
                        color:#117581;
                    }
                    select,button{
                        width: 90% !important;
                        margin: 0 auto !important;
                        height: 50px !important;
                        border: 2px solid #117581;
                        color: #117581;
                        font-weight: 500 !important;
                        font-size: 18px;
                        padding-left: 20px;
                        text-align: left;
                        background-color: white;
                        outline-color:  #117581;
                        overflow: hidden;
                        white-space: nowrap;
                    }
                }
                .vnus{
                    height: 50px;
                    padding-top: 24px;
                    position: relative;
                    width: 90%;
                    margin: 0 auto;
                    .noUi-target{
                        width: 90% !important;
                        margin: 0 auto !important;
                        .noUi-base{
                            .noUi-origin{
                                .noUi-horizontal .noUi-handle{
                                    width: 30px !important;
                                    height: 30px !important;
                                    top: -15px !important;
                                }
                            }
                           
                        }
                    }
                    
                    .firstv,.lastv{
                        position: absolute;
                        bottom: -15px;
                        color:#117581;
                        font-weight: 500;

                    }
                    .firstv{ 
                        left: 5%;
                    }
                    .lastv{
                        right: 5%;
                    }
                }
                .quartovagafield{
                    margin-top: 25px;
                    width: 20%;
                    
                }
                .valorfield{
                    margin-top: 25px;
                    width: 60%;
                }
            }



            .typeimo .el ul li,.bairroimo .el ul li{
                display: flex;
                align-items: center;
                justify-content: flex-start;
                flex-direction: row;
                float: left;
                width: 100%;
                list-style: none;
                margin:5px;
                color:white;
            }
            .typeimo .el ul li label,.bairroimo .el ul li label{
                margin-left:10px;
                padding-top: 2px;
                cursor:pointer;
            }
                .typeimo .el ul li input,.bairroimo .el ul li input{
                cursor:pointer;
                display:none;
            }

            .typeimo .el ul li input + label:before,.bairroimo .el ul li input + label:before{
            content:'';
                display: inline-block;
                width:1em;
                height: 1em;
                border-radius: 3px;
                margin-right: 5px;
                border:2px solid white;
                background: white;
                margin-bottom:-3px;
            }

            .typeimo .el ul li input:checked +label:before,.bairroimo .el ul li input:checked +label:before{
                background-color:$verde-menu;
                background-image: url('/images/check.svg') ;
                background-repeat:no-repeat;
                background-position: center;
            }
        }

        @media(max-width:600px){
            .search{
                height: auto;
                form{
                    margin-top: -100px;
                    border-top-left-radius: 60px;
                    padding:15px;
                    padding-top: 100px;
                    padding-bottom: 50px;
                    .selectfield{
                        width: 100%;
                        label{
                            width: 90%; 
                            margin: 0 auto;
                            font-weight: 500;
                            font-size: 18px;
                            color:#117581;
                        }
                        select,button{
                            width: 100% !important;
                        }
                    }
                .vnus{
  
                    .noUi-target{
                        width: 100% !important;
                    }
    
                }
                    .quartovagafield{
                        width: 50%;
                        select{
                            width: 90% !important;
                            margin-left: 5% !important;
                        }
                    }
                    .valorfield{
                        width: 90%;
                        margin: 0 7%;
                        margin-top: 30px;
                    }
                }
            }
        }
   
</style>
