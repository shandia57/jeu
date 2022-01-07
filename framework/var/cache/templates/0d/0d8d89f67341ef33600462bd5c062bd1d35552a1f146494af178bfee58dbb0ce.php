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

/* /game.html.twig */
class __TwigTemplate_ee05547347512debeea94ade19d2a76a077a5b5959ec034539808808ff04637e extends Template
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
        echo "<html>

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

    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/style/buttonCreateGame.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/style/game.css\">

</head>
<body>

\t<main>
        ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 29
            echo "            <input type=\"hidden\" name=\"users\" value=";
            echo twig_escape_filter($this->env, $context["user"], "html", null, true);
            echo ">
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "        <h1>Entrez votre username<h1>
        <div class=\"containerConnection\">
            <div class=\"input-group mb-3\">
                <input id=\"testText\" type=\"text\" class=\"form-control\" placeholder=\"Username\" aria-label=\"Recipient's username\" aria-describedby=\"button-addon2\">
                <button id=\"btnGo\" class=\"btn btn-outline-secondary\" type=\"submit\">Go</button>
            </div>
            <div id=\"usernameHelp\" class=\"form-text\"></div>
        </div>
\t</main>


<div id=\"btnBottom\">
    <button id=\"btnChatBox\"  type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#chatBox\">
    Open the chat box
    </button>

    <button id=\"btnConsole\"  type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#consoleGame\">
    Console Game
    </button>
</div>

<!-- Modal -->
<div class=\"modal fade\" id=\"chatBox\" data-bs-backdrop=\"static\" data-bs-keyboard=\"false\" tabindex=\"-1\" aria-labelledby=\"staticBackdropLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog modal-xl\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">Chat box</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>
      <div class=\"modal-body\">
        <ul id=\"messages\"></ul>
        <form id=\"form\" action=\"\">
            <input id=\"input\" autocomplete=\"off\" /><button>Send</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class=\"modal fade\" id=\"consoleGame\" data-bs-backdrop=\"static\" data-bs-keyboard=\"false\" tabindex=\"-1\" aria-labelledby=\"staticBackdropLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog modal-xl\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"staticBackdropLabel\">Console</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>
      <div class=\"modal-body\">
        <ul id=\"listOutput\"></ul>
      </div>
    </div>
  </div>
</div>

    ";
        // line 86
        echo "
\t<script type=\"module\" src=\"node_modules/socket.io/client-dist/socket.io.js\"></script>
\t<script type=\"module\" src=\"assets/script/modules/Game/game.js\"></script>
\t<script type=\"module\" src=\"assets/script/modules/Game/receiveFromServer.js\"></script>


</body>
</html>";
    }

    public function getTemplateName()
    {
        return "/game.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 86,  79 => 31,  70 => 29,  66 => 28,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/game.html.twig", "C:\\wamp64\\www\\jeuDeLoieV2\\framework\\templates\\game.html.twig");
    }
}
