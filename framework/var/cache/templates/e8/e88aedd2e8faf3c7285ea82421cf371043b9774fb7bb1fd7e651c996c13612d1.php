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

/* /home.html.twig */
class __TwigTemplate_b5fae4b6e10f58aa593c8d6745f08bd18f78651b552ce63d5068ef502e43d514 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'css' => [$this, 'block_css'],
            'content' => [$this, 'block_content'],
            'javascript' => [$this, 'block_javascript'],
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
        $this->parent = $this->loadTemplate("layout.html.twig", "/home.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "\tHome page
";
    }

    // line 7
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    ";
        $this->displayParentBlock("css", $context, $blocks);
        echo "  
    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/style/buttonCreateGame.css\">
";
    }

    // line 12
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        echo "\t<main>

\t\t<h1>Bienvenue sur la page d'accueil</h1>

\t\t";
        // line 17
        if ( !($context["user"] ?? null)) {
            // line 18
            echo "\t\t\t<p>Veuillez vous connecter ou vous inscrire pour démarrer une partie</p>
\t\t";
        } else {
            // line 20
            echo "\t\t\t<button class=\"glow-on-hover\" type=\"button\">Créer une partie</button>
\t\t";
        }
        // line 22
        echo "

\t\t<div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 id=\"questionGame\" class=\"modal-title\">Question</h5>
                </div>
                <div class=\"modal-body\">
                    <div id=\"containerModal\" class=\"container\"></div>
                </div>

            </div>
        </div>

\t</main>

        
    ";
        // line 40
        echo "\t<div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
\t\t<div class=\"modal-dialog\">
\t\t\t<div class=\"modal-content\">
\t\t\t\t<div class=\"modal-header\">
\t\t\t\t\t<h5 class=\"modal-title\" id=\"exampleModalLabel\">Connexion</h5>
\t\t\t\t\t<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
\t\t\t\t</div>
\t\t\t\t<div class=\"modal-body\">
\t\t\t\t\t<form method=\"post\">
\t\t\t\t\t\t<div class=\"mb-3\">
\t\t\t\t\t\t\t<label class=\"form-label\">Username</label>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control \" name=\"username\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"mb-3\">
\t\t\t\t\t\t\t<label class=\"form-label\">Mot de passe</label>
\t\t\t\t\t\t\t<input type=\"password\" class=\"form-control\" name=\"password\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"mb-3 form-check\">
\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"form-check-input\" id=\"exampleCheck1\" name=\"checkbox\">
\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"exampleCheck1\">Rester connecté</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"modal-footer\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-outline-secondary\" data-bs-dismiss=\"modal\">Fermer</button>
\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-outline-info\" name=\"connect\">Connexion</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</form>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
";
    }

    // line 72
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 73
        echo "
    ";
        // line 74
        $this->displayParentBlock("javascript", $context, $blocks);
        echo "  
\t<script type=\"module\" src=\"assets/script/modules/Game/game.js\"></script>

";
    }

    public function getTemplateName()
    {
        return "/home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 74,  147 => 73,  143 => 72,  109 => 40,  90 => 22,  86 => 20,  82 => 18,  80 => 17,  74 => 13,  70 => 12,  62 => 8,  58 => 7,  53 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/home.html.twig", "C:\\wamp64\\www\\jeuDeLoieV2\\framework\\templates\\home.html.twig");
    }
}
