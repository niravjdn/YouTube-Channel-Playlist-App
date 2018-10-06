<?php 
function truncate($text, $length=38)
   {
      $trunc = (strlen($text)>$length)?true:false;
      if($trunc)
         return substr($text, 0, $length).'...';
      else
         return $text;
   }
$list=array();
foreach ($videos as $key => $image) {


	$a["id"]=$image->getId();
	$a["title"]=$image->getTitle();
	$a["review"]=$image->getReview();
	$a["comment"]=$image->getComment();
	$a["comments"]=sizeof($image->getComments());
	$a["downloads"]=$image->getDownloads();
	$a["user"]=$image->getUser()->getName();
	$a["userid"]=$image->getUser()->getId();
	$a["type"]=$image->getVideo()->getType();
	$a["extension"]=$image->getVideo()->getExtension();
	$a["thumbnail"]= $this['imagine']->filter($view['assets']->getUrl($image->getMedia()->getLink()), 'image_thumb_api');
	$a["image"]= $this['imagine']->filter($view['assets']->getUrl($image->getMedia()->getLink()), 'image_image');
	$a["video"] = str_replace("/media/cache/resolve/image/", "/", $this['imagine']->filter($view['assets']->getUrl($image->getVideo()->getLink()) ,'image'));
	$a["userimage"]=$image->getUser()->getImage();
	$a["created"]=$view['time']->diff($image->getCreated());
	$a["tags"]=$image->getTags();
	$a["like"]=$image->getLike();
	$a["love"]=$image->getLove();
	$a["woow"]=$image->getWoow();
	$a["angry"]=$image->getAngry();
	$a["sad"]=$image->getSad();
	$a["haha"]=$image->getHaha();

	$list[]=$a;
}
echo json_encode($list, JSON_UNESCAPED_UNICODE);?>