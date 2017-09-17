<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia extends CI_Controller {

	public function index() {
		$noticias = array();
		
		for ($i=1; $i < 11; $i++) { 
			$noticia = new stdClass();
			$noticia->titulo = $i." - Lorem ipsum dolor sit amet";
			$noticia->conteudo = $i." - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ultrices justo et velit tristique, vulputate lacinia purus iaculis. Aenean tempus urna eu elit cursus molestie. Sed feugiat lectus purus, in placerat lorem volutpat in. Nam interdum, ex eu dictum scelerisque, orci lorem convallis eros, nec pretium neque ipsum vitae justo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse pulvinar sapien eget vehicula posuere. Etiam semper sit amet nisi vitae iaculis. Integer interdum metus quis mauris aliquet interdum non sit amet nibh. Maecenas tristique purus sed luctus sodales.";
			$noticia->autor = "Lorem Ipsum";
			$noticia->img = base_url()."assets/img/750x300.png";
			$noticia->imgAlt = "Card image cap";
			$interval = "- ".$i." days";
			$noticia->data = date('d/m/Y', strtotime($interval));
			array_push($noticias, $noticia);
		}
		
		$data['title'] = "Cadastrar Notícias";
		$data['noticias'] = json_encode($noticias);
		//para o menu
		$data['inicio'] = "active";
		$data['lista'] = "";
		$this->load->view('noticia/form', $data);
	}

	public function enviar() {
		$noticiasJson = $_POST['noticias'];
		//caso não venha dados no post
		if (empty($noticiasJson)) {
			redirect(base_url(), 'refresh');
		} else {
			$data['title'] = "Notícias";
			$data['noticias'] = $noticiasJson;
			//para o menu
			$data['inicio'] = "";
			$data['lista'] = "active";
			$this->load->view('noticia/list', $data);	
		}	
	}
}
