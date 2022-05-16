         <form class="form-horizontal" method="POST">

             <div class="mb-3">
                 <label for="username" class="form-label">Login</label>
                 <input type="text" class="form-control" id="username" name="login" placeholder="Entrez votre login">
             </div>

             <div class="mb-3">
                 <label class="form-label">Mot de Passe</label>
                 <div class="input-group auth-pass-inputgroup">
                     <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe"
                         aria-label="Password" aria-describedby="password-addon">
                     <button class="btn btn-light " type="button" id="password-addon"><i
                             class="mdi mdi-eye-outline"></i></button>
                 </div>
             </div>
             <div class="mt-3 d-grid">
                 <button class="btn btn-primary waves-effect waves-light" type="submit">Connexion</button>
             </div>
         </form>