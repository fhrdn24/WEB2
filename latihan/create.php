<?php

// set page headers
$page_title = "Tambah pengguna";
include_once "header.php";

// read user button
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Daftar Pengguna ";
    echo "</a>";
echo "</div>";

// get database connection
include_once 'classes/database.php';
include_once 'initial.php';


// check if the form is submitted
if ($_POST){

    // instantiate user object
    include_once 'classes/user.php';
    $user = new User($db);

    // set user property values
    $user->firstname = htmlentities(trim($_POST['firstname']));
    $user->lastname = htmlentities(trim($_POST['lastname']));
    $user->email = htmlentities(trim($_POST['email']));
    $user->mobile = htmlentities(trim($_POST['mobile']));
    $user->category_id = $_POST['category_id'];


    // if the user able to create
    if($user->create()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "berhasil! Pengguna dibuat.";
        echo "</div>";
    }

    // if the user unable to create
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo " Tidak dapat membuat pengguna!.";
        echo "</div>";
    }
}
?>

<!-- Bootstrap Form for creating a user -->
<form action='create.php' role="form" method='post'>

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Nama Depan</td>
            <td><input type='text' name='firstname'  class='form-control' placeholder="Masukan nama depan" required></td>
        </tr>

        <tr>
            <td>Nama belakang</td>
            <td><input type='text' name='lastname' class='form-control' placeholder="masukan nama belakang" required></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type='email' name='email' class='form-control' placeholder="masukan alamat email" required></td>
        </tr>

        <tr>
            <td>No Handphone</td>
            <td><input type='number' name='mobile' class='form-control' placeholder="masukan no handphone" required></td>
        </tr>

        <tr>
            <td>Category</td>
            <td>
                <?php
                    // choose user categories
                    include_once 'classes/category.php';

                    $category = new Category($db);
                    $prep_state = $category->getAll();
                    echo "<select class='form-control' name='category_id'>";

                        echo "<option>--- Select Category ---</option>";

                        while ($row_category = $prep_state->fetch(PDO::FETCH_ASSOC)){

                            extract($row_category);

                            echo "<option value='$id'> $name </option>";
                        }
                    echo "</select>";
                ?>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Create
                </button>
            </td>
        </tr>

    </table>
</form>

<?php
include_once "footer.php";
?>

