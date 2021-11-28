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

/* admin/users.html.twig */
class __TwigTemplate_e07a177eb90af118a89e380e4ec65613f15b929d83ca21f6b68309b50b60cc8f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

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

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.html.twig", "admin/users.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        $this->displayParentBlock("head", $context, $blocks);
        echo " 
";
    }

    // line 7
    public function block_bootstrap($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        $this->displayParentBlock("bootstrap", $context, $blocks);
        echo " 
";
    }

    // line 11
    public function block_fontawesome($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 12
        $this->displayParentBlock("fontawesome", $context, $blocks);
        echo " 
";
    }

    // line 15
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 16
        echo "    ";
        $this->displayParentBlock("css", $context, $blocks);
        echo " 
    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/style/user.css\">
";
    }

    // line 21
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->displayParentBlock("title", $context, $blocks);
        echo " - hehe ";
    }

    // line 23
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 24
        echo "    ";
        $this->displayBlock('main', $context, $blocks);
        // line 27
        echo "    <main>
        <h1>Users</h1>

        <div class=\"filter\">
            <div class=\"input-group mb-3\">
                <input type=\"text\" class=\"form-control\" placeholder=\"username\" aria-label=\"Recipient's username\"
                    aria-describedby=\"button-addon2\">
                <button class=\"btn btn-outline-secondary\" type=\"button\" id=\"button-addon2\"><i
                        class=\"fas fa-search\"></i></button>
            </div>

            <select class=\"form-select\" aria-label=\"Default select example\">
                <option selected value=\"ROLES_ADMIN\">asc</option>
                <option value=\"ROLES_USER\">desc</option>
            </select>
        </div>



        <button type=\"button\" class=\"btn btn-outline-success\"  data-bs-toggle=\"modal\" data-bs-target=\"#modalSubscribe\">Ajouter un nouvel utilisateur</button>
        <table class=\"table\" >
            <thead>
                <tr >
                    <th scope=\"col\">#ID</th>
                    <th scope=\"col\">userName</th>
                    <th scope=\"col\">firstName</th>
                    <th scope=\"col\">lastName</th>
                    <th scope=\"col\">email</th>
                    <th scope=\"col\">Roles</th>
                </tr>
            </thead>
            
            <tbody>
                    ";
        // line 60
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 61
            echo "                        <tr class=\"dataUser\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\" onclick=\"setInfoUser(this)\">
                            <th scope=\"row\">";
            // line 62
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id_user", [], "any", false, false, false, 62), "html", null, true);
            echo " </th>
                            <td name=\"username\">";
            // line 63
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "username", [], "any", false, false, false, 63), "html", null, true);
            echo "</td>
                            <td>";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "firstName", [], "any", false, false, false, 64), "html", null, true);
            echo "</td>
                            <td>";
            // line 65
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "lastName", [], "any", false, false, false, 65), "html", null, true);
            echo "</td>
                            <td>";
            // line 66
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "mail", [], "any", false, false, false, 66), "html", null, true);
            echo "</td>
                            <td>";
            // line 67
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "roles", [], "any", false, false, false, 67), "html", null, true);
            echo "</td>
                         </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "            </tbody>
        </table>
        

    </main>

    <!-- Modal update / delete --> 
    <div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"username\"></h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <form id=\"formTest\" method=\"post\" action=\"users\">

                    <div class=\"modal-body\">
                    <input name=\"id_user\" value=\"5\" id=\"id_user\" type=\"hidden\">

                    <label for=\"firstName\" class=\"form-label\" >first name</label>
                    <input id=\"firstName\" class=\"form-control\" name=\"firstName\" type=\"text\">

                    <label for=\"lastName\" class=\"form-label\">last name</label>
                    <input id=\"lastName\" class=\"form-control\" name=\"lastName\" type=\"text\">

                    <label for=\"mail\" class=\"form-label\">email</label>
                    <input id=\"mail\" class=\"form-control\" name=\"mail\" type=\"text\">

                    <label for=\"inputPassword5\" class=\"form-label\">Roles</label>
                    <select id=\"roles\" class=\"form-select\" aria-label=\"Default select example\" name=\"roles\">
                        <option id=\"role1\"  selected value=\"ROLES_ADMIN\">ROLES_ADMIN</option>
                        <option id=\"role2\" value=\"ROLES_USER\">ROLES_USER</option>
                    </select>

                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                    <button type=\"submit\" class=\"btn btn-primary\" name=\"update\">Save changes</button>
                    <button type=\"submit\" class=\"btn btn-danger\" data-bs-dismiss=\"modal\" name=\"delete\">Delete</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal new inscription -->
    <div class=\"modal fade\" id=\"modalSubscribe\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Inscription d'un nouvelle utilisateur</h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <form method=\"post\" action=\"users\">
                    <div class=\"modal-body\">
                        <label for=\"usernameSub\" class=\"form-label\">Username</label>
                        <input  id=\"usernameSub\" class=\"form-control\" type=\"text\" name=\"usernameSub\">

                        <label for=\"passwordSub\" class=\"form-label\">Password</label>
                        <input  id=\"passwordSub\" class=\"form-control\" type=\"password\" name=\"passwordSub\">

                        <label for=\"passwordConfSub\" class=\"form-label\">Password</label>
                        <input  id=\"passwordConfSub\" class=\"form-control\" type=\"password\" name=\"passwordConfSub\">

                        <label for=\"firstNameSub\" class=\"form-label\">First name</label>
                        <input  id=\"firstNameSub\" class=\"form-control\" type=\"text\" name=\"firstNameSub\">

                        <label for=\"lastNameSub\" class=\"form-label\">Last name</label>
                        <input  id=\"lastNameSub\" class=\"form-control\" type=\"text\" name=\"lastNameSub\">

                        <label for=\"mailSub\" class=\"form-label\">Mail</label>
                        <input  id=\"mailSub\" class=\"form-control\" type=\"text\" name=\"mailSub\">

                        <select id=\"rolesSub\" class=\"form-select\" aria-label=\"Default select example\" name=\"rolesSub\">
                            <option id=\"role1Sub\"  selected value=\"ROLES_ADMIN\">ROLES_ADMIN</option>
                            <option id=\"role2Sub\" value=\"ROLES_USER\">ROLES_USER</option>
                        </select>
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                        <button type=\"submit\" class=\"btn btn-success\" name=\"insert\">Insert new user</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type=\"text/javascript\" src=\"assets/script/script.js\"></script>
  
";
    }

    // line 24
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "        ";
        $this->displayParentBlock("main", $context, $blocks);
        echo " 
    ";
    }

    public function getTemplateName()
    {
        return "admin/users.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  278 => 25,  274 => 24,  180 => 70,  171 => 67,  167 => 66,  163 => 65,  159 => 64,  155 => 63,  151 => 62,  148 => 61,  144 => 60,  109 => 27,  106 => 24,  102 => 23,  94 => 21,  86 => 16,  82 => 15,  76 => 12,  72 => 11,  66 => 8,  62 => 7,  56 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/users.html.twig", "C:\\xampp\\htdocs\\jeuDeLoieV2\\framework\\templates\\admin\\users.html.twig");
    }
}
