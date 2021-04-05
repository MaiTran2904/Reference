<?php

class User {
    public id_user;
    public user_name;
    public full_name;
    public passwords;
    public email;
    public phone;
    public address;
    public balences;

}

public function __construct($id_user, $user_name, $full_name, $passwords, $email, $phone, $address, $balences)	{
    $this->id_user = $id_user;
    $this->user_name = $user_name;
    $this->full_name = $full_name;
    $this->passwords = $passwords;
    $this->email = $email;
    $this->phone = $phone;
    $this->address = $address;
    $this->balences = $balences;
}

?>