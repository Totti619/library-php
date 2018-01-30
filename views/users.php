<?php
include "../libs/bootstrap.php";
use Library\Configuration;
use Library\Database\Model\User;
use Library\Database\Model\UserType;
use Library\User\Session;
use Library\User\UserController;

$root=Configuration::root();
$http=Configuration::http();
$columns = ["id", "username", "dni"];
$rows=User::getAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <?php include "$root/views/layouts/links.php" ?>
    <?php include "$root/views/layouts/head_scripts.php"?>

    <title>Books - Library</title>
</head>
<body>

<?php include "$root/views/layouts/user_bar.php"?>
<?php include "$root/views/layouts/nav.php" ?>

<div class="container-fluid">
    <div class="row">
        <p>
            Actions
        </p>
        <div>
            <a href="<?php echo "$http/views/register.php"?>" class="btn btn-primary">Add a user</a>
        </div>
    </div>
    <div class="row">
        <div class="col col-3">
            <table class="table">
                <?php
//                $rows = User::select("id, username, dni");
                ?>
                <thead>
                <tr>
                    <?php foreach($columns as $column): ?>
                        <th>
                            <?php echo ucfirst($column); ?>
                        </th>
                    <?php endforeach; ?>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($rows AS $row): ?>
                    <?php if(Session::isType(UserType::ADMINISTRATOR)):?>
                        <tr>
                            <td><?php echo $row->getId();?></td>
                            <td><?php echo $row->getUsername();?></td>
                            <td><?php echo $row->getDni();?></td>
                            <td>
                                <a href="<?php echo "$http/views/user_page.php?id=".$row->getId()?>">
                                    <i class="material-icons">settings</i>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo "$http/actions/crud/user/delete.php?id=".$row->getId()?>">
                                    <i class="material-icons text-danger">delete forever</i>
                                </a>
                            </td>
                        </tr>
                    <?php elseif(Session::isType(UserType::LIBRARIAN)):?>
                        <?php if($row->getType()!=UserType::ADMINISTRATOR):?>
                            <tr>
                                <td><?php echo $row->getId();?></td>
                                <td><?php echo $row->getUsername();?></td>
                                <td><?php echo $row->getDni();?></td>
                                <td>
                                    <a href="<?php echo "$http/actions/crud/user/update_user.php;"?>?isbn=<?php if (isset($id)) {
                                        echo $rowId;
                                    } ?>">
                                        <i class="material-icons">settings</i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo "$http/actions/crud/user/delete_user.php;"?>?isbn=<?php if (isset($rowId)) {
                                        echo $rowId;
                                    } ?>">
                                        <i class="material-icons text-danger">delete forever</i>
                                    </a>
                                </td>
                            </tr>
                        <?php endif;?>
                    <?php endif;?>
                <?php endforeach; ?>

                </tbody>
                <tfoot>
                <tr>
                    <?php foreach($columns as $column): ?>
                        <th>
                            <?php echo ucfirst($column); ?>
                        </th>
                    <?php endforeach; ?>
                    <th></th>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>

<?php include "$root/views/layouts/footer.php"?>

<script src="../js/head/jquery-3.2.1.min.js" charset="utf-8"></script>
<script src="../js/head/moment.js" charset="utf-8"></script>
<script src="../js/head/bootstrap.min.js" charset="utf-8"></script>

</body>
</html>