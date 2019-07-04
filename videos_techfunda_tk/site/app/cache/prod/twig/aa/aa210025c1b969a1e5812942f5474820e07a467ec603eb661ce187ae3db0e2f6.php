<?php

/* MediaBundle::layout.html.twig */
class __TwigTemplate_c442f5a4f04fc8cff0ecc0ac055bff03300ade30859aeebf6085d9c33573665c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t<title></title>
  <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/box.css"), "html", null, true);
        echo "\">

\t<link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("font-awesome/css/font-awesome.min.css"), "html", null, true);
        echo "\">
</head>
<body>
<script type=\"text/javascript\">
function sendToParent(file_path) {
    window.opener.InsertHTML(file_path);
}
</script>
";
        // line 16
        $this->displayBlock('body', $context, $blocks);
        // line 19
        echo "</body>
</html>";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        echo "    
";
    }

    public function getTemplateName()
    {
        return "MediaBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 17,  53 => 16,  48 => 19,  46 => 16,  35 => 8,  30 => 6,  26 => 5,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "MediaBundle::layout.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/MediaBundle/Resources/views/layout.html.twig");
    }
}
