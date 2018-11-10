<?php

/* UserBundle:User:comment.html.twig */
class __TwigTemplate_61cce2f5bca70fc4acc2e1a80fe7006804ae4876a7e05c70df82f06b6782d456 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "UserBundle:User:comment.html.twig", 1);
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
        echo "    <div class=\"container\">
        <div class=\"container\">
            <div class=\"c-header\">
                <h2>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name", array()), "html", null, true);
        echo "<small>( ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo " )</small></h2>
            </div>
            <div class=\"card\" id=\"profile-main\">
                <div class=\"pm-overview c-overflow mCustomScrollbar _mCS_4 mCS-autoHide\" style=\"overflow: visible;\"><div id=\"mCSB_4\" class=\"mCustomScrollBox mCS-minimal-dark mCSB_vertical_horizontal mCSB_outside\" tabindex=\"0\"><div id=\"mCSB_4_container\" class=\"mCSB_container mCS_x_hidden mCS_no_scrollbar_x\" style=\"position: relative; top: 0px; left: 0px; width: 100%;\" dir=\"ltr\">
                    <div class=\"pmo-pic\">
                        <div class=\"p-relative\">
                            <a href=\"\">
                            ";
        // line 13
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "media", array()) == null)) {
            // line 14
            echo "                                  <div class=\" palette-Red-400 bg img-responsive mCS_img_loaded\" style=\"min-height: 200px;color: white;text-align: center;height: auto;line-height: 200px;font-size: 71pt;text-transform: uppercase;\">";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_first($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name", array()))), "html", null, true);
            echo "</div>
                            ";
        } else {
            // line 16
            echo "                                <img class=\"img-responsive mCS_img_loaded\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Liip\ImagineBundle\Templating\ImagineExtension')->filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "media", array()), "link", array())), "profile_picture"), "html", null, true);
            echo "\" alt=\"\">
                            ";
        }
        // line 18
        echo "
                            </a>
                            <div class=\"dropdown pmop-message\">
                                <span  class=\"btn palette-White bg btn-float  \">
                                    ";
        // line 22
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "type", array()) == "google")) {
            // line 23
            echo "                                    <i class=\"zmdi zmdi-google-glass\" style=\"line-height: 40px;\"></i>
                                    ";
        } elseif (($this->getAttribute(        // line 24
(isset($context["user"]) ? $context["user"] : null), "type", array()) == "facebook")) {
            // line 25
            echo "                                    <i class=\"zmdi zmdi-facebook-box\" style=\"line-height: 40px;\"></i>
                                    ";
        } else {
            // line 27
            echo "                                    <i class=\"zmdi zmdi-email\" style=\"line-height: 40px;\"></i>
                                    ";
        }
        // line 29
        echo "                                </span>
                            </div>
                        </div>
                        <div class=\"pmo-stat\">
                            <h2 class=\"m-0 c-white\">";
        // line 33
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "comments", array())), "html", null, true);
        echo "</h2>
                            Total Comments
                        </div>
                    </div>
                    <div class=\"pmo-block pmo-contact hidden-xs\">
                        <h2></h2>
                    </div>
                    
                </div>
            </div>

            <div id=\"mCSB_4_scrollbar_horizontal\" class=\"mCSB_scrollTools mCSB_4_scrollbar mCS-minimal-dark mCSB_scrollTools_horizontal\" style=\"display: none;\">
                <div class=\"mCSB_draggerContainer\">
                    <div id=\"mCSB_4_dragger_horizontal\" class=\"mCSB_dragger\" style=\"position: absolute; min-width: 50px; width: 0px; left: 0px;\" oncontextmenu=\"return false;\"><div class=\"mCSB_dragger_bar\"></div>
                </div>
                <div class=\"mCSB_draggerRail\"></div>
            </div>
        </div>
    </div>
    <div class=\"pm-body clearfix\">
        <ul class=\"tab-nav tn-justified\">
            <li class=\"waves-effect\"><a href=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_edit", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array()))), "html", null, true);
        echo "\">Infos</a></li>
            <li class=\"active waves-effect\"><a href=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_comment", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array()))), "html", null, true);
        echo "\">Comments</a></li>
        </ul>
        <div class=\"\">
\t\t<div class=\"list-group lg-alt lg-even-black\">
\t\t        ";
        // line 59
        $context["k"] = 0;
        // line 60
        echo "\t\t        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 61
            echo "\t\t            <div class=\"list-group-item media\">
\t\t                <div class=\"pull-left\">
\t\t                    ";
            // line 63
            if (($this->getAttribute($this->getAttribute($context["comment"], "user", array()), "media", array()) == null)) {
                // line 64
                echo "\t\t                        ";
                if (((isset($context["k"]) ? $context["k"] : null) == 0)) {
                    // line 65
                    echo "\t\t                            <div class=\"avatar-char palette-Light-Blue bg\">";
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_first($this->env, $this->getAttribute($this->getAttribute($context["comment"], "user", array()), "name", array()))), "html", null, true);
                    echo "</div>
\t\t                        ";
                } elseif ((                // line 66
(isset($context["k"]) ? $context["k"] : null) == 1)) {
                    // line 67
                    echo "\t\t                            <div class=\"avatar-char palette-Purple-300 bg\">";
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_first($this->env, $this->getAttribute($this->getAttribute($context["comment"], "user", array()), "name", array()))), "html", null, true);
                    echo "</div>
\t\t                        ";
                } elseif ((                // line 68
(isset($context["k"]) ? $context["k"] : null) == 2)) {
                    // line 69
                    echo "\t\t                            <div class=\"avatar-char palette-Green-400 bg\">";
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_first($this->env, $this->getAttribute($this->getAttribute($context["comment"], "user", array()), "name", array()))), "html", null, true);
                    echo "</div>
