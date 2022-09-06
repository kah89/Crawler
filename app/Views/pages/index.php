 <style>
#login {
    max-width: 95%;
    margin: auto;
    width: 380px;
    margin-top: 15%;
}

#logo-cliente {
    max-width: 100%;
    margin: auto;
    width: 700px;
}

#logo-santri {
    max-width: 50%;
    margin: auto;
    width: 380px;
}

p{
    text-align: center;
    color: #9c1d1c;
    font-weight: 700;
}
 </style>
 <script src="static/js/jquery.js"></script>

 <div id="login">

     <form class="form-signin" method="post" action="./User/auth">
        <p class="w3-margin-top" >LOGIN</p>
         <input class="w3-input w3-border w3-margin-top" type="text" placeholder="Usuário" name="LOGIN">
         </br>
         <input class="w3-input w3-border w3-margin-top" type="password" placeholder="Senha" name="SENHA">
         </br>
         <button class="w3-button w3-theme w3-margin-top w3-block" type="submit">Entrar</button>
     </form>
     <div class="mx-auto">
         Não tem uma conta? <a href="<?= base_url('user/save'); ?>">Cadastre-se</a>
         <br />
     </div>
 </div>