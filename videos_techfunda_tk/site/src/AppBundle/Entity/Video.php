<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MediaBundle\Entity\Media;
use UserBundle\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Video
 *
 * @ORM\Table(name="video_table")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VideoRepository")
 */
class Video
{
   /** 
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     * )
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;


    /**
     * @var int
     *
     * @ORM\Column(name="downloads", type="integer")
     */
    private $downloads;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

     /**
     * @ORM\ManyToOne(targetEntity="MediaBundle\Entity\Media")
     * @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $media;

     /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;
    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

        /**
     * @var bool
     *
     * @ORM\Column(name="review", type="boolean")
     */
    private $review;

        /**
     * @ORM\ManyToMany(targetEntity="Category")
     * @ORM\JoinTable(name="videos_categories",
     *      joinColumns={@ORM\JoinColumn(name="wallpaper_id", referencedColumnName="id",onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id",onDelete="CASCADE")},
     *      )
     */
    private $categories;


        /**
     * @ORM\ManyToMany(targetEntity="Language")
     * @ORM\JoinTable(name="videos_languages",
     *      joinColumns={@ORM\JoinColumn(name="wallpaper_id", referencedColumnName="id",onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="language_id", referencedColumnName="id",onDelete="CASCADE")},
     *      )
     */
    private $languages;

    /**
     * @Assert\File(mimeTypes={"image/jpeg","image/png" },maxSize="40M")
     */
    private $file;

    /**
     * @Assert\File(mimeTypes={"video/mp4" },maxSize="20M")
     */
    private $filevideo;

    /**
    * @ORM\OneToMany(targetEntity="Comment", mappedBy="video",cascade={"persist", "remove"})
    * @ORM\OrderBy({"created" = "desc"})
    */
    private $comments;


    /**
     * @var bool
     *
     * @ORM\Column(name="comment", type="boolean")
     */
    private $comment;


    /**
     * @var string
     * @ORM\Column(name="tags", type="string", length=255,nullable=true)
     */
    private $tags;

    /**
     * @var int
     *
     * @ORM\Column(name="angry", type="integer")
     */
    private $angry;

    /**
     * @var int
     *
     * @ORM\Column(name="haha", type="integer")
     */
    private $haha;

        /**
     * @var int
     *
     * @ORM\Column(name="likes", type="integer")
     */
    private $like;


        /**
     * @var int
     *
     * @ORM\Column(name="love", type="integer")
     */
    private $love;
        /**
     * @var int
     *
     * @ORM\Column(name="sad", type="integer")
     */
    private $sad;

        /**
     * @var int
     *
     * @ORM\Column(name="woow", type="integer")
     */
    private $woow;

     /**
     * @ORM\ManyToOne(targetEntity="MediaBundle\Entity\Media")
     * @ORM\JoinColumn(name="video_id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $video;


    public function __construct()
    {
        $this->font = 1 ;
        $this->like = 0 ;
        $this->love = 0 ;
        $this->angry = 0 ;
        $this->sad = 0 ;
        $this->woow = 0 ;
        $this->haha = 0 ;
        $this->categories = new ArrayCollection();
        $this->languages = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->created= new \DateTime();
        $this->review = false;
    }

   
   /**
    * Get id
    * @return  
    */
    public function getId()
    {
        return $this->id;
    }
    
    /**
    * Set id
    * @return $this
    */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Wallpaper
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set downloads
     *
     * @param integer $downloads
     * @return Wallpaper
     */
    public function setDownloads($downloads)
    {
        $this->downloads = $downloads;

        return $this;
    }

