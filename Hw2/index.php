<?php


$activity = (isset($_REQUEST['a']) && in_array($_REQUEST['a'], ["edit", "read", "confirm"])) ? $_REQUEST['a'] . "Controller" : "mainController";
$activity();
//print_r($_REQUEST);

function generateDir()
{
    $folder = "./files";
    if(!file_exists($folder)) {
        mkdir($folder, 0777);
    }
}

function editController()
{
    generateDir();

    if (!empty($_POST)) {
        if ($_POST['action'] == 'Save') {
            $file = './files/'.$_POST['fname'].'.txt';
            if (file_exists($file)) {
                $current = file_get_contents($file);
            } else {
                $current = "";
            }
            $current .= " ".$_POST['textdata'];
            echo $current;
            file_put_contents($file, $current);
        }
        header('Location: '.$_SERVER['PHP_SELF']);
    }
    $fname=$_REQUEST['fname'];
    htmlLayout($fname, "editView");
}

function readController()
{
    $layout = (isset($_REQUEST['f']) && in_array($_REQUEST['f'], [
    "html"])) ? $_REQUEST['f'] . "Layout" : "htmlLayout";
    $layout($data, "readView");
}

function confirmController()
{
    $fname=$_REQUEST['fname'];
    $layout($fname, "confirmView");
}
/**
 * Used to process perform activities realated to the blog landing page
 */
function mainController()
{
    $dir = "./files";
    $data = scandir($dir);

    // maybe in the future could modify so also support RSS out
    $layout = (isset($_REQUEST['f']) && in_array($_REQUEST['f'], [
    "html"])) ? $_REQUEST['f'] . "Layout" : "htmlLayout";
    $layout($data, "landingView");
}

/*
 * Used to set up and then display the view corresponding to a single blog
 * post.
 */
/*
function entryController()
{
    $data["TITLE"] = (isset($_REQUEST['title'])) ? 
        filter_var($_REQUEST['title'], FILTER_SANITIZE_STRING) : "";
    $entries = getBlogEntries();
    if (!isset($entries[$data["TITLE"]])) {
        mainController();
        return;
    }
    $data["POST"] = $entries[$data["TITLE"]];
    $layout = (isset($_REQUEST['f']) && in_array($_REQUEST['f'], [
    "html"])) ? $_REQUEST['f'] . "Layout" : "htmlLayout";
    $layout($data, "entryView");
} */
/**
 * Used to output the top and bottom boilerplate of a Web page. Within
 * the body of the document the passed $view is draw
 *
 * @param array $data an associative array of field variables which might
 *  be echo'd by either this layout in the title, or by the view that is
 *  draw in the body
 * @param string $view name of view function to call to draw body of web page
 */
function htmlLayout($data, $view)
{
    $fileName = ""
    ?>
    <h1><a href="<?php $_PHP_SELF ?>">Simple Text Editor</a></h1>
    <?php
    $view($data);
}
/**
 * Used to draw the main landing page with blog form on it as well as previous
 * blog posts
 *
 * @param array $data an associative array of field variables which might
 *  be echo'd by this function. In this case, we will use $data["BLOG_ENTRIES"]
 *  to output old blog entries
 */
function landingView($data)
{
    ?>
    <form action="<?php $_PHP_SELF ?>" method="get">
    <input name="a" type="hidden" value="edit">
    <input name="fname" placeholder="Text File Name" type="text"/>
    <input type="submit" value="Create">
    </form>
    <h2>My Files</h2>
    
    <table>
        <tr>
            <th>FileName</th>
            <th>Actions</th>
        </tr>
        <?php
            foreach ($data as $key => $value) {
                if (!in_array($value,array(".",".."))) {
        ?>
                    <tr>
                        <td>              
                            <p> <?php echo $value ?></p>
                        </td>
                        <td>
                            <form action="" method="get">
                            <input name="a" type="hidden" value="edit">
                            <input name="fname" type="hidden" value="<?php echo $value;?>"/>
                            <input type="submit" value="Edit">
                            </form>
                        </td>
                        <td>
                            <form action="" method="get">
                            <input name="a" type="hidden" value="confirm">
                            <input name="fname" type="hidden" value="<?php echo $value;?>"/>
                            <input type="submit" value="Delete"></td>
                            </form>
                    </tr>
                <?php
                }
            }
                ?>
    </table>
    <?php
}


function editView($fileName)
{
    ?>
    <h2>Edit: <?php echo $fileName ?></h2>
    <form action="<?php $_PHP_SELF ?>" method="post">
        <input name="a" type="hidden" value="edit"/>
        <input name="fname" type="hidden" value="<?php echo $fileName;?>"/>
    <table>
        <tr>
            <input type="submit" name="action" value="Save"/>
            <input type="submit" name="action" value="Return"/>
        </tr>
    </table>
    <textarea rows="5" cols="50" name="textdata"></textarea>
    </form>
    <?php
}

function readView($fileName)
{
    ?>
    <h2>Read:<?php echo $fileName; ?></h2>
    <p><?php $data ?></p>
    <?php
}

function confirmView($fileName)
{
    ?>
    <p> Are you sure you want to delete the file: <b><?php echo $fileName;?></b>?</p>
    
    <button> Confirm </button>
    <button> Cancel </button>
    <?php
}