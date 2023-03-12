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

/* includes/header.twig */
class __TwigTemplate_87f76f6beb6864798652e84d0829c4e0 extends Template
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
        $context["paths"] = [0 => ["name" => "Đăng nhập", "path" => "?controller=auth"]];
        // line 4
        echo "
<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Music for Life</title>
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css\" rel=\"stylesheet\"
            integrity=\"sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD\" crossorigin=\"anonymous\">
        <link rel=\"stylesheet\" href=\"./assets/css/style.css\">
    </head>

    <body>
        <header>
            <nav class=\"navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded\">
                <div class=\"container-fluid\">
                    <div class=\"my-logo\">
                        <a class=\"navbar-brand\" href=\"?controller=home\">
                            <img src=\"./assets/images/logo.png\" alt=\"\" class=\"img-fluid\">
                        </a>
                    </div>
                    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\"
                        aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                        <span class=\"navbar-toggler-icon\"></span>
                    </button>
                    <div class=\"collapse navbar-collapse px-5\" id=\"navbarSupportedContent\">
                        <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
                            <li class=\"nav-item\">
                                <a class=\"nav-link ";
        // line 33
        echo (((twig_length_filter($this->env, twig_array_filter($this->env, ($context["paths"] ?? null), function ($__path__) use ($context, $macros) { $context["path"] = $__path__; return $this->extensions['MyTwigExtension']->containsFilter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 33), "uri", [], "any", false, false, false, 33), twig_get_attribute($this->env, $this->source, ($context["path"] ?? null), "path", [], "any", false, false, false, 33)); })) == 0)) ? ("active") : (""));
        echo "\" aria-current=\"page\" href=\"?controller=Home\">Trang chủ</a>
                            </li>
                            ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["paths"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["path"]) {
            // line 36
            echo "                                <li class=\"nav-item\">
                                    <a class=\"nav-link ";
            // line 37
            echo (($this->extensions['MyTwigExtension']->containsFilter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 37), "uri", [], "any", false, false, false, 37), twig_get_attribute($this->env, $this->source, $context["path"], "path", [], "any", false, false, false, 37))) ? ("active") : (""));
            echo "\" aria-current=\"page\" href=\"./";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["path"], "path", [], "any", false, false, false, 37), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["path"], "name", [], "any", false, false, false, 37), "html", null, true);
            echo "</a>
                                </li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['path'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "                        </ul>
                        <form class=\"d-flex\" action=\"?controller=home&action=search\" method=\"post\" role=\"search\">
                            <input class=\"form-control me-2\" type=\"search\" placeholder=\"Nội dung cần tìm\" aria-label=\"Search\" name=\"search\">
                            <button class=\"btn btn-outline-success\" type=\"submit\">Tìm</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
";
    }

    public function getTemplateName()
    {
        return "includes/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 40,  82 => 37,  79 => 36,  75 => 35,  70 => 33,  39 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set paths = [
    {'name': 'Đăng nhập', 'path': '?controller=auth'}
] %}

<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Music for Life</title>
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css\" rel=\"stylesheet\"
            integrity=\"sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD\" crossorigin=\"anonymous\">
        <link rel=\"stylesheet\" href=\"./assets/css/style.css\">
    </head>

    <body>
        <header>
            <nav class=\"navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded\">
                <div class=\"container-fluid\">
                    <div class=\"my-logo\">
                        <a class=\"navbar-brand\" href=\"?controller=home\">
                            <img src=\"./assets/images/logo.png\" alt=\"\" class=\"img-fluid\">
                        </a>
                    </div>
                    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\"
                        aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                        <span class=\"navbar-toggler-icon\"></span>
                    </button>
                    <div class=\"collapse navbar-collapse px-5\" id=\"navbarSupportedContent\">
                        <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
                            <li class=\"nav-item\">
                                <a class=\"nav-link {{ (paths|filter(path => app.request.uri|contains(path.path))|length) == 0 ? 'active' : '' }}\" aria-current=\"page\" href=\"?controller=Home\">Trang chủ</a>
                            </li>
                            {% for path in paths %}
                                <li class=\"nav-item\">
                                    <a class=\"nav-link {{ app.request.uri|contains(path.path) ? 'active' : '' }}\" aria-current=\"page\" href=\"./{{ path.path }}\">{{ path.name }}</a>
                                </li>
                            {% endfor %}
                        </ul>
                        <form class=\"d-flex\" action=\"?controller=home&action=search\" method=\"post\" role=\"search\">
                            <input class=\"form-control me-2\" type=\"search\" placeholder=\"Nội dung cần tìm\" aria-label=\"Search\" name=\"search\">
                            <button class=\"btn btn-outline-success\" type=\"submit\">Tìm</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
", "includes/header.twig", "D:\\Program Files\\xampp\\htdocs\\projects\\CSE485_2023_BTTH03\\BT3\\views\\includes\\header.twig");
    }
}
