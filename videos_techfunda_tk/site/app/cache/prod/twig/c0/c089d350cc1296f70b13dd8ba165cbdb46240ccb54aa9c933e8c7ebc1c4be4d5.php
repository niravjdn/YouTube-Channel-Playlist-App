<?php

/* AppBundle::layout.html.twig */
class __TwigTemplate_754716261eb19c8a10f5aceffe33dce2701c6bbc3b067df1ee1aae0fcc7411a5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\" />
    <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/apple-icon.png"), "html", null, true);
        echo "\" />
    <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/favicon.png"), "html", null, true);
        echo "\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" />

    <title>Admin Panel | image </title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name=\"viewport\" content=\"width=device-width\" />

    <!-- Bootstrap core CSS     -->
    <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />

    <!--  Material Dashboard CSS    -->
    <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/material-dashboard.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/demo.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />

    <!--     Fonts and icons     -->
    <link href=\"https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css\" rel=\"stylesheet\">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/jscolor.js"), "html", null, true);
        echo "\"></script>
    <link href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css\" rel=\"stylesheet\">
    <link href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("lib/css/emoji.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("giflib/gifplayer.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">


    <link rel=\"stylesheet\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("tags/css/normalize.css"), "html", null, true);
        echo "\">
    <!--[if IE 8]><script src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/es5.js"), "html", null, true);
        echo "\"></script><![endif]-->
    <script src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/jquery.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("tags/js/standalone/selectize.js"), "html", null, true);
        echo "\"></script>
    <link rel=\"stylesheet\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("tags/css/selectize.default.css"), "html", null, true);
        echo "\">
</head>

