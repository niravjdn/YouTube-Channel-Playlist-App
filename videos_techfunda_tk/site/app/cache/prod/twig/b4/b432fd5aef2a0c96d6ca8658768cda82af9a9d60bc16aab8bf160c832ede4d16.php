<?php

/* AppBundle:Report:index.html.twig */
class __TwigTemplate_50353345bbc5c297964fa445dc2739c3659bbaaef0da3e3e2e9cac4fed83fbc4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "AppBundle:Report:index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AppBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "
<div class=\"container-fluid\">
    <div class=\"row\">
\t\t<div class=\"col-md-12\">

\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<div style=\"padding-left: 0px;\">
\t\t\t\t\t\t<div class=\"card card-stats\">
\t\t\t\t\t\t\t<div class=\"card-header\" data-background-color=\"rose\">
\t\t\t\t\t\t\t\t<i class=\"material-icons\">messages</i>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t<p class=\"category\">report messages</p>
\t\t\t\t\t\t\t\t<h3 class=\"card-title\">";
        // line 17
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["reports"]) ? $context["reports"] : null)), "html", null, true);
        echo "</h3>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
       \t\t</div>
\t\t\t<div class=\"card\">
\t\t\t    <div class=\"card-content\">
\t\t\t        <div class=\"table-responsive\">
\t\t\t            <table class=\"table\" width=\"100%\">
\t\t\t                <thead class=\"text-primary\">
\t\t\t                \t<tr>
\t\t\t                    <th>#</th>
\t\t\t                    <th>Message</th>
\t\t\t                    <th>Date</th>
\t\t\t                    <th width=\"160px\">Action</th>
\t\t\t                \t</tr>
\t\t\t                </thead>
\t\t\t                <tbody>
\t\t\t                ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["report"]) {
            // line 37
            echo "\t\t\t                    <tr>
\t\t\t                        <td><img src=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('Liip\ImagineBundle\Templating\ImagineExtension')->filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute($this->getAttribute($this->getAttribute($context["report"], "wallpaper", array()), "media", array()), "link", array())), "section_thumb"), "html", null, true);
            echo "\" style=\"width:70px; height:70px;    border-radius: 5px;\" ></td>
\t\t\t                        <td>";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($context["report"], "message", array()), "html", null, true);
            echo "</td>
\t\t\t                        <td>";
            // line 40
            echo $this->env->getExtension('Knp\Bundle\TimeBundle\Twig\Extension\TimeExtension')->diff($this->getAttribute($context["report"], "created", array()));
            echo "</td>
\t\t\t                        <td>
\t\t                                <a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_wallpaper_delete", array("id" => $this->getAttribute($this->getAttribute($context["report"], "wallpaper", array()), "id", array()))), "html", null, true);
            echo "\" rel=\"tooltip\" data-placement=\"left\" class=\" btn btn-primary btn-xs btn-round\" data-original-title=\"Delete wallpaper\">
\t\t                                    <i class=\"material-icons\">delete</i>
\t\t                                </a>
\t\t                                <a href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_report_delete", array("id" => $this->getAttribute($context["report"], "id", array()))), "html", null, true);
            echo "\" rel=\"tooltip\" data-placement=\"left\" class=\" btn btn-danger btn-xs btn-round\" data-original-title=\"Delete report\">
\t\t                                    <i class=\"material-icons\">delete</i>
\t\t                                </a>
\t\t\t                        </td>
\t\t\t                    </tr>
\t\t\t                    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 51
            echo "\t\t\t\t\t\t          <tr>
\t\t\t\t\t\t\t          <td colspan=\"4\">
\t\t\t\t\t\t\t\t          <br>
\t\t\t\t\t\t\t\t          <br>
\t\t\t\t\t\t\t\t          <center><img src=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/bg_empty.png"), "html", null, true);
            echo "\"  style=\"width: auto !important;\" =\"\"></center>
\t\t\t\t\t\t\t              <br>
\t\t\t\t\t\t\t              <br>
\t\t\t\t\t\t\t          </td>
\t\t\t\t\t\t          </tr>\t
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['report'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "\t\t\t                </tbody>
\t\t\t            </table>

\t\t\t        </div>
\t    \t\t</div>
\t\t\t<div class=\" pull-right\">
\t\t\t\t";
        // line 67
        echo $this->env->getExtension('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension')->render($this->env, (isset($context["pagination"]) ? $context["pagination"] : null));
        echo "
\t\t\t</div>
\t    \t</div>
\t    </div>
\t</div>
                            
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Report:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 67,  125 => 61,  113 => 55,  107 => 51,  96 => 45,  90 => 42,  85 => 40,  81 => 39,  77 => 38,  74 => 37,  69 => 36,  47 => 17,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AppBundle:Report:index.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/AppBundle/Resources/views/Report/index.html.twig");
    }
}
