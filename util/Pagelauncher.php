<?php
session_start();
$_SESSION['nav-logo'] = "logo";
class PageLauncher
{
    //==================== initializers / setters =============================//
    private function head($title){
        echo
        "
        <!DOCTYPE html>
        <html lang='en'>
        
        <head>
        
            <!-- META ============================================= -->
            <meta charset='utf-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='keywords' content='' />
            <meta name='author' content='Bentil Shadrack' />
            <meta name='robots' content='' />
            
            <!-- DESCRIPTION -->
            <meta name='description' content='ugLearner : Education ' />
            
            <!-- OG -->
            <meta property='og:title' content='ugLearner : Education ' />
            <meta property='og:description' content='ugLearner : Education ' />
            <meta property='og:image' content='' />
            <meta name='format-detection' content='telephone=0556844331'>
            <!-- MOBILE SPECIFIC ============================================= -->
            <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'/>
            
            <!-- FAVICONS ICON ============================================= -->
            <link rel='icon' href='assets/images/favicon.ico' type='image/x-icon' />
            <link rel='shortcut icon' type='image/x-icon' href='assets/images/favicon.png' />
            
            <!-- PAGE TITLE HERE ============================================= -->
            <title>ugLearner : {$title}  </title>";

            require "stylesheets.php";
            echo "</head><body id=\"bg\">";



            // views
            require "views/views.php";
            require "views/navbar.php";
            require "views/listing.php";
            require "views/course/course.php";
            require "views/school/school.php";
            require "views/community/community.php";
            
        
    }

    public function alert($status,$hyper, $msg)
    {
        echo "
        <div class='alert alert-{$status} alert-dismissible fade show' role='alert'>
            <strong><i class='fa fa-bullhorn'></i> {$hyper}!</strong> {$msg}
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
    }
    private function nav_logo($type)
    {
        echo "
            <div class='menu-logo'>
                <a href='./'><img src='assets/images/{$type}.png' alt='logo'></a>
            </div>
        ";
    }

    public function form($name)
    {
        require "contents/forms/{$name}.php";
    }
    private function banner($name, $bg)
    {
        echo "
            <div class='page-banner ovbl-dark' style='background-image:url(assets/images/banner/{$bg}.jpg);'>
                <div class='container'>
                    <div class='page-banner-entry'>
                        <h1 class='text-white'>{$name}</h1>
                    </div>
                </div>
            </div>
            <!-- Breadcrumb row -->
            <div class='breadcrumb-row'>
                <div class='container'>
                    <ul class='list-inline'>
                        <li><a href='./'>Home</a></li>
                        <li>{$name}</li>
                    </ul>
                </div>
            </div>
        ";
    }

    private function footer()
    {
        require "contents/footer.php";
        require "scripts.php";
    }

    private function navbar($type)
    {
        echo "
        <!-- Header Top ==== -->
        <header class='header rs-nav {$type}'>
        ";
        require "contents/navbar.php";
    }

    private function showcase()
    {
        require "contents/homepage/showcase.php";
    }

    private function sliders()
    {
        require "contents/homepage/sliders.php";
    }

    private function homepage(){
        // sections
        require "contents/homepage/courses.php";
        require "contents/homepage/course-search.php";
        require "contents/homepage/events.php";
        require "contents/homepage/testimonials.php";
        require "contents/homepage/blog.php";
    }


    // ==================GETTERS ================================//
    public function getFooter()
    {
        return $this->footer();
    }
    public function getHead($pageTitle)
    {
        return $this->head($pageTitle);
    }

    public function getNavbar($type = NULL){
        return $this->navbar($type);
    }
    public function getShowcase()
    {
        return $this->showcase();
    }
    public function getSliders()
    {
        return $this->sliders();
    }

    public function homepage_content()
    {
        echo $this->homepage();
    }

    public function get_nav_logo($type = "logo-white"){
        return $this->nav_logo($type);
    }

    public function get_banner($name, $bg = "banner3"){
        return $this->banner($name, $bg);
    }
}