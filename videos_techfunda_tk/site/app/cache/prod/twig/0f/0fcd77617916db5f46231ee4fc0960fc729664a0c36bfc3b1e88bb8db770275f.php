<?php

/* AppBundle:Version:index.html.twig */
class __TwigTemplate_1f65e2b45c06ec484b932b7502eb7c9fb97f27ce29f50675172fc9c282dcacea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "AppBundle:Version:index.html.twig", 1);
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
\t\t<div class=\"col-md-12\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<a href=\"";
        // line 8
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_version_index");
        echo "\" class=\"btn  btn-lg btn-warning col-md-12\"><i class=\"material-icons\" style=\"font-size: 30px;\">refresh</i> Refresh</a>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<a class=\"btn btn btn-lg btn-yellow col-md-12\"><i class=\"material-icons\" style=\"font-size: 30px;\">flag</i> ";
        // line 11
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["versions"]) ? $context["versions"] : null)), "html", null, true);
        echo " versions</a>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<a href=\"";
        // line 14
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_version_add");
        echo "\" class=\"btn btn-rose btn-lg pull-right add-button col-md-12\" title=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">add_box</i> NEW VERSION </a>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"card\">
\t\t\t    <div class=\"card-content\">
\t\t\t        <div class=\"table-responsive\">
\t\t\t            <table class=\"table\" width=\"100%\">
\t\t\t                <thead class=\"text-primary\">
\t\t\t                    <th>ID</th>
\t\t\t                    <th>Version title</th>
\t\t\t                    <th>Version code</th>
\t\t\t                    <th>Status</th>
\t\t\t                    <th width=\"300px\">Action</th>
\t\t\t                </tr></thead>
\t\t\t                <tbody>
\t\t\t                ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["versions"]) ? $context["versions"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["version"]) {
            // line 30
            echo "\t\t\t                    <tr>
\t\t\t                        <td>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($context["version"], "id", array()), "html", null, true);
            echo "</td>
\t\t\t                        <td>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["version"], "title", array()), "html", null, true);
            echo "</td>
\t\t\t                        <td><span  > ";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["version"], "code", array()), "html", null, true);
            echo " </span></td>
\t\t\t                        <td>
\t\t\t                        ";
            // line 35
            if ($this->getAttribute($context["version"], "enabled", array())) {
                // line 36
                echo "\t\t\t                            <span class=\"label label-success\">Enabled</span>

\t\t\t                        ";
            } else {
                // line 39
                echo "\t\t\t                            <span class=\"label label-danger\">Disabled</span>

\t\t\t                        ";
            }
            // line 42
            echo "\t\t\t                        </td>
\t\t\t                        <td>
\t\t                                <a href=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_version_edit", array("id" => $this->getAttribute($context["version"], "id", array()))), "html", null, true);
            echo "\" rel=\"tooltip\" data-placement=\"left\" class=\" btn btn-primary btn-xs btn-round\" data-original-title=\"Edit\">
\t\t                                    <i class=\"material-icons\">edit</i>
\t\t                                </a>
\t\t                                <a href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_version_delete", array("id" => $this->getAttribute($context["version"], "id", array()))), "html", null, true);
            echo "\" rel=\"tooltip\" data-placement=\"left\" class=\" btn btn-danger btn-xs btn-round\" data-original-title=\"Delete\">
\t\t                                    <i class=\"material-icons\">delete</i>
\t\t                                </a>
\t\t\t                        </td>
\t\t\t                    </tr>
\t\t\t                    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 53
            echo "\t\t\t\t\t\t          <tr>
\t\t\t\t\t\t\t          <td colspan=\"5\">
\t\t\t\t\t\t\t\t          <br>
\t\t\t\t\t\t\t\t          <br>
\t\t\t\t\t\t\t\t          <center><img src=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/bg_empty.png"), "html", null, true);
            echo "\"  style=\"width: auto !important;\" =\"\"></center>
\t\t\t\t\t\t\t              <br>
\t\t\t\t\t\t\t              <br>
\t\t\t\t\t\t\t          </td>
\t\t\t\t\t\t          </tr>\t
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['version'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "\t\t\t                </tbody>
\t\t\t            </table>

\t\t\t        </div>
\t    \t\t</div>

\t    \t</div>
\t    </div>
\t</div>
                            
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Version:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 63,  128 => 57,  122 => 53,  111 => 47,  105 => 44,  101 => 42,  96 => 39,  91 => 36,  89 => 35,  84 => 33,  80 => 32,  76 => 31,  73 => 30,  68 => 29,  50 => 14,  44 => 11,  38 => 8,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AppBundle:Version:index.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/AppBundle/Resources/views/Version/index.html.twig");
    }
}
