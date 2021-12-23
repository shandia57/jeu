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

/* layout.html.twig */
class __TwigTemplate_a3607a320572d47438313d3d018c68d3d7a4e07ca616935e66c1898e5729f699 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'bootstrap' => [$this, 'block_bootstrap'],
            'fontawesome' => [$this, 'block_fontawesome'],
            'css' => [$this, 'block_css'],
            'body' => [$this, 'block_body'],
            'content' => [$this, 'block_content'],
            'javascript' => [$this, 'block_javascript'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html.twig", "layout.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_bootstrap($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "\t";
        $this->displayParentBlock("bootstrap", $context, $blocks);
        echo "
";
    }

    // line 6
    public function block_fontawesome($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "\t";
        $this->displayParentBlock("fontawesome", $context, $blocks);
        echo "
";
    }

    // line 9
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "\t";
        $this->displayParentBlock("css", $context, $blocks);
        echo "
";
    }

    // line 14
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        echo "
\t<header>
\t\t<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
\t\t\t<div class=\"container-fluid\">
\t\t\t\t";
        // line 19
        if ( !($context["user"] ?? null)) {
            // line 20
            echo "\t\t\t\t\t<span class=\"navbar-brand\">
\t\t\t\t\t\t<b>User</b>
\t\t\t\t\t</span>
\t\t\t\t";
        } else {
            // line 24
            echo "\t\t\t\t\t<span class=\"navbar-brand\">
\t\t\t\t\t\t<b>Bonjour
\t\t\t\t\t\t\t";
            // line 26
            echo twig_escape_filter($this->env, ($context["user"] ?? null), "html", null, true);
            echo "</b>
\t\t\t\t\t</span>
\t\t\t\t";
        }
        // line 29
        echo "
\t\t\t\t<button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavAltMarkup\" aria-controls=\"navbarNavAltMarkup\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t\t</button>
\t\t\t\t<div class=\"collapse navbar-collapse\" id=\"navbarNavAltMarkup\">

\t\t\t\t\t<ul class=\"navbar-nav\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a class=\"nav-link active\" href=\"/\">Home</a>
\t\t\t\t\t\t</li>

\t\t\t\t\t\t";
        // line 40
        if ( !($context["user"] ?? null)) {
            // line 41
            echo "
\t\t\t\t\t\t\t";
        } else {
            // line 43
            echo "
\t\t\t\t\t\t\t\t";
            // line 44
            if ((($context["user_roles"] ?? null) == "ROLES_ADMIN")) {
                // line 45
                echo "\t\t\t\t\t\t\t\t\t<li class=\"nav-item position-relative marginRight\">
\t\t\t\t\t\t\t\t\t\t<a class=\"nav-link  \" href=\"/users\">Users
\t\t\t\t\t\t\t\t\t\t\t<span class=\"spanBadge badge rounded-pill bg-danger\">";
                // line 47
                echo twig_escape_filter($this->env, ($context["nbrUsers"] ?? null), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a class=\"nav-link  position-relative\" href=\"/questions\">Questions
\t\t\t\t\t\t\t\t\t\t\t<span class=\"spanBadge badge rounded-pill bg-danger\">";
                // line 52
                echo twig_escape_filter($this->env, ($context["nbrQuestions"] ?? null), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t";
            }
            // line 57
            echo "\t\t\t\t\t\t";
        }
        // line 58
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t";
        // line 60
        if ( !($context["user"] ?? null)) {
            // line 61
            echo "\t\t\t\t\t<div class=\"navbar-nav\">
\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link active\" aria-current=\"page\" href=\"subscribe\">S'inscrire</a>
\t\t\t\t\t\t</li>

\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link active\" href=\"#\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\">Connexion</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</div>
\t\t\t\t";
        } else {
            // line 71
            echo "\t\t\t\t\t";
            // line 72
            echo "
\t\t\t\t\t<form method=\"POST\">
\t\t\t\t\t\t<button id=\"logout\" type='button' class='btn btn-outline-danger' name=\"logout\">Deconnexion</button>
\t\t\t\t\t</form>

\t\t\t\t\t";
            // line 78
            echo "
\t\t\t\t";
        }
        // line 80
        echo "\t\t\t</div>
\t\t</nav>

\t</header>
    <input id=\"anyErrors\" value=\"";
        // line 84
        echo twig_escape_filter($this->env, ($context["anyErrors"] ?? null), "html", null, true);
        echo "\" type=\"hidden\"></input>


    ";
        // line 87
        $this->displayBlock('content', $context, $blocks);
        // line 88
        echo "        ";
        $this->displayBlock('javascript', $context, $blocks);
    }

    // line 87
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " ";
    }

    // line 88
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 89
        echo "            ";
        $this->displayParentBlock("javascript", $context, $blocks);
        echo "  
        ";
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 89,  216 => 88,  209 => 87,  204 => 88,  202 => 87,  196 => 84,  190 => 80,  186 => 78,  179 => 72,  177 => 71,  165 => 61,  163 => 60,  159 => 58,  156 => 57,  148 => 52,  140 => 47,  136 => 45,  134 => 44,  131 => 43,  127 => 41,  125 => 40,  112 => 29,  106 => 26,  102 => 24,  96 => 20,  94 => 19,  88 => 15,  84 => 14,  77 => 10,  73 => 9,  66 => 7,  62 => 6,  55 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layout.html.twig", "C:\\xampp\\htdocs\\jeuDeLoieV2\\framework\\templates\\layout.html.twig");
    }
}
