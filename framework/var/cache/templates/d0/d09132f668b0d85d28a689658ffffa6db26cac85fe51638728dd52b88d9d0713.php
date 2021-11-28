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

/* admin/answer.html.twig */
class __TwigTemplate_622ea6ef397ac8f97aa1678eb7246cab3f2ae0324c07f2ddcd8c4a14f780f535 extends Template
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
        $this->parent = $this->loadTemplate("layout.html.twig", "admin/answer.html.twig", 1);
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
    <link rel=\"stylesheet\" type=\"text/css\" href=\"../assets/style/questions.css\">
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
        <h1>Answers</h1>

        <div>
            ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["questions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["singleQuestion"]) {
            // line 32
            echo "
                <button type=\"button\" class=\"btn btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#addAnswerModal\">Nouvelle réponse</button>

                <h2>";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["singleQuestion"], "question", [], "any", false, false, false, 35), "html", null, true);
            echo "</h2>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['singleQuestion'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "                <ul class=\"list-group list-group-flush\">
                ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["answers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
            // line 39
            echo "                    <li class=\"list-group-item\" data-id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["answer"], "id_answer", [], "any", false, false, false, 39), "html", null, true);
            echo "\" data-value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["answer"], "valid", [], "any", false, false, false, 39), "html", null, true);
            echo "\" data-bs-toggle=\"modal\" data-bs-target=\"#updateAnswerModal\" onclick=\"updateAnswer(this)\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["answer"], "answer", [], "any", false, false, false, 39), "html", null, true);
            echo "</li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['answer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "            </ul>
        </div>

    </main>
    <!-- Modal Add Answer -->
    <div class=\"modal fade\" id=\"addAnswerModal\" tabindex=\"-1\" aria-hidden=\"true\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" >Nouvelle réponse</h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <form method=\"post\">
                    <div class=\"modal-body\">
                            <div class=\"form-check form-switch\">
                                <label class=\"form-check-label\">Réponse valide</label>
                                <input class=\"form-check-input\" type=\"checkbox\" name=\"validAnswer\">
                            </div>
                             <input class=\"form-control\" type=\"text\" name=\"answer\">
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                        <button type=\"submit\" class=\"btn btn-success\" name=\"insertAnswer\">Ajouter cette réponse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <!-- Modal DELETE / UPDATE ANSWER -->
        <div class=\"modal fade\" id=\"updateAnswerModal\" tabindex=\"-1\" aria-hidden=\"true\">
            <div class=\"modal-dialog\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h5 class=\"modal-title\" >Modifier une réponse</h5>
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                    </div>
                    <form method=\"POST\">
                        <div class=\"modal-body\">
                            <div class=\"listAnswer\">
                                <input type=\"hidden\" id=\"idAnswerUpdate\" name=\"idAnswerUpdate\">
                                <div class=\"form-check form-switch\">
                                    <input id=\"validAnswerUpdate\" class=\"form-check-input\" type=\"checkbox\" name=\"validAnswer\">
                                    <label class=\"form-check-label\">Réponse valide</label>
                                </div>

                                <input id=\"answerUpdate\" class=\"form-control\" type=\"text\" name=\"answerUpdate\">
                    </div>
                        </div>
                        <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                            <button type=\"submit\" class=\"btn btn-outline-danger\" name=\"deleteAnswer\">Supprimer</button>
                            <button type=\"submit\" class=\"btn btn-outline-primary\" name=\"updateAnswer\">Modifier</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>


    <script type=\"text/javascript\" src=\"../assets/script/questions.js\"></script>
  
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
        return "admin/answer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  224 => 25,  220 => 24,  152 => 41,  139 => 39,  135 => 38,  132 => 37,  124 => 35,  119 => 32,  115 => 31,  109 => 27,  106 => 24,  102 => 23,  94 => 21,  86 => 16,  82 => 15,  76 => 12,  72 => 11,  66 => 8,  62 => 7,  56 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/answer.html.twig", "C:\\xampp\\htdocs\\jeuDeLoieV2\\framework\\templates\\admin\\answer.html.twig");
    }
}
