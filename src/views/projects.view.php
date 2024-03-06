<?php
$config = parse_ini_file('config.ini', true);
$environment = $config['ENVIROMENT'];
$URL_BASE = $config[$environment]['URL_ROOT'];
$project = new ProjectModel($projectData);
?>

    <article>

        

        <div>
        <h2><?php echo $project->get_title()?></h2>
        <p><?php echo $project->get_desc()?></p>
        <p><?php echo "Languages: " . $project->get_lang()?></p>
        </div>
        <a href = <?php echo $project->get_link()?>>Github</a>

    </article>
