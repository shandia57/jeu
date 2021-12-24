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

/* Admin/users.html.twig */
class __TwigTemplate_e07a177eb90af118a89e380e4ec65613f15b929d83ca21f6b68309b50b60cc8f extends Template
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
        $this->parent = $this->loadTemplate("layout.html.twig", "Admin/users.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
    ";
        // line 5
        $this->displayParentBlock("css", $context, $blocks);
        echo "  
    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/style/user.css\">
";
    }

    // line 10
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Users";
    }

    // line 12
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        echo "    <main>
        <h1>Users</h1>

            <button type=\"button\" class=\"btn btn-outline-success\"  data-bs-toggle=\"modal\" data-bs-target=\"#modalSubscribe\">Ajouter un nouvel utilisateur</button>


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

            <table class=\"table\">
                <thead>
                    <tr>
                        <th scope=\"col\">#ID</th>
                        <th scope=\"col\">username</th>
                        <th scope=\"col\">Prénom</th>
                        <th scope=\"col\">Nom</th>
                        <th scope=\"col\">Adresse mail</th>
                        <th scope=\"col\">Roles</th>
                        <th scope=\"col\"></th>
                        
                    </tr>
                </thead>
                
                <tbody id=\"tbody\">
                        ";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 50
            echo "                            <tr class=\"dataTr\">
                                <td scope=\"row\">";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id_user", [], "any", false, false, false, 51), "html", null, true);
            echo " </td>
                                <td name=\"username\">";
            // line 52
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "username", [], "any", false, false, false, 52), "html", null, true);
            echo "</td>
                                <td>";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "firstName", [], "any", false, false, false, 53), "html", null, true);
            echo "</td>
                                <td>";
            // line 54
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "lastName", [], "any", false, false, false, 54), "html", null, true);
            echo "</td>
                                <td>";
            // line 55
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "mail", [], "any", false, false, false, 55), "html", null, true);
            echo "</td>
                                <td>";
            // line 56
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "roles", [], "any", false, false, false, 56), "html", null, true);
            echo "</td>
                                <td><button type=\"button\" class=\"btn btn-outline-info dataUser\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\" onclick=\"setInfoUser(this)\">Modifier</button></td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "                </tbody>
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

                    <label for=\"firstName\" class=\"form-label\" >Prénom</label>
                    <input id=\"firstName\" class=\"form-control\" name=\"firstName\" type=\"text\" required>
                    <div class=\"form-text\">";
        // line 81
        echo twig_escape_filter($this->env, ($context["firstName"] ?? null), "html", null, true);
        echo "</div>

                    <label for=\"lastName\" class=\"form-label\">Nom</label>
                    <input id=\"lastName\" class=\"form-control\" name=\"lastName\" type=\"text\" required>
                    <div class=\"form-text\">";
        // line 85
        echo twig_escape_filter($this->env, ($context["lastName"] ?? null), "html", null, true);
        echo "</div>

                    <label for=\"mail\" class=\"form-label\">Adresse mail</label>
                    <input id=\"mail\" class=\"form-control\" name=\"mail\" type=\"text\" required>
                    <div class=\"form-text\">";
        // line 89
        echo twig_escape_filter($this->env, ($context["mail"] ?? null), "html", null, true);
        echo "</div>

                    <label for=\"inputPassword5\" class=\"form-label\">Roles</label>
                    <select id=\"roles\" class=\"form-select\" aria-label=\"Default select example\" name=\"roles\">
                        <option id=\"role1\"  selected value=\"ROLES_ADMIN\">ROLES_ADMIN</option>
                        <option id=\"role2\" value=\"ROLES_USER\">ROLES_USER</option>
                    </select>
                    <div class=\"form-text\">";
        // line 96
        echo twig_escape_filter($this->env, ($context["roles"] ?? null), "html", null, true);
        echo "</div>
                </div>


                <div class=\"position-relative\">
                    <hr>
                    <div id=\"containerBtn\">
                        <button type=\"button\" id=\"btnDelete\" class=\"btn btn-danger \" data-bs-dismiss=\"modal\" name=\"delete\">Supprimer</button>
                        <button type=\"submit\" id=\"btnModifier\" class=\"btn btn-primary\" name=\"update\">Modifier</button>
                    </div>
                </div>
                


                
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
                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Inscription d'un nouvel utilisateur</h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <form method=\"post\" action=\"users\">
                    <div class=\"modal-body\">
                        <label for=\"usernameSub\" class=\"form-label\">Username</label>
                        <input  id=\"usernameSub\" class=\"form-control\" type=\"text\" name=\"username\" required>
                        <div class=\"form-text\">";
        // line 130
        echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
        echo "</div>

                        <label for=\"passwordSub\" class=\"form-label\">Mot de passe</label>
                        <input  id=\"passwordSub\" class=\"form-control\" type=\"password\" name=\"password\" required>
                        <div class=\"form-text\">";
        // line 134
        echo twig_escape_filter($this->env, ($context["password"] ?? null), "html", null, true);
        echo "</div>

                        <label for=\"passwordConfSub\" class=\"form-label\">Confirmation du mot de passe</label>
                        <input  id=\"passwordConfSub\" class=\"form-control\" type=\"password\" name=\"passwordConfirm\" required>
                        <div class=\"form-text\">";
        // line 138
        echo twig_escape_filter($this->env, ($context["passwordConfirm"] ?? null), "html", null, true);
        echo "</div>

                        <label for=\"firstNameSub\" class=\"form-label\">Prénom</label>
                        <input  id=\"firstNameSub\" class=\"form-control\" type=\"text\" name=\"firstName\" required>
                        <div class=\"form-text\">";
        // line 142
        echo twig_escape_filter($this->env, ($context["firstName"] ?? null), "html", null, true);
        echo "</div>

                        <label for=\"lastNameSub\" class=\"form-label\">Nom</label>
                        <input  id=\"lastNameSub\" class=\"form-control\" type=\"text\" name=\"lastName\" required>
                        <div class=\"form-text\">";
        // line 146
        echo twig_escape_filter($this->env, ($context["lastName"] ?? null), "html", null, true);
        echo "</div>

                        <label for=\"mailSub\" class=\"form-label\">Adresse mail</label>
                        <input  id=\"mailSub\" class=\"form-control\" type=\"text\" name=\"mail\" required>
                        <div class=\"form-text\">";
        // line 150
        echo twig_escape_filter($this->env, ($context["mail"] ?? null), "html", null, true);
        echo "</div>
                        
                        <select id=\"rolesSub\" class=\"form-select\" aria-label=\"Default select example\" name=\"roles\">
                            <option id=\"role1Sub\"  selected value=\"ROLES_ADMIN\">ROLES_ADMIN</option>
                            <option id=\"role2Sub\" value=\"ROLES_USER\">ROLES_USER</option>
                        </select>
                        <div class=\"form-text\">";
        // line 156
        echo twig_escape_filter($this->env, ($context["roles"] ?? null), "html", null, true);
        echo "</div>
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"submit\" class=\"btn btn-success\" name=\"insert\">Ajouter cet utilisateur</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    ";
    }

    // line 169
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 170
        echo "        ";
        $this->displayParentBlock("javascript", $context, $blocks);
        echo " 
        <script type=\"text/javascript\" src=\"assets/script/scripts/users.js\"></script>
        <script type=\"module\" src=\"assets/script/modules/users/users.js\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "Admin/users.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  296 => 170,  292 => 169,  276 => 156,  267 => 150,  260 => 146,  253 => 142,  246 => 138,  239 => 134,  232 => 130,  195 => 96,  185 => 89,  178 => 85,  171 => 81,  148 => 60,  138 => 56,  134 => 55,  130 => 54,  126 => 53,  122 => 52,  118 => 51,  115 => 50,  111 => 49,  73 => 13,  69 => 12,  62 => 10,  55 => 5,  49 => 4,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Admin/users.html.twig", "C:\\xampp\\htdocs\\jeuDeLoieV2\\framework\\templates\\admin\\users.html.twig");
    }
}
