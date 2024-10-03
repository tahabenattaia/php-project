<?php
session_start();
include ("function.php");
$comm=getAllPanier ();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <title>SELENE</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap');
*{
    margin : 0;
    padding: 0;
    font-family: sans-serif;
}
:root {
  --accent-clr: #131313;
  --accent-dark: #fff;
  --accent-light: rgba(155, 155, 155, .1);
  --text: seashell;
}

.dark_mode {
  --accent-clr: #f2f2f2;
  --accent-dark: #fff;
  --accent-light: rgba(155, 155, 155, .1);
  --text: Black;
}

#page_wrapper {
  height: 100vh;
  display: grid;
  grid-template-columns: 260px 1fr;
  font-family: 'Lato', sans-serif;
  box-sizing: border-box;
  background-color: var(--accent-dark);
}

.sidenav {
  background-color: var(--accent-clr);
  height: 100vh;
  padding-inline: 8px;
  display: flex;
  flex-direction: column;
  position: relative;
  justify-content: space-between;
}

.sidenav_link {
  display: flex;
  align-items: center;
  padding: 10px;
  margin-bottom: 2px;
} 

.sidenav_link:hover {
  background-color: var(--accent-light);
  border-radius: 8px;
}

.sidenav_link.active {
  font-weight: 700;
  background-color: var(--accent-light);
  border-radius: 8px;
}

.sidenav_link i {
  color: var(--text);
}

.sidenav_link:hover > h3, 
.sidenav_link:hover i {
  color: var(--text);
}

.logo_section {
  height: 60px;
  margin-top: 16px;
  display: flex;
  align-items: center;
  margin-bottom: 48px;
  padding-inline: 14px;
}

.logo_section i {
  color: var(--text);
}

.logo_section h3 {
  font-weight: bold;
  font-size: 18px;
}

#nav_collapse_btn {
  position: absolute;
  top: 72px;
  left: 240px;
  transition: 250ms ease-out;
  background-color: var(--accent-dark);
  border-radius: 99px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 4px solid var(--accent-light);
  height: 40px;
  width: 40px;
  cursor: pointer;
}

#nav_collapse_btn > i {
  color: var(--text);
  font-size: 18px;
  margin-left: 8px;
}

.bx {
  font-size: 22px;
  margin-right: 8px;
}

h3 {
  color: var(--text);
  font-size: 16px;
  letter-spacing: .5px;
  font-weight:bold;
  margin:2px
}

a:hover {
  text-decoration:none;
}

a {
  text-decoration: none;
}

.bx-calendar {
  position: relative;
}

.external_link {
  border: none;
  background-color: transparent;
  position: absolute;
  left: 210px;
  top: 266px;
}

.sidenav_footer {
  margin-bottom: 12px;
}

main {
  padding-inline: 32px;
}

header {
  margin-top: 30px;
  display: flex;
  justify-content: space-between;
}

h2 {
  font-size: 42px;
  font-weight: bolder;
  margin-bottom: 12px;
  color: black;
}
h5 {
  font-size: 22px;
  font-weight:bolder;
  margin-bottom: 12px;
  color: var(--text);
}
p {
  line-height: 145%;
  letter-spacing: .25px;
  color: var(--text);
  margin-bottom: 32px;
}

#theme_switch {
  background-color: transparent;
  border: none;
  color: var(--text);
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  border-radius: 8px;
  padding: 4px;
}

#theme_switch:hover {
  background-color: var(--accent-light);
}

.bx-sun {
  color: var(--text);
  padding-left: 8px;
}

.chart_container {
  width: 90%;
  max-width: 600px;
  background-color: var(--accent-light);
  border-radius: 12px;
  padding: 30px;
  border: 1px solid var(--accent-light);
  box-shadow: 
    0px 5px 20px rgba(0, 0, 0, 0.1),
    0px 1px 5px rgba(0, 0, 0, 0.1);
}

.collapsed #sidenav {
  width: 48px;
  transition: 250ms ease-out;
}

.collapsed #nav_collapse_btn {
  left: 44px;
  transition: 250ms ease-out;
}

.collapsed .external_link {
  display: none;
}

.collapsed .sidenav_link {
  width: 22px;
}

.collapsed h3 {
  display: none;
}

#page_wrapper.collapsed {
  grid-template-columns: 68px 1fr;
  transition: 250ms ease-out;
}