    /**
     * Get downloads
     *
     * @return integer 
     */
    public function getDownloads()
    {
        return $this->downloads;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Wallpaper
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

   
    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Album
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
   
    /**
     * Set user
     *
     * @param string $user
     * @return Wallpaper
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * Set media
     *
     * @param string $media
     * @return Wallpaper
     */
    public function setMedia(Media $media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return string 
     */
    public function getMedia()
    {
        return $this->media;
    }

   
          /**
     * Add categories
     *
     * @param Wallpaper $categories
     * @return Categorie
     */
    public function addCategory(Category $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param Category $categories
     */
    public function removeCategory(Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
        /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function setCategories($categories)
    {
        return $this->categories =  $categories;
    }






     /**
     * Add colors
     *
     * @param Wallpaper $languages
     * @return Wallpaper
     */
    public function addLanguage(Language $language)
    {
        $this->languages[] = $language;

        return $this;
    }

    /**
     * Remove languages
     *
     * @param language $languages
     */
    public function removeLanguage(Language $language)
    {
        $this->languages->removeElement($language);
    }

    /**
     * Get languages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLanguages()
    {
        return $this->languages;
    }
        /**
     * Get colors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function setLanguages($languages)
    {
        return $this->languages =  $languages;
    }
   
    public function getFile()
    {
        return $this->file;
    }
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }
     /**
    * Get filevideo
    * @return  
    */
    public function getFilevideo()
    {
        return $this->filevideo;
    }
    
    /**
    * Set filevideo
    * @return $this
    */
    public function setFilevideo($filevideo)
    {
        $this->filevideo = $filevideo;
        return $this;
    }
    /**
    * Get review
    * @return  
    */
    public function getReview()
    {
        return $this->review;
    }
    
    /**
    * Set review
    * @return $this
    */
    public function setReview($review)
    {
        $this->review = $review;
        return $this;
    }
    public function __toString()
    {
        return $this->id." - ".$this->title;
    }
        /**
    * Get comment
    * @return  
    */
    public function getComment()
    {
        return $this->comment;
    }
    
    /**
    * Set comment
    * @return $this
    */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

       /**
     * Add comments
     *
     * @param Wallpaper $comments
     * @return Categorie
     */
    public function addComment(Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param Comment $comments
     */
    public function removeComment(Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
    /**
    * Get tags
    * @return  
    */
    public function getTags()
    {
        return $this->tags;
    }
    
    /**
    * Set tags
    * @return $this
    */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }
    /**
    * Get like
    * @return  
    */
    public function getLike()
    {
        return $this->like;
    }
    
    /**
    * Set like
    * @return $this
    */
    public function setLike($like)
    {
        $this->like = $like;
        return $this;
    }
    /**
    * Get love
    * @return  
    */
    public function getLove()
    {
        return $this->love;
    }
    
    /**
    * Set love
    * @return $this
    */
    public function setLove($love)
    {
        $this->love = $love;
        return $this;
    }
    /**
    * Get angry
    * @return  
    */
    public function getAngry()
    {
        return $this->angry;
    }
    
    /**
    * Set angry
    * @return $this
    */
    public function setAngry($angry)
    {
        $this->angry = $angry;
        return $this;
    }
    /**
    * Get woow
    * @return  
    */
    public function getWoow()
    {
        return $this->woow;
    }
    
    /**
    * Set woow
    * @return $this
    */
    public function setWoow($woow)
    {
        $this->woow = $woow;
        return $this;
    }
    /**
    * Get haha
    * @return  
    */
    public function getHaha()
    {
        return $this->haha;
    }
    
    /**
    * Set haha
    * @return $this
    */
    public function setHaha($haha)
    {
        $this->haha = $haha;
        return $this;
    }
    /**
    * Get sad
    * @return  
    */
    public function getSad()
    {
        return $this->sad;
    }
    
    /**
    * Set sad
    * @return $this
    */
    public function setSad($sad)
    {
        $this->sad = $sad;
        return $this;
    }
    /**
    * Get video
    * @return  
    */
    public function getVideo()
    {
        return $this->video;
    }
    
    /**
    * Set video
    * @return $this
    */
    public function setVideo(Media $video)
    {
        $this->video = $video;
        return $this;
    }

}
