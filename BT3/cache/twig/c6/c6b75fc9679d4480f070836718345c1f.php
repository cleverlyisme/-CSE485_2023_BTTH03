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

/* home/index.twig */
class __TwigTemplate_45b95178df9a4f9911c8b92dc9b32840 extends Template
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
        $this->loadTemplate("includes/header.twig", "home/index.twig", 1)->display($context);
        // line 2
        echo "
<div id=\"carouselExampleIndicators\" class=\"carousel slide\">
    <div class=\"carousel-indicators\">
        <button type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide-to=\"0\" class=\"active\" aria-current=\"true\"
            aria-label=\"Slide 1\"></button>
        <button type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide-to=\"1\" aria-label=\"Slide 2\"></button>
        <button type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide-to=\"2\" aria-label=\"Slide 3\"></button>
    </div>
    <div class=\"carousel-inner\">
        <div class=\"carousel-item active\">
            <img src=\"./assets/images/slideshow/slide01.jpg\" class=\"d-block w-100\" alt=\"...\">
        </div>
        <div class=\"carousel-item\">
            <img src=\"./assets/images/slideshow/slide02.jpg\" class=\"d-block w-100\" alt=\"...\">
        </div>
        <div class=\"carousel-item\">
            <img src=\"./assets/images/slideshow/slide03.jpg\" class=\"d-block w-100\" alt=\"...\">
        </div>
    </div>
    <button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide=\"prev\">
        <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
        <span class=\"visually-hidden\">Previous</span>
    </button>
    <button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide=\"next\">
        <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
        <span class=\"visually-hidden\">Next</span>
    </button>
</div>

<main class=\"container-fluid mt-3\">
    <h3 class=\"text-center text-uppercase mb-3 text-primary\">TOP bài hát yêu thích</h3>
    <div class=\"row\">
        ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["baiviet"]) {
            // line 35
            echo "        <div class=\"col-sm-3\">
            <div class=\"card mb-2\" style=\"width: 100%;\">
                <img src=\"./assets/images/songs/";
            // line 37
            echo twig_escape_filter($this->env, (($__internal_compile_0 = $context["baiviet"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["hinhanh"] ?? null) : null), "html", null, true);
            echo "\" class=\"card-img-top\" alt=\"...\">
                <div class=\"card-body\">
                    <h5 class=\"card-title text-center\">
                        <a href=\"?controller=detail&id=";
            // line 40
            echo twig_escape_filter($this->env, (($__internal_compile_1 = $context["baiviet"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["ma_bviet"] ?? null) : null), "html", null, true);
            echo "\" class=\"text-decoration-none\">";
            echo twig_escape_filter($this->env, (($__internal_compile_2 = $context["baiviet"]) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["tieude"] ?? null) : null), "html", null, true);
            echo "</a>
                    </h5>
                </div>
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['baiviet'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "    </div>
</main>

";
        // line 49
        $this->loadTemplate("includes/footer.twig", "home/index.twig", 49)->display($context);
    }

    public function getTemplateName()
    {
        return "home/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 49,  101 => 46,  87 => 40,  81 => 37,  77 => 35,  73 => 34,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% include 'includes/header.twig' %}

<div id=\"carouselExampleIndicators\" class=\"carousel slide\">
    <div class=\"carousel-indicators\">
        <button type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide-to=\"0\" class=\"active\" aria-current=\"true\"
            aria-label=\"Slide 1\"></button>
        <button type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide-to=\"1\" aria-label=\"Slide 2\"></button>
        <button type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide-to=\"2\" aria-label=\"Slide 3\"></button>
    </div>
    <div class=\"carousel-inner\">
        <div class=\"carousel-item active\">
            <img src=\"./assets/images/slideshow/slide01.jpg\" class=\"d-block w-100\" alt=\"...\">
        </div>
        <div class=\"carousel-item\">
            <img src=\"./assets/images/slideshow/slide02.jpg\" class=\"d-block w-100\" alt=\"...\">
        </div>
        <div class=\"carousel-item\">
            <img src=\"./assets/images/slideshow/slide03.jpg\" class=\"d-block w-100\" alt=\"...\">
        </div>
    </div>
    <button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide=\"prev\">
        <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
        <span class=\"visually-hidden\">Previous</span>
    </button>
    <button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide=\"next\">
        <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
        <span class=\"visually-hidden\">Next</span>
    </button>
</div>

<main class=\"container-fluid mt-3\">
    <h3 class=\"text-center text-uppercase mb-3 text-primary\">TOP bài hát yêu thích</h3>
    <div class=\"row\">
        {% for baiviet in data %}
        <div class=\"col-sm-3\">
            <div class=\"card mb-2\" style=\"width: 100%;\">
                <img src=\"./assets/images/songs/{{ baiviet['hinhanh'] }}\" class=\"card-img-top\" alt=\"...\">
                <div class=\"card-body\">
                    <h5 class=\"card-title text-center\">
                        <a href=\"?controller=detail&id={{ baiviet['ma_bviet'] }}\" class=\"text-decoration-none\">{{ baiviet['tieude'] }}</a>
                    </h5>
                </div>
            </div>
        </div>
        {% endfor %}
    </div>
</main>

{% include 'includes/footer.twig' %}", "home/index.twig", "D:\\Program Files\\xampp\\htdocs\\projects\\CSE485_2023_BTTH03\\BT3\\views\\home\\index.twig");
    }
}
