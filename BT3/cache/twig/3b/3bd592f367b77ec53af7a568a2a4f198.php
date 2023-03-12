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

/* includes/footer.twig */
class __TwigTemplate_2314439834d7af28266ab73ac6542106 extends Template
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
        echo "<footer class=\"bg-white d-flex justify-content-center align-items-center border-top border-secondary border-2\" style=\"height:80px\">
    <h4 class=\"text-center text-uppercase fw-bold\">TLU's music garden</h4>
</footer>

<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js\"
    integrity=\"sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN\" crossorigin=\"anonymous\"></script>

<script src=\"https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js\"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#ckeditor'))
        .catch(error => {
            console.error(error);
        });
</script>
";
    }

    public function getTemplateName()
    {
        return "includes/footer.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<footer class=\"bg-white d-flex justify-content-center align-items-center border-top border-secondary border-2\" style=\"height:80px\">
    <h4 class=\"text-center text-uppercase fw-bold\">TLU's music garden</h4>
</footer>

<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js\"
    integrity=\"sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN\" crossorigin=\"anonymous\"></script>

<script src=\"https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js\"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#ckeditor'))
        .catch(error => {
            console.error(error);
        });
</script>
", "includes/footer.twig", "D:\\Program Files\\xampp\\htdocs\\projects\\CSE485_2023_BTTH03\\BT3\\views\\includes\\footer.twig");
    }
}
