<?php
function acta_rules(){
    $config = [
        [
            'field' => 'NumroActa',
            'label' => 'NumroActa',
            'rules' => 'required',
            'errors' => array(
                'required' => 'el %s es requerida',
            )
        ],
        [
            'field' => 'hora_inicio',
            'label' => 'hora_inicio',
            'rules' => 'required',
            'errors' => array(
                'required' => 'el %s es requerida',
            )
        ],
        [
            'field' => 'hora_fin',
            'label' => 'hora_fin',
            'rules' => 'required',
            'errors' => array(
                'required' => 'el %s es requerida',
            )
        ],
        [
            'field' => 'sede',
            'label' => 'sede',
            'rules' => 'required',
            'errors' => array(
                'required' => 'el %s es requerida',
            )
        ],
        [
            'field' => 'date',
            'label' => 'date',
            'rules' => 'required',
            'errors' => array(
                'required' => 'el %s es requerida',
            )
        ],
        [
            'field' => 'temas',
            'label' => 'temas',
            'rules' => 'required',
            'errors' => array(
                'required' => 'el %s es requerida',
            )
        ],
        [
            'field' => 'area',
            'label' => 'area',
            'rules' => 'required',
            'errors' => array(
                'required' => 'el %s es requerida',
            )
        ],
        [
            'field' => 'ObjetivosReunion',
            'label' => 'ObjetivosReunion',
            'rules' => 'required',
            'errors' => array(
                'required' => 'el %s es requerida',
            )
        ],
        [
            'field' => 'Temas_a_Tratar',
            'label' => 'Temas_a_Tratar',
            'rules' => 'required',
            'errors' => array(
                'required' => 'el %s es requerida',
            )
        ],
        [
            'field' => 'Desarrollo',
            'label' => 'Desarrollo',
            'rules' => 'required',
            'errors' => array(
                'required' => 'el %s es requerida',
            )
        ],
        [
            'field' => 'concluciones',
            'label' => 'concluciones',
            'rules' => 'required',
            'errors' => array(
                'required' => 'el %s es requerida',
            )
        ],
    ];

    return $config;
}