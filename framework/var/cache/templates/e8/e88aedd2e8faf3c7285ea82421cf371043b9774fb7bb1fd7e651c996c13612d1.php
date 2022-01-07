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
    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/style/homePage.css\">
";
    }

    // line 13
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        echo "\t<main>

\t\t<h1>Bienvenue sur la page d'accueil</h1>

\t\t";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["singleUser"]) {
            // line 19
            echo "\t\t<input type=\"hidden\" name=\"users\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["singleUser"], "username", [], "any", false, false, false, 19), "html", null, true);
            echo "\">
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['singleUser'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "
\t\t";
        // line 22
        if ( !($context["user"] ?? null)) {
            // line 23
            echo "\t\t\t<p>Veuillez vous connecter ou vous inscrire pour démarrer une partie</p>
\t\t";
        } else {
            // line 25
            echo "\t\t\t<div class=\"mb-3\">
\t\t\t\t<label for=\"exampleInputEmail1\" class=\"form-label\">Username</label>
\t\t\t\t<div id=\"selectUserAndColor\">
\t\t\t\t\t<div>
\t\t\t\t\t\t<input id=\"searchUser\" class=\"form-control\" type=\"text\" autocomplete=\"off\" >
\t\t\t\t\t</div>
\t\t\t\t\t<div>
\t\t\t\t\t\t<select id=\"selectColor\" class=\"form-select\" aria-label=\"Default select example\">
\t\t\t\t\t\t\t<option value=\"default\">Choisir une couleur</option>
\t\t\t\t\t\t\t<option id=\"red\" value=\"red\" style=\"background-color: red\"></option>
\t\t\t\t\t\t\t<option id=\"blue\" value=\"blue\" style=\"background-color: blue\"></option>
\t\t\t\t\t\t\t<option id=\"gren\" value=\"green\" style=\"background-color: green\"></option>
\t\t\t\t\t\t\t<option id=\"yellow\" value=\"yellow\" style=\"background-color: yellow\"></option>
\t\t\t\t\t\t\t<option id=\"orange\" value=\"orange\" style=\"background-color: orange\"></option>
\t\t\t\t\t\t\t<option id=\"pink\" value=\"pink\" style=\"background-color: pink\"></option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t\t<div>
\t\t\t\t\t\t<button id=\"addUser\" type=\"button\" class=\"btn btn-outline-success\">Ajouter cet utilisateur</button>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<ul id=\"userList\" class=\"list-group list-group-flush\">
\t\t\t\t</ul>
\t\t\t</div>

\t\t\t<ul id=\"listPlayers\">
\t\t\t</ul>

\t\t\t<form method=\"post\" action=\"/game?player=GameMaster\">
\t\t\t\t<div id=\"usersHidden\"></div>
\t\t\t\t<button id=\"createTheGame\" class=\"glow-on-hover\" type=\"button\">Créer une partie</button>
\t\t\t</form>
\t\t";
        }
        // line 58
        echo "

\t</main>

        
    ";
        // line 64
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
\t\t<script type=\"text/javascript\" src=\"assets/script/scripts/homePage.js\"></script>\t
\t
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
        return array (  144 => 64,  137 => 58,  102 => 25,  98 => 23,  96 => 22,  93 => 21,  84 => 19,  80 => 18,  74 => 14,  70 => 13,  61 => 8,  57 => 7,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/home.html.twig", "C:\\wamp64\\www\\jeuDeLoieV2\\framework\\templates\\home.html.twig");
    }
}
