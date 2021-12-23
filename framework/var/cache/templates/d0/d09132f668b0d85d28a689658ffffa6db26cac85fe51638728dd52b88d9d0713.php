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

/* Admin/answer.html.twig */
class __TwigTemplate_622ea6ef397ac8f97aa1678eb7246cab3f2ae0324c07f2ddcd8c4a14f780f535 extends Template
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

    <!-- CSS -->
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\"
        integrity=\"sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC\" crossorigin=\"anonymous\">
    <!-- JS -->
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js\"
        integrity=\"sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM\"
        crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js\"
        integrity=\"sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM\"
        crossorigin=\"anonymous\"></script>

    <script src=\"https://kit.fontawesome.com/4ad0f6d59d.js\" crossorigin=\"anonymous\"></script>

    <link rel=\"stylesheet\" type=\"text/css\" href=\"../assets/style/style.css\">

</head>


<body>

    <header>
        <nav class=\"navbar navbar-light bg-light\">
            <div class=\"container-fluid\">
                <a class=\"navbar-brand\" href=\"/questions\"> <i class=\"fas fa-arrow-left\"></i> Retour aux questions</a>
            </div>
        </nav>
    </header>

    <main>

        <div>
            ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["questions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["singleQuestion"]) {
            // line 41
            echo "

            <h2>";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["singleQuestion"], "question", [], "any", false, false, false, 43), "html", null, true);
            echo "</h2>
            <small>(Cliquez sur la réponse pour modifier)</small>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['singleQuestion'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "            <ul class=\"list-group list-group-flush\">
                ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["answers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
            // line 48
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, $context["answer"], "valid", [], "any", false, false, false, 48) == "1")) {
                // line 49
                echo "                <li class=\"list-group-item\" style=\"color:green;\" data-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["answer"], "id_answer", [], "any", false, false, false, 49), "html", null, true);
                echo "\"
                    data-value=\"";
                // line 50
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["answer"], "valid", [], "any", false, false, false, 50), "html", null, true);
                echo "\" data-bs-toggle=\"modal\" data-bs-target=\"#updateAnswerModal\"
                    onclick=\"updateAnswer(this)\">";
                // line 51
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["answer"], "answer", [], "any", false, false, false, 51), "html", null, true);
                echo "</li>
                ";
            } else {
                // line 53
                echo "                <li class=\"list-group-item\" data-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["answer"], "id_answer", [], "any", false, false, false, 53), "html", null, true);
                echo "\" data-value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["answer"], "valid", [], "any", false, false, false, 53), "html", null, true);
                echo "\"
                    data-bs-toggle=\"modal\" data-bs-target=\"#updateAnswerModal\" onclick=\"updateAnswer(this)\">
                    ";
                // line 55
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["answer"], "answer", [], "any", false, false, false, 55), "html", null, true);
                echo "</li>
                ";
            }
            // line 57
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['answer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "            </ul>
        </div>
        <button type=\"button\" class=\"btn btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#addAnswerModal\">Nouvelle
            réponse</button>

    </main>
    <!-- Modal Add Answer -->
    <div class=\"modal fade\" id=\"addAnswerModal\" tabindex=\"-1\" aria-hidden=\"true\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\">Nouvelle réponse</h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <form method=\"post\">
                    <div class=\"modal-body\">
                        <div class=\"form-check form-switch\">
                            <label class=\"form-check-label\">Réponse valide</label>
                            <input class=\"form-check-input\" type=\"checkbox\" name=\"validAnswer\">
                        </div>
                        <input class=\"form-control\" type=\"text\" name=\"answer\">
                        <div class=\"form-text\">";
        // line 79
        echo twig_escape_filter($this->env, ($context["answer"] ?? null), "html", null, true);
        echo "</div>

                    </div>
                    <div class=\"modal-footer\">
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
                    <h5 class=\"modal-title\">Modifier une réponse</h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <form method=\"POST\">
                    <div class=\"modal-body\">
                        <div class=\"listAnswer\">
                            <input type=\"hidden\" id=\"idAnswerUpdate\" name=\"idAnswerUpdate\">
                            <div class=\"form-check form-switch\">
                                <input id=\"validAnswerUpdate\" class=\"form-check-input\" type=\"checkbox\"
                                    name=\"validAnswer\">
                                <label class=\"form-check-label\">Réponse valide</label>
                            </div>

                            <input id=\"answerUpdate\" class=\"form-control\" type=\"text\" name=\"answer\">
                            <div class=\"form-text\">";
        // line 109
        echo twig_escape_filter($this->env, ($context["answer"] ?? null), "html", null, true);
        echo "</div>

                        </div>
                    </div>

                    <div class=\"position-relative\">
                        <hr>
                        <div id=\"containerBtn\">
                            <button type=\"button\" id=\"btnDelete\" class=\"btn btn-danger \" data-bs-dismiss=\"modal\"
                                name=\"deleteAnswer\">Supprimer</button>
                            <button type=\"submit\" id=\"btnModifier\" class=\"btn btn-primary\"
                                name=\"updateAnswer\">Modifier</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script type=\"text/javascript\" src=\"../assets/script/scripts/answers.js\"></script>

</body>

</html>";
    }

    public function getTemplateName()
    {
        return "Admin/answer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 109,  161 => 79,  138 => 58,  132 => 57,  127 => 55,  119 => 53,  114 => 51,  110 => 50,  105 => 49,  102 => 48,  98 => 47,  95 => 46,  86 => 43,  82 => 41,  78 => 40,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Admin/answer.html.twig", "C:\\xampp\\htdocs\\jeuDeLoieV2\\framework\\templates\\admin\\answer.html.twig");
    }
}
