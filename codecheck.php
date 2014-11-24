<?php include('codetest.php'); ?>

<form method="get">
    config name search <input type="text" name="config" placeholder="Enter Config Name" />
    <br />
    <input type="submit" value="Find" />
</form>

<a href="?config=all"><button>Display All</button></a> <br />

<?php if(!empty($_GET['config']) && $_GET['config'] != 'all')
{

        echo "Config value for ".str_replace(' ', '_',$_GET['config'])." is ". parser::getConfig($_GET['config']);


}
elseif($_GET['config'] == 'all')
{
    parser::getConfig('all');
}