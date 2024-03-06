
<?php

$config = parse_ini_file('config.ini', true);
$environment = $config['ENVIROMENT'];
$URL_BASE = $config[$environment]['URL_ROOT'];
define('APP_ROOT' ,$config[$environment]['APP_ROOT']);
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
            include(APP_ROOT . '/src/views/projects.view.php');
        }
    }
}


$data = [
    "Projects"=> 
    [
        "title"=> "Organization Board",
        "Language" => "C#",
        "link" => "https://github.com/lalousBTW/OrganizationBoard",
        "Img"=> "/media/git.png",
        "Description"=> "Used C# to make an Organization board that has a TODO List and list of what you have done.
                         for each project it creates a CSV file that is how we save the data into two columns as todo and Done.
                         Then each time the app opens and you select the project it reads through the CSV file to show you your
                         todo list and done list.",
    ],
    [
        "title" => "Airfare Data Analysis",
        "Language"=> "SQL",
        "link" => "#",
        "Img"=> "/media/git.png",
        "Description"=> "Used SQL inside a Microsoft Access Database to clean and preprocess data. While applying multi-linear regression for airfare prediction",
    ],
    [
        "title" => "CSV data Manipulation and Extraction",
        "Language" => "Python",
        "link" => "https://github.com/lalousBTW/WebscraperCSVtoMySQL",
        "Img"=> "/media/git.png",
        "Description" => "Used Python to webscrape data from a website and save it to a csv file and then add it to a MySQL database"  
    ],
    [
        "title" => "Autzy",
        "Language" => "React Native, Node.js",
        "link" => "https://github.com/lalousBTW/Autzy",
        "Img"=> "/media/git.png",
        "Description" => "Full stack app, functions as a social media site for autistic people, firebase integration using Node.js"  
    ],
    [
        "title" => "JET",
        "Language" => "GODOT,C#",
        "link" => "https://github.com/lalousBTW/JET",
        "Img"=> "/media/git.png",
        "Description" => "Fun 2D rpg using the GODOT engine and C#, was fun to create this top down rpg"  
    ]
];
$project = new Project_Controller($data);
$project->render();