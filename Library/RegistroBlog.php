<?php

class RegistroBlog {

    protected $blogBd;
    protected $blog;
    protected $codigoUsuario;
    protected $tags;

    function __construct($vars = array()) {
        extract($vars);

        $this->blogBd = new BlogBd();
        $this->blog = new Blog();
        $this->blog->NewBlog($titulo,$codigoUsuario, $link, $autor, $descripcion,$categoria,$img);
        $this->codigoUsuario = $_SESSION["usuario"];
        $this->tags = $tags;
    }

    public function getBlogBd() {
        return $this->blogBd;
    }

    public function getBlog() {
        return $this->blog;
    }

    public function getCodigoUsuario() {
        return $this->codigoUsuario;
    }

    public function getTags() {
        return $this->tags;
    }

    function execute() {
        $blogBd = $this->getBlogBd();
        $blog = $this->getBlog();
        $codigoUsuario = $this->getCodigoUsuario();
        $tags = $this->getTags();


        if ($blogBd->insertarBlog($blog)) {
            if ($blogBd->insertarTagsBlog($tags, $blog->getCodigo())) {
                AlertAction::create("success", "Exito", "Tu Blog ha sido introducido!");
                $view = new View("registroBlogView");
                $view->execute();
            } else {
                AlertAction::create("warning", "Error", "Los tags no se han introducido correctamente");
                $view = new View("registroBlogView");
                $view->execute();
            }
        } else {
            AlertAction::create("danger", "Error", "Blog no introducido");
            $view = new View("registroBlogView");
            $view->execute();
        }
    }

}
