<?php

/* AppBundle:Video:reviews.html.twig */
class __TwigTemplate_0ebcd807771b66485a29c6cc07042e83c3df65a409a2622250062a831f72a885 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "AppBundle:Video:reviews.html.twig", 1);
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
\t\t<div class=\"row\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<a href=\"";
        // line 7
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_index");
        echo "\" class=\"btn  btn-lg btn-warning col-md-12\"><i class=\"material-icons\" style=\"font-size: 30px;\">refresh</i> Refresh</a>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<a class=\"btn btn btn-lg btn-yellow col-md-12\"><i class=\"material-icons\" style=\"font-size: 30px;\">video_library</i> ";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["videos_count"]) ? $context["videos_count"] : null), "html", null, true);
        echo " video</a>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<a href=\"";
        // line 13
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_add");
        echo "\" class=\"btn btn-rose btn-lg pull-right add-button col-md-12\" title=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">add_box</i> NEW video </a>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"row\">
       \t\t";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["videos"]) ? $context["videos"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["video"]) {
            // line 18
            echo "\t       \t\t<div class=\"col-md-4\" style=\"height:340px\">
\t\t            <div class=\"card card-product\"  >
\t\t               \t<div class=\"wallpaper-title\" >
\t\t                \t";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["video"], "title", array()), "html", null, true);
            echo "
\t\t                </div>
\t\t               <img class=\"img \" style=\"height:auto;background-color:#fff\" src=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('Liip\ImagineBundle\Templating\ImagineExtension')->filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute($this->getAttribute($context["video"], "media", array()), "link", array())), "image_thumb"), "html", null, true);
            echo "\">
\t\t                <img src=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/play.png"), "html", null, true);
            echo "\" style=\"position: absolute;height: 83px;width: auto;top: 70px;left: 10px;\">
\t\t                <div class=\"card-content\" style=\" padding: 0px 0px;\">
\t\t                    <div class=\"card-actions\">
\t\t                        <a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_view", array("id" => $this->getAttribute($context["video"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-info btn-simple\" rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"View\">
\t\t                            <i class=\"material-icons\">remove_red_eye</i>
\t\t                        </a>
\t\t                        <a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_review", array("id" => $this->getAttribute($context["video"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-success btn-simple\" rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Review\">
\t\t                            <i class=\"material-icons\">check</i>
\t\t                        </a>
\t\t                        <a href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_delete", array("id" => $this->getAttribute($context["video"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-danger btn-simple\" rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Delete\">
\t\t                            <i class=\"material-icons\">close</i>
\t\t                        </a>
\t\t                    </div>
\t\t                </div>


\t\t                <div class=\"card-footer\">
\t                        <div class=\"price\">

\t\t                         <div class=\"wallpaper-logo\" >
\t\t                        \t";
            // line 44
            if (($this->getAttribute($this->getAttribute($context["video"], "user", array()), "image", array()) == "")) {
                // line 45
                echo "\t\t                        \t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["video"], "user", array()), "name", array()), "html", null, true);
                echo "
\t\t                        \t";
            } else {
                // line 47
                echo "\t\t                        \t\t<img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["video"], "user", array()), "image", array()), "html", null, true);
                echo "\" class=\"avatar-img\" alt=\"\"> 
\t\t                        \t";
            }
            // line 49
            echo "\t\t                        \t<span>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["video"], "user", array()), "name", array()), "html", null, true);
            echo "</span>
\t\t                         </div>
\t                        </div>
\t                        <div class=\"stats pull-right\">
\t                           <div class=\"wallpaper-logo\" >";
            // line 53
            echo $this->env->getExtension('Knp\Bundle\TimeBundle\Twig\Extension\TimeExtension')->diff($this->getAttribute($context["video"], "created", array()));
            echo "</div>
\t                        </div>
\t                    </div>
\t\t            </div>
\t\t          </div>
\t          ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 59
            echo "\t\t          <div class=\"card\"  style=\"text-align: center;\" >
\t\t          <br>
\t\t          <br>
\t\t          <img src=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/bg_empty.png"), "html", null, true);
            echo "\"  style=\"width: auto !important;\" =\"\">
\t              <br>
\t              <br>
\t\t          </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "       \t\t\t</div>
            <div class=\" pull-right\">
        ";
        // line 69
        echo $this->env->getExtension('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension')->render($this->env, (isset($context["videos"]) ? $context["videos"] : null));
        echo "
      </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Video:reviews.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 69,  156 => 67,  145 => 62,  140 => 59,  129 => 53,  121 => 49,  115 => 47,  109 => 45,  107 => 44,  93 => 33,  87 => 30,  81 => 27,  75 => 24,  71 => 23,  66 => 21,  61 => 18,  56 => 17,  49 => 13,  43 => 10,  37 => 7,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AppBundle:Video:reviews.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/AppBundle/Resources/views/Video/reviews.html.twig");
    }
}
