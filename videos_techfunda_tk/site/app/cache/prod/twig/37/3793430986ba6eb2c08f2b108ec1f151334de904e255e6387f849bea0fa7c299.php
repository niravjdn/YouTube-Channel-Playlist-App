<?php

/* @App/Comment/api_by.html.php */
class __TwigTemplate_7611d8f633123f378e1d5647f67f316b7654f67361e58a56cdee60e4da13db53 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<?php 
\$list=array();
foreach (\$comments as \$key => \$comment) {
\t\$a[\"id\"]=\$comment->getId();
\t\$a[\"user\"]=\$comment->getUser()->getName();
\t\$a[\"image\"]=\$comment->getUser()->getImage();
\t\$a[\"content\"]=\$comment->getContent();
\t\$a[\"enabled\"]=\$comment->getEnabled();
\t\$a[\"created\"]=\$view['time']->diff(\$comment->getCreated());
\t\$list[]=\$a;
}
echo json_encode(\$list, JSON_UNESCAPED_UNICODE);
?>";
    }

    public function getTemplateName()
    {
        return "@App/Comment/api_by.html.php";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@App/Comment/api_by.html.php", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/AppBundle/Resources/views/Comment/api_by.html.php");
    }
}
