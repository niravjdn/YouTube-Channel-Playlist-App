<?php

/* UserBundle:User:status.html.twig */
class __TwigTemplate_69e5a76e29d831360a9bc3839177b782d6613c46c9d25416283f609a5b884aa3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "UserBundle:User:status.html.twig", 1);
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
\t\t<div class=\"col-md-12\" style=\" height: auto; text-align:center;background-image:url(";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "image", array())), "html", null, true);
        echo ");background-position: center;background-size: 100%;text-align: center;\">
\t\t    <img src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "image", array())), "html", null, true);
        echo "\" alt=\"\" style=\"border-radius:300px;margin:10px;height:100px;width:100px;border: 5px solid rgb(255, 247, 247);\">
\t\t    <h3 style=\" color: white; font-weight: bold\">";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name", array()), "html", null, true);
        echo "</h3>
\t\t</div>
        <div  class=\"col-md-12\" style=\"border:1px solid #ccc;height:70px;background:white\">
             <div class=\"row\">
                <div  class=\"col-md-3\" style=\"border-right:1px solid #ccc;height:70px;background:white\">
                <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_edit", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array()))), "html", null, true);
        echo "\" style=\"color:black;font-size:20px;line-height: 70px;font-weight: bold;\">Edit infos</a>
                </div>
                <div  class=\"col-md-3\" style=\"border-right:1px solid #ccc;height:70px;background:white\">
                <a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_followings", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array()))), "html", null, true);
        echo "\" style=\"color:black;font-size:20px;line-height: 70px;font-weight: bold;\">";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "users", array())), "html", null, true);
        echo " Following </a>
                </div>
                <div  class=\"col-md-3\" style=\"border-right:1px solid #ccc;height:70px;background:white\">
                <a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_followers", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array()))), "html", null, true);
        echo "\" style=\"color:black;font-size:20px;line-height: 70px;font-weight: bold;\">";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "followers", array())), "html", null, true);
        echo " Followers </a>
                </div>
                <div  class=\"col-md-3\" style=\"height:70px;background:white\">
                <a href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_status", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array()))), "html", null, true);
        echo "\" style=\"color:black;font-size:20px;line-height: 70px;font-weight: bold;\">";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "status", array())), "html", null, true);
        echo " Status </a>
                </div>
             </div>       
        </div>
        <div  class=\"col-md-12\" >
        \t        <br>
        <br>
\t \t\t<div class=\"row\">
\t\t\t";
        // line 29
        $context["i"] = 1;
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["video"]) {
            // line 31
            echo "
       \t\t<div class=\"col-md-4\">
\t            <div class=\"card card-product\"  >
\t               \t<div class=\"wallpaper-title\" >
\t                \t";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["video"], "title", array()), "html", null, true);
            echo "
\t                </div>
\t               <img class=\"img \" style=\"height:auto;background-color:#fff\" src=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('Liip\ImagineBundle\Templating\ImagineExtension')->filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute($this->getAttribute($context["video"], "media", array()), "link", array())), "image_thumb"), "html", null, true);
            echo "\">
\t                <img src=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/play.png"), "html", null, true);
            echo "\" style=\"position: absolute;height: 83px;width: auto;top: 70px;left: 10px;\">
\t                <div class=\"card-content\" style=\" padding: 0px 0px;\">
\t                    <div class=\"card-actions\">
\t                        <a href=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_view", array("id" => $this->getAttribute($context["video"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-info btn-simple\" rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"View\">
\t                            <i class=\"material-icons\">remove_red_eye</i>
\t                        </a>
\t                        <a href=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_edit", array("id" => $this->getAttribute($context["video"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-success btn-simple\" rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Edit\">
\t                            <i class=\"material-icons\">edit</i>
\t                        </a>
\t                        <a href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_home_notif_video", array("title" => $this->getAttribute($context["video"], "title", array()), "id" => $this->getAttribute($context["video"], "id", array()), "image" => $this->env->getExtension('Liip\ImagineBundle\Templating\ImagineExtension')->filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute($this->getAttribute($context["video"], "media", array()), "link", array())), "image_image"), "icon" => $this->env->getExtension('Liip\ImagineBundle\Templating\ImagineExtension')->filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute($this->getAttribute($context["video"], "media", array()), "link", array())), "image_thumb"))), "html", null, true);
            echo "\" class=\"btn btn-rose btn-simple\" rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Notification\">
\t                            <i class=\"material-icons\">notifications_active</i>
\t                        </a>
\t                        <a href=\"";
            // line 50
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
            // line 61
            if (($this->getAttribute($this->getAttribute($context["video"], "user", array()), "image", array()) == "")) {
                // line 62
                echo "\t                        \t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["video"], "user", array()), "name", array()), "html", null, true);
                echo "
\t                        \t";
            } else {
                // line 64
                echo "\t                        \t\t<img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["video"], "user", array()), "image", array()), "html", null, true);
                echo "\" class=\"avatar-img\" alt=\"\"> 
\t                        \t";
            }
            // line 66
            echo "\t                        \t<span>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["video"], "user", array()), "name", array()), "html", null, true);
            echo "</span>
\t                         </div>
                        </div>
                        <div class=\"stats pull-right\">
                           <div class=\"wallpaper-logo\" >";
            // line 70
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
            // line 76
            echo "\t          <div class=\"card\"  style=\"text-align: center;\" >
\t          <br>
\t          <br>
\t          <img src=\"";
            // line 79
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/bg_empty.png"), "html", null, true);
            echo "\"  style=\"width: auto !important;\" =\"\">
              <br>
              <br>
\t          </div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 84
        echo "\t\t\t\t    <div class=\" pull-right\">
\t\t\t\t        ";
        // line 85
        echo $this->env->getExtension('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension')->render($this->env, (isset($context["pagination"]) ? $context["pagination"] : null));
        echo "
\t\t\t\t    </div>    
\t        </div>
    \t</div>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "UserBundle:User:status.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 85,  195 => 84,  184 => 79,  179 => 76,  168 => 70,  160 => 66,  154 => 64,  148 => 62,  146 => 61,  132 => 50,  126 => 47,  120 => 44,  114 => 41,  108 => 38,  104 => 37,  99 => 35,  93 => 31,  88 => 30,  86 => 29,  73 => 21,  65 => 18,  57 => 15,  51 => 12,  43 => 7,  39 => 6,  35 => 5,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "UserBundle:User:status.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/UserBundle/Resources/views/User/status.html.twig");
    }
}
