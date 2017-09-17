<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<?php include 'application/views/includes/header.php';?>
</head>
<body>
	<?php include 'application/views/includes/nav.php';?>
	<div class="container">
     	<div class="row">
        	<div class="col-md-8">
        		<h1 class="my-4">JSON</h1>
	          	<form method="post" action="noticia/enviar" enctype="multipart/form-data" class="form-horizontal">
					<div class="row">
					  	<textarea class="form-control" rows="8" name="noticias" required><?php echo $noticias;?></textarea>
					</div>
					<div class="row" style="padding-top: 5px;">
						<button type="subimit" class="btn btn-primary" style="cursor:pointer;">Enviar</button>
					</div>
				</form>
	        </div>
	        <div class="col-md-4">
	        	<!-- Side Widget -->
		        <div class="card my-4">
		            <h5 class="card-header">Informações</h5>
		            <div class="card-body">
		              	Só poderá ir para a <i>listagem</i> das notícias se clicar em <b>enviar</b>.<br>
						Por padrão já vem carregado um JSON com 10 notícias e caso queira mudar, deve-se respeitar os atributos do JSON <i>“titulo, conteudo, autor, img, imgAlt, data”</i>.<br>
						A imagem deve estar em 750px por 300px.
		            </div>
		        </div>
	        </div>
	    </div>
	</div>
	<br>
	

<?php include 'application/views/includes/footer.php';?>
</body>
</html>