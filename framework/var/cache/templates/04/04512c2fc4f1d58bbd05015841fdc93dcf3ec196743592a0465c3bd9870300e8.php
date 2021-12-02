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

/* admin/questions.html.twig */
class __TwigTemplate_f67f979ee21104d198c443d5b5e5b80168ef9053a012cc8dadc752ef2dac3d73 extends Template
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
        $this->parent = $this->loadTemplate("layout.html.twig", "admin/questions.html.twig", 1);
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
    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/style/questions.css\">

";
    }

    // line 22
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->displayParentBlock("title", $context, $blocks);
        echo " ";
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo " ";
    }

    // line 24
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "    ";
        $this->displayBlock('main', $context, $blocks);
        // line 28
        echo "    <main>
        <h1>Questions</h1>
        <div class=\"filter\">
            <div class=\"input-group mb-3\">
                <input type=\"text\" id=\"searchbar\" class=\"form-control\" placeholder=\"Recipient's username\"
                    aria-label=\"Recipient's username\" aria-describedby=\"button-addon2\">
                <button class=\"btn btn-outline-secondary\" type=\"button\" id=\"button-addon2\"><i
                        class=\"fas fa-search\"></i></button>
            </div>

            <select id=\"selectFilter\" class=\"form-select\">
                <option selected value=\"ascendant\">ascendant</option>
                <option value=\"descendant\">descendant</option>
                <option value=\"az\">Level : A - Z</option>
                <option value=\"za\">Level : Z - A</option>
            </select>
        </div>
        <button type=\"button\" class=\"btn btn-outline-success\"  data-bs-toggle=\"modal\" data-bs-target=\"#modalQuestions\">Ajouter une nouvelle question</button>
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
        // line 59
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["questions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["singleQuestion"]) {
            // line 60
            echo "
                <tr class=\"dataQuestion\">
                    <td scope=\"row\"> ";
            // line 62
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["singleQuestion"], "id_question", [], "any", false, false, false, 62), "html", null, true);
            echo "</td> </th>
                    <td>";
            // line 63
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["singleQuestion"], "label", [], "any", false, false, false, 63), "html", null, true);
            echo "</td>
                    <td>";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["singleQuestion"], "level", [], "any", false, false, false, 64), "html", null, true);
            echo "</td>
                    <td>";
            // line 65
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["singleQuestion"], "question", [], "any", false, false, false, 65), "html", null, true);
            echo "</td>
                    <td><button type=\"button\" class=\"btn btn-outline-info\" data-bs-toggle=\"modal\" data-bs-target=\"#updateModalQuestions\" onclick=\"updateQuestion(this)\">Modifier</button></td>
                    <td><a class=\"btn btn-outline-success\" href=\"questions/";
            // line 67
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["singleQuestion"], "id_question", [], "any", false, false, false, 67), "html", null, true);
            echo "\">Voir les réponses</a></td>

                    
                </tr>

            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['singleQuestion'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo "
            </tbody>
        </table>

    </main>
";
        // line 79
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
                    <label for=\"exampleInputEmail1\" class=\"form-label\">Label question</label>
                    <input class=\"form-control\" type=\"text\" name=\"label\">
                    <div class=\"form-text\">";
        // line 92
        echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
        echo "</div>
                </div>
                <div class=\"list-group-item\">
                    <label for=\"exampleInputEmail1\" class=\"form-label\">Niveau de difficulté</label>
                    <select class=\"form-select\" name=\"level\">
                        <option selected value=\"default\">Choisir le niveau de difficulté</option>
                        <option value=\"Vert\">Vert</option>
                        <option value=\"Jaune\">Jaune</option>
                        <option value=\"Bleu\">Bleu</option>
                        <option value=\"Orange\">Orange</option>
                        <option value=\"Rouge\">Rouge</option>
                        <option value=\"Noir\">Noir</option>
                    </select>
                    <div class=\"form-text\">";
        // line 105
        echo twig_escape_filter($this->env, ($context["level"] ?? null), "html", null, true);
        echo "</div>
                </div>
                <div class=\"list-group-item\">
                    <label for=\"exampleInputEmail1\" class=\"form-label\">Question</label>
                    <input class=\"form-control\" type=\"text\" name=\"question\">
                    <div class=\"form-text\">";
        // line 110
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
        // line 125
        echo twig_escape_filter($this->env, ($context["answer"] ?? null), "html", null, true);
        echo "</div>


                        <input class=\"form-control\" type=\"text\" name=\"answer[]\">
                    </div>
                    <button id=\"btnCreateAnswer\" class=\"btn btn-outline-success marginBtn\" type=\"button\" >Ajouter une réponse</button>
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                <button type=\"submit\" class=\"btn btn-primary\" name=\"insertQuestion\">Submit</button>
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
        // line 157
        echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
        echo "</div>
                    </div>
                    <div class=\"list-group-item\">
                        <label for=\"exampleInputEmail1\" class=\"form-label\">Niveau de difficulté</label>
                        <select id=\"level\" class=\"form-select\" name=\"level\">
                            <option value=\"Vert\">Vert</option>
                            <option value=\"Jaune\">Jaune</option>
                            <option value=\"Bleu\">Bleu</option>
                            <option value=\"Orange\">Orange</option>
                            <option value=\"Rouge\">Rouge</option>
                            <option value=\"Noir\">Noir</option>
                        </select>
                        <div class=\"form-text\">";
        // line 169
        echo twig_escape_filter($this->env, ($context["level"] ?? null), "html", null, true);
        echo "</div>
                    </div>
                    <div class=\"list-group-item\">
                        <label for=\"exampleInputEmail1\" class=\"form-label\">Question</label>
                        <input class=\"form-control questionUpdate\" type=\"text\" name=\"question\">
                        <div class=\"form-text\">";
        // line 174
        echo twig_escape_filter($this->env, ($context["question"] ?? null), "html", null, true);
        echo "</div>
                    </div>

                </div>

                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fermer</button>
                    <button type=\"submit\" id=\"btnDelete\" class=\"btn btn-danger\"  name=\"deleteQuestions\">Supprimer</button>
                    <button type=\"submit\" class=\"btn btn-primary\" name=\"UpdateQuestions\">Modifier</button>
                </div>
        </form>

        </div>
    </div>
    </div>
    <script type=\"text/javascript\" src=\"assets/script/questions.js\"></script>

";
    }

    // line 25
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        echo "        ";
        $this->displayParentBlock("main", $context, $blocks);
        echo " 
    ";
    }

    public function getTemplateName()
    {
        return "admin/questions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  330 => 26,  326 => 25,  304 => 174,  296 => 169,  281 => 157,  246 => 125,  228 => 110,  220 => 105,  204 => 92,  189 => 79,  182 => 73,  170 => 67,  165 => 65,  161 => 64,  157 => 63,  153 => 62,  149 => 60,  145 => 59,  112 => 28,  109 => 25,  105 => 24,  95 => 22,  86 => 16,  82 => 15,  76 => 12,  72 => 11,  66 => 8,  62 => 7,  56 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/questions.html.twig", "C:\\xampp\\htdocs\\jeuDeLoieV2\\framework\\templates\\admin\\questions.html.twig");
    }
}
