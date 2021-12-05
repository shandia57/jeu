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

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'bootstrap' => [$this, 'block_bootstrap'],
            'fontawesome' => [$this, 'block_fontawesome'],
            'css' => [$this, 'block_css'],
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>
    ";
        // line 5
        $this->displayBlock('head', $context, $blocks);
        // line 10
        echo " 
    <!-- BOOTSTRAP  -->
    ";
        // line 12
        $this->displayBlock('bootstrap', $context, $blocks);
        // line 24
        echo "


    <!-- Font Awesome  -->
    ";
        // line 28
        $this->displayBlock('fontawesome', $context, $blocks);
        // line 31
        echo "
    <!-- script CSS -->
    ";
        // line 33
        $this->displayBlock('css', $context, $blocks);
        // line 36
        echo "

    <title>
    ";
        // line 39
        $this->displayBlock('title', $context, $blocks);
        // line 40
        echo "    </title>

</head>

<body>
    ";
        // line 45
        $this->displayBlock('body', $context, $blocks);
        // line 65
        echo "</body>

</html>";
    }

    // line 5
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    ";
    }

    // line 12
    public function block_bootstrap($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        echo "    <!-- CSS -->
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\"
        integrity=\"sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC\" crossorigin=\"anonymous\">
    <!-- JS -->
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js\"
        integrity=\"sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM\"
        crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js\"
        integrity=\"sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM\"
        crossorigin=\"anonymous\"></script>
    ";
    }

    // line 28
    public function block_fontawesome($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "    <script src=\"https://kit.fontawesome.com/4ad0f6d59d.js\" crossorigin=\"anonymous\"></script>
    ";
    }

    // line 33
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../assets/style/style.css\">
    ";
    }

    // line 39
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "test";
    }

    // line 45
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 46
        echo "        ";
        $this->displayBlock('main', $context, $blocks);
        // line 63
        echo "
    ";
    }

    // line 46
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 47
        echo "            <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
                <div class=\"container-fluid\">
                    <a class=\"navbar-brand\" href=\"#\">Admin toolbar</a>
                    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavAltMarkup\" aria-controls=\"navbarNavAltMarkup\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                    </button>
                    <div class=\"collapse navbar-collapse\" id=\"navbarNavAltMarkup\">
                    <div class=\"navbar-nav\">
                        <a class=\"nav-link \" aria-current=\"page\" href=\"#\">Home</a>
                        <a class=\"nav-link\" href=\"/users\">Users</a>
                        <a class=\"nav-link\" href=\"/questions\">Questions</a>
                    </div>
                    </div>
                </div>
            </nav>
        ";
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  164 => 47,  160 => 46,  155 => 63,  152 => 46,  148 => 45,  141 => 39,  136 => 34,  132 => 33,  127 => 29,  123 => 28,  109 => 13,  105 => 12,  98 => 6,  94 => 5,  88 => 65,  86 => 45,  79 => 40,  77 => 39,  72 => 36,  70 => 33,  66 => 31,  64 => 28,  58 => 24,  56 => 12,  52 => 10,  50 => 5,  44 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layout.html.twig", "C:\\xampp\\htdocs\\jeuDeLoieV2\\framework\\templates\\layout.html.twig");
    }
}
