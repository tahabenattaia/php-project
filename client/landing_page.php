<?php 
$show=0;
if (!empty($_POST))
{
  include "connexion.php";
  $req=$db->prepare("insert into avis (nom,email,contenu,tel) VALUES (?,?,?,?)");
      $res=$req->execute(array($_POST['nom'],$_POST['email'],$_POST["contenu"],$_POST["tel"]));
      $show=1;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylec.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>SELENE</title>
</head>
<body>
   <div class="banner">
    <img alt="SELENE" title="SELENE " src="image/logo.png" class="logo">
    <h1 class="intro" data-text="&nbsp; Your world, connected - POWERED BY SELENE&nbsp;">&nbsp; Your world, connected - POWERED BY SELENE&nbsp;</h1>
    <a href="#in" class="link">
        <span class="mask">
          <div class="link-container">
            <span class="link-title1 title">EN SAVOIR PLUS</span>
            <span class="link-title2 title">EN SAVOIR PLUS</span>
          </div>
        </span>
        <div class="link-icon">
          <svg class="icon" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
            <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z" />
          </svg>
          <svg class="icon" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
            <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z" />
          </svg>
        </div>
      </a>
      <div class="wrapper">
        <ul>
    <li><a  href="#i">Acceuil</a></li>
    <li><a href="#in">Introduction</a></li>
    <li><a href="page_produits.php">Produits</a>
    </li>
    <li><a  href="#cn">Contact</a></li>
    </ul>
    </div>
    <div id="bt">
    <button ><a class="b" href="login.php" >Login <i class="fa fa-sign-in" style="font-size:15px"></i></a>
     </button>
     <button ><a class="b" href="register.php">Register <i class="fa fa-registered" style="font-size:15px"></i></a>
     </button>
    </div>
    <section class="i" id="in">
        <h1 class="heading">Introduction</h1>
        <div class="row">
           <div class="image">
               <img src="image/photo.png">
           </div>
           <div class="contenu">
               <h3>Pourquoi SELENE</h3>
               <p>Le nom SELENE peut offrir plusieurs avantages pour une marque de téléphone. Tout d'abord, il est mémorable. En tant que mot unique et évocateur, il est plus facile pour les clients de se souvenir de la marque. De plus, le mot SELENE a une signification particulière en grec, ce qui pourrait ajouter une dimension intéressante à la marque de téléphone. Le mot signifie "lune", ce qui peut être associé à la technologie moderne, la clarté et la luminosité. Cette connotation positive peut aider à renforcer l'image de marque de la société en tant qu'entreprise innovante et à la pointe de la technologie.</p>
           </div>
        </div>
     </section>
     <div class="container">
      <div class="row">
          <h1 id="cn">contactez nous</h1>
      </div>
      <div class="row">
          <h4 style="text-align:center">Nous aimerions recevoir de vos nouvelles!</h4>
      </div>
      <form method="post">
      <div class="row input-container">
          <div class="col-xs-12">
            <div class="styled-input wide">
              <input type="text" name="nom" required />
              <label>Nom</label> 
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="styled-input">
              <input type="text" name="email" required />
              <label>Email</label> 
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="styled-input" style="float:right;">
              <input type="text" name="tel" required />
              <label>N°téléphone</label> 
            </div>
          </div>
          <div class="col-xs-12">
            <div class="styled-input wide">
              <textarea name="contenu" required></textarea>
              <label>Message</label>
            </div>
          </div>
          <div class="col-xs-12">
            <button class="btn-lrg submit-btn">Envoyer Message</button>
          </div>
      </div>
    </form>
    </div>
    <div id="progress">
      <span id="progress-value">&#x21EA;</span>
   </div>
  <footer>
    <div class="footer-content">
        <h3>SELENE</h3>
        <p>SELENE est une entreprise de produits électroniques réputée pour la qualité de ses produits et services. Depuis sa création, la marque s'est engagée à offrir des produits électroniques innovants, élégants et performants.</p>
         <div class="footer-bottom">
            <p>copyright &copy;2023 <a href="#">SELENE</a>  </p>
         </div>
         <div class="footer-menu">
            <ul class="f-menu">
               <li><a href="#in">Introduction</a></li>
               <li><a href="#cn">contact</a></li>
            </ul>
           </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>
<?php
if ($show==1)
{
echo( "<script>
  Swal.fire(
  'Succès!',
  'Merci pour votre gentillesse!',
  'success',
  )
</script>");
}
?>
<script>
  let calcScrollValue=()=>{
    let scrollProgress=document.getElementById("progress");
    let progressValue=document.getElementById("progress-value");
    let pos = document.documentElement.scrollTop;
    let calcHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let scrollValue = Math.round ((pos*100)/calcHeight);
    if (pos>100){
      scrollProgress.style.display="grid";
    }
    else{
      scrollProgress.style.display="none";
    }
    scrollProgress.addEventListener("click",()=>{
      document.documentElement.scrollTop =0;
    })
    scrollProgress.style.background=`conic-gradient(#6200b3 ${scrollValue}%,#290628 ${scrollValue}%)`;
  };
  window.onscroll=calcScrollValue;
  window.onload=calcScrollValue;
  </script>
</body>
</html>