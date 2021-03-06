<!DOCTYPE HTML>
<html lang='fr'>
	<head>
		<?php include ('../views/inc/head_html.php'); ?>
	</head>
	<body>
		<div class="container-fluid">
<!-- Ici le header --> 
			<?php include '../views/inc/header_user_comments.php'; ?> 

			<div class="container">	
				<div class="row">
					<div class="col-xs-7 col-lg-7">
						<div class="card ">
							<div class="card-header">
								<h5 class="card-title">
									<?php
									/**
									 * Affichage du billet
									*/
									$postBilletId = htmlspecialchars($_GET['id']);
									$billetUserComments = $bookManager->read($postBilletId);
									echo '<strong>'.htmlspecialchars($billetUserComments['title']).'</strong><em>, billet créé le '.htmlspecialchars($billetUserComments['date_billet']).'<br></em>'.htmlspecialchars($billetUserComments['billet']); 
									
									?>
								</h5>
							</div>
							<div class="card-body">
								<?php
								/**
								 * Affichage des commentaires 
								 */
								
								$postId = htmlspecialchars($_GET['id']);
								$_POST['book_id'] = $postId;
																
								foreach($commentarysManager->readAll() as $donnees):
									if ($donnees['book_id'] == $postId) {
										if ($postId == $donnees['book_id']) {?>
											<p><strong><?= htmlspecialchars($donnees['name_user']) ?>,</strong><em> a commenté(e) le <?= htmlspecialchars($donnees['date_commentary']) ?> :</em></p><p><?= htmlspecialchars($donnees['commentary']) ?></p><?php if($donnees['signaled'] == 0){?><a class="btn btn-outline-danger" name ="btnSignaled" role="button" href="../controlers/user_comments_post.php?id=<?= $postId ?>&amp;id_commentary=<?= $donnees['id'] ?>&amp;signaled=<?= $donnees['signaled'] ?>"><em>Signaler ce commentaire</em></a> <?php } ?>
										<?php }
										
									}
								endforeach;
								
								?>
							</div>
						</div>
	<!-- Formulaire de création de nouveaux commentaires  -->						
					</div>
					<div class="col-xs-5 col-lg-5">
						<h3>Création d'un nouveau commentaire:</h3>
						<form action="../controlers/user_comments_post.php" method="post">
							<div class="form-group">
								<?php
								echo $formUser->labelUser('Tapez ici votre nom :');
								echo $formUser->inputName('name_user');
								?>
							</div>
							<div class="form-group">
								<?php
								echo $formUser->labelUser('Ecrivez ici votre commentaire :');
								echo $formUser->inputCommentary('commentary');
								echo $formUser->inputBookId('book_id');
								?>
							</div>
							<div>
								<div>
									<?php
									echo $formUser->erase();
									?>
									<?php
									echo $formUser->submit();
									?>
								</div>
							</div>
						</form>
					</div>
				</div>	

			</div>

		</div>
	</body>
</html>