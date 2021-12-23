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

/* Admin/questions.html.twig */
class __TwigTemplate_f67f979ee21104d198c443d5b5e5b80168ef9053a012cc8dadc752ef2dac3d73 extends Template
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
        $this->parent = $this->loadTemplate("layout.html.twig", "Admin/questions.html.twig", 1);
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
    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/style/questions.css\">
";
    }

    // line 10
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Questions";
    }

    // line 14
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        echo "
        <main>
        <h1>Questions</h1>
        <div class=\"filter\">
            <div class=\"input-group mb-3\">
                <input type=\"text\" id=\"searchbar\" class=\"form-control\" placeholder=\"Chercher un ID, un thème, une couleur ou une question\"
                    aria-label=\"Recipient's username\" aria-describedby=\"button-addon2\">
                <button class=\"btn btn-outline-secondary\" type=\"button\" id=\"button-addon2\"><i
                        class=\"fas fa-search\"></i></button>
            </div>

            <select id=\"selectFilter\" class=\"form-select\">
                <option selected value=\"ascendant\">ID : ascendant</option>
                <option value=\"descendant\">ID : descendant</option>
                <option value=\"levelAsc\">Level : ascendant</option>
                <option value=\"levelDesc\">Level : descendant</option>
            </select>
        </div>
        <table class=\"table\">
            <thead>
                <tr >
                    <th scope=\"col\">#ID</th>
                    <th scope=\"col\">Label</th>
                    <th scope=\"col\">level</th>
                    <th scope=\"col\">Question</th>
                    <th scope=\"col\"></th>
                    <th scope=\"col\"></th>
                </tr>
            </thead>

            <tbody id=\"tbody\">
            ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["questions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["singleQuestion"]) {
            // line 47
            echo "
                <tr class=\"dataQuestion\">
                    <td scope=\"row\"> ";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["singleQuestion"], "id_question", [], "any", false, false, false, 49), "html", null, true);
            echo "</td> </th>
                    <td>";
            // line 50
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["singleQuestion"], "label", [], "any", false, false, false, 50), "html", null, true);
            echo "</td>
                    <td class=\"colorLevel\" data-colorValue=\"";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["singleQuestion"], "level", [], "any", false, false, false, 51), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["singleQuestion"], "level", [], "any", false, false, false, 51), "html", null, true);
            echo "</td>
                    <td>";
            // line 52
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["singleQuestion"], "question", [], "any", false, false, false, 52), "html", null, true);
            echo "</td>
                    <td><button type=\"button\" class=\"btn btn-outline-info\" data-bs-toggle=\"modal\" data-bs-target=\"#updateModalQuestions\" onclick=\"updateQuestion(this)\">Modifier</button></td>
                    <td><a class=\"btn btn-outline-success\" href=\"questions/";
            // line 54
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["singleQuestion"], "id_question", [], "any", false, false, false, 54), "html", null, true);
            echo "\">Voir les réponses</a></td>

                    
                </tr>

            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['singleQuestion'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "
            </tbody>
        </table>
        <button type=\"button\" class=\"btn btn-outline-success\"  data-bs-toggle=\"modal\" data-bs-target=\"#modalQuestions\">Ajouter une nouvelle question</button>

    </main>
";
        // line 67
        echo "<div class=\"modal fade\" id=\"modalQuestions\" tabindex=\"-1\"  aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" >Ajouter une question</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>

        <form action=\"questions\" method=\"post\">
            <div class=\"modal-body list-group list-group-flush\">
                <div class=\"list-group-item\">
                    <label for=\"exampleInputEmail1\" class=\"form-label\">Thème question</label>
                    <input class=\"form-control\" type=\"text\" name=\"label\">
                    <div class=\"form-text\">";
        // line 80
        echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
        echo "</div>
                </div>
                <div class=\"list-group-item\">
                    <label for=\"exampleInputEmail1\" class=\"form-label\">Niveau de difficulté</label>
                    <select class=\"form-select\" name=\"level\">
                        <option selected value=\"default\">Choisir le niveau de difficulté</option>
                        <option value=\"Vert\">1 - Vert</option>
                        <option value=\"Jaune\">2 - Jaune</option>
                        <option value=\"Bleu\">3 - Bleu</option>
                        <option value=\"Orange\">4 - Orange</option>
                        <option value=\"Rouge\">5 - Rouge</option>
                        <option value=\"Noir\">6 - Noir</option>
                    </select>
                    <div class=\"form-text\">";
        // line 93
        echo twig_escape_filter($this->env, ($context["level"] ?? null), "html", null, true);
        echo "</div>
                </div>
                <div class=\"list-group-item\">
                    <label for=\"exampleInputEmail1\" class=\"form-label\">Question</label>
                    <input class=\"form-control\" type=\"text\" name=\"question\">
                    <div class=\"form-text\">";
        // line 98
        echo twig_escape_filter($this->env, ($context["question"] ?? null), "html", null, true);
        echo "</div>
                </div>


                <div class=\"list-group-item\">
                    <div class=\"listAnswer\">

                        <div class=\"labelAnswer\">
                            <label class=\"form-label answer\">Réponse 1</label>

                            <div class=\"form-check form-switch\">
                                <input class=\"form-check-input\" type=\"checkbox\" name=\"validAnswer1\">
                                <label class=\"form-check-label\">Réponse valide</label>
                            </div>
                        </div>
                        <div class=\"form-text\">";
        // line 113
        echo twig_escape_filter($this->env, ($context["answer"] ?? null), "html", null, true);
        echo "</div>


                        <input class=\"form-control\" type=\"text\" name=\"answer[]\">
                    </div>
                    <button id=\"btnCreateAnswer\" class=\"btn btn-outline-success marginBtn\" type=\"button\" >Ajouter une réponse</button>
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"submit\" class=\"btn btn-primary\" name=\"insertQuestion\">Envoyer</button>
            </div>
        </form>

    </div>

  </div>
</div>
<!-- Modal update question -->
    <div class=\"modal fade\" id=\"updateModalQuestions\" tabindex=\"-1\" aria-hidden=\"true\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" >Modifier la question</h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <form action=\"questions\" method=\"post\">
                    <div class=\"modal-body list-group list-group-flush\">
                        <input class=\"idQuestions\" type=\"hidden\" name=\"idQuestionsUpdate\">
                        <div class=\"list-group-item\">
                            <label for=\"exampleInputEmail1\" class=\"form-label\">Label question</label>
                            <input class=\"form-control labelUpdate\" type=\"text\" name=\"label\">
                            <div class=\"form-text\">";
        // line 144
        echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
        echo "</div>
                        </div>
                        <div class=\"list-group-item\">
                            <label for=\"exampleInputEmail1\" class=\"form-label\">Niveau de difficulté</label>
                            <select id=\"level\" class=\"form-select\" name=\"level\">
                                <option value=\"Vert\">1 - Vert</option>
                                <option value=\"Jaune\">2 - Jaune</option>
                                <option value=\"Bleu\">3 - Bleu</option>
                                <option value=\"Orange\">4 - Orange</option>
                                <option value=\"Rouge\">5 - Rouge</option>
                                <option value=\"Noir\">6 - Noir</option>
                            </select>
                            <div class=\"form-text\">";
        // line 156
        echo twig_escape_filter($this->env, ($context["level"] ?? null), "html", null, true);
        echo "</div>
                        </div>
                        <div class=\"list-group-item\">
                            <label for=\"exampleInputEmail1\" class=\"form-label\">Question</label>
                            <input class=\"form-control questionUpdate\" type=\"text\" name=\"question\">
                            <div class=\"form-text\">";
        // line 161
        echo twig_escape_filter($this->env, ($context["question"] ?? null), "html", null, true);
        echo "</div>
                        </div>

                    </div>

                    <div class=\"position-relative\">
                        <hr>
                        <div id=\"containerBtn\">
                            <button type=\"submit\" id=\"btnDelete\" class=\"btn btn-danger \" data-bs-dismiss=\"modal\" name=\"deleteQuestions\">Supprimer</button>
                            <button type=\"submit\" id=\"btnModifier\" class=\"btn btn-primary\" name=\"UpdateQuestions\">Modifier</button>
                        </div>
                    </div>
            </form>

            </div>
        </div>
    </div>
";
    }

    // line 183
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 184
        echo "        ";
        $this->displayParentBlock("javascript", $context, $blocks);
        echo " 
        <script type=\"text/javascript\" src=\"assets/script/scripts/questions.js\"></script>
        <script type=\"module\" src=\"assets/script/modules/questions/questions.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "Admin/questions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  293 => 184,  289 => 183,  267 => 161,  259 => 156,  244 => 144,  210 => 113,  192 => 98,  184 => 93,  168 => 80,  153 => 67,  145 => 60,  133 => 54,  128 => 52,  122 => 51,  118 => 50,  114 => 49,  110 => 47,  106 => 46,  73 => 15,  69 => 14,  62 => 10,  55 => 5,  49 => 4,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Admin/questions.html.twig", "C:\\xampp\\htdocs\\jeuDeLoieV2\\framework\\templates\\admin\\questions.html.twig");
    }
}
