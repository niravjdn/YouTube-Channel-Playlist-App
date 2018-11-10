<?php

/* AppBundle:Video:view.html.twig */
class __TwigTemplate_cf0419d058cddc50fb637e0c57af0a85a4bfabdedcf49c2e82fad200dd403552 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "AppBundle:Video:view.html.twig", 1);
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
       <div class=\"col-sm-offset-1 col-md-10\">
            <div class=\"card\">
                <div class=\"card-header card-header-icon\" data-background-color=\"rose\">
                    <i class=\"material-icons\">image</i>
                </div>
                <div class=\"card-content\">
                    <h4 class=\"card-title\">";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : null), "title", array()), "html", null, true);
        echo "</h4>
                    <video width=\"100%\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : null), "video", array()), "link", array())), "html", null, true);
        echo "\" controls>
                      <source id=\"video_here\">
                        Your browser does not support HTML5 video.
                     </video>
                    <img src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : null), "media", array()), "link", array())), "html", null, true);
        echo "\" class=\"fileinput-preview thumbnail \" id=\"img-preview\">
                    <div style=\"text-align: center;\">
                        <div class=\"reaction\">
                            <span>
                                <img src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/like.png"), "html", null, true);
        echo "\" alt=\"\">
                                <span class=\"label-reaction\">";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : null), "like", array()), "html", null, true);
        echo "</span>
                            </span>
                            <span>
                                <img src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/love.png"), "html", null, true);
        echo "\" alt=\"\">
                                <span class=\"label-reaction\">";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : null), "love", array()), "html", null, true);
        echo "</span>
                            </span>
                            <span>
                                <img src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/angry.png"), "html", null, true);
        echo "\" alt=\"\">
                                <span class=\"label-reaction\">";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : null), "angry", array()), "html", null, true);
        echo "</span>
                            </span>
                            <span>
                                <img src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/haha.png"), "html", null, true);
        echo "\" alt=\"\">
                                <span class=\"label-reaction\">";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : null), "haha", array()), "html", null, true);
        echo "</span>
                            </span>
                            <span>
                                <img src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/sad.png"), "html", null, true);
        echo "\" alt=\"\">
                                <span class=\"label-reaction\">";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : null), "sad", array()), "html", null, true);
        echo "</span>
                            </span>
                            <span>
                                <img src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/wow.png"), "html", null, true);
        echo "\" alt=\"\">
                                <span class=\"label-reaction\">";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : null), "woow", array()), "html", null, true);
        echo "</span>
                            </span>

                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-md-6\">";
        // line 47
        if ($this->getAttribute((isset($context["video"]) ? $context["video"] : null), "enabled", array())) {
            // line 48
            echo "                        <i class=\"material-icons\" style=\"color:green;float:left\">check_circle</i> <span class=\"check-label\">Enabled</span>
                        ";
        } else {
            // line 50
            echo "                        <i class=\"material-icons\" style=\"color:red;float:left\">cancel</i> <span class=\"check-label\">Disabled</span>
                        ";
        }
        // line 51
        echo "</div>
                    </div>
                     <div class=\"row\">
                        <div class=\"col-md-6\">";
        // line 54
        if ($this->getAttribute((isset($context["video"]) ? $context["video"] : null), "comment", array())) {
            // line 55
            echo "                        <i class=\"material-icons\" style=\"color:green;float:left\">check_circle</i> <span class=\"check-label\">Comment Enabled</span>
                        ";
        } else {
            // line 57
            echo "                        <i class=\"material-icons\" style=\"color:red;float:left\">cancel</i> <span class=\"check-label\">Comment Disabled</span>
                        ";
        }
        // line 58
        echo "</div>
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-12\">
                            <h4>Categories : </h4>
                        </div>
                        <div class=\"col-md-12\" >
                            ";
        // line 66
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["video"]) ? $context["video"] : null), "categories", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["color"]) {
            // line 67
            echo "                                <span class=\"label label-rose \" style=\"margin:5px;\"> <b> ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["color"], "title", array()), "html", null, true);
            echo " </b></span>  
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['color'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-md-12\">
                            <h4>Languages : </h4>
                        </div>
                        <div class=\"col-md-12\" >
                            ";
        // line 76
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["video"]) ? $context["video"] : null), "languages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 77
            echo "                                <span class=\"label label-rose \" style=\"margin:5px;background:#FF5722\"> <b> ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language", array()), "html", null, true);
            echo " </b></span>  
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "                        </div>
                    </div>
                 </div>
                <div class=\"card-footer\">
                    <div class=\"price\">
                         <div class=\"wallpaper-logo\" style=\"color:#040303\" >
                        ";
        // line 85
        if (($this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : null), "user", array()), "image", array()) == "")) {
            // line 86
            echo "                            ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : null), "user", array()), "name", array()), "html", null, true);
            echo "
                        ";
        } else {
            // line 88
            echo "                            <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : null), "user", array()), "image", array()), "html", null, true);
            echo "\" class=\"avatar-img\" alt=\"\"> 
                        ";
        }
        // line 90
        echo "                         <span>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : null), "user", array()), "name", array()), "html", null, true);
        echo "</span>
                     </div>
                    </div>
                    <div class=\"stats pull-right\">
                       <div class=\"wallpaper-logo\"  style=\"color:#040303\" >";
        // line 94
        echo $this->env->getExtension('Knp\Bundle\TimeBundle\Twig\Extension\TimeExtension')->diff($this->getAttribute((isset($context["video"]) ? $context["video"] : null), "created", array()));
        echo "</div>
                    </div>
                </div>
            </div>
            <div class=\"row\">
            ";
        // line 99
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["video"]) ? $context["video"] : null), "comments", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 100
            echo "                <div class=\"col-md-6\">
                    <ul class=\"timeline timeline-simple\">
                        <li class=\"timeline-inverted\">
                            <div class=\"timeline-badge danger\">
                                <img src=\"";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comment"], "user", array()), "image", array()), "html", null, true);
            echo "\" class=\"img-profile\">
                            </div>
                            <div class=\"timeline-panel\">
                                <div class=\"timeline-heading\">
                                    <a href=\"";
            // line 108
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_edit", array("id" => $this->getAttribute($this->getAttribute($context["comment"], "user", array()), "id", array()))), "html", null, true);
            echo "\" title=\"\">
                                        <span class=\"label label-danger\">";
            // line 109
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comment"], "user", array()), "name", array()), "html", null, true);
            echo "</span>
                                    </a>
                                    <span class=\"pull-right\" >
                                        <a href=\"";
            // line 112
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_comment_delete", array("id" => $this->getAttribute($context["comment"], "id", array()), "video" => "true")), "html", null, true);
            echo "\"  rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Delete\">
                                            <i class=\"material-icons\" style=\"color:red\">delete</i>
                                        </a>
                                        ";
            // line 115
            if ($this->getAttribute($context["comment"], "enabled", array())) {
                // line 116
                echo "                                            <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_comment_hide", array("id" => $this->getAttribute($context["comment"], "id", array()))), "html", null, true);
                echo "\"  rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Hide\">
                                                 <i class=\"material-icons\">visibility_off</i>
                                            </a>
                                        ";
            } else {
                // line 119
                echo "                                      
                                            <a href=\"";
                // line 120
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_comment_hide", array("id" => $this->getAttribute($context["comment"], "id", array()))), "html", null, true);
                echo "\"  rel=\"tooltip\" data-placement=\"bottom\" title=\"\" data-original-title=\"Show\">
                                                 <i class=\"material-icons\">remove_red_eye</i>
                                            </a>
                                        ";
            }
            // line 124
            echo "                                    </span>
                                </div>
                                <div class=\"timeline-body\">
                                    <p>";
            // line 127
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "contentclear", array()), "html", null, true);
            echo "</p>
                                </div>
                                <small class=\"pull-right label label-rose\">
                                     <span>";
            // line 130
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
            // line 138
            echo "                <div class=\"col-md-12\" >
                    <div class=\"card\"  style=\"margin-top: 0px;\">
                        <div class=\"card-content\">
                            <center><img src=\"";
            // line 141
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/bg_empty.png"), "html", null, true);
            echo "\"  style=\"width: auto !important;\" =\"\"></center>
                            <br>
                        </div>
                    </div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 147
        echo "            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Video:view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  325 => 147,  313 => 141,  308 => 138,  295 => 130,  289 => 127,  284 => 124,  277 => 120,  274 => 119,  266 => 116,  264 => 115,  258 => 112,  252 => 109,  248 => 108,  241 => 104,  235 => 100,  230 => 99,  222 => 94,  214 => 90,  208 => 88,  202 => 86,  200 => 85,  192 => 79,  183 => 77,  179 => 76,  170 => 69,  161 => 67,  157 => 66,  147 => 58,  143 => 57,  139 => 55,  137 => 54,  132 => 51,  128 => 50,  124 => 48,  122 => 47,  113 => 41,  109 => 40,  103 => 37,  99 => 36,  93 => 33,  89 => 32,  83 => 29,  79 => 28,  73 => 25,  69 => 24,  63 => 21,  59 => 20,  52 => 16,  45 => 12,  41 => 11,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AppBundle:Video:view.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/AppBundle/Resources/views/Video/view.html.twig");
    }
}