\t\t                        ";
                } elseif ((                // line 70
(isset($context["k"]) ? $context["k"] : null) == 3)) {
                    // line 71
                    echo "\t\t                            <div class=\"avatar-char palette-Red-400 bg\">";
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_first($this->env, $this->getAttribute($this->getAttribute($context["comment"], "user", array()), "name", array()))), "html", null, true);
                    echo "</div>
\t\t                        ";
                }
                // line 73
                echo "\t\t                    ";
            } else {
                // line 74
                echo "\t\t                        <img class=\"avatar-char palette-Red-400 bg\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Liip\ImagineBundle\Templating\ImagineExtension')->filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute($this->getAttribute($this->getAttribute($context["comment"], "user", array()), "media", array()), "link", array())), "profile_picture"), "html", null, true);
                echo "\" alt=\"\">
\t\t                    ";
            }
            // line 76
            echo "\t\t                </div>
\t\t                <div class=\"pull-right\">
\t\t                    <ul class=\"actions\">
\t\t                        <li class=\"dropdown\">
\t\t                            <a href=\"\" data-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t                                <i class=\"zmdi zmdi-more-vert\"></i>
\t\t                            </a>
\t\t                            <ul class=\"dropdown-menu dropdown-menu-right\">
\t\t                                <li>
\t\t                                    <a href=\"";
            // line 85
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_comments_delete", array("id" => $this->getAttribute($context["comment"], "id", array()), "from" => "user")), "html", null, true);
            echo "\">Delete</a>
\t\t                                </li>
\t\t                                <li>
\t\t                                    <a href=\"";
            // line 88
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_comments_hide", array("id" => $this->getAttribute($context["comment"], "id", array()), "from" => "user")), "html", null, true);
            echo "\">
\t\t                                        ";
            // line 89
            if (($this->getAttribute($context["comment"], "enabled", array()) == true)) {
                // line 90
                echo "\t\t                                            Hide
\t\t                                        ";
            } else {
                // line 92
                echo "\t\t                                            Show
\t\t                                        ";
            }
            // line 94
            echo "\t\t                                    </a>
\t\t                                </li>
\t\t                            </ul>
\t\t                        </li>
\t\t                    </ul>
\t\t                </div>
\t\t                <div class=\"media-body\">
\t\t                    <div class=\"lgi-heading\">
\t\t                        <a href=\"";
            // line 102
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_guides_view", array("id" => $this->getAttribute($this->getAttribute($context["comment"], "guide", array()), "id", array()))), "html", null, true);
            echo "\" title=\"\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comment"], "guide", array()), "title", array()), "html", null, true);
            echo "</a>
\t\t                    </div>
\t\t                    <small class=\"lgi-text\">";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "content", array()), "html", null, true);
            echo "</small>
\t\t                    <ul class=\"lgi-attrs\">
\t\t                        <li>Date Created:";
            // line 106
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["comment"], "created", array()), "d/m/Y"), "html", null, true);
            echo " at ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["comment"], "created", array()), "H:i"), "html", null, true);
            echo "</li>
\t\t                        <li>
\t\t                            Published:
\t\t                            ";
            // line 109
            if (($this->getAttribute($context["comment"], "enabled", array()) == true)) {
                // line 110
                echo "\t\t                                Yes
\t\t                            ";
            } else {
                // line 112
                echo "\t\t                                No
\t\t                            ";
            }
            // line 114
            echo "\t\t                            
\t\t                        </li>
\t\t                    </ul>
\t\t                </div>
\t\t            </div>
\t\t            ";
            // line 119
            if (((isset($context["k"]) ? $context["k"] : null) == 3)) {
                // line 120
                echo "\t\t                ";
                $context["k"] = 0;
                // line 121
                echo "\t\t            ";
            } else {
                // line 122
                echo "\t\t                ";
                $context["k"] = ((isset($context["k"]) ? $context["k"] : null) + 1);
                // line 123
                echo "\t\t            ";
            }
            // line 124
            echo "\t\t        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 125
            echo "\t\t            <p style=\"text-align:center\">
\t\t                <img style=\"padding:50px; width:100%\" src=\"";
            // line 126
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/bg_empty.png"), "html", null, true);
            echo "\" alt=\"\">
\t\t            </p>
\t\t        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 129
        echo "\t\t        <div class=\" pull-right\">
\t\t            ";
        // line 130
        echo $this->env->getExtension('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension')->render($this->env, (isset($context["pagination"]) ? $context["pagination"] : null));
        echo "
\t\t        </div>
\t        </div>
        </div>
    </div>
</div>
</div>

";
    }

    public function getTemplateName()
    {
        return "UserBundle:User:comment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  289 => 130,  286 => 129,  277 => 126,  274 => 125,  269 => 124,  266 => 123,  263 => 122,  260 => 121,  257 => 120,  255 => 119,  248 => 114,  244 => 112,  240 => 110,  238 => 109,  230 => 106,  225 => 104,  218 => 102,  208 => 94,  204 => 92,  200 => 90,  198 => 89,  194 => 88,  188 => 85,  177 => 76,  171 => 74,  168 => 73,  162 => 71,  160 => 70,  155 => 69,  153 => 68,  148 => 67,  146 => 66,  141 => 65,  138 => 64,  136 => 63,  132 => 61,  126 => 60,  124 => 59,  117 => 55,  113 => 54,  89 => 33,  83 => 29,  79 => 27,  75 => 25,  73 => 24,  70 => 23,  68 => 22,  62 => 18,  56 => 16,  50 => 14,  48 => 13,  36 => 6,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "UserBundle:User:comment.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/UserBundle/Resources/views/User/comment.html.twig");
    }
}