<body>
    ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "all", array(), "method"));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 41
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 42
                echo "            <div class=\"alert alert-";
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo " alert-with-icon alert-dashborad\" data-notify=\"container\"  style=\"position: absolute;right: 20px;top: 0px;z-index: 1000;\">
                <i class=\"material-icons\" data-notify=\"icon\">notifications</i>
                <button type=\"button\" aria-hidden=\"true\" class=\"close\">
                    <i class=\"material-icons\">close</i>
                </button>
                <span data-notify=\"message\">";
                // line 47
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans($context["message"]), "html", null, true);
                echo "</span>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "
    <div class=\"wrapper\">
        <div class=\"sidebar\" data-active-color=\"rose\"  data-background-color=\"black\" data-image=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/sidebar-1.jpg"), "html", null, true);
        echo "\">
              <!--
                  Tip 1: You can change the color of the sidebar using: data-color=\"purple | blue | green | orange | red\"

                  Tip 2: you can also add an image using data-image tag
              -->
              <div class=\"logo\">
                  <a href=\"";
        // line 60
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_home_index");
        echo "\" class=\"simple-text\">
                      Admin Panel
                  </a>
              </div>
              <div class=\"sidebar-wrapper\" style=\"overflow: scroll\">
                <div class=\"user\">
                        <div class=\"photo\">
                            <img src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/avatar.jpg"), "html", null, true);
        echo "\">
                        </div>
                        <div class=\"info\">
                            <a data-toggle=\"collapse\" href=\"#collapseExample\" class=\"collapsed\">
                                Admin
                                <b class=\"caret\"></b>
                            </a>
                            <div class=\"collapse\" id=\"collapseExample\">
                                <ul class=\"nav\" style=\"margin-top:0px\">
                                    <li>
                                        <a href=\"";
        // line 77
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_change_password");
        echo "\">Change Password</a>
                                    </li>
                                    <li>
                                        <a href=\"";
        // line 80
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_logout");
        echo "\">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                     <ul class=\"nav\">

                        <li ";
        // line 88
        if (twig_in_filter("app_home_index", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"))) {
            echo " class=\"active\"";
        }
        echo ">
                            <a href=\"";
        // line 89
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_home_index");
        echo "\">
                                <i class=\"material-icons\">dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li ";
        // line 94
        if (twig_in_filter("app_home_notif_", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"))) {
            echo " class=\"active\"  aria-expanded=\"true\" ";
        }
        echo ">
                            <a data-toggle=\"collapse\" href=\"#notification\" class=\"\" >
                                <i class=\"material-icons\">notifications_active</i>
                                <p>Notifications
                                    <b class=\"caret\"></b>
                                </p>
                            </a>
                            <div class=\"collapse ";
        // line 101
        if (twig_in_filter("app_home_notif_", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"))) {
            echo "  in ";
        }
        echo "\" id=\"notification\" aria-expanded=\"true\" style=\"\">
                                <ul class=\"nav\">
                                    <li  ";
        // line 103
        if (twig_in_filter("app_home_notif_video", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"))) {
            echo " class=\"active\" ";
        }
        echo "><a href=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_home_notif_video");
        echo "\">Video</a></li>
                                    <li  ";
        // line 104
        if (twig_in_filter("app_home_notif_category", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"))) {
            echo " class=\"active\" ";
        }
        echo "><a href=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_home_notif_category");
        echo "\">Category</a></li>
                                    <li  ";
        // line 105
        if (twig_in_filter("app_home_notif_url", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"))) {
            echo " class=\"active\" ";
        }
        echo "><a href=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_home_notif_url");
        echo "\">Url</a></li>
                                </ul>
                            </div>
                        </li>


                        <li ";
        // line 111
        if (twig_in_filter("app_category_", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"))) {
            echo " class=\"active\"";
        }
        echo ">
                            <a href=\"";
        // line 112
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_category_index");
        echo "\">
                                <i class=\"material-icons\">view_list</i>
                                <p>Categories</p>
                            </a>
                        </li>
                       

                        <li ";
        // line 119
        if (twig_in_filter("app_video_i", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"))) {
            echo " class=\"active\"";
        }
        echo ">
                            <a href=\"";
        // line 120
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_index");
        echo "\">
                                <i class=\"material-icons\">video_library</i>
                                <p>Videos</p>
                            </a>
                        </li>
                        <li ";
        // line 125
        if (twig_in_filter("app_video_r", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"))) {
            echo " class=\"active\"";
        }
        echo ">
                            <a href=\"";
        // line 126
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_reviews");
        echo "\">
                                <i class=\"material-icons\">playlist_add_check</i>
                                <p>Videos to review</p>
                            </a>
                        </li>
                        <li ";
        // line 131
        if (twig_in_filter("language", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"))) {
            echo " class=\"active\"";
        }
        echo "  >
                            <a href=\"";
        // line 132
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_language_index");
        echo "\">
                            <i class=\"material-icons\">flag</i>
                                <p>Languages</p>
                            </a>
                        </li>        
                        <li ";
        // line 137
        if (twig_in_filter("comment", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"))) {
            echo " class=\"active\"";
        }
        echo "  >
                            <a href=\"";
        // line 138
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_comment_index");
        echo "\">
                            <i class=\"material-icons\">comments</i>
                                <p>Comments</p>
                            </a>
                        </li>
                        <li ";
        // line 143
        if (twig_in_filter("support", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"))) {
            echo " class=\"active\"";
        }
        echo "  >
                            <a href=\"";
        // line 144
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_support_index");
        echo "\">
                            <i class=\"material-icons\">messages</i>
                                <p>Support messages</p>
                            </a>
                        </li>
                        <li ";
        // line 149
        if (twig_in_filter("version", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"))) {
            echo " class=\"active\"";
        }
        echo "  >
                            <a href=\"";
        // line 150
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_version_index");
        echo "\">
                            <i class=\"material-icons\">apps</i>
                                <p>Versions App</p>
                            </a>
                        </li>
                        <li ";
        // line 155
        if (twig_in_filter("user", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"))) {
            echo " class=\"active\"";
        }
        echo "  >
                            <a href=\"";
        // line 156
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_index");
        echo "\">
                            <i class=\"material-icons\">group</i>
                                <p>Users</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        <div class=\"main-panel\" style=\"overflow: scroll\">
            <nav class=\"navbar navbar-transparent navbar-absolute\">
                <div class=\"container-fluid\">
                    <div class=\"navbar-header\">
                        <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\">
                            <span class=\"sr-only\">Toggle navigation</span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                        </button>
                        <a class=\"navbar-brand\" href=\"#\">Dashboard</a>
                    </div>
                    <div class=\"collapse navbar-collapse\">
                        <ul class=\"nav navbar-nav navbar-right\">
                            <li class=\"dropdown\">
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                    <i class=\"material-icons\">person</i>
                                    <p class=\"hidden-lg hidden-md\">Notifications</p>
                                </a>
                                <ul class=\"dropdown-menu\">
                                    <li>
                                        <a href=\"";
        // line 185
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_change_password");
        echo "\">Change Password</a>
                                    </li>
                                    <li>
                                        <a href=\"";
        // line 188
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_logout");
        echo "\">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>

            <div class=\"content\">
                ";
        // line 199
        $this->displayBlock('body', $context, $blocks);
        // line 202
        echo "            </div>

            <footer class=\"footer\">
                <div class=\"container-fluid\">
                    <p class=\"copyright pull-right\">
                       <a href=\"https://www.techtrice.com\">Nirav Patel</a></p>
                </div>
            </footer>
        </div>
    </div>

</body>

    <!--   Core JS Files   -->
    <script src=\"";
        // line 216
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/jquery-3.1.0.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 217
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 218
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/material.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

    <!--  Notifications Plugin    -->
    <script src=\"";
        // line 221
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/bootstrap-notify.js"), "html", null, true);
        echo "\"></script>

    <!--  Google Maps Plugin    -->
    <script type=\"text/javascript\" src=\"https://maps.googleapis.com/maps/api/js\"></script>

    <!-- Material Dashboard javascript methods -->
    <script src=\"";
        // line 227
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/material-dashboard.js"), "html", null, true);
        echo "\"></script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src=\"";
        // line 230
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/demo.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 231
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/app.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 232
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("lib/js/config.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 233
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("lib/js/util.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 234
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("lib/js/jquery.emojiarea.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 235
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("lib/js/emoji-picker.js"), "html", null, true);
        echo "\"></script>


    <script>
      \$(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: '[data-emojiable=true]',
          assetsPath: '../lib/img/',
          popupButtonClasses: 'fa fa-smile-o'
        });
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
      });
    </script>

</html>
";
    }

    // line 199
    public function block_body($context, array $blocks = array())
    {
        // line 200
        echo "                    
                ";
    }

    public function getTemplateName()
    {
        return "AppBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  501 => 200,  498 => 199,  474 => 235,  470 => 234,  466 => 233,  462 => 232,  458 => 231,  454 => 230,  448 => 227,  439 => 221,  433 => 218,  429 => 217,  425 => 216,  409 => 202,  407 => 199,  393 => 188,  387 => 185,  355 => 156,  349 => 155,  341 => 150,  335 => 149,  327 => 144,  321 => 143,  313 => 138,  307 => 137,  299 => 132,  293 => 131,  285 => 126,  279 => 125,  271 => 120,  265 => 119,  255 => 112,  249 => 111,  236 => 105,  228 => 104,  220 => 103,  213 => 101,  201 => 94,  193 => 89,  187 => 88,  176 => 80,  170 => 77,  157 => 67,  147 => 60,  137 => 53,  133 => 51,  127 => 50,  118 => 47,  109 => 42,  104 => 41,  100 => 40,  93 => 36,  89 => 35,  85 => 34,  81 => 33,  77 => 32,  71 => 29,  67 => 28,  62 => 26,  54 => 21,  48 => 18,  42 => 15,  30 => 6,  26 => 5,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AppBundle::layout.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/AppBundle/Resources/views/layout.html.twig");
    }
}
