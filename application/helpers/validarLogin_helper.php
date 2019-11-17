<?php

function login_rules(){
    $config = array(
        array(
            'field' => 'documento',
            'label' => 'documento',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'el %s es requerido',
            )
        ),
        array(
            'field' => 'contrasena',
            'label' => 'contraseña',
            'rules' => 'required',
            'errors' => array(
                'required' => 'la %s es requerida',
            )
        )
    );

    return $config;
}