<?php
//This is a module for pluck, an opensource content management system
//Website: http://www.pluck-cms.org

//Make sure the file isn't accessed directly.
defined('IN_PLUCK') or exit('Access denied!');

//Include language-items

function progressbar_pages_site() {
	global $lang;

	$module_page_admin[] = array(
		'func'  => 'Main',
		'title' => $lang['progressbar']['main']
	);

	return $module_page_admin;
}

function progressbar_theme_Main() {
	global $lang;

    include ('data/settings/modules/progressbar/settings.php');

    $current = 452.99;
    $target = 4250;
    $progress = ($current/$target)*100;

    ?>
    <script language="javascript" type="text/javascript">
    //current progress
    var currProgress = <?php echo $progress;?>;
    //is the task complete
    var done = false;
    //total progress amount
    var total = 100;

    //function to update progress
    function startProgress() {
    //get the progress element
    var prBar = document.getElementById("prog");
    //get the start button
    var startButt = document.getElementById("startBtn");
    //get the textual element
    var val = document.getElementById("numValue");
    //disable the button while the task is unfolding
    startButt.disabled=true;
    //update the progress level
    prBar.value = currProgress;
    //update the textual indicator
    val.innerHTML = Math.round((currProgress/total)*100)+"%";
    }
    </script>
    <p><progress id="prog" value="0" max="100" style="width:80%"></progress> </p><div id="numValue">0%</div> <br/> <input id="startBtn" type="button" value="Toon voortgang" onclick="startProgress()"/></p>
    <script language="javascript" type="text/javascript">
    //startProgress();
    </script>

	<?php 
}


?>
