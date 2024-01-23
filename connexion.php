<!DOCTYPE html>
<html lang="fr">
  <?php
  include ('include/header.php');

  
  ?>

  <body>

    <?php
  
    include ('include/navbarConnex.php');

  
  ?>

  	<!-- début section principale -->
    <section id="main" class="container">
      <h1 class="text-center">Connexion</h1>
      <section id="content-head" class="jumbotron jumbotron-fluid text-center bg-light-pink border-bottom border-almotri-blue">
        <div class="container">

          <!-- zone de connexion -->
            
            <form action="verification.php" method="POST">
                
                <div class="connexion">
                	<p>Adresse mail</p>
                	<input type="text" placeholder="Entre votre mail" name="username" required>
            	</div>
                
            	<div class="connexion">
	                <p>Mot de passe</p>
	                <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                </div>

                <input type="submit" id='submit' value='LOGIN' >
            
            </form>
        </div>
      </section>

    </section>

  <!-- début du footer -->
  <?php 

      include ('include/footer.php')

    ?>
  </body>
</html>