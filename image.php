<?php
/**
 * Created by PhpStorm.
 * User: wildcodeschool
 * Date: 09/10/18
 * Time: 17:36
 */

if (isset($_GET)) {
    $suppr = $_GET['id'];
    delete($suppr);
}

function delete($file) {
    unlink($file);
}

$dir = 'upload/*.{jpg,jpeg,gif,png}';
$files = glob($dir,GLOB_BRACE);
$i = 0;

echo "Listing des images du repertoire miniatures <br />"; ?>
<div class="container-fluid">
<div class="row" style="margin-top: 30px;">
<?php
foreach($files as $image)
{
    $i++;
    $f= str_replace($repertoire,'',$image);
    ?>
            <img class="col-3" src="<?php echo $f ?>" style="height: 200px;"/>
    <a href="?id=<?php echo $f ?>"><button type="button" class="btn btn-danger">Delete</button></a>

    <?php
} ?>

</div>
</div>
