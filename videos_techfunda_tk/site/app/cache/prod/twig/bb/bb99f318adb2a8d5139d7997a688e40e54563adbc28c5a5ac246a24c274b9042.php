<?php

/* AppBundle:Home:index.html.twig */
class __TwigTemplate_929adec19f4e152940f6370275ea9065fc0f0bbc01b9344c8fa554653d2f7237 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "AppBundle:Home:index.html.twig", 1);
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
        <div class=\"col-lg-4 col-md-6 col-sm-6\">
            <div class=\"card card-stats\">
                <div class=\"card-header\" data-background-color=\"green\">
                    <i class=\"material-icons\">featured_play_list</i>
                </div>
                <div class=\"card-content\">
                    <p class=\"category\">video</p>
                     <h3 class=\"title\">";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["video_count"]) ? $context["video_count"] : null), "html", null, true);
        echo "</h3>
                </div>
                <div class=\"card-footer\">
                    <div class=\"stats\">
                        <i class=\"material-icons\">keyboard_arrow_right</i><a href=\"";
        // line 16
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_index");
        echo "\">video list</a>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-lg-4 col-md-6 col-sm-6\">
            <div class=\"card card-stats\">
                <div class=\"card-header\" data-background-color=\"blue\">
                    <i class=\"material-icons\">access_time</i>
                </div>
                <div class=\"card-content\">
                    <p class=\"category\">Reviews</p>
                     <h3 class=\"title\">";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["review_count"]) ? $context["review_count"] : null), "html", null, true);
        echo "</h3>
                </div>
                <div class=\"card-footer\">
                    <div class=\"stats\">
                        <i class=\"material-icons\">keyboard_arrow_right</i><a href=\"";
        // line 32
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_reviews");
        echo "\">video to reviews</a>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-lg-4 col-md-6 col-sm-6\">
            <div class=\"card card-stats\">
                <div class=\"card-header\" data-background-color=\"rose\">
                    <i class=\"material-icons\">comment</i>
                </div>
                <div class=\"card-content\">
                    <p class=\"category\">Comments</p>
                     <h3 class=\"title\">";
        // line 44
        echo twig_escape_filter($this->env, (isset($context["comment_count"]) ? $context["comment_count"] : null), "html", null, true);
        echo "</h3>
                </div>
                <div class=\"card-footer\">
                    <div class=\"stats\">
                        <i class=\"material-icons\">keyboard_arrow_right</i><a href=\"";
        // line 48
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_comment_index");
        echo "\">Comments list</a>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"col-lg-4 col-md-6 col-sm-6\">
            <div class=\"card card-stats\">
                <div class=\"card-header\" data-background-color=\"red\">
                    <i class=\"material-icons\">view_list</i>
                </div>
                <div class=\"card-content\">
                    <p class=\"category\">Categoryies </p>
                     <h3 class=\"title\">";
        // line 61
        echo twig_escape_filter($this->env, (isset($context["category_count"]) ? $context["category_count"] : null), "html", null, true);
        echo "</h3>
                </div>
                <div class=\"card-footer\">
                    <div class=\"stats\">
                        <i class=\"material-icons\">keyboard_arrow_right</i><a href=\"";
        // line 65
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_category_index");
        echo "\">Categories list</a>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-lg-4 col-md-6 col-sm-6\">
            <div class=\"card card-stats\">
                <div class=\"card-header\" data-background-color=\"purple\">
                    <i class=\"material-icons\">group</i>
                </div>
                <div class=\"card-content\">
                    <p class=\"category\">users</p>
                     <h3 class=\"title\">";
        // line 77
        echo twig_escape_filter($this->env, (isset($context["users_count"]) ? $context["users_count"] : null), "html", null, true);
        echo "</h3>
                </div>
                <div class=\"card-footer\">
                    <div class=\"stats\">
                        <i class=\"material-icons\">keyboard_arrow_right</i><a href=\"";
        // line 81
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_index");
        echo "\">user list</a>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-lg-4 col-md-6 col-sm-6\">
            <div class=\"card card-stats\">
                <div class=\"card-header\" data-background-color=\"red\">
                    <i class=\"material-icons\">flag</i>
                </div>
                <div class=\"card-content\">
                    <p class=\"category\">Languages</p>
                     <h3 class=\"title\">";
        // line 93
        echo twig_escape_filter($this->env, (isset($context["language_count"]) ? $context["language_count"] : null), "html", null, true);
        echo "</h3>
                </div>
                <div class=\"card-footer\">
                    <div class=\"stats\">
                        <i class=\"material-icons\">keyboard_arrow_right</i><a href=\"";
        // line 97
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_language_index");
        echo "\">Languages list</a>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-lg-4 col-md-6 col-sm-6\">
            <div class=\"card card-stats\">
                <div class=\"card-header\" data-background-color=\"red\">
                    <i class=\"material-icons\">devices_other</i>
                </div>
                <div class=\"card-content\">
                    <p class=\"category\">Installs</p>
                     <h3 class=\"title\">";
        // line 109
        echo twig_escape_filter($this->env, (isset($context["devices_count"]) ? $context["devices_count"] : null), "html", null, true);
        echo "</h3>
                </div>
                <div class=\"card-footer\">
                    <div class=\"stats\">
                        <i class=\"material-icons\">perm_device_information</i><span> Application install</span> 
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-lg-4 col-md-6 col-sm-6\">
            <div class=\"card card-stats\">
                <div class=\"card-header\" data-background-color=\"rose\">
                    <i class=\"material-icons\">help</i>
                </div>
                <div class=\"card-content\">
                    <p class=\"category\">Supports</p>
                     <h3 class=\"title\">";
        // line 125
        echo twig_escape_filter($this->env, (isset($context["supports_count"]) ? $context["supports_count"] : null), "html", null, true);
        echo "</h3>
                </div>
                <div class=\"card-footer\">
                    <div class=\"stats\">
                        <i class=\"material-icons\">keyboard_arrow_right</i><a href=\"";
        // line 129
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_support_index");
        echo "\">Support messages list</a>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-lg-4 col-md-6 col-sm-6\">
            <div class=\"card card-stats\">
                <div class=\"card-header\" data-background-color=\"black\">
                    <i class=\"material-icons\">info</i>
                </div>
                <div class=\"card-content\">
                    <p class=\"category\">Version</p>
                     <h3 class=\"title\">";
        // line 141
        echo twig_escape_filter($this->env, (isset($context["version_count"]) ? $context["version_count"] : null), "html", null, true);
        echo "</h3>
                </div>
                <div class=\"card-footer\">
                    <div class=\"stats\">
                        <i class=\"material-icons\">keyboard_arrow_right</i><a href=\"";
        // line 145
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_version_index");
        echo "\">Support messages list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Home:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  223 => 145,  216 => 141,  201 => 129,  194 => 125,  175 => 109,  160 => 97,  153 => 93,  138 => 81,  131 => 77,  116 => 65,  109 => 61,  93 => 48,  86 => 44,  71 => 32,  64 => 28,  49 => 16,  42 => 12,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AppBundle:Home:index.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/AppBundle/Resources/views/Home/index.html.twig");
    }
}
