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

        $this->parent = false;

        $this->blocks = [
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
    <title>Document</title>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM\" crossorigin=\"anonymous\"></script>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC\" crossorigin=\"anonymous\">

</head>

<body>

<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
    <div class=\"container-fluid\">
        <a class=\"navbar-brand\" href=\"../connectToGame\">Home</a>
        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavDropdown\" aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
            <ul class=\"navbar-nav\">
            </ul>
        </div>
    </div>
</nav>
<h1>Formulaire d'inscription</h1>

<div id=\"containerForm\">
    <form class=\"form-control\" method=\"post\" name=\"formulaire\">
        <div class=\"mb-3\">
            <label for=\"exampleInputEmail1\" class=\"form-label\">Username</label>
            <input type=\"text\" class=\"form-control\" aria-describedby=\"emailHelp\" name=\"username\" maxlength=\"100\" required>

            <div class=\"invalid-feedback\" style=\"display: block\">";
        // line 36
        echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
        echo "</div>
        </div>

        <div class=\"mb-3\">
            <label for=\"exampleInputEmail1\" class=\"form-label\">Password</label>
            <input type=\"password\" class=\"form-control\" aria-describedby=\"emailHelp\" name=\"password\" maxlength=\"100\" required>
            <div class=\"form-text\">";
        // line 42
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 42), "html", null, true);
        echo "</div>
        </div>

        <div class=\"mb-3\">
            <label for=\"exampleInputEmail1\" class=\"form-label\">Password confirm</label>
            <input type=\"password\" class=\"form-control\" aria-describedby=\"emailHelp\" name=\"passwordConfirm\" maxlength=\"100\" required>
            <div class=\"invalid-feedback\" style=\"display: block\">";
        // line 48
        echo twig_escape_filter($this->env, ($context["passwordConfirm"] ?? null), "html", null, true);
        echo "</div>
        </div>

        <div class=\"mb-3\">
            <label for=\"exampleInputEmail1\" class=\"form-label\">Lastname</label>
            <input type=\"text\" class=\"form-control\" aria-describedby=\"emailHelp\" name=\"lastName\" maxlength=\"100\" required>
            <div class=\"form-text\">";
        // line 54
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "lastName", [], "any", false, false, false, 54), "html", null, true);
        echo "</div>
        </div>

        <div class=\"mb-3\">
            <label for=\"exampleInputEmail1\" class=\"form-label\">Firstname</label>
            <input type=\"text\" class=\"form-control\" aria-describedby=\"emailHelp\" name=\"firstName\" maxlength=\"100\" required>
            <div class=\"form-text\">";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "firstName", [], "any", false, false, false, 60), "html", null, true);
        echo "</div>
        </div>

        <div class=\"mb-3\">
            <label for=\"exampleInputEmail1\" class=\"form-label\">Email</label>
            <input type=\"email\" class=\"form-control\" aria-describedby=\"emailHelp\" name=\"mail\" maxlength=\"100\" required>
            <div class=\"form-text\">";
        // line 66
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "mail", [], "any", false, false, false, 66), "html", null, true);
        echo "</div>
        </div>

        <div class=\"mb-3\">
            <label for=\"exampleInputEmail1\" class=\"form-label\">Role</label>
            <input type=\"text\" class=\"form-control\" aria-describedby=\"emailHelp\" name=\"roles\" maxlength=\"255\" required>
            <div class=\"form-text\">";
        // line 72
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "roles", [], "any", false, false, false, 72), "html", null, true);
        echo "</div>
        </div>

        <div class=\"mb-3\">
            <label for=\"exampleInputEmail1\" class=\"form-label\">Create At</label>
            <input type=\"date\" class=\"form-control\" aria-describedby=\"emailHelp\" name=\"createAt\" maxlength=\"10\" required>
            <div class=\"form-text\">";
        // line 78
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "createAt", [], "any", false, false, false, 78), "html", null, true);
        echo "</div>
        </div>
        <button type=\"submit\" href=\"connecToGame\" class=\"btn btn-outline-primary\">Primary</button>
    </form>
</div>

</body>
</html>";
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
        return array (  137 => 78,  128 => 72,  119 => 66,  110 => 60,  101 => 54,  92 => 48,  83 => 42,  74 => 36,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Subscribe/subscribe.html.twig", "C:\\xampp\\htdocs\\jeuDeLoieV2\\framework\\templates\\Subscribe\\subscribe.html.twig");
    }
}
