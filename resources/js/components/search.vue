<template>
    <div class="search" v-show="active=='true'" :class="{'internapesquisa':active!='true'}">
        <cod :formroute="formroute" ref="cod" />
       <form :action="formroute" method="get">
           <input type="hidden" name="id" value="">

            <!-- caixa dos tipos  -->
           <div class="typeimo">
               <div class="xis" @click="closeitens">X</div>
               <h2>Tipos de imóveis</h2>
               <div class="el">
                   <ul>
                       <li v-for="el in tipos" :key="el.id">
                           <input type="checkbox" :data-tipo="el.tipo" :value="el.id"  name="tipos[]" :id="'tipo'+el.id" @click="innertipo" :data-val="el.tipo"  :checked="tiposimoveiselecteds.includes(el.id.toString())" class="checkboxcidade"> 
                           <label :for="'tipo'+el.id">{{el.tipo.normalize("NFD").replace(/[áÁéÉ]/g,function(c) { return this.chars[c]; })}}</label>
                       </li>
                   </ul>
               </div>
           </div>
            <!-- end caixa dos tipos  -->

            <!-- caixa dos bairros  -->
           <div class="bairroimo">
               <div class="xis" @click="closeitens">X</div>
               <h2>Bairros</h2>
               <div class="el">
                   <h2 v-if="bairros.length<=0">
                       Não há uma cidade selecionada ou não existem bairros para a cidade selecionada.
                   </h2>
                   <ul v-else>
                      <li v-for="el in bairros" :key="el.id">
                          
                           <input type="checkbox" :value="el" name="bairros[]" :id="'bairro'+el" @click="innerbairro" :data-val="el" :checked="bairrosimoveiselecteds.includes(el.toString())" class="checkboxbairroelement"> 
                           <label :for="'bairro'+el">{{el.normalize("NFD")}}</label>
                       </li>
                   </ul>
               </div>
           </div>
           <!-- end caixa dos tipos  -->


            <!-- botão de buscar por id  -->
           <button type="button" name="buscarid" @click="focuscod">BUSCAR POR CÓDIGO</button>
           <!-- botão de buscar por id  -->

            <!-- botão para abrir a caixa de tipos  -->
           <div class="selectfield">
               <label for="tipo">Tipo de imóvel?</label>
               <button name="tipo" id="tipo"  type="button" @click="opentipo">  
                   {{innerbuttontipo}}
               </button>
           </div>
            <!-- end botão para abrir a caixa de tipos  -->


            <!-- select de cidades  -->
            <div class="selectfield" @click.stop="cidadeactive=!cidadeactive,cidadeopen()">
               <label for="cidade">Onde?</label>
               <div class="referencebutton referencecidade" style="z-index:3" :class="{'active':cidadeactive==true}">
                    <input type="hidden" name="cidade" :value="cidadevalue">
                    <div class="selectbutton" style="z-index:7">
                        <span v-if="cidadevalue==''">Cidade</span>
                        <span v-else>{{cidadevalue}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" :class="{'active':cidadeactive==true}"
                        xmlns:xlink="http://www.w3.org/1999/xlink" 
                        aria-hidden="true" focusable="false" width="1em" 
                        height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" 
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M5 6l5 5l5-5l2 1l-7 7l-7-7z" 
                        fill="#157783"/></svg>
                    </div>
                    <div class="optionbutton optionbuttoncidades" @click="cidadevalue='';changemethod(null)" style="z-index:6" :class="{'selected':cidadevalue==''}">Cidade</div>
                    <div class="optionbutton optionbuttoncidades" v-for="el in uniquecitys" :key="el" @click="cidadevalue=el;changemethod(el)" style="z-index:6" :class="{'selected':cidadevalue==el}">
                        {{el.normalize("NFD")}}
                    </div>
               </div>
            </div>
            <!-- end select de cidades  -->


            <!-- botão para abrir a caixa de bairros  -->
            <div class="selectfield">
               <label for="bairro">Qual bairro?</label>
               <button name="" id="bairro" type="button" @click="openbairro" >
                   {{innerbuttonbairro}}
               </button>
            </div>
            <!-- end botão para abrir a caixa de bairros  -->


            <!-- select dos quartos  -->
            <div class="selectfield quartovagafield " @click.stop="quartoactive=!quartoactive,quartoopen()" >
               <div class="referencebutton left">
                    <input type="hidden" name="dormitorios" :value="quartovalue">
                    <div class="selectbutton left">
                    <span v-if="quartovalue==0">Quartos</span>
                    <span v-else>{{quartovalue}}</span>
                    
                    <svg xmlns="http://www.w3.org/2000/svg" :class="{'active':quartoactive==true}"
                    xmlns:xlink="http://www.w3.org/1999/xlink" 
                    aria-hidden="true" focusable="false" width="1em" 
                    height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" 
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M5 6l5 5l5-5l2 1l-7 7l-7-7z" 
                    fill="#157783"/></svg>
                    </div>
                    <div class="optionbutton optionbuttonquartos" v-for="q in quanty" :key="q.id" @click="quartovalue=q.qtd" :class="{'selected':quartovalue==q.qtd}">
                        {{q.qtd}}
                    </div>
               </div>
            </div>
            <!-- end select dos quartos  -->

            <!-- select das vagas  -->
            <div class="selectfield quartovagafield " @click.stop="vagaactive=!vagaactive,vagaopen()">
               <div class="referencebutton right">
                    <input type="hidden" name="garagens" :value="vagavalue"> 
                    <div class="selectbutton right">
                        <span v-if="vagavalue=='talvez'">Vagas</span>
                        <span v-else>{{vagavalue}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" :class="{'active':vagaactive==true}"
                        xmlns:xlink="http://www.w3.org/1999/xlink" 
                        aria-hidden="true" focusable="false" width="1em" 
                        height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" 
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M5 6l5 5l5-5l2 1l-7 7l-7-7z" 
                        fill="#157783"/></svg>
                    </div>
                    <div class="optionbutton optionbuttonvagas" v-for="q in vacancy" :key="q.id" @click="vagavalue=q.value" :class="{'selected':vagavalue==q.value}">
                        {{q.value}}
                    </div>
                </div>
            </div>
            <!-- end select das vagas  -->


            <!-- componente do nouislider  -->
            <div class="selectfield valorfield vnus">
                <v-nus :config="config" :value="values" @update="values = $event" color="white"/>
                <div class="firstv">
                    <input type="hidden" :value="values[0]" name="minvalue">
                    {{  parseInt(values[0]).toLocaleString('pt-BR', {style: 'currency',currency: 'BRL',currencyDisplay: 'symbol'}) }}
                </div>
                <div class="lastv">
                    <input type="hidden" :value="values[1]" name="maxvalue">
                    {{  parseInt(values[1]).toLocaleString('pt-BR', {style: 'currency',currency: 'BRL',currencyDisplay: 'symbol'}) }}
                </div>
            </div>
            <!-- end componente do nouislider  -->

           <!-- botão de submissão  -->
           <div class="sub">
               <input type="submit" value="BUSCAR" class="menu-button form">
           </div>
           <!-- end botão de submissão  -->
       </form>

    </div>
</template>

<script>

import cod from './cod'
import axios from 'axios'

export default {
    name:'search',
    components:{cod},
    props:['tiposelected','city','bar','minimo','maximo','vac','dorm','tiposimo','dadosimo','formroute','active'],
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
                tiposimoveiselecteds:JSON.parse(this.tiposelected),
                bairrosimoveiselecteds:JSON.parse(this.bar),
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
                },
                quartovalue:this.dorm,
                vagavalue:this.vac,
                cidadevalue:'',
                quartoactive:false,
                vagaactive:false,
                cidadeactive:false,
                quanty:[
                    {
                        id:0,
                        qtd:0
                    },
                    {
                        id:1,
                        qtd:1
                    },
                    {
                        id:2,
                        qtd:2
                    },
                    {
                        id:3,
                        qtd:3
                    },
                    {
                        id:4,
                        qtd:4
                    }
                ],
                vacancy:[
                    {
                        id:0,
                        value:'talvez',
                    },
                    {
                        id:1,
                        value:'sim',
                    },
                    {
                        id:2,
                        value:'não',
                    },
                    
                ]
        }
            
    },
    computed:{
        uniquecitys:function(keyname){
            let output = [];

            this.dados.forEach(function(el){
                if(el.cidade!='' && el.cidade!=null){
                    if (output.indexOf(el.cidade.trim().toUpperCase()) === -1 ) {
                        output.push(el.cidade.trim().toUpperCase());
                    }
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
            axios.get(`api/bairros/${el}`)
            
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
        },
        quartoopen(){
            let optionbutton = document.querySelectorAll('.optionbuttonquartos')
            let top = 50
            if(this.quartoactive==true){
                optionbutton.forEach(el => {
                    el.style.top = `${top}px`
                    top = top + 50
                });
            }else{
                optionbutton.forEach(el => {
                    el.style.top = `0px`
                });
            }
        },
        vagaopen(){
            let optionbutton = document.querySelectorAll('.optionbuttonvagas')
            let top = 50
            if(this.vagaactive==true){
                optionbutton.forEach(el => {
                    el.style.top = `${top}px`
                    top = top + 50
                });
            }else{
                optionbutton.forEach(el => {
                    el.style.top = `0px`
                });
            }
        },
        cidadeopen(){
            let optionbutton = document.querySelectorAll('.optionbuttoncidades')
            let top = 50
            if(this.cidadeactive==true){
                optionbutton.forEach(el => {
                    el.style.top = `${top}px`
                    top = top + 50
                });
            }else{
                optionbutton.forEach(el => {
                    el.style.top = `0px`
                });
            }
        },
        
    },
    
    created:  function() {
        
    }, 
    mounted: function(){

        if(this.tiposimoveiselecteds.length>0){
            let checkboxcidade = document.querySelectorAll('.checkboxcidade')
            checkboxcidade.forEach((element)=>{
                if(element.checked==true){
                    this.buttontipos.push(element.dataset.tipo.normalize("NFD"))  
                }
            })

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

        if(!this.city.length<=0 ){
            this.cidadevalue = this.city
            axios.get(`api/bairros/${this.city}`)
            
            .then(resp =>{

                resp.data.forEach((el)=>{
                    if (this.bairros.indexOf(el.bairro) === -1  && el.bairro!='' && el.bairro!=null) {
                        this.bairros.push(el.bairro);
                    }
                });
            })
            .then(()=>{
                let varcheckboxbairroelement = document.querySelectorAll('.checkboxbairroelement');
                varcheckboxbairroelement.forEach((el)=>{
                    if(el.checked==true){
                        this.buttonbairros.push(el.dataset.val.normalize("NFD"))
                    }
                })   
            })
            .then(()=>{
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
            })
            this.bairros.sort()
        }
        document.addEventListener("click", ()=>{
            this.cidadeactive = false
            this.vagaactive = false
            this.quartoactive = false
            this.quartoopen()
            this.vagaopen()
            this.cidadeopen()
        });
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
            // display: none;
            height: 20vh;
            background-color: $bg-white;
            position: relative;
            display: flex;
            align-items: flex-end;
            justify-content: flex-end;
            transition: 0.3s ease all;
            form{
                position: relative;
                width: 1000px;
                background-color: white;
                margin: 0 auto;
                border-top-left-radius: 200px;
                border-top-right-radius: 40px;
                padding-top: 70px;
                padding-left: 100px;
                padding-right: 100px;
                padding-bottom: 40px;
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
                        border-radius: 50px;
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
                    transition: 0.3s ease all;
                    &:hover{
                        background-color: gray;
                    }
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
                    position: relative;
                    label{
                        width: 90%; 
                        margin: 0 auto;
                        font-weight: 500;
                        font-size: 18px;
                        color:#117581;
                        padding-left: 12px;
                    }
                    select,button,.selectbutton{
                        width: 90% ;
                        margin: 0 auto ;
                        height: 50px ;
                        border: 2px solid #117581;
                        color: #117581;
                        font-weight: 500 ;
                        font-size: 18px;
                        padding-left: 20px;
                        text-align: left;
                        background-color: white;
                        outline-color:  #117581;
                        overflow: hidden;
                        white-space: nowrap;
                        display: flex;
                        align-items: center;
                        justify-content: flex-start;
                    }
                    .referencebutton{
                        position: absolute;
                        width: 90% ;
                        margin: 0 auto ;
                        z-index: 1;
                        left: 5%;
                        // overflow: hidden;
                        max-height: 300px;
                        // height: 300px;
                        cursor: pointer;
                        .selectbutton{
                            z-index: 3;
                            position: relative;
                            width: 100%;
                            svg{
                                position: absolute;
                                width: 50px;
                                right: -3px;
                                transition: 0.3s ease all;
                            }
                            svg.active{
                                transform:rotate(180deg) !important;
                            }
                            
                            
                        }
                        .optionbutton{
                            position: absolute;
                            width: 100% ;
                            height: 50px ;
                            border: 2px solid #117581;
                            overflow: hidden;
                            white-space: nowrap;
                            display: flex;
                            align-items: center;
                            justify-content: flex-start;
                            top: 0;
                            left: 0;
                            color: white;
                            background-color: #22909f;
                            z-index: 2;
                            padding-left: 20px;
                            transition: 0.3s ease all;
                            &:hover{
                                background-color:#117581;
                            }
                        }
                        .optionbutton.selected{
                            background-color: #117581;
                        }
                    }
                    .referencebutton.active{
                        overflow: scroll;
                        height: 250px;
                    }
                    .referencecidade{
                        z-index: 4 !important;
                    }
                }
                .vnus{
                    height: 50px;
                    padding-top: 24px;
                    position: relative;
                    width: 90%;
                    margin: 0 auto;
                    .noUi-target{
                        width: 90% ;
                        margin: 0 auto ;
                        .noUi-base{
                            .noUi-origin{
                                .noUi-horizontal .noUi-handle{
                                    width: 30px ;
                                    height: 30px ;
                                    top: -15px ;
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

        .internapesquisa{
            margin-top: 130px;
            background-color: white;
            form{
                background-color: $cinza-bg;
            }
        }

        @media(max-width:1440px){
            .search{
                form{
                    border-top-left-radius: 150px;
                    padding-top: 50px;
                    padding-bottom: 24px;
                }
            }
        }

        @media(max-width: 1000px){
            .search{
                form{
                    width: 100%;
                    
                }
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
                    .typeimo.open,.bairroimo.open{
                        width: 300px;
                    }
                    .selectfield{
                        width: 100%;
                        label{
                            width: 90%; 
                            margin: 0 auto;
                            font-weight: 500;
                            font-size: 18px;
                            color:#117581;
                            padding-left: 0;
                        }
                        select,button{
                            width: 100%;
                        }
                        .referencebutton{
                            width: 100%;
                            position: relative;
                            left: 0;
                            z-index: 3;
                        }
                        .referencebutton.left{
                            width: 95%;
                            margin-right: 5%;
                        }
                        .referencebutton.right{
                            width: 95%;
                            margin-left: 5%;
                        }
                        .referencecidade{
                            z-index: 4;
                        }
                    }
                    .quartovagafield{
                        width: 50%;
                        select.left{
                            width: 95% !important;
                            margin-right: 5% ;
                        }
                        select.right{
                            width: 95% ;
                            margin-left: 5% ;
                        }
                    }
                    .valorfield{
                        width: 90%;
                        margin: 0 7%;
                        margin-top: 30px;
                    }
                    .vnus{
    
                        .noUi-target{
                            width: 100% ;
                        }
        
                    }
                    
                    
                }
            }
        }
   
</style>
