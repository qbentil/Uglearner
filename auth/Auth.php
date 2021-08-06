<?php
require "./util/Pagelauncher.php";
class Auth extends PageLauncher{

    private function sidebar()
    {
        require "sider.php";
    }

    private function content($name)
    {
        $this->sideBar();
        require "{$name}.php";
    }
    public function getForm($name)
    {
        $this->content($name);
    }

}

?>