</style>
<body>
<div id="page_wrapper">
  <div id="sidenav" class="sidenav">
    <div class="sidenav_header">
      <div class="logo_section">
        <i class='bx bxl-foursquare'></i>
        <h3>SELENE</h3>
      </div>
      <a href="liste_article.php" class="sidenav_link ">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48"><g fill="none" stroke="white" stroke-linejoin="round" stroke-width="4"><path d="M44 14L24 4L4 14v20l20 10l20-10V14Z"/><path stroke-linecap="round" d="m4 14l20 10m0 20V24m20-10L24 24M34 9L14 19"/></g></svg>
        <h3>&nbsp;Produits</h3>
      </a>
      
      <a href="liste_categorie.php" class="sidenav_link ">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32"><path fill="white" d="M14 25h14v2H14zm-6.83 1l-2.58 2.58L6 30l4-4l-4-4l-1.42 1.41L7.17 26zM14 15h14v2H14zm-6.83 1l-2.58 2.58L6 20l4-4l-4-4l-1.42 1.41L7.17 16zM14 5h14v2H14zM7.17 6L4.59 8.58L6 10l4-4l-4-4l-1.42 1.41L7.17 6z"/></svg>
        <h3>&nbsp;Catégories</h3>
      </a>
      
      <a href="liste_clients.php" class="sidenav_link">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" fill-rule="evenodd" d="M8 7a4 4 0 1 1 8 0a4 4 0 0 1-8 0Zm0 6a5 5 0 0 0-5 5a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3a5 5 0 0 0-5-5H8Z" clip-rule="evenodd"/></svg>
        <h3>&nbsp;Clients</h3>
      </a>
      
      <a href="liste_avis.php" class="sidenav_link ">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g id="feNoticeActive0" fill="none" fill-rule="evenodd" stroke="none" stroke-width="1"><g id="feNoticeActive1" fill="white"><path id="feNoticeActive2" d="M15.085 4.853a2.501 2.501 0 1 1 2.572 3.142A5.99 5.99 0 0 1 18 10v6h1c.55 0 1 .45 1 1s-.45 1-1 1h-4v1a3 3 0 0 1-6 0v-1H5c-.55 0-1-.45-1-1s.45-1 1-1h1v-6a6.002 6.002 0 0 1 5-5.917V3a1 1 0 0 1 2 0v1.083a5.961 5.961 0 0 1 2.085.77ZM12 20a1 1 0 0 0 1-1v-1h-2v1a1 1 0 0 0 1 1Zm-4-4h8v-6a4 4 0 1 0-8 0v6Z"/></g></g></svg>
        <h3>&nbsp; Avis</h3>
        <button disabled class="external_link">
          <i class='bx bx-link-external' ></i>
        </button> 
      </a>

      <a href="liste_commande.php" class="sidenav_link active">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M12.005 2a6 6 0 0 1 6 6v1h4v2h-1.167l-.757 9.083a1 1 0 0 1-.996.917H4.925a1 1 0 0 1-.997-.917L3.171 11H2.005V9h4V8a6 6 0 0 1 6-6Zm6.826 9H5.178l.667 8h12.319l.667-8Zm-5.826 2v4h-2v-4h2Zm-4 0v4h-2v-4h2Zm8 0v4h-2v-4h2Zm-5-9A4 4 0 0 0 8.01 7.8l-.005.2v1h8V8a4 4 0 0 0-3.8-3.995l-.2-.005Z"/></svg>
        <h3>&nbsp;Paniers</h3>
        <button disabled class="external_link">
          <i class='bx bx-link-external' ></i>
        </button> 
      </a>
       <a href="landing page.php" class="sidenav_link">
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none"><path stroke="white" stroke-width="2.5" d="M21 12a8.958 8.958 0 0 1-1.526 5.016A8.991 8.991 0 0 1 12 21a8.991 8.991 0 0 1-7.474-3.984A9 9 0 1 1 21 12Z"/><path fill="white" d="M12.75 9a.75.75 0 0 1-.75.75v2.5A3.25 3.25 0 0 0 15.25 9h-2.5Zm-.75.75a.75.75 0 0 1-.75-.75h-2.5A3.25 3.25 0 0 0 12 12.25v-2.5ZM11.25 9a.75.75 0 0 1 .75-.75v-2.5A3.25 3.25 0 0 0 8.75 9h2.5Zm.75-.75a.75.75 0 0 1 .75.75h2.5A3.25 3.25 0 0 0 12 5.75v2.5Zm-6.834 9.606L3.968 17.5l-.195.653l.444.517l.949-.814Zm13.668 0l.949.814l.444-.517l-.195-.653l-1.198.356ZM9 16.25h6v-2.5H9v2.5Zm0-2.5a5.252 5.252 0 0 0-5.032 3.75l2.396.713A2.752 2.752 0 0 1 9 16.25v-2.5Zm3 6a7.73 7.73 0 0 1-5.885-2.707L4.217 18.67A10.23 10.23 0 0 0 12 22.25v-2.5Zm3-3.5c1.244 0 2.298.827 2.636 1.963l2.396-.713A5.252 5.252 0 0 0 15 13.75v2.5Zm2.885.793A7.73 7.73 0 0 1 12 19.75v2.5a10.23 10.23 0 0 0 7.783-3.58l-1.898-1.627Z"/></g></svg>
        <h3>&nbsp; Profile</h3>
        <button disabled class="external_link">
          <i class='bx bx-link-external' ></i>
        </button> 
      </a>
    </div>
    <a href="logout.php" class="sidenav_link ">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
        <h3>&nbsp; Déconnexion</h3>
        <button disabled class="external_link">
          <i class='bx bx-link-external' ></i>
        </button> 
      </a>
    </div>
      <button id="nav_collapse_btn">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="black" d="m12 16l1.4-1.4l-1.6-1.6H16v-2h-4.2l1.6-1.6L12 8l-4 4l4 4Zm0 6q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20Zm0-8Z"/></svg>
      </button>
       <main>
    <header>
      <div class="text">
        <h2>Liste des paniers</h2> 
      </div>
      
        
    </header>
    <div>
        <table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">CLIENT</th>
      <th scope="col">TOTAL</th>
      <th scope="col">DATE</th>
      <th scope="col">ETAT</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach ($comm as $c)
    echo ('<tr>'.
      '<th scope="row">'.$c["id"].'</th>'.
      '<td>'.$c["nom"]." ".$c["prenom"].'</td>'.
      '<td>'.$c["total"].' DT</td>'.
      '<td>'.$c["date_creation"].'</td>'.
      '<td>'.$c["etat"].'</td>'.
      '<td>.<a href="detail_commande.php?idc='.$c["id"].'"title="afficher les commandes"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32"><path fill="black" d="M19 21h-6a3 3 0 0 0-3 3v2h2v-2a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2h2v-2a3 3 0 0 0-3-3zm-3-1a4 4 0 1 0-4-4a4 4 0 0 0 4 4zm0-6a2 2 0 1 1-2 2a2 2 0 0 1 2-2z"/><path fill="black" d="M25 5h-3V4a2 2 0 0 0-2-2h-8a2 2 0 0 0-2 2v1H7a2 2 0 0 0-2 2v21a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2ZM12 4h8v4h-8Zm13 24H7V7h3v3h12V7h3Z"/></svg></a>
      <a onclick="return popup()" href="traiter.php?idc='.$c["id"].'" title="traiter"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="black" fill-rule="evenodd" d="M1 3a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v5h4a5 5 0 0 1 5 5v4a3.001 3.001 0 0 1-2.129 2.872a3 3 0 0 1-5.7.128H8.83a3 3 0 0 1-5.7-.128A3.001 3.001 0 0 1 1 17v-4h6a1 1 0 1 0 0-2H1V9h4a1 1 0 0 0 0-2H1V3Zm13 15h1.171a3 3 0 0 1 5.536-.293A.997.997 0 0 0 21 17v-4a3 3 0 0 0-3-3h-4v8Zm-7 1a1 1 0 1 0-2 0a1 1 0 0 0 2 0Zm10.293-.707A.994.994 0 0 0 17 19a1 1 0 1 0 .293-.707Z" clip-rule="evenodd"/></svg></a>
    </td>
    </tr>');
    ?>
  </tbody>
</table>
</div>
  </main>
    </div>
</div>
<script>
  let wholePage = document.getElementById('page_wrapper');
let btn = document.getElementById('nav_collapse_btn');


btn.addEventListener('click', collapse);

function collapse() {
  wholePage.classList.toggle('collapsed');
  if(wholePage.classList.contains('collapsed')){
    btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="black" d="m12 16l4-4l-4-4l-1.4 1.4l1.6 1.6H8v2h4.2l-1.6 1.6L12 16Zm0 6q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20Zm0-8Z"/></svg>'; 
  } else {
    btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="black" d="m12 16l1.4-1.4l-1.6-1.6H16v-2h-4.2l1.6-1.6L12 8l-4 4l4 4Zm0 6q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20Zm0-8Z"/></svg>'; 
  } 
}
  </script>
  
</body>
</html>