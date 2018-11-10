<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Comment;
use AppBundle\Entity\Device;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class HomeController extends Controller
{
    function send_notificationToken ($tokens, $message,$key)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = array(
            'registration_ids'  => $tokens,
            'data'   => $message

            );
        $headers = array(
            'Authorization:key = '.$key,
            'Content-Type: application/json'
            );
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
    }
    function send_notification ($tokens, $message,$key)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = array(
            'to'  => '/topics/StatusVideoApp',
            'data'   => $message
            );
        $headers = array(
            'Authorization:key = '.$key,
            'Content-Type: application/json'
            );
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
    }

   
    public function notifCategoryAction(Request $request)
    {
        memory_get_peak_usage();
        $imagineCacheManager = $this->get('liip_imagine.cache.manager');



        $em=$this->getDoctrine()->getManager();
        $categories= $em->getRepository("AppBundle:Category")->findAll();

        $devices= $em->getRepository('AppBundle:Device')->findAll();
        $tokens=array();
        foreach ($devices as $key => $device) {
           $tokens[]=$device->getToken();
        }

        $defaultData = array();
        $form = $this->createFormBuilder($defaultData)
            ->setMethod('GET')
            ->add('title', TextType::class)
            ->add('message', TextareaType::class)
           # ->add('url', UrlType::class)
           # ->add('categories', ChoiceType::class, array('choices' => $categories ))           
            ->add('category', 'entity', array('class' => 'AppBundle:Category'))           
            ->add('icon', UrlType::class,array("label"=>"Large Icon"))
            ->add('image', UrlType::class,array("label"=>"Big Picture"))
            ->add('send', SubmitType::class,array("label"=>"Send notification"))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();

            $category_selected = $em->getRepository("AppBundle:Category")->find($data["category"]);

            $message = array(
                        "type"=>"category",
                        "id"=>$category_selected->getId(),
                        "title_category"=>$category_selected->getTitle(),
                        "video_category"=>$imagineCacheManager->getBrowserPath( $category_selected->getMedia()->getLink(), 'category_thumb_api'),
                        "title"=> $data["title"],
                        "message"=>$data["message"],
                        "image"=> $data["image"],
                        "icon"=>$data["icon"]
                        );
            

            $key=$this->container->getParameter('fire_base_key');
            $message_video = $this->send_notification(null, $message,$key); 
            
            $this->addFlash('success', 'Operation has been done successfully ');

        }
        return $this->render('AppBundle:Home:notif_category.html.twig',array(
          "form"=>$form->createView()
          ));
    }
   public function notifUrlAction(Request $request)
    {
    
        memory_get_peak_usage();
        $imagineCacheManager = $this->get('liip_imagine.cache.manager');

        $em=$this->getDoctrine()->getManager();

        $defaultData = array();
        $form = $this->createFormBuilder($defaultData)
            ->setMethod('GET')
            ->add('title', TextType::class)
            ->add('message', TextareaType::class)      
            ->add('url', UrlType::class,array("label"=>"Url"))
            ->add('icon', UrlType::class,array("label"=>"Large Icon"))
            ->add('image', UrlType::class,array("label"=>"Big Picture"))
            ->add('send', SubmitType::class,array("label"=>"Send notification"))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $message = array(
                        "type"=>"link",
                        "id"=>strlen($data["url"]),
                        "link"=>$data["url"],
                        "title"=> $data["title"],
                        "message"=>$data["message"],
                        "image"=> $data["image"],
                        "icon"=>$data["icon"]
                        );
            $key=$this->container->getParameter('fire_base_key');
            $message_image = $this->send_notification(null, $message,$key); 
           
            $this->addFlash('success', 'Operation has been done successfully ');
          
        }
        return $this->render('AppBundle:Home:notif_url.html.twig',array(
            "form"=>$form->createView()
        ));
    }


    public function notifVideoAction(Request $request)
    {
        $imagineCacheManager = $this->get('liip_imagine.cache.manager');
        $em=$this->getDoctrine()->getManager();
        $defaultData = array();
        $form = $this->createFormBuilder($defaultData)
            ->setMethod('GET')
            ->add('title', TextType::class)
            ->add('message', TextareaType::class)
            ->add('object', 'entity', array('class' => 'AppBundle:Video'))           
            ->add('icon', UrlType::class,array("label"=>"Large Icon"))
            ->add('image', UrlType::class,array("label"=>"Big Picture"))
            ->add('send', SubmitType::class,array("label"=>"Send notification"))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $video_selected = $em->getRepository("AppBundle:Video")->find($data["object"]);
            




            $message = array(
                  "type"=>"video",
                  "id"=> $video_selected->getId(),
                  "video_title"=> $video_selected->getTitle(),
                  "video_review"=> $video_selected->getReview(),
                  "video_comment"=> $video_selected->getComment(),
                  "video_comments"=>sizeof($video_selected->getComments()),
                  "video_downloads"=> $video_selected->getDownloads(),
                  "video_user"=> $video_selected->getUser()->getName(),
                  "video_userid"=> $video_selected->getUser()->getId(),
                  "video_type"=> $video_selected->getMedia()->getType(),
                  "video_extension"=> $video_selected->getMedia()->getExtension(),
                  "video_thumbnail"=>$imagineCacheManager->getBrowserPath($video_selected->getMedia()->getLink(), 'video_thumb_api'),
                  "video_image"=>$imagineCacheManager->getBrowserPath($video_selected->getMedia()->getLink(), 'image_image'),
                  "video_video"=> str_replace("/media/cache/resolve/image/", "/", $imagineCacheManager->getBrowserPath($video_selected->getVideo()->getLink(), 'image')),
                  "video_userimage"=> $video_selected->getUser()->getImage(),
                  "video_created"=> "Now",
                  "video_tags"=> $video_selected->getTags(),
                  "video_like"=> $video_selected->getLike(),
                  "video_love"=> $video_selected->getLove(),
                  "video_woow"=> $video_selected->getWoow(),
                  "video_angry"=> $video_selected->getAngry(),
                  "video_sad"=> $video_selected->getSad(),
                  "video_haha"=> $video_selected->getHaha(),
                  "video_created"=>"Now",
                  "title"=> $data["title"],
                  "message"=>$data["message"],
                  "image"=> $data["image"],
                  "icon"=>$data["icon"]
                );

            $key=$this->container->getParameter('fire_base_key');
            $message_image = $this->send_notification(null, $message,$key); 
            $this->addFlash('success', 'Operation has been done successfully ');
        }
        return $this->render('AppBundle:Home:notif_image.html.twig',array(
          "form"=>$form->createView()
          ));
    }

  public function notifUservideoAction(Request $request)
    {
        memory_get_peak_usage();
        $imagineCacheManager = $this->get('liip_imagine.cache.manager');
        $video_id= $request->query->get("video_id");
        $em=$this->getDoctrine()->getManager();

        $defaultData = array();
        $form = $this->createFormBuilder($defaultData)
            ->setMethod('GET')
            ->add('title', TextType::class)
            ->add('object', HiddenType::class,array("attr"=>array("value"=>$video_id)))
            ->add('message', TextareaType::class)
            ->add('icon', UrlType::class,array("label"=>"Large Icon"))
            ->add('image', UrlType::class,array("label"=>"Big Picture"))
            ->add('send', SubmitType::class,array("label"=>"Send notification"))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
            $data = $form->getData();
            $video_selected= $em->getRepository("AppBundle:Video")->find($data["object"]);
            $user= $video_selected->getUser();

            $devices= $em->getRepository('AppBundle:Device')->findAll();
             if ($user==null) {
                throw new NotFoundHttpException("Page not found");  
            }
            $tokens=array();

            $tokens[]=$user->getToken();



            $message = array(
                  "type"=>"video",
                  "video_id"=> $video_selected->getId(),
                  "video_title"=> $video_selected->getTitle(),
                  "video_review"=> $video_selected->getReview(),
                  "video_comment"=> $video_selected->getComment(),
                  "video_comments"=>sizeof($video_selected->getComments()),
                  "video_downloads"=> $video_selected->getDownloads(),
                  "video_user"=> $video_selected->getUser()->getName(),
                  "video_userid"=> $video_selected->getUser()->getId(),
                  "video_type"=> $video_selected->getMedia()->getType(),
                  "video_extension"=> $video_selected->getMedia()->getExtension(),
                  "video_thumbnail"=>$imagineCacheManager->getBrowserPath($video_selected->getMedia()->getLink(), 'video_thumb_api'),
                  "video_image"=>$imagineCacheManager->getBrowserPath($video_selected->getMedia()->getLink(), 'image_image'),
                  "video_original"=> str_replace("/media/cache/resolve/image/", "/", $imagineCacheManager->getBrowserPath($video_selected->getMedia()->getLink(), 'image')),
                  "video_userimage"=> $video_selected->getUser()->getImage(),
                  "video_created"=> "Now",
                  "video_tags"=> $video_selected->getTags(),
                  "video_like"=> $video_selected->getLike(),
                  "video_love"=> $video_selected->getLove(),
                  "video_woow"=> $video_selected->getWoow(),
                  "video_angry"=> $video_selected->getAngry(),
                  "video_sad"=> $video_selected->getSad(),
                  "video_haha"=> $video_selected->getHaha(),
                  "video_created"=>"Now",
                  "title"=> $data["title"],
                  "message"=>$data["message"],
                  "image"=> $data["image"],
                  "icon"=>$data["icon"]
                );

             $key=$this->container->getParameter('fire_base_key');
             $message_image = $this->send_notificationToken($tokens, $message,$key); 
             $this->addFlash('success', 'Operation has been done successfully ');
             return $this->redirect($this->generateUrl('app_video_index'));
        }else{
           $video= $em->getRepository("AppBundle:Video")->find($video_id);
        }
        return $this->render('AppBundle:Home:notif_user_video.html.twig',array(
            "form"=>$form->createView(),
            'video'=>$video
        ));
    }  
   
    public function indexAction()
    {   
        $em=$this->getDoctrine()->getManager();
        $supports= $em->getRepository("AppBundle:Support")->findAll();
        $supports_count= sizeof($supports);

        $devices= $em->getRepository("AppBundle:Device")->findAll();
        $devices_count= sizeof($devices);




        $video= $em->getRepository("AppBundle:Video")->findAll();
        $video_count= sizeof($video);



        $review= $em->getRepository("AppBundle:Video")->findBy(array("review"=>true));
        $review_count= sizeof($review);




        $category= $em->getRepository("AppBundle:Category")->findAll();
        $category_count= sizeof($category);


        $comment= $em->getRepository("AppBundle:Comment")->findAll();
        $comment_count= sizeof($comment);


        $language= $em->getRepository("AppBundle:Language")->findAll();
        $language_count= sizeof($language);


        $version= $em->getRepository("AppBundle:Version")->findAll();
        $version_count= sizeof($version);

        $users= $em->getRepository("UserBundle:User")->findAll();
        $users_count= sizeof($users)-1;





        return $this->render('AppBundle:Home:index.html.twig',array(
            
                "devices_count"=>$devices_count,
                "video_count"=>$video_count,
                "category_count"=>$category_count,

                "review_count"=>$review_count,
                "users_count"=>$users_count,
                "comment_count"=>$comment_count,

                "version_count"=>$version_count,
                "language_count"=>$language_count,
                "supports_count"=>$supports_count

        ));
    }
    public function api_deviceAction($tkn,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $code="200";
        $message="";
        $errors=array();
        $em = $this->getDoctrine()->getManager();
        $d=$em->getRepository('AppBundle:Device')->findOneBy(array("token"=>$tkn));
        if ($d==null) {
            $device = new Device();
            $device->setToken($tkn);
            $em->persist($device);
            $em->flush();
            $message="Deivce added";
        }else{
            $message="Deivce Exist";
        }

        $error=array(
            "code"=>$code,
            "message"=>$message,
            "values"=>$errors
        );
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent=$serializer->serialize($error, 'json');
        return new Response($jsonContent);
    }

    



}