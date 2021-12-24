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

/* /Fail/fail.html.twig */
class __TwigTemplate_a8a02088264a39404d2b4bdd14d86b56d8592f85d9c71d1c5cffdef98158e2ac extends Template
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
        $this->parent = $this->loadTemplate("layout.html.twig", "/Fail/fail.html.twig", 1);
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
        echo "\tRéponse
";
    }

    // line 10
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "        <header>
            <nav class=\"navbar navbar-light bg-light\">
                <div class=\"container-fluid\">
                    <a class=\"navbar-brand\" href=\"/\"> <i class=\"fas fa-arrow-left\"></i> Retour a la page d'accueil</a>
                </div>
            </nav>
        </header>


    ";
        // line 20
        $this->displayBlock('content', $context, $blocks);
        // line 57
        echo "

";
    }

    // line 20
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
    <main>
        <p>
                ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄
                <br>
                ████▌▄▌▄▐▐▌█████
                <br>

                ████▌▄▌▄▐▐▌▀████
                <br>

                ▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀
        </p>
        <p>
                
                / '.        .--.
                <br>
                |   \\     .'-,  |
                <br>
                \\    \\___/    \\_/
                <br>
                '._.'   '._.'
                <br>
                    /  . .  \\
                    <br>
                    |=  Y  =|
                    <br>
                    \\   ^   /
                <br>
                    `'---'`<br>
        </p>

        
    </main>

    
    ";
    }

    public function getTemplateName()
    {
        return "/Fail/fail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 20,  84 => 57,  82 => 20,  71 => 11,  67 => 10,  62 => 7,  58 => 6,  53 => 3,  49 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/Fail/fail.html.twig", "C:\\xampp\\htdocs\\jeuDeLoieV2\\framework\\templates\\fail\\fail.html.twig");
    }
}
