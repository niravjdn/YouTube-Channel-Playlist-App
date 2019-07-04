<?php

/* AppBundle:Category:add.html.twig */
class __TwigTemplate_441d5b0797fa7c5615528a31a561b5efcd4bb8c9391446b7fd0d05562be38143 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "AppBundle:Category:add.html.twig", 1);
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
                    <i class=\"material-icons\">view_list</i>
                </div>
                <div class=\"card-content\">
                    <h4 class=\"card-title\">New sub-category</h4>
                    ";
        // line 12
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start');
        echo "
                    <form method=\"#\" action=\"#\">
                        <div class=\"form-group label-floating is-empty\">
                            <label class=\"control-label\">Category title</label>
                            ";
        // line 16
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                            <span class=\"validate-input\">";
        // line 17
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'errors');
        echo "</span>
                        </div>
                        <div class=\"fileinput fileinput-new text-center\" style=\"    width: 100%;\" data-provides=\"fileinput\">
                            <div class=\"fileinput-new thumbnail\" style=\"    width: 100%;\">
                                <img  id=\"img-preview\" src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('Liip\ImagineBundle\Templating\ImagineExtension')->filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/image_placeholder.jpg"), "album_thumb"), "html", null, true);
        echo "\"  width=\"100%\">
                            </div>
                           ";
        // line 23
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "file", array()), 'widget', array("attr" => array("class" => "file-hidden input-file img-selector", "style" => "    display: none;")));
        echo "
                            <div class=\"fileinput-preview thumbnail\"></div>
                            <div>
                                <a href=\"#\" class=\"btn btn-rose btn-round btn-select\"><i class=\"material-icons\">image</i> Select image </a>
                            </div>
                            <span class=\"validate-input\">";
        // line 28
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "file", array()), 'errors');
        echo "</span>
                       </div>
                        <span class=\"pull-right\"><a href=\"";
        // line 30
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_category_index");
        echo "\" class=\"btn btn-fill btn-yellow\"><i class=\"material-icons\">arrow_back</i> Cancel</a>";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "save", array()), 'widget', array("attr" => array("class" => "btn btn-fill btn-rose")));
        echo "</span>
                    ";
        // line 31
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
        return "AppBundle:Category:add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 31,  78 => 30,  73 => 28,  65 => 23,  60 => 21,  53 => 17,  49 => 16,  42 => 12,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AppBundle:Category:add.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/AppBundle/Resources/views/Category/add.html.twig");
    }
}
