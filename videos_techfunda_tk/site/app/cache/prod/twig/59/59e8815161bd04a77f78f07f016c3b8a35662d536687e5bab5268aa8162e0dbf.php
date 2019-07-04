<?php

/* AppBundle:Language:index.html.twig */
class __TwigTemplate_e5010ea22a33d861bcf15998398e522bd034678e8aa8c89f79260682cdfcf703 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "AppBundle:Language:index.html.twig", 1);
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
        echo "<div class=\"container-fluid\">
    <div class=\"row\">
\t\t<div class=\"col-md-12\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<a href=\"";
        // line 8
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_language_index");
        echo "\" class=\"btn  btn-lg btn-warning col-md-12\"><i class=\"material-icons\" style=\"font-size: 30px;\">refresh</i> Refresh</a>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<a class=\"btn btn btn-lg btn-yellow col-md-12\"><i class=\"material-icons\" style=\"font-size: 30px;\">flag</i> ";
        // line 11
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["languages"]) ? $context["languages"] : null)), "html", null, true);
        echo " languages</a>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<a href=\"";
        // line 14
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_language_add");
        echo "\" class=\"btn btn-rose btn-lg pull-right add-button col-md-12\" title=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">add_box</i> NEW LANGUAGE </a>
\t\t\t\t</div>
\t\t\t</div>
       \t\t<div class=\"row\">
       \t\t ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 19
            echo "       \t\t \t<div class=\"col-md-4\">
\t\t       \t\t<div class=\"card\">
\t\t       \t\t\t<div class=\"card-content\" style=\"    text-align: center;\">
\t\t       \t\t\t\t<img src=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('Liip\ImagineBundle\Templating\ImagineExtension')->filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute($this->getAttribute($context["language"], "media", array()), "link", array())), "language_thumb"), "html", null, true);
            echo "\" style=\"width:100px; height:100px;    border-radius: 5px;\" >
\t\t       \t\t\t\t<br>
\t\t       \t\t\t\t<span class=\"label-lang\">";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language", array()), "html", null, true);
            echo "</span>
\t\t       \t\t\t</div>
\t\t       \t\t\t<div class=\"card-footer\" style=\"    text-align: center;\">
\t       \t\t\t\t\t<a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_language_edit", array("id" => $this->getAttribute($context["language"], "id", array()))), "html", null, true);
            echo "\" rel=\"tooltip\" data-placement=\"left\" class=\" btn btn-primary btn-xs btn-round\" data-original-title=\"Edit\">
                                <i class=\"material-icons\">edit</i>
                            </a>
                            <a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_language_delete", array("id" => $this->getAttribute($context["language"], "id", array()))), "html", null, true);
            echo "\" rel=\"tooltip\" data-placement=\"left\" class=\" btn btn-danger btn-xs btn-round\" data-original-title=\"Delete\">
                                <i class=\"material-icons\">delete</i>
                            </a>
                           <a href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_language_up", array("id" => $this->getAttribute($context["language"], "id", array()))), "html", null, true);
            echo "\" rel=\"tooltip\" data-placement=\"left\" class=\" btn btn-info btn-xs btn-round\" data-original-title=\"Up\">
                              <i class=\"material-icons\">keyboard_arrow_up</i>
                            </a>
                            <a href=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_language_down", array("id" => $this->getAttribute($context["language"], "id", array()))), "html", null, true);
            echo "\" rel=\"tooltip\" data-placement=\"left\" class=\" btn btn-info btn-xs btn-round\" data-original-title=\"Down\">
\t\t\t\t\t\t\t\t<i class=\"material-icons\">keyboard_arrow_down</i>
                            </a>
\t\t       \t\t\t</div>
\t\t       \t\t</div>
\t       \t\t</div>
\t\t    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 43
            echo "\t\t\t    <div class=\"col-md-12\">
\t\t\t\t<div class=\"card\">
\t       \t\t\t<div class=\"card-content\">
\t       \t\t\t  <br>
\t\t\t          <br>
\t\t\t          <center><img src=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/bg_empty.png"), "html", null, true);
            echo "\"  style=\"width: auto !important;\" =\"\"></center>
\t\t              <br>
\t\t              <br>
\t\t\t        </div>
\t       \t\t</div>
\t       \t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "\t\t\t</div>
\t\t\t

\t    </div>
\t</div>
                            
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Language:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 55,  115 => 48,  108 => 43,  96 => 36,  90 => 33,  84 => 30,  78 => 27,  72 => 24,  67 => 22,  62 => 19,  57 => 18,  50 => 14,  44 => 11,  38 => 8,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AppBundle:Language:index.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/AppBundle/Resources/views/Language/index.html.twig");
    }
}
