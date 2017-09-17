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
	          <h1 class="my-4">Notícias em destaque</h1>

	          <div id="myDiv">
	          </div>

	          <!-- Paginacao -->
	          <ul class="pagination justify-content-center mb-4">
	            <li id="anterior" class="page-item" style="cursor:pointer;">
	              <a class="page-link" onclick="anterior()">&larr; Anterior</a>
	            </li>
	            <li id="proxima" class="page-item" style="cursor:pointer;">
	              <a class="page-link" onclick="proxima()">Próxima &rarr;</a>
	            </li>
	          </ul>
	        </div>
	        <div class="col-md-4">
	        	<!-- Side Widget -->
		        <div class="card my-4">
		            <h5 class="card-header">Informações</h5>
		            <div class="card-body">
		              	As notícias foram carregadas com base no JSON da tela anterior.<br>
						A paginação é feita via JavaScript.<br>
						Se quiser refazer o processo, só clicar em <i>Início</i> ou <i>Notícias</i>, ambos na barra de <i>menu</i>.
		            </div>
		        </div>
	        </div>
	    </div>
	</div>

	<!--
	<div class="container">
      	<div class="row">
      		<a class="btn btn-primary" href="<?php echo base_url();?>">Voltar</a>
    	</div>
    </div>
    -->

<?php include 'application/views/includes/footer.php';?>

<script type="text/javascript">
	var noticias = JSON.parse('<?php echo $noticias;?>');
	var totalPag = Math.ceil(noticias.length / 3);
	var pagAtual = 0;
	var html;

	$( document ).ready(function() {
		$("#anterior").addClass("disabled");

		var end = 3;
		if (end > noticias.length) {
			end = noticias.length;
			$("#proxima").addClass("disabled");
		}

	   	html = "";
	   	for (var i = 0 ; i < end; i++) {
	   		html += "<div class='card mb-4'>"+
	   			"<img class='card-img-top' src='"+noticias[i].img+"' alt='"+noticias[i].imgAlt+"'>"+
	            "<div class='card-body'>"+
	              "<h2 class='card-title'>"+noticias[i].titulo+"</h2>"+
	              "<p class='card-text'>"+noticias[i].conteudo+"</p>"+
	            "</div>"+
	            "<div class='card-footer text-muted'>"+
	              "Postada em "+noticias[i].data+", por "+noticias[i].autor+
	            "</div>"+
	          "</div>";
	   	}
	   	$("#myDiv").html(html);
	});

	function proxima() {
		$("#anterior").removeClass("disabled");
		pagAtual++;
		var start = pagAtual * 3;
		var end = start+3;
		if (end > noticias.length) {
			end = noticias.length;
			$("#proxima").addClass("disabled");
		}
		
		html = "";
		for (var i =  start; i < end; i++) {
			html += "<div class='card mb-4'>"+
				"<img class='card-img-top' src='"+noticias[i].img+"' alt='"+noticias[i].imgAlt+"'>"+
	            "<div class='card-body'>"+
	              "<h2 class='card-title'>"+noticias[i].titulo+"</h2>"+
	              "<p class='card-text'>"+noticias[i].conteudo+"</p>"+
	            "</div>"+
	            "<div class='card-footer text-muted'>"+
	              "Postada em "+noticias[i].data+", por "+noticias[i].autor+
	            "</div>"+
	          "</div>";
		}
		$("#myDiv").html(html);
		$("#topo")[0].click();
	}

	function anterior() {
		pagAtual--;

		$("#proxima").removeClass("disabled");
		if (!pagAtual) {
			$("#anterior").addClass("disabled");
		}

		var start = pagAtual * 3;
		var end = start+3;
		if (end > noticias.length) {
			end = noticias.length;
		}

		html = "";
		for (var i =  start; i < end; i++) {
			html += "<div class='card mb-4'>"+
				"<img class='card-img-top' src='"+noticias[i].img+"' alt='"+noticias[i].imgAlt+"'>"+
	            "<div class='card-body'>"+
	              "<h2 class='card-title'>"+noticias[i].titulo+"</h2>"+
	              "<p class='card-text'>"+noticias[i].conteudo+"</p>"+
	            "</div>"+
	            "<div class='card-footer text-muted'>"+
	              "Postada em "+noticias[i].data+", por "+noticias[i].autor+
	            "</div>"+
	          "</div>";
		}
		$("#myDiv").html(html);
		$("#topo")[0].click();
	}

</script>
</body>
</html>