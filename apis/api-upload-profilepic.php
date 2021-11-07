
    <?php
    if (file_exists("/profiles/img_" . $_SESSION['user_id']))
        unlink("/profiles/img_" . $_SESSION['user_id']);
    echo 'Previous photo has been deleted';

    move_uploaded_file($_FILES['image']['tmp_name'], "../profiles/img_ " . $_SESSION['user_id']);
    echo 'Photo has been uploaded';
    exit();
