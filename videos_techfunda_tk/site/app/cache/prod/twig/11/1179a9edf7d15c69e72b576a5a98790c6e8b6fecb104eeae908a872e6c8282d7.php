<?php

/* AppBundle:Video:index.html.twig */
class __TwigTemplate_a2c3606994c0cc78088920146e1e81827554204c36b0276c3a4e2a7fb65cfdfd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "AppBundle:Video:index.html.twig", 1);
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
        echo twig_escape_filter($this->env, (isset($context["video_count"]) ? $context["video_count"] : null), "html", null, true);
        echo " videos</a>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<a href=\"";
        // line 13
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_add");
        echo "\" class=\"btn btn-rose btn-lg pull-right add-button col-md-12\" title=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">add_box</i> NEW Video </a>
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
            echo "
       \t\t<div class=\"col-md-4\" style=\"height:340px\">
\t            <div class=\"card card-product\"  >
\t               \t<div class=\"wallpaper-title\" >
\t                \t";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["video"], "title", array()), "html", null, true);
            echo "
\t                </div>
\t               <img class=\"img \" style=\"height:auto;background-color:#fff\" src=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('Liip\ImagineBundle\Templating\ImagineExtension')->filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute($this->getAttribute($context["video"], "media", array()), "link", array())), "image_thumb"), "html", null, true);
            echo "\">
\t                <img src=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/play.png"), "html", null, true);
            echo "\" style=\"position: absolute;height: 83px;width: auto;top: 70px;left: 10px;\">
\t                <div class=\"card-content\" style=\" padding: 0px 0px;\">
\t                    <div class=\"card-actions\">
\t                        <a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_view", array("id" => $this->getAttribute($context["video"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-info btn-simple\" rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"View\">
\t                            <i class=\"material-icons\">remove_red_eye</i>
\t                        </a>
\t                        <a href=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_edit", array("id" => $this->getAttribute($context["video"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-success btn-simple\" rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Edit\">
\t                            <i class=\"material-icons\">edit</i>
\t                        </a>
\t                        <a href=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_home_notif_video", array("title" => $this->getAttribute($context["video"], "title", array()), "id" => $this->getAttribute($context["video"], "id", array()), "image" => $this->env->getExtension('Liip\ImagineBundle\Templating\ImagineExtension')->filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute($this->getAttribute($context["video"], "media", array()), "link", array())), "image_image"), "icon" => $this->env->getExtension('Liip\ImagineBundle\Templating\ImagineExtension')->filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute($this->getAttribute($context["video"], "media", array()), "link", array())), "image_thumb"))), "html", null, true);
            echo "\" class=\"btn btn-rose btn-simple\" rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Notification\">
\t                            <i class=\"material-icons\">notifications_active</i>
\t                        </a>
\t                        <a href=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_delete", array("id" => $this->getAttribute($context["video"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-danger btn-simple\" rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Delete\">
\t                            <i class=\"material-icons\">close</i>
\t                        </a>
\t                    </div>
\t                </div>


\t                <div class=\"card-footer\">
                        <div class=\"price\">

\t                         <div class=\"wallpaper-logo\" >
\t                        \t";
            // line 48
            if (($this->getAttribute($this->getAttribute($context["video"], "user", array()), "image", array()) == "")) {
                // line 49
                echo "\t                        \t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["video"], "user", array()), "name", array()), "html", null, true);
                echo "
\t                        \t";
            } else {
                // line 51
                echo "\t                        \t\t<img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["video"], "user", array()), "image", array()), "html", null, true);
                echo "\" class=\"avatar-img\" alt=\"\"> 
\t                        \t";
            }
            // line 53
            echo "\t                        \t<span>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["video"], "user", array()), "name", array()), "html", null, true);
            echo "</span>
\t                         </div>
                        </div>
                        <div class=\"stats pull-right\">
                           <div class=\"wallpaper-logo\" >";
            // line 57
            echo $this->env->getExtension('Knp\Bundle\TimeBundle\Twig\Extension\TimeExtension')->diff($this->getAttribute($context["video"], "created", array()));
            echo "</div>
                        </div>
                    </div>
\t            </div>
\t          </div>
\t          ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 63
            echo "\t          <div class=\"card\"  style=\"text-align: center;\" >
\t          <br>
\t          <br>
\t          <img src=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/bg_empty.png"), "html", null, true);
            echo "\"  style=\"width: auto !important;\" =\"\">
              <br>
              <br>
\t          </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "       
    </div>
                  <div class=\" pull-right\">
        ";
        // line 74
        echo $this->env->getExtension('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension')->render($this->env, (isset($context["videos"]) ? $context["videos"] : null));
        echo "
      </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Video:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 74,  163 => 71,  152 => 66,  147 => 63,  136 => 57,  128 => 53,  122 => 51,  116 => 49,  114 => 48,  100 => 37,  94 => 34,  88 => 31,  82 => 28,  76 => 25,  72 => 24,  67 => 22,  61 => 18,  56 => 17,  49 => 13,  43 => 10,  37 => 7,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AppBundle:Video:index.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/AppBundle/Resources/views/Video/index.html.twig");
    }
}
