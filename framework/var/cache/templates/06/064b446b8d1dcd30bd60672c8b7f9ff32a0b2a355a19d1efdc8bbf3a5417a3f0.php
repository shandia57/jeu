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
                <input type=\"text\" id=\"searchbar\" class=\"form-control\" placeholder=\"username\">
                <button class=\"btn btn-outline-secondary\" type=\"button\" id=\"buttonSearch\"><i
                        class=\"fas fa-search\"></i></button>
            </div>

            <select id=\"selectFilter\" class=\"form-select\">
                <option selected value=\"ascendant\">ID : ascendant</option>
                <option value=\"descendant\">ID : descendant</option>
                <option value=\"az\">Username:  A - Z</option>
                <option value=\"za\">Username:  Z - A</option>
            </select>
        </div>



        <button type=\"button\" class=\"btn btn-outline-success\"  data-bs-toggle=\"modal\" data-bs-target=\"#modalSubscribe\">Ajouter un nouvel utilisateur</button>
        <table class=\"table\">
            <thead>
                <tr>
                    <th scope=\"col\">#ID</th>
                    <th scope=\"col\">userName</th>
                    <th scope=\"col\">firstName</th>
                    <th scope=\"col\">lastName</th>
                    <th scope=\"col\">email</th>
                    <th scope=\"col\">Roles</th>
                </tr>
            </thead>
            
            <tbody id=\"tbody\">
                    ";
        // line 61
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 62
            echo "                        <tr class=\"dataUser\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\" onclick=\"setInfoUser(this)\">
                            <td scope=\"row\">";
            // line 63
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id_user", [], "any", false, false, false, 63), "html", null, true);
            echo " </td>
                            <td name=\"username\">";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "username", [], "any", false, false, false, 64), "html", null, true);
            echo "</td>
                            <td>";
            // line 65
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "firstName", [], "any", false, false, false, 65), "html", null, true);
            echo "</td>
                            <td>";
            // line 66
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "lastName", [], "any", false, false, false, 66), "html", null, true);
            echo "</td>
                            <td>";
            // line 67
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "mail", [], "any", false, false, false, 67), "html", null, true);
            echo "</td>
                            <td>";
            // line 68
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "roles", [], "any", false, false, false, 68), "html", null, true);
            echo "</td>
                         </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "            </tbody>
        </table>
        

    </main>

    <!-- Modal update / delete --> 
    <div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"usernameTitle\"></h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <form id=\"formTest\" method=\"post\" action=\"users\">

                    <div class=\"modal-body\">
                    <input name=\"id_user\"  id=\"id_user\" type=\"hidden\">
                    ";
        // line 90
        echo "
                    <label for=\"firstName\" class=\"form-label\" >first name</label>
                    <input id=\"firstName\" class=\"form-control\" name=\"firstName\" type=\"text\">
                    <div class=\"form-text\">";
        // line 93
        echo twig_escape_filter($this->env, ($context["firstName"] ?? null), "html", null, true);
        echo "</div>

                    <label for=\"lastName\" class=\"form-label\">last name</label>
                    <input id=\"lastName\" class=\"form-control\" name=\"lastName\" type=\"text\">
                    <div class=\"form-text\">";
        // line 97
        echo twig_escape_filter($this->env, ($context["lastName"] ?? null), "html", null, true);
        echo "</div>

                    <label for=\"mail\" class=\"form-label\">email</label>
                    <input id=\"mail\" class=\"form-control\" name=\"mail\" type=\"text\">
                    <div class=\"form-text\">";
        // line 101
        echo twig_escape_filter($this->env, ($context["mail"] ?? null), "html", null, true);
        echo "</div>

                    <label for=\"inputPassword5\" class=\"form-label\">Roles</label>
                    <select id=\"roles\" class=\"form-select\" aria-label=\"Default select example\" name=\"roles\">
                        <option id=\"role1\"  selected value=\"ROLES_ADMIN\">ROLES_ADMIN</option>
                        <option id=\"role2\" value=\"ROLES_USER\">ROLES_USER</option>
                    </select>
                    <div class=\"form-text\">";
        // line 108
        echo twig_escape_filter($this->env, ($context["roles"] ?? null), "html", null, true);
        echo "</div>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                    <button type=\"submit\" class=\"btn btn-primary\" name=\"update\">Save changes</button>
                    <button type=\"submit\" id=\"btnDelete\" class=\"btn btn-danger\" data-bs-dismiss=\"modal\" name=\"delete\">Delete</button>
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
                        <input  id=\"usernameSub\" class=\"form-control\" type=\"text\" name=\"username\">
                        <div class=\"form-text\">";
        // line 133
        echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
        echo "</div>

                        <label for=\"passwordSub\" class=\"form-label\">Password</label>
                        <input  id=\"passwordSub\" class=\"form-control\" type=\"password\" name=\"password\">
                        <div class=\"form-text\">";
        // line 137
        echo twig_escape_filter($this->env, ($context["password"] ?? null), "html", null, true);
        echo "</div>

                        <label for=\"passwordConfSub\" class=\"form-label\">Password</label>
                        <input  id=\"passwordConfSub\" class=\"form-control\" type=\"password\" name=\"passwordConfirm\">
                        <div class=\"form-text\">";
        // line 141
        echo twig_escape_filter($this->env, ($context["passwordConfirm"] ?? null), "html", null, true);
        echo "</div>

                        <label for=\"firstNameSub\" class=\"form-label\">First name</label>
                        <input  id=\"firstNameSub\" class=\"form-control\" type=\"text\" name=\"firstName\">
                        <div class=\"form-text\">";
        // line 145
        echo twig_escape_filter($this->env, ($context["firstName"] ?? null), "html", null, true);
        echo "</div>

                        <label for=\"lastNameSub\" class=\"form-label\">Last name</label>
                        <input  id=\"lastNameSub\" class=\"form-control\" type=\"text\" name=\"lastName\">
                        <div class=\"form-text\">";
        // line 149
        echo twig_escape_filter($this->env, ($context["lastName"] ?? null), "html", null, true);
        echo "</div>

                        <label for=\"mailSub\" class=\"form-label\">Mail</label>
                        <input  id=\"mailSub\" class=\"form-control\" type=\"text\" name=\"mail\">
                        <div class=\"form-text\">";
        // line 153
        echo twig_escape_filter($this->env, ($context["mail"] ?? null), "html", null, true);
        echo "</div>
                        
                        <select id=\"rolesSub\" class=\"form-select\" aria-label=\"Default select example\" name=\"roles\">
                            <option id=\"role1Sub\"  selected value=\"ROLES_ADMIN\">ROLES_ADMIN</option>
                            <option id=\"role2Sub\" value=\"ROLES_USER\">ROLES_USER</option>
                        </select>
                        <div class=\"form-text\">";
        // line 159
        echo twig_escape_filter($this->env, ($context["roles"] ?? null), "html", null, true);
        echo "</div>
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                        <button type=\"submit\" class=\"btn btn-success\" name=\"insert\">Insert new user</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type=\"text/javascript\" src=\"assets/script/scripts/users.js\"></script>
    <script type=\"module\" src=\"assets/script/modules/users/users.js\"></script>
  
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
        return array (  325 => 25,  321 => 24,  302 => 159,  293 => 153,  286 => 149,  279 => 145,  272 => 141,  265 => 137,  258 => 133,  230 => 108,  220 => 101,  213 => 97,  206 => 93,  201 => 90,  181 => 71,  172 => 68,  168 => 67,  164 => 66,  160 => 65,  156 => 64,  152 => 63,  149 => 62,  145 => 61,  109 => 27,  106 => 24,  102 => 23,  94 => 21,  86 => 16,  82 => 15,  76 => 12,  72 => 11,  66 => 8,  62 => 7,  56 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/users.html.twig", "C:\\xampp\\htdocs\\jeuDeLoieV2\\framework\\templates\\admin\\users.html.twig");
    }
}
