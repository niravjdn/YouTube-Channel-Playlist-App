<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_038e4931c584f774d06582f684fc60f14b010c9af29b07421461c45ca4430545 extends Twig_Template
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
        echo "<html lang=\"en\">
<head>
    <meta charset=\"utf-8\" />
    <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/apple-icon.png"), "html", null, true);
        echo "\" />
    <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/favicon.png"), "html", null, true);
        echo "\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" />
    <title>Admin panel | Status</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name=\"viewport\" content=\"width=device-width\" />


    <!-- Bootstrap core CSS     -->
    <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
    <!--  Material Dashboard CSS    -->
    <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/material-dashboard.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/demo.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
    <!--     Fonts and icons     -->
    <link href=\"https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons\" />
</head>

<body>

    <div class=\"wrapper wrapper-full-page\">
        <div class=\"full-page login-page\" filter-color=\"black\" >
            <!--   you can change the color of the filter page using: data-color=\"blue | purple | green | orange | red | rose \" -->
            <div class=\"content\">
                <div class=\"container\">
                    <div class=\"row\">
                        <div class=\"col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3\">
                           

                        
                            <form method=\"post\" action=\"";
        // line 35
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_check");
        echo "\">
                                <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "\" />
                                <div class=\"card card-login \">
                                    <br>
                                    <center><i class=\"fa fa-lock\" style=\"font-size:100pt;color: #ea1f62;\"></i></center>
                                    <br>
                                    
                                    ";
        // line 42
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 43
            echo "                                        <div class=\"card-content\" style=\"padding-right:10px\">
                                            <div class=\"alert alert-danger\">
                                                <span>
                                                   <b>Erreur ! </b>  ";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans((isset($context["error"]) ? $context["error"] : null), array(), "FOSUserBundle"), "html", null, true);
            echo "</span>
                                            </div>
                                        </div>
                                    ";
        }
        // line 49
        echo "   
                                    <div class=\"card-content\">
                                        <div class=\"input-group\">
                                            <span class=\"input-group-addon\">
                                                <i class=\"material-icons\">email</i>
                                            </span>
                                            <div class=\"form-group label-floating\">
                                                <label class=\"control-label\">Identifiant</label>
                                                 <input type=\"text\" class=\"form-control\" id=\"username\" name=\"_username\" value=\"";
        // line 57
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" required=\"required\" />
                                            </div>
                                        </div>
                                        <div class=\"input-group\">
                                            <span class=\"input-group-addon\">
                                                <i class=\"material-icons\">lock_outline</i>
                                            </span>
                                            <div class=\"form-group label-floating\">
                                                <label class=\"control-label\">Password</label>
                                                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"_password\" required=\"required\" />
                                            </div>
                                        </div>
                                        <div class=\"input-group\" style=\"padding:16px\">
                                            <label>
                                                <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\"> ";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "
                                            </label>
                                        </div>

                                    </div>
                                    <div class=\"footer text-center\">
                                        <button type=\"submit\" class=\"btn btn-fill btn-rose\">";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</body>
<script src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/jquery-3.1.1.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/jquery-ui.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/material.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<!-- Material Dashboard javascript methods -->
<script src=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/material-dashboard.js"), "html", null, true);
        echo "\"></script>
</html>



";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 95,  161 => 93,  157 => 92,  153 => 91,  149 => 90,  133 => 77,  124 => 71,  107 => 57,  97 => 49,  90 => 46,  85 => 43,  83 => 42,  74 => 36,  70 => 35,  49 => 17,  44 => 15,  39 => 13,  28 => 5,  24 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "FOSUserBundle:Security:login.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/UserBundle/Resources/views/Security/login.html.twig");
    }
}
