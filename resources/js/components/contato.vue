<template>
    <section>
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a :href="index">Home</a></li>
                <li class="breadcrumb-item active">{{type}}</li>
            </ol>
            <h1 v-if="type=='Fale Conosco'">Fale Conosco</h1>
            <h1 v-else>Anuncie seu imóvel</h1> 
                    
            <p v-if="type=='Fale Conosco'">
                Deseja comprar ou vender Imóveis em Pelotas e Região? Entre em contato conosco e receba atendimento personalizado. Teremos o maior prazer em lhe atender!
            </p>
            <p v-else>
                A Achei Imóveis tem uma equipe que possui anos de experiência no mercado imobiliário. 
                Se você deseja vender o seu imóvel, entre em contato conosco.
            </p>
               
                
            <form :action="rota" method="post " class="row" ref="formsend">
                <input type="hidden" v-if="type=='Fale Conosco'" value="Quero entrar em contato" name="assunto">
                <input type="hidden" v-else value="Quero anunciar meu imóvel" name="assunto">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="input">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" @focus="labelfocus" @blur="labelblur" ref="nameinput" v-model="nome">
                        <div class="error">
                            {{errorname}}
                        </div>
                    </div>
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" @focus="labelfocus" @blur="labelblur" ref="emailinput" v-model="email">
                        <div class="error">
                            {{erroremail}}
                        </div>
                    </div>
                    <div class="input">
                        <label for="phone">Telefone</label>
                        <input type="text" name="telefone" id="phone" @focus="labelfocus" @blur="labelblur" v-mask="'(##)#####-####'" ref="phoneinput" v-model="telefone">
                        <div class="error">
                            {{errorphone}}
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="input">
                        <label for="message">mensagem</label>
                        <textarea name="mensagem" id="message" cols="30" rows="10" @focus="labelfocus" @blur="labelblur" ref="messageinput" v-model="mensagem">
                            
                        </textarea>
                        <div class="error">
                            {{errormessage}}
                        </div>
                    </div>
                    
                </div>
                <div class="col-12">
                    <input type="submit" class="default-button borderled float-right mt-5" value="ENVIAR" @click="validate">
                </div>
            </form>
                
            
        </div>
    </section>
</template>
<script>
export default {
    props:['type','rota','index'],
    data:function(){
        return{
            nome:'',
            email:'',
            telefone:'',
            mensagem:'',
            errorname:'',
            erroremail:'',
            errorphone:'',
            errormessage:'',
            emailregex:/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
        }
    },
    methods:{
        labelfocus(el){
            el.target.parentNode.childNodes[0].style.transform = 'translate(-45px, 10px) scale(0.7)'
        },
        labelblur(el){
            if( el.target.parentNode.childNodes[2].value!=''){
                el.target.parentNode.childNodes[0].style.transform = 'translate(-45px, 10px) scale(0.7)'
            }else{
                el.target.parentNode.childNodes[0].style.transform = 'translate(0,30px) scale(1)'
            }
        },
        validate(el){
            el.preventDefault()
            let send = true

            if(this.nome==''){
                this.$refs.nameinput.classList.add('inputerror')
                this.errorname = '(Preencha esse campo)'
                send = false
            }else if(this.nome.length<5){
                this.$refs.nameinput.classList.add('inputerror')
                this.errorname = '(Minimo de 5 caracteres)'
                send = false
            }else{
                this.$refs.nameinput.classList.remove('inputerror')
                this.errorname = ''
            }

            if(this.email==''){
                this.$refs.emailinput.classList.add('inputerror')
                this.erroremail = '(Preencha esse campo)'
                send = false
            }else if(!this.emailregex.test(this.email)){
                this.$refs.emailinput.classList.add('inputerror')
                this.erroremail = '(Preencha com um email válido)'
                send = false
            }else{
                this.$refs.emailinput.classList.remove('inputerror')
                this.erroremail = ''
            }

            if(this.telefone==''){
                this.$refs.phoneinput.classList.add('inputerror')
                this.errorphone = '(Preencha esse campo)'
                send = false
            }else if(this.telefone.length<13){
                this.$refs.phoneinput.classList.add('inputerror')
                this.errorphone = '(Preencha com um número válido)'
                send = false
            }else{
                this.$refs.phoneinput.classList.remove('inputerror')
                this.errorphone = ''
            }

            if(this.mensagem==''){
                this.$refs.messageinput.classList.add('inputerror')
                this.errormessage = '(fill this field)'
                send = false
            }else if(this.$refs.messageinput.value.length<20){
                this.$refs.messageinput.classList.add('inputerror')
                this.errormessage = '(minimum of 20 characters in ths field)'
                send = false
            }else{
                this.$refs.messageinput.classList.remove('inputerror')
                this.errormessage = ''
            }
            if(send==true){
                this.$refs.formsend.submit()
            }
        }
    }
}
</script>
<style lang="scss" scoped>
    @import 'node_modules/bootstrap/scss/bootstrap';
    @import "../../sass/variables.scss";
    section{
        background-color: $cinza-bg;
        margin-top: 100px;
        .breadcrumb{
            padding: 0;
            background-color: transparent;
        }
        .breadcrumb-item{
            a{
                color:#6c757d;
                &:hover{
                    text-decoration: none;
                }
            }
        }
        .breadcrumb-item.active{
            font-weight: 600;
        }
        .breadcrumb-item + .breadcrumb-item::before{
            content:'|';
        }
        .container{
            h1,p{
                color:$verde-texto;
            }
            form{
                background-color: white;
                padding: 50px 50px;
                border-radius: 40px;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
                .input{
                    position: relative;
                    input:-webkit-autofill {
                        -webkit-box-shadow: 0 0 0 30px white inset;
                        -webkit-text-fill-color: black ;
                    }
                    input,textarea{
                        border: none;
                        width: 100%;
                        transition: 0.3s ease all;
                    }
                    textarea{
                        height: 200px;
                        resize: none;
                        border-bottom: 1px solid $verde-forte;
                        margin-bottom: 30px;
                    }
                    label{
                        font-size: 16px;
                        font-weight: 800;
                        width: 300px;
                        transform: translate(0px, 30px);
                        display: block;
                        color: $verde-forte;     
                        transition: 0.3s ease all;
                                       
                    }
                    input{
                        border-bottom: 1px solid $verde-forte;
                        margin-bottom: 30px;
                    }
                    .inputerror{
                        color:#e90000;
                        border-bottom: 1px solid #e90000;
                        -webkit-text-fill-color: #e90000;
                    }
                    .error{
                        position: absolute;
                        bottom: 14px;
                        left: 0;
                        color:#e90000;
                        font-size: 10.4px;
                    }

                }
            }
        }
    }
    @media(max-width:900px){
        section{
            margin-top: 75px;
        }
    }
    @media(max-width:600px){
        section{
            margin-top: 75px;
            .container{
                form{
                    padding:50px 15px;
                }
            }
        }
    }
</style>