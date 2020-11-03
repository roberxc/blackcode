<?php

function main_menu(){
    return array(
        array(
            'title' => 'Login',
            'url' => base_url(),
        ),
        array(
            'title' => 'Registro',
            'url' => base_url('/registro')
        ),
    );
}