<?php

/**
 * In this case, we want to increase the default cost for BCRYPT to 12.
 * Note that we also switched to BCRYPT, which will always be 60 characters.
 */
$options = [
    'cost' => 12,
];
$proff = password_hash("asd", PASSWORD_BCRYPT, $options);
echo $proff;


if (password_verify('asd', $proff)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
