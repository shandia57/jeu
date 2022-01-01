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

/* base.html.twig */
class __TwigTemplate_e970e87fee3645135d50ac62ae7d2cc63a0456965234eebdbc85d9a0f4dfe325 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'bootstrap' => [$this, 'block_bootstrap'],
            'fontawesome' => [$this, 'block_fontawesome'],
            'css' => [$this, 'block_css'],
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'javascript' => [$this, 'block_javascript'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>

    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

 
    <!-- BOOTSTRAP  -->
    ";
        // line 12
        $this->displayBlock('bootstrap', $context, $blocks);
        // line 25
        echo "


    <!-- Font Awesome  -->
    ";
        // line 29
        $this->displayBlock('fontawesome', $context, $blocks);
        // line 32
        echo "
    <!-- script CSS -->
    ";
        // line 34
        $this->displayBlock('css', $context, $blocks);
        // line 37
        echo "

    <title>";
        // line 39
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

</head>

<body>
    ";
        // line 44
        $this->displayBlock('body', $context, $blocks);
        // line 50
        echo "    ";
        $this->displayBlock('javascript', $context, $blocks);
        // line 53
        echo "</body>


</html>";
    }

    // line 12
    public function block_bootstrap($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        echo "        <!-- CSS -->
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

    // line 29
    public function block_fontawesome($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 30
        echo "        <script src=\"https://kit.fontawesome.com/4ad0f6d59d.js\" crossorigin=\"anonymous\"></script>
    ";
    }

    // line 34
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 35
        echo "     <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/style/style.css\">
    ";
    }

    // line 39
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Base HTML";
    }

    // line 44
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 45
        echo "



    ";
    }

    // line 50
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 51
        echo "        <script type=\"text/javascript\" src=\"assets/script/scripts/script.js\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  156 => 51,  152 => 50,  144 => 45,  140 => 44,  133 => 39,  128 => 35,  124 => 34,  119 => 30,  115 => 29,  100 => 13,  96 => 12,  89 => 53,  86 => 50,  84 => 44,  76 => 39,  72 => 37,  70 => 34,  66 => 32,  64 => 29,  58 => 25,  56 => 12,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html.twig", "C:\\wamp64\\www\\jeuDeLoieV2\\framework\\templates\\base.html.twig");
    }
}
