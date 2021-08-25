<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP chat</title>
</head>
<body>

  <section>

  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post"> 
  <fieldset>
    <legend>Identification</legend>
    <label for="email">Votre email:
    <input type="text" name="email" id="email">
    </label>
    <label for="password">Votre mot de pass:
    <input type="text" name="password" id="password">
    </label>
  </fieldset>
  <fieldset>
    <label for="avatar">Votre avatar:
    <input type="file" name="avatar" id="avatar">
    </label>
    <label for="prenom">Votre prenom:
    <input type="text" name="prenom" id="prenom">
    </label>
    <label for="nom">Votre nom:
    <input type="text" name="nom" id="nom">
    </label>
  </fieldset>
  <td>
        <input type="submit" name="envoie" value="Envoyer" />
      </td>
      <td>
        <input type="reset" name="efface" value="Effacer" />
      </td>
  </form>

  <?php 

if (isset($_POST['envoie']) and filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) and getimagesize($_FILES["avatar"]["tmp_name"])) {
    //create unique id
    $unique_id = uniqid();

    //upload and check image
    $target_dir = "avatars/";
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

  $req_pers = $connexion->prepare("INSERT INTO user(unique_id, firstname, lastname, email, password, image) VALUES (?,?,?,?,?,?)");
  $req_pers->execute([$unique_id, $_POST['prenom'] , $_POST['nom'] , $_POST['email'] , $_POST['password'] , $_POST['avatar']]);
}

    ?>
  </section>

</body>
</html>