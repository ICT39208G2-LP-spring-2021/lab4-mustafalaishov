<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registration</title>
</head>

<body>
  <form action="add-user.php" method="POST">

    <label for="FirstName">First Name:</label>
    <input type="text" name="FirstName"><br>
    <!-- first name empty -->
    <?php if (isset($firstName_error)) { ?>
      <p><?php echo $firstName_error ?> </p>
    <?php } ?>

    <label for="LastName">Last Name:</label>
    <input type="text" name="LastName"><br>
    <!-- last name empty -->
    <?php if (isset($lastName_error)) { ?>
      <p><?php echo $lastName_error ?> </p>
    <?php } ?>

    <label for="PersonalNumber">Perosnal Number:</label>
    <input type="text" name="PersonalNumber"><br>
    <!-- personal number empty -->
    <?php if (isset($personalNumber_error)) { ?>
      <p><?php echo $personalNumber_error ?> </p>
    <?php } ?>
    <!-- personal number already registered -->
    <?php if (isset($existing_personalNumbers_error)) { ?>
      <p><?php echo $existing_personalNumbers_error ?></p>
    <?php } ?>

    <label for="Email">Email:</label>
    <input type="email" name="Email"><br>
    <!-- email empty -->
    <?php if (isset($email_error)) { ?>
      <p><?php echo $email_error ?> </p>
    <?php } ?>
    <!-- email already registered -->
    <?php if (isset($existing_emails_error)) { ?>
      <p><?php echo $existing_emails_error ?> </p>
    <?php } ?>

    <label for="Password">Password:</label>
    <input type="password" name="Password"><br>
    <!-- password empty -->
    <?php if (isset($password_error)) { ?>
      <p><?php echo $password_error ?> </p>
    <?php } ?>

    <input type="submit" name="submit" value="Sign up">
  </form>
  <!-- registration successful -->
  <?php if (isset($success)) { ?>
    <p>Registration successful</p>
  <?php } ?>
  <!-- has attempts remaining to send email -->
  <?php if (isset($canSend)) { ?>
    <form action="resend-email.php" method="post">
      <p>Confirmation sent</p>
      <input type="submit" name="confirmation" value="Send"><br>
      <?php echo "Attempts remaining: " . $_SESSION['TRIES']; ?>
    </form>
  <?php } ?>
  <!-- no attempts remaining -->
  <?php if (isset($cantSend)) { ?>
    <form action="resend-email.php" method="post">
      <p>თქვენ ამოწურეთ ხელახალი გაგზავნის მცდელობის რაოდენონის ლიმიტი</p>
    </form>
  <?php } ?>

  <form action="login.php" method="POST">

    <label for="loginEmail">Email:</label>
    <input type="email" name="loginEmail">
    <label for="loginPassword">Password:</label>
    <input type="password" name="loginPassword">
    <input type="submit" name="loginButton" value="login">

  </form>
</body>

</html>