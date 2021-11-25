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
                <input type=\"text\" class=\"form-control\" placeholder=\"Recipient's username\"
                    aria-label=\"Recipient's username\" aria-describedby=\"button-addon2\">
                <button class=\"btn btn-outline-secondary\" type=\"button\" id=\"button-addon2\"><i
                        class=\"fas fa-search\"></i></button>
            </div>

            <select class=\"form-select\" aria-label=\"Default select example\">
                <option selected value=\"ROLES_ADMIN\">asc</option>
                <option value=\"ROLES_USER\">desc</option>
            </select>
        </div>
        <button type=\"button\" class=\"btn btn-outline-success\"  data-bs-toggle=\"modal\" data-bs-target=\"#modalQuestions\">Ajouter une nouvelle question</button>
        <div class=\"question-answers\">
            <h3>Quelle est la capitale de la France ? </h3>
            <ul class=\" list-group-flush\">
                <li class=\"list-group-item\">Paris</li>
                <li class=\"list-group-item\">Marseille </li>
                <li class=\"list-group-item\">Forbach</li>
            </ul>
        </div>
        <div class=\"question-answers\">
            <h3>Quelle est la ville la plus grande de France ? </h3>
            <ul class=\" list-group-flush\">
                <li class=\"list-group-item\">Paris</li>
                <li class=\"list-group-item\">Marseille</li>
                <li class=\"list-group-item\">Forbach</li>
            </ul>
        </div>
    </main>

<div class=\"modal fade\" id=\"modalQuestions\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"exampleModalLabel\">Ajouter une question</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>

        <form action=\"questions\" method=\"post\">
            <div class=\"modal-body list-group list-group-flush\">
                <div class=\"list-group-item\">
                    <label for=\"exampleInputEmail1\" class=\"form-label\">Label question</label>
                    <input class=\"form-control\" type=\"text\" name=\"label\">
                </div>
                <div class=\"list-group-item\">
                    <label for=\"exampleInputEmail1\" class=\"form-label\">Niveau de difficulté</label>
                    <select class=\"form-select\" name=\"level\">
                        <option selected>Choisir le niveau de difficulté</option>
                        <option value=\"1\">Vert</option>
                        <option value=\"2\">Jaune</option>
                        <option value=\"3\">Bleu</option>
                        <option value=\"4\">Orange</option>
                        <option value=\"5\">Rouge</option>
                        <option value=\"6\">Noir</option>
                    </select>
                </div>
                <div class=\"list-group-item\">
                    <label for=\"exampleInputEmail1\" class=\"form-label\">Question</label>
                    <input class=\"form-control\" type=\"text\" name=\"question\">
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
    <script type=\"text/javascript\" src=\"assets/script/script.js\"></script>

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
        return array (  215 => 26,  211 => 25,  112 => 28,  109 => 25,  105 => 24,  95 => 22,  86 => 16,  82 => 15,  76 => 12,  72 => 11,  66 => 8,  62 => 7,  56 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/questions.html.twig", "C:\\xampp\\htdocs\\jeuDeLoieV2\\framework\\templates\\admin\\questions.html.twig");
    }
}