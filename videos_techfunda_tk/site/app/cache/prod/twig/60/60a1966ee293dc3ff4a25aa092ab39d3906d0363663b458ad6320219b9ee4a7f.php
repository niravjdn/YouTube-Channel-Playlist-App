<?php

/* @App/Video/api_all.html.php */
class __TwigTemplate_b83ed4e7fa139e53c5c6d052ec488af4dbceede5f368e4ec1c36bb034ca2c327 extends Twig_Template
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
        echo "<?php 
function truncate(\$text, \$length=38)
   {
      \$trunc = (strlen(\$text)>\$length)?true:false;
      if(\$trunc)
         return substr(\$text, 0, \$length).'...';
      else
         return \$text;
   }
\$list=array();
foreach (\$videos as \$key => \$image) {


\t\$a[\"id\"]=\$image->getId();
\t\$a[\"title\"]=\$image->getTitle();
\t\$a[\"review\"]=\$image->getReview();
\t\$a[\"comment\"]=\$image->getComment();
\t\$a[\"comments\"]=sizeof(\$image->getComments());
\t\$a[\"downloads\"]=\$image->getDownloads();
\t\$a[\"user\"]=\$image->getUser()->getName();
\t\$a[\"userid\"]=\$image->getUser()->getId();
\t\$a[\"type\"]=\$image->getVideo()->getType();
\t\$a[\"extension\"]=\$image->getVideo()->getExtension();
\t\$a[\"thumbnail\"]= \$this['imagine']->filter(\$view['assets']->getUrl(\$image->getMedia()->getLink()), 'image_thumb_api');
\t\$a[\"image\"]= \$this['imagine']->filter(\$view['assets']->getUrl(\$image->getMedia()->getLink()), 'image_image');
\t\$a[\"video\"] = str_replace(\"/media/cache/resolve/image/\", \"/\", \$this['imagine']->filter(\$view['assets']->getUrl(\$image->getVideo()->getLink()) ,'image'));
\t\$a[\"userimage\"]=\$image->getUser()->getImage();
\t\$a[\"created\"]=\$view['time']->diff(\$image->getCreated());
\t\$a[\"tags\"]=\$image->getTags();
\t\$a[\"like\"]=\$image->getLike();
\t\$a[\"love\"]=\$image->getLove();
\t\$a[\"woow\"]=\$image->getWoow();
\t\$a[\"angry\"]=\$image->getAngry();
\t\$a[\"sad\"]=\$image->getSad();
\t\$a[\"haha\"]=\$image->getHaha();

\t\$list[]=\$a;
}
echo json_encode(\$list, JSON_UNESCAPED_UNICODE);?>";
    }

    public function getTemplateName()
    {
        return "@App/Video/api_all.html.php";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@App/Video/api_all.html.php", "/var/sentora/hostdata/zadmin/public_html/videos_techfunda_tk/src/AppBundle/Resources/views/Video/api_all.html.php");
    }
}
