<?php

class PageLauncher
{
    function __construct()
    {
        // core imports
        require "./core/administrators.php";
        require "./core/roles.php";
        require "./core/events.php";

        // role imports
        require "./views/contacts.php";
        require "./views/roles.php";
        require "./views/administrators.php";
        require "./views/events.php";
        require "./views/courses.php";
        require "./views/community.php";
        require "./views/portfolio.php";
        require "./views/faculties.php";


        // redirect to login
        $admin = new Administrator("../");
        if(!$admin->is_loggedin())
        {
            $admin->redirect("../login.php");
        }

        if(isset($_GET['logout']) && $_GET['logout']){
            $admin->logout();
            $admin->redirect("../login.php");
        }
    }

    // ==================== initializers / setters =============================
    public function user()
    {
        $id = $_SESSION['user_session'];
        $admin = new Administrator("../");
        return $admin->singlerecord($id);
    }
    private function head($title){
        require "stylesheets.php";
        echo
        '<title>ugLearner : '.$title.'  </title>
        </head>
        ';
    }
    private function topNav()
    {
        require "./includes/topnav.php";
    }
    private function sideBar()
    {
        require "./includes/sidenav.php";

    }
    private function pageNav($title, $action)
    {
        return '
        <!--Main container start -->
        <main class="ttr-wrapper">
            <div class="container-fluid">
                <div class="db-breadcrumb">
                    <h4 class="breadcrumb-title">Dashboard</h4>
                    <ul class="db-breadcrumb-list">
                        <li><a href="#"><i class="ti-desktop"></i>'.$title.'</a></li>
                        <li><i class="ti-help-alt"></i>'.$action.'</li>
                    </ul>
                </div>	
        ';
    }
    private function footer()
    {
        require_once "modals/modals.php";
        require "scripts.php";
    }



    // ================== GETTERS ================================//
    public function getFooter()
    {
        return $this->footer();
    }

    public function launchPage($pageTitle, $miniTitle, $miniAction)
    {
        return 
        $this->head($pageTitle)
        .$this->topNav()
        .$this->sideBar()
        .$this->pageNav($miniTitle, $miniAction);
    }
}