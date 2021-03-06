<?php
session_start();
// Sécurisation de la page pour empêcher l'accès via une réécriture de l'url
if (!isset($_SESSION['pseudo']) AND !isset($_SESSION['password'])) {

    header('Location: ../views/login.php');

} elseif (isset($_COOKIES['pseudo']) AND isset($_COOKIES['password'])) {
	
	header('Location: ../controlers/adminControl.php');
}

?>
<header>
	<nav class="navbar fixed-top navbar-dark bg-primary">
		<div class="navbar-brand" id="content_header">
			<h1 class="font-weight-normal">Bienvenu à vous "<?php if(isset($_SESSION['pseudo'])){?><span class="text-capitalize font-italic font-weight-bold"><?= $_SESSION['pseudo'];} ?>"</span></h1>
			<a href="../controlers/admin_post.php" class="paragraph_header"><em>Allez directement dans votre espace rédaction</em></a>
			<a href="../controlers/logout.php" class="font-weight-light"><p id="paragraph_header_admin">Se déconnecter</p></a>
		</div>
	</nav>
</header>
	

