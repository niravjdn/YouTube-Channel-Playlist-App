<?php

/* AppBundle:Report:delete.html.twig */
class __TwigTemplate_891d876dd29d64d4059f7d0b4d922896bf0c66959b7a075badc4332e9030b983 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "AppBundle:Report:delete.html.twig", 1);
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
    <div class=\"swal2-modal swal2-show\" style=\"display: block; width: 500px; padding: 20px; background: rgb(255, 255, 255); min-height: 332px;\" tabindex=\"-1\">
        <ul class=\"swal2-progresssteps\" style=\"display: none;\"></ul>
        <div class=\"swal2-icon swal2-error\" style=\"display: none;\"><span class=\"x-mark\"><span class=\"line left\"></span><span class=\"line right\"></span></span>
        </div>
        <div class=\"swal2-icon swal2-question\" style=\"display: none;\">?</div>
        <div class=\"swal2-icon swal2-warning pulse-warning\" style=\"display: block;\">!</div>
        <div class=\"swal2-icon swal2-info\" style=\"display: none;\">i</div>
        <div class=\"swal2-icon swal2-success\" style=\"display: none;\"><span class=\"line tip\"></span> <span class=\"line long\"></span>
            <div class=\"placeholder\"></div>
            <div class=\"fix\"></div>
        </div><img class=\"swal2-image\" style=\"display: none;\">
        <h2>Are you sure</h2>
        <div class=\"swal2-content\" style=\"display: block;\">Do you really want to delete the message</div>
        <input class=\"swal2-input\" style=\"display: none;\">
        <input type=\"file\" class=\"swal2-file\" style=\"display: none;\">
        <div class=\"swal2-range\" style=\"display: none;\">
            <output></output>
            <input type=\"range\">
        </div>
        <select class=\"swal2-select\" style=\"display: none;\"></select>
        <div class=\"swal2-radio\" style=\"display: none;\"></div>
        <label for=\"swal2-checkbox\" class=\"swal2-checkbox\" style=\"display: none;\">
            <input type=\"checkbox\">
        </label>
        <textarea class=\"swal2-textarea\" style=\"display: none;\"></textarea>
        <div class=\"swal2-validationerror\" style=\"display: none;\"></div>
        <hr class=\"swal2-spacer\" style=\"display: block;\">
        ";
        // line 31
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start');
        echo "
              ";
        // line 32
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "Yes", array()), 'widget', array("attr" => array("class" => "swal2-confirm btn btn-success")));
        echo "
              <a href=\"";
        // line 33
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_report_index");
        echo "\" class=\"swal2-cancel btn btn-danger\">Cancel</a>
        ";
        // line 34
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Report:delete.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 34,  69 => 33,  65 => 32,  61 => 31,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AppBundle:Report:delete.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/AppBundle/Resources/views/Report/delete.html.twig");
    }
}
