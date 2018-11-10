<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/api/user')) {
            // api_user_register
            if (0 === strpos($pathinfo, '/api/user/register') && preg_match('#^/api/user/register/(?P<token>[^/]++)/(?P<purchase>[^/]++)/$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_api_user_register;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_register')), array (  '_controller' => 'UserBundle\\Controller\\UserController::api_registerAction',));
            }
            not_api_user_register:

            // api_user_edit
            if (0 === strpos($pathinfo, '/api/user/edit') && preg_match('#^/api/user/edit/(?P<token>[^/]++)/(?P<purchase>[^/]++)/$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_api_user_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_edit')), array (  '_controller' => 'UserBundle\\Controller\\UserController::api_editAction',));
            }
            not_api_user_edit:

            // api_user_token
            if (0 === strpos($pathinfo, '/api/user/token') && preg_match('#^/api/user/token/(?P<token>[^/]++)/(?P<purchase>[^/]++)/$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_api_user_token;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_token')), array (  '_controller' => 'UserBundle\\Controller\\UserController::api_tokenAction',));
            }
            not_api_user_token:

            // api_user_login
            if (0 === strpos($pathinfo, '/api/user/login') && preg_match('#^/api/user/login/(?P<username>[^/]++)/(?P<password>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_user_login;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'api_user_login');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_login')), array (  '_controller' => 'UserBundle\\Controller\\UserController::api_loginAction',));
            }
            not_api_user_login:

        }

        if (0 === strpos($pathinfo, '/users')) {
            // user_user_index
            if ($pathinfo === '/users/index.html') {
                return array (  '_controller' => 'UserBundle\\Controller\\UserController::indexAction',  '_route' => 'user_user_index',);
            }

            // user_user_edit
            if (0 === strpos($pathinfo, '/users/edit') && preg_match('#^/users/edit/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_user_edit')), array (  '_controller' => 'UserBundle\\Controller\\UserController::editAction',));
            }

            if (0 === strpos($pathinfo, '/users/follow')) {
                // user_user_followers
                if (0 === strpos($pathinfo, '/users/followers') && preg_match('#^/users/followers/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_user_followers')), array (  '_controller' => 'UserBundle\\Controller\\UserController::followersAction',));
                }

                // user_user_followings
                if (0 === strpos($pathinfo, '/users/followings') && preg_match('#^/users/followings/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_user_followings')), array (  '_controller' => 'UserBundle\\Controller\\UserController::followingsAction',));
                }

            }

            // user_user_comments
            if (0 === strpos($pathinfo, '/users/comments') && preg_match('#^/users/comments/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_user_comments')), array (  '_controller' => 'UserBundle\\Controller\\UserController::commentsAction',));
            }

            // user_user_ratings
            if (0 === strpos($pathinfo, '/users/ratings') && preg_match('#^/users/ratings/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_user_ratings')), array (  '_controller' => 'UserBundle\\Controller\\UserController::ratingsAction',));
            }

            // user_user_status
            if (0 === strpos($pathinfo, '/users/status') && preg_match('#^/users/status/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_user_status')), array (  '_controller' => 'UserBundle\\Controller\\UserController::statusAction',));
            }

            // user_user_view
            if (0 === strpos($pathinfo, '/users/view') && preg_match('#^/users/view/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_user_view')), array (  '_controller' => 'UserBundle\\Controller\\UserController::viewAction',));
            }

        }

        if (0 === strpos($pathinfo, '/api/user')) {
            // api_user_change_password
            if (0 === strpos($pathinfo, '/api/user/password') && preg_match('#^/api/user/password/(?P<id>[^/]++)/(?P<password>[^/]++)/(?P<new_password>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_user_change_password;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'api_user_change_password');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_change_password')), array (  '_controller' => 'UserBundle\\Controller\\UserController::api_change_passwordAction',));
            }
            not_api_user_change_password:

            // api_user_edit_name
            if (0 === strpos($pathinfo, '/api/user/name') && preg_match('#^/api/user/name/(?P<id>[^/]++)/(?P<name>[^/]++)/(?P<key>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_user_edit_name;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'api_user_edit_name');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_edit_name')), array (  '_controller' => 'UserBundle\\Controller\\UserController::api_edit_nameAction',));
            }
            not_api_user_edit_name:

            // api_user_email
            if (0 === strpos($pathinfo, '/api/user/email') && preg_match('#^/api/user/email/(?P<email>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_user_email;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'api_user_email');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_email')), array (  '_controller' => 'UserBundle\\Controller\\ResettingController::api_emailAction',));
            }
            not_api_user_email:

            if (0 === strpos($pathinfo, '/api/user/re')) {
                // api_user_request
                if (0 === strpos($pathinfo, '/api/user/request') && preg_match('#^/api/user/request/(?P<key>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_user_request;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_user_request');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_request')), array (  '_controller' => 'UserBundle\\Controller\\ResettingController::api_requestAction',));
                }
                not_api_user_request:

                // api_user_reset
                if (0 === strpos($pathinfo, '/api/user/reset') && preg_match('#^/api/user/reset/(?P<id>[^/]++)/(?P<key>[^/]++)/(?P<new_password>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_user_reset;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_user_reset');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_reset')), array (  '_controller' => 'UserBundle\\Controller\\ResettingController::api_resetAction',));
                }
                not_api_user_reset:

            }

            // api_user_check
            if (0 === strpos($pathinfo, '/api/user/check') && preg_match('#^/api/user/check/(?P<id>[^/]++)/(?P<key>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_user_check;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'api_user_check');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_check')), array (  '_controller' => 'UserBundle\\Controller\\UserController::api_checkAction',));
            }
            not_api_user_check:

            // api_user_upload
            if (0 === strpos($pathinfo, '/api/user/upload') && preg_match('#^/api/user/upload/(?P<id>[^/]++)/(?P<key>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'api_user_upload');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_upload')), array (  '_controller' => 'UserBundle\\Controller\\UserController::api_uploadAction',));
            }

            // api_user_get
            if (0 === strpos($pathinfo, '/api/user/get') && preg_match('#^/api/user/get/(?P<user>[^/]++)/(?P<me>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'api_user_get');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_get')), array (  '_controller' => 'UserBundle\\Controller\\UserController::api_getAction',));
            }

            if (0 === strpos($pathinfo, '/api/user/follow')) {
                // api_user_follow
                if (preg_match('#^/api/user/follow/(?P<user>[^/]++)/(?P<follower>[^/]++)/(?P<key_>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_user_follow');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_follow')), array (  '_controller' => 'UserBundle\\Controller\\UserController::api_followAction',));
                }

                // api_user_follow_check
                if (0 === strpos($pathinfo, '/api/user/follow/check') && preg_match('#^/api/user/follow/check/(?P<user>[^/]++)/(?P<follower>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_user_follow_check');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_follow_check')), array (  '_controller' => 'UserBundle\\Controller\\UserController::api_follow_checkAction',));
                }

                // api_user_get_followers
                if (0 === strpos($pathinfo, '/api/user/followers') && preg_match('#^/api/user/followers/(?P<user>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_user_get_followers');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_get_followers')), array (  '_controller' => 'UserBundle\\Controller\\UserController::api_followersAction',));
                }

                // api_user_get_followings
                if (0 === strpos($pathinfo, '/api/user/followings') && preg_match('#^/api/user/followings/(?P<user>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_user_get_followings');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_get_followings')), array (  '_controller' => 'UserBundle\\Controller\\UserController::api_followingsAction',));
                }

            }

        }

        // app_home_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'app_home_index');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\HomeController::indexAction',  '_route' => 'app_home_index',);
        }

        if (0 === strpos($pathinfo, '/notif')) {
            // app_home_notif_video
            if ($pathinfo === '/notif/video.html') {
                return array (  '_controller' => 'AppBundle\\Controller\\HomeController::notifvideoAction',  '_route' => 'app_home_notif_video',);
            }

            if (0 === strpos($pathinfo, '/notif/u')) {
                // app_home_notif_url
                if ($pathinfo === '/notif/url.html') {
                    return array (  '_controller' => 'AppBundle\\Controller\\HomeController::notifUrlAction',  '_route' => 'app_home_notif_url',);
                }

                if (0 === strpos($pathinfo, '/notif/user')) {
                    // app_home_notif_user_video
                    if ($pathinfo === '/notif/user_video.html') {
                        return array (  '_controller' => 'AppBundle\\Controller\\HomeController::notifUservideoAction',  '_route' => 'app_home_notif_user_video',);
                    }

                    // app_home_notif_user
                    if ($pathinfo === '/notif/user.html') {
                        return array (  '_controller' => 'AppBundle\\Controller\\HomeController::notifUserAction',  '_route' => 'app_home_notif_user',);
                    }

                }

            }

            // app_home_notif_category
            if ($pathinfo === '/notif/category.html') {
                return array (  '_controller' => 'AppBundle\\Controller\\HomeController::notifCategoryAction',  '_route' => 'app_home_notif_category',);
            }

        }

        // api_home_api_device
        if (0 === strpos($pathinfo, '/api/device') && preg_match('#^/api/device/(?P<tkn>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'api_home_api_device');
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_home_api_device')), array (  '_controller' => 'AppBundle\\Controller\\HomeController::api_deviceAction',));
        }

        if (0 === strpos($pathinfo, '/support')) {
            // app_support_index
            if ($pathinfo === '/support/index.html') {
                return array (  '_controller' => 'AppBundle\\Controller\\SupportController::indexAction',  '_route' => 'app_support_index',);
            }

            // app_support_view
            if (0 === strpos($pathinfo, '/support/view') && preg_match('#^/support/view/(?P<id>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_support_view')), array (  '_controller' => 'AppBundle\\Controller\\SupportController::viewAction',));
            }

            // app_support_delete
            if (0 === strpos($pathinfo, '/support/delete') && preg_match('#^/support/delete/(?P<id>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_support_delete')), array (  '_controller' => 'AppBundle\\Controller\\SupportController::deleteAction',));
            }

        }

        // api_support_add
        if (0 === strpos($pathinfo, '/api/support/add') && preg_match('#^/api/support/add/(?P<token>[^/]++)/(?P<purchase>[^/]++)/$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_api_support_add;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_support_add')), array (  '_controller' => 'AppBundle\\Controller\\SupportController::api_addAction',));
        }
        not_api_support_add:

        if (0 === strpos($pathinfo, '/category/video')) {
            // app_category_index
            if ($pathinfo === '/category/video/index.html') {
                return array (  '_controller' => 'AppBundle\\Controller\\CategoryController::indexAction',  '_route' => 'app_category_index',);
            }

            // app_category_add
            if ($pathinfo === '/category/video/add.html') {
                return array (  '_controller' => 'AppBundle\\Controller\\CategoryController::addAction',  '_route' => 'app_category_add',);
            }

            // app_category_edit
            if (0 === strpos($pathinfo, '/category/video/edit') && preg_match('#^/category/video/edit/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_category_edit')), array (  '_controller' => 'AppBundle\\Controller\\CategoryController::editAction',));
            }

            // app_category_delete
            if (0 === strpos($pathinfo, '/category/video/delete') && preg_match('#^/category/video/delete/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_category_delete')), array (  '_controller' => 'AppBundle\\Controller\\CategoryController::deleteAction',));
            }

            // app_category_up
            if (0 === strpos($pathinfo, '/category/video/up') && preg_match('#^/category/video/up/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_category_up')), array (  '_controller' => 'AppBundle\\Controller\\CategoryController::upAction',));
            }

            // app_category_down
            if (0 === strpos($pathinfo, '/category/video/down') && preg_match('#^/category/video/down/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_category_down')), array (  '_controller' => 'AppBundle\\Controller\\CategoryController::downAction',));
            }

        }

        // api_category_all
        if (0 === strpos($pathinfo, '/api/category/video/all') && preg_match('#^/api/category/video/all/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'api_category_all');
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_category_all')), array (  '_controller' => 'AppBundle\\Controller\\CategoryController::api_allAction',));
        }

        if (0 === strpos($pathinfo, '/version')) {
            // app_version_add
            if ($pathinfo === '/version/add.html') {
                return array (  '_controller' => 'AppBundle\\Controller\\VersionController::addAction',  '_route' => 'app_version_add',);
            }

            // app_version_index
            if ($pathinfo === '/version/index.html') {
                return array (  '_controller' => 'AppBundle\\Controller\\VersionController::indexAction',  '_route' => 'app_version_index',);
            }

            // app_version_edit
            if (0 === strpos($pathinfo, '/version/edit') && preg_match('#^/version/edit/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_version_edit')), array (  '_controller' => 'AppBundle\\Controller\\VersionController::editAction',));
            }

            // app_version_delete
            if (0 === strpos($pathinfo, '/version/delete') && preg_match('#^/version/delete/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_version_delete')), array (  '_controller' => 'AppBundle\\Controller\\VersionController::deleteAction',));
            }

        }

        // api_version_check
        if (0 === strpos($pathinfo, '/api/version/check') && preg_match('#^/api/version/check/(?P<code>\\d+)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'api_version_check');
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_version_check')), array (  '_controller' => 'AppBundle\\Controller\\VersionController::api_checkAction',));
        }

        if (0 === strpos($pathinfo, '/video')) {
            // app_video_add
            if ($pathinfo === '/video/add.html') {
                return array (  '_controller' => 'AppBundle\\Controller\\VideoController::addAction',  '_route' => 'app_video_add',);
            }

            // app_video_index
            if ($pathinfo === '/video/index.html') {
                return array (  '_controller' => 'AppBundle\\Controller\\VideoController::indexAction',  '_route' => 'app_video_index',);
            }

            if (0 === strpos($pathinfo, '/video/review')) {
                // app_video_reviews
                if ($pathinfo === '/video/reviews.html') {
                    return array (  '_controller' => 'AppBundle\\Controller\\VideoController::reviewsAction',  '_route' => 'app_video_reviews',);
                }

                // app_video_review
                if (preg_match('#^/video/review/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_video_review')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::reviewAction',));
                }

            }

            // app_video_edit
            if (preg_match('#^/video/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_video_edit')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::editAction',));
            }

            // app_video_view
            if (0 === strpos($pathinfo, '/video/view') && preg_match('#^/video/view/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_video_view')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::viewAction',));
            }

            // app_video_delete
            if (0 === strpos($pathinfo, '/video/delete') && preg_match('#^/video/delete/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_video_delete')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::deleteAction',));
            }

        }

        if (0 === strpos($pathinfo, '/api/video')) {
            // api_video_all
            if (0 === strpos($pathinfo, '/api/video/all') && preg_match('#^/api/video/all/(?P<page>\\d+)/(?P<order>[^/]++)/(?P<language>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'api_video_all');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_all')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_allAction',));
            }

            // api_video_my
            if (0 === strpos($pathinfo, '/api/video/my') && preg_match('#^/api/video/my/(?P<page>\\d+)/(?P<user>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'api_video_my');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_my')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_myAction',));
            }

            if (0 === strpos($pathinfo, '/api/video/by')) {
                // api_video_by_category
                if (0 === strpos($pathinfo, '/api/video/by/category') && preg_match('#^/api/video/by/category/(?P<page>\\d+)/(?P<order>[^/]++)/(?P<language>[^/]++)/(?P<category>\\d+)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_video_by_category');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_by_category')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_by_categoryAction',));
                }

                // api_video_by_query
                if (0 === strpos($pathinfo, '/api/video/by/query') && preg_match('#^/api/video/by/query/(?P<order>[^/]++)/(?P<language>[^/]++)/(?P<page>[^/]++)/(?P<query>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_video_by_query');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_by_query')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_by_queryAction',));
                }

                // api_video_by_random
                if (0 === strpos($pathinfo, '/api/video/by/random') && preg_match('#^/api/video/by/random/(?P<language>[^/]++)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_video_by_random');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_by_random')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_by_randomAction',));
                }

            }

            // api_video_add_copied
            if (0 === strpos($pathinfo, '/api/video/add/copied') && preg_match('#^/api/video/add/copied/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'api_video_add_copied');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_add_copied')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_add_copiedAction',));
            }

            // api_video_upload
            if (0 === strpos($pathinfo, '/api/video/upload') && preg_match('#^/api/video/upload/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'api_video_upload');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_upload')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_uploadAction',));
            }

            if (0 === strpos($pathinfo, '/api/video/by')) {
                // api_video_by_user
                if (0 === strpos($pathinfo, '/api/video/by/user') && preg_match('#^/api/video/by/user/(?P<page>\\d+)/(?P<order>[^/]++)/(?P<language>[^/]++)/(?P<user>\\d+)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_video_by_user');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_by_user')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_by_userAction',));
                }

                // api_video_by_me
                if (0 === strpos($pathinfo, '/api/video/by/me') && preg_match('#^/api/video/by/me/(?P<page>[^/]++)/(?P<user>\\d+)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_video_by_me');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_by_me')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_by_meAction',));
                }

                // api_video_by_follow
                if (0 === strpos($pathinfo, '/api/video/by/follow') && preg_match('#^/api/video/by/follow/(?P<page>\\d+)/(?P<language>[^/]++)/(?P<user>\\d+)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_video_by_follow');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_by_follow')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_by_followAction',));
                }

            }

            if (0 === strpos($pathinfo, '/api/video/add')) {
                if (0 === strpos($pathinfo, '/api/video/add/l')) {
                    // api_video_add_like
                    if (0 === strpos($pathinfo, '/api/video/add/like') && preg_match('#^/api/video/add/like/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'api_video_add_like');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_add_like')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_add_likeAction',));
                    }

                    // api_video_add_love
                    if (0 === strpos($pathinfo, '/api/video/add/love') && preg_match('#^/api/video/add/love/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'api_video_add_love');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_add_love')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_add_loveAction',));
                    }

                }

                // api_video_add_angry
                if (0 === strpos($pathinfo, '/api/video/add/angry') && preg_match('#^/api/video/add/angry/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_video_add_angry');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_add_angry')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_add_angryAction',));
                }

                // api_video_add_sad
                if (0 === strpos($pathinfo, '/api/video/add/sad') && preg_match('#^/api/video/add/sad/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_video_add_sad');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_add_sad')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_add_sadAction',));
                }

                // api_video_add_haha
                if (0 === strpos($pathinfo, '/api/video/add/haha') && preg_match('#^/api/video/add/haha/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_video_add_haha');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_add_haha')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_add_hahaAction',));
                }

                // api_video_add_woow
                if (0 === strpos($pathinfo, '/api/video/add/woow') && preg_match('#^/api/video/add/woow/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_video_add_woow');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_add_woow')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_add_woowAction',));
                }

            }

            if (0 === strpos($pathinfo, '/api/video/delete')) {
                if (0 === strpos($pathinfo, '/api/video/delete/l')) {
                    // api_video_delete_like
                    if (0 === strpos($pathinfo, '/api/video/delete/like') && preg_match('#^/api/video/delete/like/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'api_video_delete_like');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_delete_like')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_delete_likeAction',));
                    }

                    // api_video_delete_love
                    if (0 === strpos($pathinfo, '/api/video/delete/love') && preg_match('#^/api/video/delete/love/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'api_video_delete_love');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_delete_love')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_delete_loveAction',));
                    }

                }

                // api_video_delete_angry
                if (0 === strpos($pathinfo, '/api/video/delete/angry') && preg_match('#^/api/video/delete/angry/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_video_delete_angry');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_delete_angry')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_delete_angryAction',));
                }

                // api_video_delete_sad
                if (0 === strpos($pathinfo, '/api/video/delete/sad') && preg_match('#^/api/video/delete/sad/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_video_delete_sad');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_delete_sad')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_delete_sadAction',));
                }

                // api_video_delete_haha
                if (0 === strpos($pathinfo, '/api/video/delete/haha') && preg_match('#^/api/video/delete/haha/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_video_delete_haha');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_delete_haha')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_delete_hahaAction',));
                }

                // api_video_delete_woow
                if (0 === strpos($pathinfo, '/api/video/delete/woow') && preg_match('#^/api/video/delete/woow/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_video_delete_woow');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_video_delete_woow')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::api_delete_woowAction',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/language')) {
            // app_language_add
            if ($pathinfo === '/language/add.html') {
                return array (  '_controller' => 'AppBundle\\Controller\\LanguageController::addAction',  '_route' => 'app_language_add',);
            }

            // app_language_index
            if ($pathinfo === '/language/index.html') {
                return array (  '_controller' => 'AppBundle\\Controller\\LanguageController::indexAction',  '_route' => 'app_language_index',);
            }

            // app_language_edit
            if (0 === strpos($pathinfo, '/language/edit') && preg_match('#^/language/edit/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_language_edit')), array (  '_controller' => 'AppBundle\\Controller\\LanguageController::editAction',));
            }

            // app_language_delete
            if (0 === strpos($pathinfo, '/language/delete') && preg_match('#^/language/delete/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_language_delete')), array (  '_controller' => 'AppBundle\\Controller\\LanguageController::deleteAction',));
            }

            // app_language_up
            if (0 === strpos($pathinfo, '/language/up') && preg_match('#^/language/up/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_language_up')), array (  '_controller' => 'AppBundle\\Controller\\LanguageController::upAction',));
            }

            // app_language_down
            if (0 === strpos($pathinfo, '/language/down') && preg_match('#^/language/down/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_language_down')), array (  '_controller' => 'AppBundle\\Controller\\LanguageController::downAction',));
            }

        }

        // api_language_all
        if (0 === strpos($pathinfo, '/api/language/all') && preg_match('#^/api/language/all/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'api_language_all');
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_language_all')), array (  '_controller' => 'AppBundle\\Controller\\LanguageController::api_allAction',));
        }

        if (0 === strpos($pathinfo, '/comment')) {
            // app_comment_delete
            if (0 === strpos($pathinfo, '/comment/delete') && preg_match('#^/comment/delete/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_comment_delete')), array (  '_controller' => 'AppBundle\\Controller\\CommentController::deleteAction',));
            }

            // app_comment_hide
            if (0 === strpos($pathinfo, '/comment/hide') && preg_match('#^/comment/hide/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_comment_hide')), array (  '_controller' => 'AppBundle\\Controller\\CommentController::hideAction',));
            }

            // app_comment_index
            if ($pathinfo === '/comment/index.html') {
                return array (  '_controller' => 'AppBundle\\Controller\\CommentController::indexAction',  '_route' => 'app_comment_index',);
            }

        }

        if (0 === strpos($pathinfo, '/api/comment')) {
            // api_comment_add
            if (0 === strpos($pathinfo, '/api/comment/add') && preg_match('#^/api/comment/add/(?P<token>[^/]++)/(?P<purchase>[^/]++)/$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_api_comment_add;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_comment_add')), array (  '_controller' => 'AppBundle\\Controller\\CommentController::api_addAction',));
            }
            not_api_comment_add:

            // api_comment_list
            if (0 === strpos($pathinfo, '/api/comment/list') && preg_match('#^/api/comment/list/(?P<id>\\d+)/(?P<token>[^/]++)/(?P<purchase>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'api_comment_list');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_comment_list')), array (  '_controller' => 'AppBundle\\Controller\\CommentController::api_listAction',));
            }

        }

        if (0 === strpos($pathinfo, '/medias')) {
            // media_index
            if (rtrim($pathinfo, '/') === '/medias') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'media_index');
                }

                return array (  '_controller' => 'MediaBundle\\Controller\\MediaController::indexAction',  '_route' => 'media_index',);
            }

            // media_add
            if ($pathinfo === '/medias/add') {
                return array (  '_controller' => 'MediaBundle\\Controller\\MediaController::addAction',  '_route' => 'media_add',);
            }

            // media_delete
            if (0 === strpos($pathinfo, '/medias/delete') && preg_match('#^/medias/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'media_delete')), array (  '_controller' => 'MediaBundle\\Controller\\MediaController::deleteAction',));
            }

        }

        if (0 === strpos($pathinfo, '/api/medias')) {
            // api_media_delete
            if (0 === strpos($pathinfo, '/api/medias/delete') && preg_match('#^/api/medias/delete/(?P<id>[^/]++)/(?P<token>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'api_media_delete');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_media_delete')), array (  '_controller' => 'MediaBundle\\Controller\\MediaController::api_deleteAction',));
            }

            // media_api_upload
            if (0 === strpos($pathinfo, '/api/medias/upload') && preg_match('#^/api/medias/upload/(?P<token>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'media_api_upload');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'media_api_upload')), array (  '_controller' => 'MediaBundle\\Controller\\MediaController::api_uploadAction',));
            }

        }

        if (0 === strpos($pathinfo, '/media/cache/resolve')) {
            // liip_imagine_filter_runtime
            if (preg_match('#^/media/cache/resolve/(?P<filter>[A-z0-9_\\-]*)/rc/(?P<hash>[^/]++)/(?P<path>.+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_liip_imagine_filter_runtime;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'liip_imagine_filter_runtime')), array (  '_controller' => 'liip_imagine.controller:filterRuntimeAction',));
            }
            not_liip_imagine_filter_runtime:

            // liip_imagine_filter
            if (preg_match('#^/media/cache/resolve/(?P<filter>[A-z0-9_\\-]*)/(?P<path>.+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_liip_imagine_filter;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'liip_imagine_filter')), array (  '_controller' => 'liip_imagine.controller:filterAction',));
            }
            not_liip_imagine_filter:

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_security_login;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }
                not_fos_user_security_login:

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_security_logout;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }
            not_fos_user_security_logout:

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        if (0 === strpos($pathinfo, '/resetting')) {
            // fos_user_resetting_request
            if ($pathinfo === '/resetting/request') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_request;
                }

                return array (  '_controller' => 'UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
            }
            not_fos_user_resetting_request:

            // fos_user_resetting_send_email
            if ($pathinfo === '/resetting/send-email') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_fos_user_resetting_send_email;
                }

                return array (  '_controller' => 'UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
            }
            not_fos_user_resetting_send_email:

            // fos_user_resetting_check_email
            if ($pathinfo === '/resetting/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_check_email;
                }

                return array (  '_controller' => 'UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
            }
            not_fos_user_resetting_check_email:

            // fos_user_resetting_reset
            if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_resetting_reset;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'UserBundle\\Controller\\ResettingController::resetAction',));
            }
            not_fos_user_resetting_reset:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
