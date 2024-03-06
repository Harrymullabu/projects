
<?php

$config = parse_ini_file('config.ini', true);
$environment = $config['ENVIROMENT'];
$URL_BASE = $config[$environment]['URL_ROOT'];
define('APP_ROOT' ,$config[$environment]['ABS_ROOT']);
class ProjectModel 
{
    private $_title;
    private $_lang;
    private $_link;
    private $_img = "/media/git.png";
    private $_desc;
    public function __construct($project)
    {
        $this->_title = $project["title"];
        $this->_lang = $project["Language"];
        $this->_link = $project["link"];
        $this->_desc = $project["Description"];
    }
    public function get_title()
    {
        return $this->_title;
    }
    public function get_desc()
    {
        return $this->_desc;
    }
    public function get_img()
    {
        return $this->_img;
    }
    public function get_link()
    {
        return $this->_link;
    }
    public function get_lang()
    {
        return $this->_lang;
    }
}
class Project_Controller
{
    private $_db;

    function __construct($data)
    {
        $this->_db = $data;
    }

    public function render()
    {
        foreach($this->_db as $projectData) 
        {
            $project = new ProjectModel($projectData); // Create a new ProjectModel instance for each project
            include(APP_ROOT . '\src\views\projects.view.php');
        }
    }
}


$data = [
    "Projects"=> 
    [
        "title"=> "SanfordHealth.org",
        "Language" => "C#",
        "link" => "https://github.com/Harrymullabu/sanfordhealth.org",
        "Img"=> "/media/git.png",
        "Description"=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Cras sed felis eget velit aliquet sagittis. Hac habitasse platea dictumst 
        vestibulum rhoncus est pellentesque. ",
    ],
    [
        "title" => "Bemidji State web dev team",
        "link" => "https://github.com/Harrymullabu/Bemidjistatewebteamdev/",
        "Language" => "Html, Php",
        "Img"=> "/media/git.png",
        "Description"=> "Auctor elit sed vulputate mi sit.
        Parturient montes nascetur ridiculus mus mauris vitae. Dolor morbi non arcu
        risus quis varius. Tincidunt tortor aliquam nulla facilisi cras fermentum
        odio eu. Ornare suspendisse sed nisi lacus sed viverra tellus in hac. 
        A erat nam at lectus urna duis. At erat pellentesque adipiscing commodo elit.
        Fames ac turpis egestas maecenas pharetra convallis posuere.",
    ],
    [
        "title" => "SanfordHealth.org",
        "Language" => "Python",
        "link" => "https://github.com/Harrymullabu/sanfordhealth.org",
        "Img"=> "/media/git.png",
        "Description" => "Auctor elit sed vulputate mi sit.
        Parturient montes nascetur ridiculus mus mauris vitae. Dolor morbi non arcu
        risus quis varius. Tincidunt tortor aliquam nulla facilisi cras fermentum
        odio eu. Ornare suspendisse sed nisi lacus sed viverra tellus in hac. 
        A erat nam at lectus urna duis. At erat pellentesque adipiscing commodo elit.
        Fames ac turpis egestas maecenas pharetra convallis posuere."  
    ],
    [
        "title" => "Airtel Communication",
        "link" => "https://github.com/Harrymullabu/airtelcommunication",
        "Language" => "C++",
        "Img"=> "/media/git.png",
        "Description" => "Morbi quis commodo odio aenean sed adipiscing.
         Vitae proin sagittis nisl rhoncus mattis rhoncus urna neque viverra. 
         Senectus et netus et malesuada fames ac. Tellus integer feugiat scelerisque varius morbi.
        Non curabitur gravida arcu ac tortor dignissim convallis aenean. 
        Congue eu consequat ac felis donec et"  
    ],
    ["title" => "BemidjiState GIS SandBox",
    "Language" => "Rust",
    "link" => "https://github.com/Harrymullabu/BemidjistateGissandbox",
    "Img"=> "/media/git.png",
    "Description" =>"Morbi quis commodo odio aenean sed adipiscing.
    Vitae proin sagittis nisl rhoncus mattis rhoncus urna neque viverra. 
    Senectus et netus et malesuada fames ac. Tellus integer feugiat scelerisque varius morbi.
   Non curabitur gravida arcu ac tortor dignissim convallis aenean. 
   Congue eu consequat ac felis donec et"],
];
$project = new Project_Controller($data);
$project->render();
