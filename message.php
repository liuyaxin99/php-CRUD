<?php
//check if any message is set or not
if (isset($_SESSION['message'])) :
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
    //delete the message 
    unset($_SESSION['message']);
endif; //add ":" after if condition
?>