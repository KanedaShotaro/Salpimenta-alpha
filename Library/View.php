<?php

class View {

    protected $template;
    protected $vars;
    protected $layoutDefualt = "layoutView";
    protected $layoutEmpty = "layoutEmptyView";

    public function __construct($template, $vars = array()) {
        $this->template = $template;
        $this->vars = $vars;
    }

    public function getTemplate() {
        return $this->template;
    }

    public function getVars() {
        return $this->vars;
    }

    public function getLayoudDefualt() {
        return $this->layoutDefualt;
    }

    public function setLayoudDefualt($layoutDefualt) {
        $this->layoutDefualt = $layoutDefualt;
    }

    public function getTemplateFileName() {

        if ($this->getTemplate() == 'registroUsuarioView') {
            $this->setLayoudDefualt($this->layoutEmpty);
            return '/var/www/Salpimenta-backend/View/' . $this->getTemplate() . '.php';
        } else {
            return '/var/www/Salpimenta-backend/View/' . $this->getTemplate() . '.php';
        }
    }

    public function execute() {
        $template = $this->getTemplateFileName();
        $vars = $this->getVars();
        $layoutDefault = $this->getLayoudDefualt();

        call_user_func(function () use ($template, $vars, $layoutDefault) {
            extract($vars);

//            if (isset($vars["zona"])) {
//                $mandarGetZona = '?&zona=' . $zona . '';
//            } else {
//                $mandarGetZona = "";
//            }  
            
            ob_start();
            include $template;
            $tpl_content = ob_get_clean();
            ob_start();
            require '/var/www/Salpimenta-backend/View/alertsView.php';
            $alerts_content = ob_get_clean();
            ob_start();
            require '/var/www/Salpimenta-backend/View/menuView.php';
            $menu_content = ob_get_clean();
            require '/var/www/Salpimenta-backend/View/' . $layoutDefault . '.php';
        });
    }

}
