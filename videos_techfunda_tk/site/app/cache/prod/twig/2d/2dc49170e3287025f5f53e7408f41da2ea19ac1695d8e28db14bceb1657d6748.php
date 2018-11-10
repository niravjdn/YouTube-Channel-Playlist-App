<?php

/* UserBundle:User:index.html.twig */
class __TwigTemplate_a4188842a22d24a5c44c6cf9645ab18bdfd43cc204a9370132f03eff514b21b9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "UserBundle:User:index.html.twig", 1);
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
        echo "
<div class=\"container-fluid\">
    <div class=\"row\">
    <div class=\"col-md-12\">



    <div class=\"row\">
      <div class=\"col-md-4\">
        <a href=\"";
        // line 12
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_index");
        echo "\" class=\"btn  btn-lg btn-warning col-md-12\"><i class=\"material-icons\" style=\"font-size: 30px;\">refresh</i> Refresh</a>
      </div>
      <div class=\"col-md-4\">
        <a class=\"btn btn btn-lg btn-yellow col-md-12\"><i class=\"material-icons\" style=\"font-size: 30px;\">queue_music</i> ";
        // line 15
        echo twig_escape_filter($this->env, (twig_length_filter($this->env, (isset($context["users"]) ? $context["users"] : null)) - 1), "html", null, true);
        echo " users</a>
      </div>
      <div class=\"col-md-4\">
        <form method=\"get\" class=\"btn btn  btn-yellow\" style=\"    width: 100%;\">
              <input type=\"text\" placeholder=\"Email/Nom\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "query", array()), "get", array(0 => "q"), "method"), "html", null, true);
        echo "\" name=\"q\" style=\"background: none;border: none;border-bottom: 1px solid white;\">
          <button type=\"submit\" style=\"background: none;border: none;\"><i class=\"material-icons\" style=\"font-size: 40px;\">search</i></button>
        </form>
      </div>
    </div>
      <div class=\"card\">
          <div class=\"card-content\">
              <h4 class=\"card-title\">Messages list</h4>
              <div class=\"table-responsive\">
                  <table class=\"table\" width=\"100%\">
                      <thead class=\"text-primary\">
                        <tr>
                          <th width=\"70px\">#</th>
                          <th>Full name</th>
                          <th>Facebook/Google Id</th>
                          <th>Enabled</th>
                          <th width=\"160px\">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      ";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 40
            echo "                          <tr>
                              <td width=\"70px\">       
                                <div class=\"avatar\">             
                                ";
            // line 43
            if (($this->getAttribute($context["user"], "image", array()) != null)) {
                // line 44
                echo "                                    <img class=\"avatar-char palette-Red-400 bg\"  style=\"border-radius: 100px;    border: 0.5px solid #ccc;\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute($context["user"], "image", array())), "html", null, true);
                echo "\" alt=\"\">
                                ";
            }
            // line 46
            echo "                                ";
            if (($this->getAttribute($context["user"], "type", array()) == "facebook")) {
                // line 47
                echo "                                    <img class=\"badge-avatar\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/facebook.png"), "html", null, true);
                echo "\" >
                                    ";
            } else {
                // line 49
                echo "                                    <img class=\"badge-avatar\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/google.png"), "html", null, true);
                echo "\" >
                                ";
            }
            // line 51
            echo "                                </div>
                              </td>
                              <td>";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "name", array()), "html", null, true);
            echo "</td>
                              <td>";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
            echo "</td>
                              <td>
                                ";
            // line 56
            if (($this->getAttribute($context["user"], "enabled", array()) == true)) {
                // line 57
                echo "                                  <span class=\"label label-success\">Enabled</span>
                                ";
            } else {
                // line 59
                echo "                                  <span class=\"label label-danger\">Disabled</span>
                                ";
            }
            // line 61
            echo "                              </td>
                              <td>
                                  <a href=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_user_edit", array("id" => $this->getAttribute($context["user"], "id", array()))), "html", null, true);
            echo "\" rel=\"tooltip\" data-placement=\"left\" class=\" btn btn-primary btn-xs btn-round\" data-original-title=\"View\">
                                        <i class=\"material-icons\">edit</i>
                                    </a>
                              </td>

                          </tr>
                          ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 70
            echo "                      <tr>
                        <td colspan=\"4\">
                          <br>
                          <br>
                          <center><img src=\"";
            // line 74
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/bg_empty.png"), "html", null, true);
            echo "\"  style=\"width: auto !important;\" =\"\"></center>
                            <br>
                            <br>
                        </td>
                      </tr> 
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "                      </tbody>
                  </table>

              </div>
          </div>

        </div>
              <div class=\" pull-right\">
        ";
        // line 88
        echo $this->env->getExtension('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension')->render($this->env, (isset($context["pagination"]) ? $context["pagination"] : null));
        echo "
      </div>
      </div>

  </div>
                            






";
    }

    public function getTemplateName()
    {
        return "UserBundle:User:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 88,  168 => 80,  156 => 74,  150 => 70,  138 => 63,  134 => 61,  130 => 59,  126 => 57,  124 => 56,  119 => 54,  115 => 53,  111 => 51,  105 => 49,  99 => 47,  96 => 46,  90 => 44,  88 => 43,  83 => 40,  78 => 39,  55 => 19,  48 => 15,  42 => 12,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "UserBundle:User:index.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/UserBundle/Resources/views/User/index.html.twig");
    }
}
