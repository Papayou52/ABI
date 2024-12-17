<?php
$title = "Connexion";
ob_start();
?>
<form class="mt-3" >
    <br>
    <!-- Email input -->
    <div data-mdb-input-init class="form-outline">
        <input type="email" id="form2Example1" class="form-control" />
        <label class="form-label" for="form2Example1">Email address</label>
    </div>

    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" id="form2Example2" class="form-control" />
        <label class="form-label" for="form2Example2">Password</label>
    </div>

    <!-- Submit button -->
    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>

    <!-- Register buttons -->
    <div class="text-center">
        <p><a href="#!">Inscription</a></p>
    </div>
</form>
<?php
    $content = ob_get_clean();
    include "baselayout.php";