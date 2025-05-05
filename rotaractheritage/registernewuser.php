<?php $carousel="no"; 
include ( "./inc/header.inc.php"); include ( "./inc/register.inc.php" );?>
<div id="wrapper">
  <br>
  <table align="center">
    <tr>
      <td class="box2">
        <h2>Members Login</h2>
        <form action="" method="POST">
          <p /><input type="text" name="fname" size="25" placeholder="First Name" /><p />
          <input type="text" name="lname" size="25" placeholder="Last Name" /><p />
          <input type="text" name="username" size="25" placeholder="Username" /><p />
          <input type="text" name="email" size="25" placeholder="Email" /><p />
          <input type="text" name="email2" size="25" placeholder="Retype Email" /><p />
          <input type="password" name="password" size="25" placeholder="Password" /><p />
          <input type="password" name="password2" size="25" placeholder="Retype Password" /><p />
          <p>Member ?<input type="checkbox" name="check[0]" /></p>
          <input type="submit" name="reg" class="btn btn--primary" value="Sign Up">
        </form>
      </td>
    </tr>
  </table>
</div>
