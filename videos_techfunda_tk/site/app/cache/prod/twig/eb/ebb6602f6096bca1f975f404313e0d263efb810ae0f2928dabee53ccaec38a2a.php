<?php

/* UserBundle:User:followers.html.twig */
class __TwigTemplate_4715546437d5e5433960b5f60769ceb66fb30310192d99cd8a0c513a26241833 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "UserBundle:User:followers.html.twig", 1);
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
\t \t\t<div class=\"row\">
\t\t\t\t";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "followers", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["follower"]) {
            // line 28
            echo "\t\t       \t\t<div class=\"col-md-4\">
                        <div class=\"card card-profile\">
                            <div class=\"card-avatar\">
                                <a href=\"#pablo\">
                                \t";
            // line 32
            if (($this->getAttribute($context["follower"], "image", array()) != "")) {
                // line 33
                echo "                                    <img class=\"img\" src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["follower"], "image", array()), "html", null, true);
                echo "\">
                                    ";
            } else {
                // line 35
                echo "                                    <img class=\"img\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/avatar.jpg"), "html", null, true);
                echo "\">

                                    ";
            }
            // line 38
            echo "                                </a>
                            </div>
                            <div class=\"card-content\">
                                <h4 class=\"card-title\">";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($context["follower"], "name", array()), "html", null, true);
            echo "</h4>
                                <a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_edit", array("id" => $this->getAttribute($context["follower"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-rose btn-round\">VIew</a>
                            </div>
                        </div>
                    </div>
\t\t         ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 47
            echo "\t\t\t\t\t<div class=\"card\"  style=\"text-align: center;\" >
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<img src=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/bg_empty.png"), "html", null, true);
            echo "\"  style=\"width: auto !important;\" =\"\">
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<br>
\t\t\t\t\t</div>
\t            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['follower'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo " 
\t        </div>
    \t</div>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "UserBundle:User:followers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 54,  134 => 50,  129 => 47,  119 => 42,  115 => 41,  110 => 38,  103 => 35,  97 => 33,  95 => 32,  89 => 28,  84 => 27,  73 => 21,  65 => 18,  57 => 15,  51 => 12,  43 => 7,  39 => 6,  35 => 5,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "UserBundle:User:followers.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/UserBundle/Resources/views/User/followers.html.twig");
    }
}
