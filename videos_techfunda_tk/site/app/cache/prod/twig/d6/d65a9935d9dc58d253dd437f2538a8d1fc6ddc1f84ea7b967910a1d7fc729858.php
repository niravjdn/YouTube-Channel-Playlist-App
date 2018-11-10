<?php

/* AppBundle:Comment:index.html.twig */
class __TwigTemplate_f802fe78517a62a3a7e9da185d2e2b208bbd5c13fd3972737605aaf61e650cc0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "AppBundle:Comment:index.html.twig", 1);
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
\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t<a href=\"";
        // line 10
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_comment_index");
        echo "\" class=\"btn  btn-lg btn-warning col-md-12\"><i class=\"material-icons\" style=\"font-size: 30px;\">refresh</i> Refresh</a>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t<a class=\"btn btn btn-lg btn-yellow col-md-12\"><i class=\"material-icons\" style=\"font-size: 30px;\">message</i> ";
        // line 13
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["comments"]) ? $context["comments"] : null)), "html", null, true);
        echo " Comments</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t   
\t\t\t<div class=\"row\">
                ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 20
            echo "\t\t\t\t<div class=\"col-md-6\">
                    <ul class=\"timeline timeline-simple\">
                        <li class=\"timeline-inverted\">
                            <div class=\"timeline-badge danger\">
                                <img src=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comment"], "user", array()), "image", array()), "html", null, true);
            echo "\"  class=\"img-profile\">
                            </div>
                            <div class=\"timeline-panel\">
                                <div class=\"timeline-heading\">
                               \t\t<a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_edit", array("id" => $this->getAttribute($this->getAttribute($context["comment"], "user", array()), "id", array()))), "html", null, true);
            echo "\" title=\"\">
                                    \t<span class=\"label label-danger\">";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comment"], "user", array()), "name", array()), "html", null, true);
            echo "</span>
                                \t</a>
                                \t<span class=\"pull-right\" >
\t\t\t\t                        <a href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_comment_delete", array("id" => $this->getAttribute($context["comment"], "id", array()), "comment" => "true")), "html", null, true);
            echo "\"  rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Delete\">
\t\t\t\t                            <i class=\"material-icons\" style=\"color:red\">delete</i>
\t\t\t\t                        </a>
\t\t\t\t                        ";
            // line 35
            if ($this->getAttribute($context["comment"], "enabled", array())) {
                // line 36
                echo "\t\t\t\t\t                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_comment_hide", array("id" => $this->getAttribute($context["comment"], "id", array()))), "html", null, true);
                echo "\"  rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Hide\">
\t\t\t\t\t                             <i class=\"material-icons\">visibility_off</i>
\t\t\t\t\t                        </a>
\t\t\t\t                        ";
            } else {
                // line 39
                echo "\t\t\t\t                        
\t\t\t\t\t                        <a href=\"";
                // line 40
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_comment_hide", array("id" => $this->getAttribute($context["comment"], "id", array()))), "html", null, true);
                echo "\"  rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Show\">
\t\t\t\t\t                             <i class=\"material-icons\">remove_red_eye</i>
\t\t\t\t\t                        </a>
\t\t\t\t                        ";
            }
            // line 44
            echo "\t\t\t\t                    </span>
                                </div>
                                <div class=\"timeline-body\">
                                    <p>";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "contentclear", array()), "html", null, true);
            echo "</p>
                                </div>
                                <hr>
\t                                <a href=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_view", array("id" => $this->getAttribute($this->getAttribute($context["comment"], "video", array()), "id", array()))), "html", null, true);
            echo "\" title=\"\">
\t                                <small class=\"label label-rose\">
\t                                     <span>";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "video", array()), "html", null, true);
            echo "</span>
\t                                </small>
\t                                </a> \t

                                <small class=\"pull-right label label-rose\">
                                     <span>";
            // line 57
            echo $this->env->getExtension('Knp\Bundle\TimeBundle\Twig\Extension\TimeExtension')->diff($this->getAttribute($context["comment"], "created", array()));
            echo "</span>
                                </small>
                            </div>
                        </li>
                       
                    </ul>
                </div>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 65
            echo "\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<center><img src=\"";
            // line 69
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/bg_empty.png"), "html", null, true);
            echo "\"  style=\"width: auto !important;\" =\"\"></center>
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<br>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "\t    \t\t</div>
\t\t\t<div class=\" pull-right\">
\t\t\t\t";
        // line 77
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
        return "AppBundle:Comment:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 77,  164 => 75,  152 => 69,  146 => 65,  133 => 57,  125 => 52,  120 => 50,  114 => 47,  109 => 44,  102 => 40,  99 => 39,  91 => 36,  89 => 35,  83 => 32,  77 => 29,  73 => 28,  66 => 24,  60 => 20,  55 => 19,  46 => 13,  40 => 10,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AppBundle:Comment:index.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/AppBundle/Resources/views/Comment/index.html.twig");
    }
}
