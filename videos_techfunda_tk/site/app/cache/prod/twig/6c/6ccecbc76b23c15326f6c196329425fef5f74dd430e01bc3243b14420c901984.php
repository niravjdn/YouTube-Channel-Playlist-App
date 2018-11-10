<?php

/* UserBundle:User:comments.html.twig */
class __TwigTemplate_490bd57875fb73ff62d7e644f1a0c53c6a849c749d550ddac36ad441c19c61d4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "UserBundle:User:comments.html.twig", 1);
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
                <div  class=\"col-md-2\" style=\"border-right:1px solid #ccc;height:70px;background:white\">
                <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_edit", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array()))), "html", null, true);
        echo "\" style=\"color:black;font-size:20px;line-height: 70px;font-weight: bold;\">Edit infos</a>
                </div>
                <div  class=\"col-md-2\" style=\"border-right:1px solid #ccc;height:70px;background:white\">
                <a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_followings", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array()))), "html", null, true);
        echo "\" style=\"color:black;font-size:20px;line-height: 70px;font-weight: bold;\">";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "users", array())), "html", null, true);
        echo " Following </a>
                </div>
                <div  class=\"col-md-2\" style=\"border-right:1px solid #ccc;height:70px;background:white\">
                <a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_followers", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array()))), "html", null, true);
        echo "\" style=\"color:black;font-size:20px;line-height: 70px;font-weight: bold;\">";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "followers", array())), "html", null, true);
        echo " Followers </a>
                </div>
                <div  class=\"col-md-2\" style=\"border-right:1px solid #ccc;height:70px;background:white\">
                <a href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_comments", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array()))), "html", null, true);
        echo "\" style=\"color:black;font-size:20px;line-height: 70px;font-weight: bold;\">";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "comments", array())), "html", null, true);
        echo " Comments </a>
                </div>
                <div  class=\"col-md-2\" style=\"border-right:1px solid #ccc;height:70px;background:white\">
                <a href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_ratings", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array()))), "html", null, true);
        echo "\" style=\"color:black;font-size:20px;line-height: 70px;font-weight: bold;\">";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "ratings", array())), "html", null, true);
        echo " Ratings </a>
                </div>
                <div  class=\"col-md-2\" style=\"height:70px;background:white\">
                <a href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_wallpapers", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array()))), "html", null, true);
        echo "\" style=\"color:black;font-size:20px;line-height: 70px;font-weight: bold;\">";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "wallpapers", array())), "html", null, true);
        echo " Wallpapers </a>
                </div>
             </div>       
        </div>
        <div  class=\"col-md-12\" >
        \t<br>
        \t<br>
 \t\t\t   
\t\t\t<div class=\"row\">
                ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 37
            echo "\t\t\t\t<div class=\"col-md-6\">
                    <ul class=\"timeline timeline-simple\">
                        <li class=\"timeline-inverted\">
                            <div class=\"timeline-badge danger\">
                                <img src=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comment"], "user", array()), "image", array()), "html", null, true);
            echo "\"  class=\"img-profile\">
                            </div>
                            <div class=\"timeline-panel\">
                                <div class=\"timeline-heading\">
                               \t\t<a href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_edit", array("id" => $this->getAttribute($this->getAttribute($context["comment"], "user", array()), "id", array()))), "html", null, true);
            echo "\" title=\"\">
                                    \t<span class=\"label label-danger\">";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comment"], "user", array()), "name", array()), "html", null, true);
            echo "</span>
                                \t</a>
                                \t<span class=\"pull-right\" >
\t\t\t\t                        <a href=\"";
            // line 49
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_comment_delete", array("id" => $this->getAttribute($context["comment"], "id", array()), "comment" => "true")), "html", null, true);
            echo "\"  rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Delete\">
\t\t\t\t                            <i class=\"material-icons\" style=\"color:red\">delete</i>
\t\t\t\t                        </a>
\t\t\t\t                        ";
            // line 52
            if ($this->getAttribute($context["comment"], "enabled", array())) {
                // line 53
                echo "\t\t\t\t\t                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_comment_hide", array("id" => $this->getAttribute($context["comment"], "id", array()))), "html", null, true);
                echo "\"  rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Hide\">
\t\t\t\t\t                             <i class=\"material-icons\">visibility_off</i>
\t\t\t\t\t                        </a>
\t\t\t\t                        ";
            } else {
                // line 56
                echo "\t\t\t\t                        
\t\t\t\t\t                        <a href=\"";
                // line 57
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_comment_hide", array("id" => $this->getAttribute($context["comment"], "id", array()))), "html", null, true);
                echo "\"  rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Show\">
\t\t\t\t\t                             <i class=\"material-icons\">remove_red_eye</i>
\t\t\t\t\t                        </a>
\t\t\t\t                        ";
            }
            // line 61
            echo "\t\t\t\t                    </span>
                                </div>
                                <div class=\"timeline-body\">
                                    <p>";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "contentclear", array()), "html", null, true);
            echo "</p>
                                </div>
                                <hr>
                                <a href=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_wallpaper_view", array("id" => $this->getAttribute($this->getAttribute($context["comment"], "wallpaper", array()), "id", array()))), "html", null, true);
            echo "\" title=\"\">
                                <small class=\"label label-rose\">
                                     <span>";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comment"], "wallpaper", array()), "title", array()), "html", null, true);
            echo "</span>
                                </small>
                                </a>
                                <small class=\"pull-right label label-rose\">
                                     <span>";
            // line 73
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
            // line 81
            echo "\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<center><img src=\"";
            // line 85
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
        // line 91
        echo "\t    \t\t</div>
\t\t\t<div class=\" pull-right\">
\t\t\t\t";
        // line 93
        echo $this->env->getExtension('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension')->render($this->env, (isset($context["pagination"]) ? $context["pagination"] : null));
        echo "
\t\t\t</div>
\t        </div>
    \t</div>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "UserBundle:User:comments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 93,  211 => 91,  199 => 85,  193 => 81,  180 => 73,  173 => 69,  168 => 67,  162 => 64,  157 => 61,  150 => 57,  147 => 56,  139 => 53,  137 => 52,  131 => 49,  125 => 46,  121 => 45,  114 => 41,  108 => 37,  103 => 36,  89 => 27,  81 => 24,  73 => 21,  65 => 18,  57 => 15,  51 => 12,  43 => 7,  39 => 6,  35 => 5,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "UserBundle:User:comments.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/UserBundle/Resources/views/User/comments.html.twig");
    }
}
