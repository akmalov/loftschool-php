<?php
function hashPassword($s)
{
    return crypt($s, CRYPT_STD_DES);
}