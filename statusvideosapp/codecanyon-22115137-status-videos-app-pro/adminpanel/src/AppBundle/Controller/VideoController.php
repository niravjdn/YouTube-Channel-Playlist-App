<?php 
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Video;
use MediaBundle\Entity\Media;
use AppBundle\Entity\Day;
use AppBundle\Form\VideoReviewType;
use AppBundle\Form\VideoType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class VideoController extends Controller
{

    public function api_by_followAction(Request $request,$page,$language,$user,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $nombre=30;
        $em=$this->getDoctrine()->getManager();
        $imagineCacheManager = $this->get('liip_imagine.cache.manager');
        $repository = $em->getRepository('AppBundle:Video');
        if ($language==0) {
            $query = $repository->createQueryBuilder('w')
            ->leftJoin('w.user', 'u')
            ->leftJoin('u.followers', 'f')
            ->where('f.id = '.$user,"w.enabled = true")
            ->addOrderBy('w.created', 'DESC')
            ->addOrderBy('w.id', 'asc')
            ->setFirstResult($nombre*$page)
            ->setMaxResults($nombre)
            ->getQuery();
        }else{
            $query = $repository->createQueryBuilder('w')
            ->leftJoin('w.languages', 'l')
            ->leftJoin('w.user', 'u')
            ->leftJoin('u.followers', 'f')
            ->where('l.id in ('.$language.')','f.id ='.$user,"w.enabled = true")
            ->addOrderBy('w.created', 'DESC')
            ->addOrderBy('w.id', 'asc')
            ->setFirstResult($nombre*$page)
            ->setMaxResults($nombre)
            ->getQuery();  
        }
        $videos = $query->getResult();
        return $this->render('AppBundle:Video:api_all.html.php',array("videos"=>$videos));
    }
    public function api_allAction(Request $request,$page,$order,$language,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $nombre=30;
        $em=$this->getDoctrine()->getManager();
        $imagineCacheManager = $this->get('liip_imagine.cache.manager');
        $repository = $em->getRepository('AppBundle:Video');


        if ($language==0) {
            $query = $repository->createQueryBuilder('w')
            ->where("w.enabled = true")
            ->addOrderBy('w.'.$order, 'DESC')
            ->addOrderBy('w.id', 'asc')
            ->setFirstResult($nombre*$page)
            ->setMaxResults($nombre)
            ->getQuery();
        }else{
            $query = $repository->createQueryBuilder('w')
            ->leftJoin('w.languages', 'l')
            ->where('l.id in ('.$language.')',"w.enabled = true")
            ->addOrderBy('w.'.$order, 'DESC')
            ->addOrderBy('w.id', 'asc')
            ->setFirstResult($nombre*$page)
            ->setMaxResults($nombre)
            ->getQuery();
        }
        $videos = $query->getResult();
        return $this->render('AppBundle:Video:api_all.html.php',array("videos"=>$videos));
    }
    public function api_by_categoryAction(Request $request,$page,$order,$language,$category,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $nombre=30;
        $em=$this->getDoctrine()->getManager();
        $imagineCacheManager = $this->get('liip_imagine.cache.manager');
        $repository = $em->getRepository('AppBundle:Video');
        if ($language==0) {
            $query = $repository->createQueryBuilder('w')
            ->leftJoin('w.categories', 'c')
            ->where('c.id = :category',"w.enabled = true")
            ->setParameter('category', $category)
            ->addOrderBy('w.'.$order, 'DESC')
            ->addOrderBy('w.id', 'asc')
            ->setFirstResult($nombre*$page)
            ->setMaxResults($nombre)
            ->getQuery();
        }else{
            $query = $repository->createQueryBuilder('w')
            ->leftJoin('w.languages', 'l')
            ->leftJoin('w.categories', 'c')
            ->where('l.id in ('.$language.')',"w.enabled = true",'c.id = :category')
            
            ->setParameter('category', $category)
            ->addOrderBy('w.'.$order, 'DESC')
            ->addOrderBy('w.id', 'asc')
            ->setFirstResult($nombre*$page)
            ->setMaxResults($nombre)
            ->getQuery();
        }
        $videos = $query->getResult();
        return $this->render('AppBundle:Video:api_all.html.php',array("videos"=>$videos));
    }
    public function api_myAction(Request $request,$page,$user,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $nombre=30;
        $em=$this->getDoctrine()->getManager();
        $imagineCacheManager = $this->get('liip_imagine.cache.manager');
        $repository = $em->getRepository('AppBundle:Video');
        $query = $repository->createQueryBuilder('w')
        ->leftJoin('w.user', 'c')
        ->where('c.id = :user')
        ->setParameter('user', $user)
        ->addOrderBy('w.created', 'DESC')
        ->addOrderBy('w.id', 'asc')
        ->setFirstResult($nombre*$page)
        ->setMaxResults($nombre)
        ->getQuery();
    
        $videos = $query->getResult();
        return $this->render('AppBundle:Video:api_all.html.php',array("videos"=>$videos));
    }
    public function api_by_queryAction(Request $request,$order,$language,$page,$query,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $nombre=30;
        $em=$this->getDoctrine()->getManager();
        $imagineCacheManager = $this->get('liip_imagine.cache.manager');
        $repository = $em->getRepository('AppBundle:Video');
        if ($language==0) {
            $query_dql = $repository->createQueryBuilder('w')
            ->where("w.enabled = true","LOWER(w.title) like LOWER('%".$query."%') OR LOWER(w.tags) like LOWER('%".$query."%') ")
            ->addOrderBy('w.'.$order, 'DESC')
            ->addOrderBy('w.id', 'asc')
            ->setFirstResult($nombre*$page)
            ->setMaxResults($nombre)
            ->getQuery();
        }else{
            $language = str_replace("_", ",", $language);
            $query_dql = $repository->createQueryBuilder('w')
            ->leftJoin('w.languages', 'l')
            ->where('l.id in ('.$language.')',"LOWER(w.title) like LOWER('%".$query."%') OR LOWER(w.tags) like LOWER('%".$query."%') ")
            ->addOrderBy('w.'.$order, 'DESC')
            ->addOrderBy('w.id', 'asc')
            ->setFirstResult($nombre*$page)
            ->setMaxResults($nombre)
            ->getQuery();
        }
        $videos = $query_dql->getResult();

        return $this->render('AppBundle:Video:api_all.html.php',array("videos"=>$videos));
    }
    public function api_by_randomAction(Request $request,$language,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }

        $nombre=30;
        $em=$this->getDoctrine()->getManager();
        $imagineCacheManager = $this->get('liip_imagine.cache.manager');
        $repository = $em->getRepository('AppBundle:Video');


        if ($language==0) {
            $max = sizeof($repository->createQueryBuilder('g')
                ->where("g.enabled = true")
                ->getQuery()->getResult());

            $query = $repository->createQueryBuilder('g')
            ->where("g.enabled = true","g.id >= :rand")
            ->orderBy('g.created', 'DESC')
            ->setParameter('rand',rand(0,$max))
            ->setMaxResults($nombre)
            ->orderBy('g.downloads', 'DESC')
            ->getQuery();
        }else{
            $max = sizeof($repository->createQueryBuilder('g')
                ->leftJoin('g.languages', 'l')
                ->where('l.id in ('.$language.')',"g.enabled = true")
                
                ->getQuery()->getResult());

            $query = $repository->createQueryBuilder('g')
            ->leftJoin('g.languages', 'l')
            ->where('l.id in ('.$language.')',"g.enabled = true","g.id >= :rand")
            
             ->setParameter('rand',rand(0,$max))
            ->orderBy('g.downloads', 'DESC')
            ->setMaxResults($nombre)
            ->getQuery();
        }
        
        $videos = $query->getResult();
        return $this->render('AppBundle:Video:api_all.html.php',array("videos"=>$videos));
    }

    public function addAction(Request $request)
    {
        $video= new Video();
        $form = $this->createForm(new VideoType(),$video);
        $em=$this->getDoctrine()->getManager();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          if( $video->getFile()!=null and $video->getFilevideo()!=null){
                $media= new Media();
                $media->setFile($video->getFile());
                $media->setEnabled(true);
                $media->upload($this->container->getParameter('files_directory'));
                
                $video->setMedia($media);


                $video_media= new Media();
                $video_media->setFile($video->getFilevideo());
                $video_media->setEnabled(true);
                $video_media->upload($this->container->getParameter('files_directory'));
                
                $video->setVideo($video_media);


                $video->setUser($this->getUser());
                $video->setReview(false);
                $video->setDownloads(0);
                $em->persist($media);
                $em->flush();


                $em->persist($video_media);
                $em->flush();

                $em->persist($video);
                $em->flush();
                $this->addFlash('success', 'Operation has been done successfully');
                return $this->redirect($this->generateUrl('app_video_index'));
          }else{
                $photo_error = new FormError("Required image file");
                $video_error = new FormError("Required video file");
                $form->get('file')->addError($photo_error);
                $form->get('filevideo')->addError($video_error);
          }
        }
        return $this->render("AppBundle:Video:add.html.twig",array("form"=>$form->createView()));
    }
    public function indexAction(Request $request)
    {
        
        $em=$this->getDoctrine()->getManager();
         $q="  ";
        if ($request->query->has("q") and $request->query->get("q")!="") {
           $q.=" AND  w.title like '%".$request->query->get("q")."%'";
        }
  
        $dql        = "SELECT i FROM AppBundle:Video i  WHERE i.review = false ".$q ." ORDER BY i.created desc ";
        $query      = $em->createQuery($dql);
        $paginator  = $this->get('knp_paginator');
        $videos = $paginator->paginate(
        $query,
        $request->query->getInt('page', 1),
            12
        );
        $video_list=$em->getRepository('AppBundle:Video')->findAll();
          $video_count= sizeof($video_list);
          return $this->render('AppBundle:Video:index.html.twig',array("videos"=>$videos,"video_count"=>$video_count)); 
    }
    public function reviewsAction(Request $request)
    {

      $em=$this->getDoctrine()->getManager();
      
        $dql        = "SELECT w FROM AppBundle:Video w  WHERE w.review = true ORDER BY w.created desc ";
        $query      = $em->createQuery($dql);
        $paginator  = $this->get('knp_paginator');
        $videos = $paginator->paginate(
        $query,
        $request->query->getInt('page', 1),
            12
        );
        $video_list=$em->getRepository('AppBundle:Video')->findBy(array("review"=>true));
        $videos_count= sizeof($video_list);
        return $this->render('AppBundle:Video:reviews.html.twig',array("videos"=>$videos,"videos_count"=>$videos_count));    
    }
    public function deleteAction($id,Request $request){
        $em=$this->getDoctrine()->getManager();

        $video = $em->getRepository("AppBundle:Video")->find($id);
        if($video==null){
            throw new NotFoundHttpException("Page not found");
        }

        $form=$this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->add('Yes', 'submit')
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
              $media_old_video = null;
              $media_old_thumb = null;
              if( $video->getVideo()!=null ){
                    $media_old_video=$video->getVideo();
                    echo "video";
              }
              if( $video->getMedia()!=null ){
                    $media_old_thumb=$video->getMedia();
                      echo "image";
              }
              $em->remove($video);
              $em->flush();
              if ($media_old_thumb!=null) {
                     echo "image";
                    $media_old_thumb->delete($this->container->getParameter('files_directory'));
                    $em->remove($media_old_thumb);
                    $em->flush();
              }
              if ($media_old_video!=null) {
                    echo "video";
                    $media_old_video->delete($this->container->getParameter('files_directory'));
                    $em->remove($media_old_video);
                    $em->flush();
              }
            $this->addFlash('success', 'Operation has been done successfully');
           return $this->redirect($this->generateUrl('app_video_index'));
        }
        return $this->render('AppBundle:Video:delete.html.twig',array("form"=>$form->createView()));
    }
    public function editAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->findOneBy(array("id"=>$id,"review"=>false));
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");
        }
        $form = $this->createForm(new VideoType(),$video);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if( $video->getFile()!=null ){
                $media= new Media();
                $media_old=$video->getMedia();
                $media->setFile($video->getFile());
                $media->setEnabled(true);
                $media->upload($this->container->getParameter('files_directory'));
                $em->persist($media);
                $em->flush();
                $video->setMedia($media);
                $em->flush();
                $media_old->delete($this->container->getParameter('files_directory'));
                $em->remove($media_old);
                $em->flush();
            }

            if ($video->getFilevideo() != null) {
                $video_media= new Media();
                $video_media_old=$video->getVideo();
                $video_media->setFile($video->getFilevideo());
                $video_media->setEnabled(true);
                $video_media->upload($this->container->getParameter('files_directory'));
                $em->persist($video_media);
                $em->flush();

                $video->setVideo($video_media);
                $em->flush();

                $video_media_old->delete($this->container->getParameter('files_directory'));
                $em->remove($video_media_old);
                $em->flush();
            }

            $em->persist($video);
            $em->flush();
            $this->addFlash('success', 'Operation has been done successfully');
            return $this->redirect($this->generateUrl('app_video_index'));
        }
        return $this->render("AppBundle:Video:edit.html.twig",array("form"=>$form->createView()));    }
   
     public function viewAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->find($id);
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");
        }
        return $this->render("AppBundle:Video:view.html.twig",array("video"=>$video));
    }

    public function api_add_copiedAction(Request $request,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $id = $request->get("id");        
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->find($id);
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");  
        }
        $video->setDownloads($video->getDownloads()+1);
        $em->flush();
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent=$serializer->serialize($video->getDownloads(), 'json');
        return new Response($jsonContent);
    }
    public function api_add_likeAction(Request $request,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $id = $request->get("id");        
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->find($id);
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");  
        }
        $video->setLike($video->getLike()+1);
        $em->flush();
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent=$serializer->serialize($video->getLike(), 'json');
        return new Response($jsonContent);
    }
    public function api_add_loveAction(Request $request,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $id = $request->get("id");        
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->find($id);
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");  
        }
        $video->setLove($video->getLove()+1);
        $em->flush();
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent=$serializer->serialize($video->getLove(), 'json');
        return new Response($jsonContent);
    }

    public function api_add_angryAction(Request $request,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $id = $request->get("id");        
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->find($id);
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");  
        }
        $video->setAngry($video->getAngry()+1);
        $em->flush();
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent=$serializer->serialize($video->getAngry(), 'json');
        return new Response($jsonContent);
    }
    public function api_add_hahaAction(Request $request,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $id = $request->get("id");        
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->find($id);
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");  
        }
        $video->setHaha($video->getHaha()+1);
        $em->flush();
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent=$serializer->serialize($video->getHaha(), 'json');
        return new Response($jsonContent);
    }

    public function api_add_woowAction(Request $request,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $id = $request->get("id");        
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->find($id);
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");  
        }
        $video->setWoow($video->getWoow()+1);
        $em->flush();
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent=$serializer->serialize($video->getWoow(), 'json');
        return new Response($jsonContent);
    }

    public function api_add_sadAction(Request $request,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $id = $request->get("id");        
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->find($id);
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");  
        }
        $video->setSad($video->getSad()+1);
        $em->flush();
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent=$serializer->serialize($video->getSad(), 'json');
        return new Response($jsonContent);
    }



    public function api_delete_likeAction(Request $request,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $id = $request->get("id");        
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->find($id);
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");  
        }
        $video->setLike($video->getLike()-1);
        $em->flush();
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent=$serializer->serialize($video->getLike(), 'json');
        return new Response($jsonContent);
    }
    public function api_delete_loveAction(Request $request,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $id = $request->get("id");        
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->find($id);
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");  
        }
        $video->setLove($video->getLove()-1);
        $em->flush();
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent=$serializer->serialize($video->getLove(), 'json');
        return new Response($jsonContent);
    }

    public function api_delete_angryAction(Request $request,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $id = $request->get("id");        
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->find($id);
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");  
        }
        $video->setAngry($video->getAngry()-1);
        $em->flush();
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent=$serializer->serialize($video->getAngry(), 'json');
        return new Response($jsonContent);
    }
    public function api_delete_hahaAction(Request $request,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $id = $request->get("id");        
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->find($id);
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");  
        }
        $video->setHaha($video->getHaha()-1);
        $em->flush();
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent=$serializer->serialize($video->getHaha(), 'json');
        return new Response($jsonContent);
    }

    public function api_delete_woowAction(Request $request,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $id = $request->get("id");        
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->find($id);
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");  
        }
        $video->setWoow($video->getWoow()-1);
        $em->flush();
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent=$serializer->serialize($video->getWoow(), 'json');
        return new Response($jsonContent);
    }

    public function api_delete_sadAction(Request $request,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $id = $request->get("id");        
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->find($id);
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");  
        }
        $video->setSad($video->getSad()-1);
        $em->flush();
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent=$serializer->serialize($video->getSad(), 'json');
        return new Response($jsonContent);
    }
    public function api_by_userAction(Request $request,$page,$order,$language,$user,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $nombre=30;
        $em=$this->getDoctrine()->getManager();
        $imagineCacheManager = $this->get('liip_imagine.cache.manager');
        $repository = $em->getRepository('AppBundle:Video');
        if ($language==0) {
            $query = $repository->createQueryBuilder('w')
            ->where('w.user = :user',"w.enabled = true")
            ->setParameter('user', $user)
            ->addOrderBy('w.'.$order, 'DESC')
            ->addOrderBy('w.id', 'asc')
            ->setFirstResult($nombre*$page)
            ->setMaxResults($nombre)
            ->getQuery();
        }else{
            $query = $repository->createQueryBuilder('w')
            ->leftJoin('w.languages', 'l')
            ->where('l.id in ('.$language.')',"w.enabled = true",'w.user = :user')
            
            ->setParameter('user', $user)
            ->addOrderBy('w.'.$order, 'DESC')
            ->addOrderBy('w.id', 'asc')
            ->setFirstResult($nombre*$page)
            ->setMaxResults($nombre)
            ->getQuery();
        }
        $videos = $query->getResult();
        return $this->render('AppBundle:Video:api_all.html.php',array("videos"=>$videos));
    }
    public function api_by_meAction(Request $request,$page,$user,$token){
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $nombre=30;
        $em=$this->getDoctrine()->getManager();
        $imagineCacheManager = $this->get('liip_imagine.cache.manager');
        $repository = $em->getRepository('AppBundle:Video');
            $query = $repository->createQueryBuilder('w')
            ->where('w.user = :user')
            ->setParameter('user', $user)
            ->addOrderBy('w.created', 'DESC')
            ->addOrderBy('w.id', 'asc')
            ->setFirstResult($nombre*$page)
            ->setMaxResults($nombre)
            ->getQuery();
        $videos = $query->getResult();
        return $this->render('AppBundle:Video:api_all.html.php',array("videos"=>$videos));
    }

    public function api_uploadAction(Request $request,$token)
    {

        $id=str_replace('"', '', $request->get("id"));
        $key=str_replace('"', '', $request->get("key"));
        $title=str_replace('"', '', $request->get("title"));
        $code="200";
        $message="Ok";
        $values=array();
        if ($token!=$this->container->getParameter('token_app')) {
            throw new NotFoundHttpException("Page not found");  
        }
        $em=$this->getDoctrine()->getManager();
        $user=$em->getRepository('UserBundle:User')->findOneBy(array("id"=>$id));  
        if ($user==null) {
            throw new NotFoundHttpException("Page not found");
        }
        if (sha1($user->getPassword()) != $key) {
           throw new NotFoundHttpException("Page not found");
        }  
        if ($user) {     

            if ($this->getRequest()->files->has('uploaded_file')) {
                // $old_media=$user->getMedia();
                $file = $this->getRequest()->files->get('uploaded_file');
                $file_thum = $this->getRequest()->files->get('uploaded_file_thum');


                $media= new Media();
                $media->setFile($file);
                $media->upload($this->container->getParameter('files_directory'));
                $em->persist($media);
                $em->flush();

                $media_thum= new Media();
                $media_thum->setFile($file_thum);
                $media_thum->upload($this->container->getParameter('files_directory'));
                $em->persist($media_thum);
                $em->flush();

                $w= new Video();
                $w->setDownloads(0);
                //$w->setCategories($wallpaper->getCategories());
                //$w->setColors($wallpaper->getColors());

                $w->setEnabled(false);
                $w->setReview(true);
                $w->setComment(true);
                $w->setTitle($title);
                $w->setUser($user);
                $w->setVideo($media);
                $w->setMedia($media_thum);
                $em->persist($w);
                $em->flush();
            }
        }
        $error=array(
            "code"=>$code,
            "message"=>$message,
            "values"=>$values
            );
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent=$serializer->serialize($error, 'json');
        return new Response($jsonContent);
    }
    
    public function reviewAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $video=$em->getRepository("AppBundle:Video")->findOneBy(array("id"=>$id,"review"=>true));
        if ($video==null) {
            throw new NotFoundHttpException("Page not found");
        }
        $form = $this->createForm(new VideoReviewType(),$video);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $video->setReview(false);
            $video->setEnabled(true);
            $video->setCreated(new \DateTime());
            $em->persist($video);
            $em->flush();
            $this->addFlash('success', 'Operation has been done successfully');
            return $this->redirect($this->generateUrl('app_home_notif_user_video',array("video_id"=>$video->getId())));
        }
        return $this->render("AppBundle:Video:review.html.twig",array("form"=>$form->createView()));
    }
}
?>