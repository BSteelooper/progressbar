<?php
//This is a module for pluck, an opensource content management system
//Website: http://www.pluck-cms.org

//MODULE NAME: Linklist
//LICENSE: MIT

//Make sure the file isn't accessed directly
defined('IN_PLUCK') or exit('Access denied!');

function progressbar_pages_admin() {
	global $lang;

	$module_page_admin[] = array(
		'func'  => 'Main',
		'title' => $lang['progressbar']['main']
	);

	return $module_page_admin;
}

function progressbar_page_admin_Main() {
	global $lang;

    if (!file_exists('data/settings/modules/progressbar')) {
        mkdir('data/settings/modules/progressbar', 0775, true);
    }

    if (!file_exists('data/settings/modules/progressbar/settings.php')) {
        $fp = fopen ('data/settings/modules/progressbar/settings.php',"w");
        fputs ($fp, '<?php'."\n"
            .'$target = 0;'."\n"
            .'$current = 0;'."\n"
            .'');
        fclose ($fp);
    }

    if(isset($_POST['Submit'])) {
    
        //Check if everything has been filled in
        if((!isset($_POST['current'])) || (!isset($_POST['target']))) { ?>
            <span style="color: red;"><?php echo $lang['progressbar']['fillall']; ?></span>
        <?php
            // exit;
        }
        else {
            //Then fetch our posted variables
            $current = $_POST['current'];
            $target = $_POST['target'];

            $fp = fopen ('data/settings/modules/progressbar/settings.php',"w");
            fputs ($fp, '<?php'."\n"
                .'$target = '.$target.';'."\n"
                .'$current = '.$current.';'."\n"
                .'');
            fclose ($fp);
            
        }
    }

    $dir = opendir('data/settings/modules/progressbar');
    include ('data/settings/modules/progressbar/settings.php');
        ?>
        <div>
            <form method="post" action="" style="margin-top: 5px; margin-bottom: 15px;">
	    <?php echo $lang['progressbar']['current']; ?> <br /><input name="current" type="text" value="<?php echo $current; ?>" /><br />
	    <?php echo $lang['progressbar']['target']; ?> <br /><input name="target" type="text" value="<?php echo $target; ?>" /><br />
                 <input type="submit" name="Submit" value="<?php echo $lang['progressbar']['submit']; ?>" />
            </form>
        </div>
        
        <?php
    

    }
?>
