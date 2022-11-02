<?php
namespace App;

use Twig as TemplateEngine;

class Template{

    public array $templateAssignArrayItems = [];
    public TemplateEngine\Environment $view;

    public function __construct(){

        $loader     = new TemplateEngine\Loader\FilesystemLoader(__DIR__.'/../views');
        $this->view = new TemplateEngine\Environment($loader, [
            //"cache" => __DIR__ . "/../../views/cache"
        ]);

    }

    public function render(string $templateFile){

        try{
            echo $this->view->render($templateFile . ".twig", $this->templateAssignArrayItems);
        }catch (\ErrorException $e){
            echo $e->getMessage();
        }

    }

    public function assign(array $items){

        foreach ($items as $key => $value){
            $this->templateAssignArrayItems[$key] = $value;
        }

    }

}
