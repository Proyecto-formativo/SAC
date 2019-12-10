<?php

 function Perfil_rules(){
    $config = [
        [
            'field' => 'nombre',
            'label' => 'nombre',
            'rules' => 'required',
            'errors' => array(
                'required' => 'el %s es requerido',
            )
        ],
        [
            'field' => 'Apellido',
            'label' => 'Apellido',
            'rules' => 'required',
            'errors' => array(
                'required' => 'El %s es requerido',

            )
        ],
        [
            'field' => 'Correo',
            'label' => 'Correo',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'el %s es requerido',
                'trim' => 'El %s no puede ir con espacios, favor verificar'
            )
        ],
        [
            'field' => 'Celular',
            'label' => 'Celular',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'el %s es requerido',
                'trim' => 'El %s no puede ir con espacios, favor verificar'
            )
        ],
        [
            'field' => 'password',
            'label' => 'contraseña',
            'rules' => 'required',
            'errors' => array(
                'required' => 'La %s es requerida',

            )
        ],
    ];
    return $config;
}