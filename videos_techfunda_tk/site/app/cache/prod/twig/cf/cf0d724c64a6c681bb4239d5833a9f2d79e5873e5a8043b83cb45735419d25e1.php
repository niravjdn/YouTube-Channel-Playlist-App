<?php

/* AppBundle:Version:edit.html.twig */
class __TwigTemplate_3ad468dcaafd792eb153875092091bcbd87be78f59f0e83bfb535b49bde0d01c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "AppBundle:Version:edit.html.twig", 1);
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
       <div class=\"col-sm-offset-2 col-md-8\">
            <div class=\"card\">
                <div class=\"card-header card-header-icon\" data-background-color=\"rose\">
                    <i class=\"material-icons\">apps</i>
                </div>
                <div class=\"card-content\">
                    <h4 class=\"card-title\">Edit (";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "value", array()), "title", array()), "html", null, true);
        echo ")</h4>
                    ";
        // line 12
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start');
        echo "
                    <form method=\"#\" action=\"#\">
                        <div class=\"form-group label-floating\">
                            <label class=\"control-label\">version title</label>
                            ";
        // line 16
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                            <span class=\"validate-input\">";
        // line 17
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'errors');
        echo "</span>
                        </div>
                        <div class=\"form-group label-floating is-empty\">
                            <label class=\"control-label\">The new features</label>
                            ";
        // line 21
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "features", array()), 'widget', array("attr" => array("class" => "form-control", "rows" => 12)));
        echo "
                            <span class=\"validate-input\">";
        // line 22
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "features", array()), 'errors');
        echo "</span>
                        </div>
                        <div class=\"form-group label-floating\">
                            <label class=\"control-label\">version code</label>
                            <br>
                            ";
        // line 27
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "code", array()), 'widget', array("attr" => array("class" => "form-control ")));
        echo "
                            <span class=\"validate-input\">";
        // line 28
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "code", array()), 'errors');
        echo "</span>
                        </div>
                        <div class=\"form-group label-floating is-empty\">
                              <label>
                                ";
        // line 32
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "enabled", array()), 'widget');
        echo "  Enabled
                              </label>
                        </div>
                       <br>
                        <span class=\"pull-right\"><a href=\"";
        // line 36
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_version_index");
        echo "\" class=\"btn btn-fill btn-yellow\"><i class=\"material-icons\">arrow_back</i> Cancel</a>";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "save", array()), 'widget', array("attr" => array("class" => "btn btn-fill btn-rose")));
        echo "</span>
                    ";
        // line 37
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
                </div>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Version:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 37,  93 => 36,  86 => 32,  79 => 28,  75 => 27,  67 => 22,  63 => 21,  56 => 17,  52 => 16,  45 => 12,  41 => 11,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AppBundle:Version:edit.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/AppBundle/Resources/views/Version/edit.html.twig");
    }
}
