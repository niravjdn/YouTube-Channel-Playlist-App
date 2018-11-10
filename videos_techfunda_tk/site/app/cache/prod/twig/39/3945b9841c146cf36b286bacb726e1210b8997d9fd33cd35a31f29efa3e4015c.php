<?php

/* AppBundle:Video:add.html.twig */
class __TwigTemplate_fb163e9d7d7668e02d8fa9109e16b4ee60d0c7a914cea2ad73d2a07983cba3aa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::layout.html.twig", "AppBundle:Video:add.html.twig", 1);
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
        echo "  <div class=\"container-fluid\">
    <div class=\"row\">
      <div class=\"col-sm-offset-1 col-md-10\">
        <div class=\"card\">
          <div class=\"card-header card-header-icon\" data-background-color=\"rose\">
            <i class=\"material-icons\">video_library</i>
          </div>
          <div class=\"card-content\">
            <h4 class=\"card-title\">New Video</h4>
            ";
        // line 12
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start');
        echo "
               <div class=\"form-group label-floating \">
                  <label class=\"control-label\">Video title</label>
                  ";
        // line 15
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                  <span class=\"validate-input\">";
        // line 16
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'errors');
        echo "</span>
              </div>
               <img src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("img/image_placeholder.jpg"), "html", null, true);
        echo "\" class=\"fileinput-preview thumbnail \" id=\"img-preview\">
                <div class=\"fileinput fileinput-new text-center\" data-provides=\"fileinput\" style=\"width: 100%;\">
                    <div>
                        <a href=\"#\" class=\"btn btn-rose btn-round btn-select\" style=\"width: 100%;margin:0px;\"><i class=\"material-icons\">image</i> Select Image</a>
                    </div>
                    ";
        // line 23
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "file", array()), 'widget', array("attr" => array("class" => "file-hidden input-file img-selector", "style" => "   /* display: none; */height: 0px;width: 0px;position: absolute;")));
        echo "
                    <span class=\"validate-input\">";
        // line 24
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "file", array()), 'errors');
        echo "</span>
               </div>
               <br>
               <video width=\"100%\" style=\"display:none\" controls>
                      <source id=\"video_here\">
                        Your browser does not support HTML5 video.
                     </video>
                      <div class=\"text-center\"  style=\"width: 100%;\">
                         
                          <div>
                              <a href=\"#\" class=\"btn btn-rose btn-round select-video\" style=\"width: 100%;\"><i class=\"material-icons\">videocam</i> Select Video</a>
                          </div>
                          ";
        // line 36
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "filevideo", array()), 'widget', array("attr" => array("class" => "input-video", "style" => "   /* display: none; */height: 0px;width: 0px;position: absolute;")));
        echo "
                          <span class=\"validate-input\">";
        // line 37
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "filevideo", array()), 'errors');
        echo "</span>
                     </div>
                      <br>
               <br>
              <div class=\"\">
                    <label>
                      ";
        // line 43
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "enabled", array()), 'widget');
        echo "  Enabled
                    </label>
              </div>
              <div class=\"\">
                    <label>
                      ";
        // line 48
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "comment", array()), 'widget');
        echo "  Enabled Comment
                    </label>
              </div>
              <br>
              ";
        // line 52
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "categories", array()), 'label', array("label_attr" => array("style" => "font-size:16px")));
        echo " :
              <div>
                  <div class=\"row\">
                 ";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "categories", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 56
            echo "                      <label  style=\"background: #e02d6c;border-radius: 20px;padding: 5px;text-align: center;margin: 10px;color: white;font-weight: bold;padding-left: 20px;padding-right: 20px;\">
                          ";
            // line 57
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["field"], 'widget');
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["field"], "vars", array()), "label", array()), "html", null, true);
            echo "
                      </label>
                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "                  </div>
              </div>
              <br>
              ";
        // line 63
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "languages", array()), 'label', array("label_attr" => array("style" => "font-size:16px")));
        echo " :
              <div>
                  <div class=\"row\">
                 ";
        // line 66
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "languages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 67
            echo "                      <label  style=\"background: #e02d6c;border-radius: 20px;padding: 5px;text-align: center;margin: 10px;color: white;font-weight: bold;padding-left: 20px;padding-right: 20px;\">
                          ";
            // line 68
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["field"], 'widget');
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["field"], "vars", array()), "label", array()), "html", null, true);
            echo "
                      </label>
                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "                  </div>
              </div>
                <div class=\"form-group label-floating \">
                    <label class=\"control-label\">ringtone tags (Ex:anim,art,hero)</label>
                    <br>
                    ";
        // line 76
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "tags", array()), 'widget', array("attr" => array("class" => "input-tags")));
        echo "
                    <span class=\"validate-input\">";
        // line 77
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "tags", array()), 'errors');
        echo "</span>
                </div>
                <script>
                \$('.input-tags').selectize({
                  persist: false,
                  createOnBlur: true,
                  create: true
                });
                </script>
              <br>
              <span class=\"pull-right\"><a href=\"";
        // line 87
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_video_index");
        echo "\" class=\"btn btn-fill btn-yellow\"><i class=\"material-icons\">arrow_back</i> Cancel</a>";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "save", array()), 'widget', array("attr" => array("class" => "btn btn-fill btn-rose")));
        echo "</span>
            ";
        // line 88
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
          </div>
        </div>
      </div>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Video:add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  195 => 88,  189 => 87,  176 => 77,  172 => 76,  165 => 71,  154 => 68,  151 => 67,  147 => 66,  141 => 63,  136 => 60,  125 => 57,  122 => 56,  118 => 55,  112 => 52,  105 => 48,  97 => 43,  88 => 37,  84 => 36,  69 => 24,  65 => 23,  57 => 18,  52 => 16,  48 => 15,  42 => 12,  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AppBundle:Video:add.html.twig", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/AppBundle/Resources/views/Video/add.html.twig");
    }
}
