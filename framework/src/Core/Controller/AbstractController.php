<?php

namespace Framework\Controller;

use Framework\Templating\Twig;
session_start();

abstract class AbstractController
{
    public function render(string $template, array $args = []): string
    {
        $twig = new Twig();

        return $twig->render($template, $args);
    }
    public function isPost():bool
    {
        return strtoupper($_SERVER['REQUEST_METHOD])']) === $_POST;
    }
    public function redirect(string $url):void{
        header('location'.$url) ;
        exit();
    }
    public function isAdmin(): bool
    {
        if(isset($_SESSION['user']) && $_SESSION['user']['roles'] === "ROLES_ADMIN" ){
            return true;
        }else{
            header("Location: /");
            return false;
        }
        
    }
    public function logout(): void
    {
        session_destroy();
        header("Location: /");
    }
}
