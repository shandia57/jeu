<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* Subscribe/subscribe.html.twig */
class __TwigTemplate_f9d98189deee3f1c1c982a821d1f4c5fc7bc4b1f2a5bd38e3a6f78b4650e5318 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'css' => [$this, 'block_css'],
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.html.twig", "Subscribe/subscribe.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../assets/style/style.css\">
";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "\tInscription
";
    }

    // line 10
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "    <header>
        <nav class=\"navbar navbar-light bg-light\">
            <div class=\"container-fluid\">
                <a class=\"navbar-brand\" href=\"/\"> <i class=\"fas fa-arrow-left\"></i> Home</a>
            </div>
        </nav>
    </header> 



    ";
        // line 21
        $this->displayBlock('content', $context, $blocks);
        // line 74
        echo "

";
    }

    // line 21
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
        <main>
    
            <h1>Formulaire d'inscription</h1>

            <div id=\"containerForm\">
                <form  method=\"post\" name=\"formulaire\">
                    <div class=\"mb-3\">
                        <label for=\"exampleInputEmail1\" class=\"form-label\">Username</label>
                        <input type=\"text\" class=\"form-control textAligneCenter\" aria-describedby=\"emailHelp\" name=\"username\" maxlength=\"100\" required>

                        <div class=\"invalid-feedback\" style=\"display: block\">";
        // line 32
        echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
        echo "</div>
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"exampleInputEmail1\" class=\"form-label\">Mot de passe</label>
                        <input type=\"password\" class=\"form-control textAligneCenter\" aria-describedby=\"emailHelp\" name=\"password\" maxlength=\"100\" required>
                        <div class=\"form-text\">";
        // line 38
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 38), "html", null, true);
        echo "</div>
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"exampleInputEmail1\" class=\"form-label\">Confirmation du mot de passe</label>
                        <input type=\"password\" class=\"form-control textAligneCenter\" aria-describedby=\"emailHelp\" name=\"passwordConfirm\" maxlength=\"100\" required>
                        <div class=\"invalid-feedback\" style=\"display: block\">";
        // line 44
        echo twig_escape_filter($this->env, ($context["passwordConfirm"] ?? null), "html", null, true);
        echo "</div>
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"exampleInputEmail1\" class=\"form-label\">Nom</label>
                        <input type=\"text\" class=\"form-control textAligneCenter\" aria-describedby=\"emailHelp\" name=\"lastName\" maxlength=\"100\" required>
                        <div class=\"form-text\">";
        // line 50
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "lastName", [], "any", false, false, false, 50), "html", null, true);
        echo "</div>
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"exampleInputEmail1\" class=\"form-label\">Prénom</label>
                        <input type=\"text\" class=\"form-control textAligneCenter\" aria-describedby=\"emailHelp\" name=\"firstName\" maxlength=\"100\" required>
                        <div class=\"form-text\">";
        // line 56
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "firstName", [], "any", false, false, false, 56), "html", null, true);
        echo "</div>
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"exampleInputEmail1\" class=\"form-label\">Adresse mail</label>
                        <input type=\"email\" class=\"form-control textAligneCenter\" aria-describedby=\"emailHelp\" name=\"mail\" maxlength=\"100\" required>
                        <div class=\"form-text\">";
        // line 62
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "mail", [], "any", false, false, false, 62), "html", null, true);
        echo "</div>
                    </div>

                    <button type=\"submit\" href=\"connecToGame\" class=\"btn btn-outline-success\">Inscription</button>
                </form>
            </div>


    
        </main>
    
    ";
    }

    public function getTemplateName()
    {
        return "Subscribe/subscribe.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 62,  143 => 56,  134 => 50,  125 => 44,  116 => 38,  107 => 32,  91 => 21,  85 => 74,  83 => 21,  71 => 11,  67 => 10,  62 => 7,  58 => 6,  53 => 3,  49 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Subscribe/subscribe.html.twig", "C:\\xampp\\htdocs\\jeuDeLoieV2\\framework\\templates\\Subscribe\\subscribe.html.twig");
    }
}
