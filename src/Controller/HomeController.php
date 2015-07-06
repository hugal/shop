<?php 

namespace TroisWA\Shop\Controller;

use Symfony\Component\HttpFoundation\Request;

class HomeController{

    private $request;
	private $view;

    /**
     * @param $request Request
     * @param $view \Twig_Environment
     */
	public function __construct($request, $view){
		$this->request = $request;
        $this->view = $view;
	}

	public function indexAction(){
		return $this->view->render("index.twig", ["name" => $this->request->get('name', 'Johnny')]);
	}
}