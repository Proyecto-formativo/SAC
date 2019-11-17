<?php
function ficha_rules(){
    $config = [
        [
            'field' => 'etapaformacion',
            'label' => 'etapa de formacion',
            'rules' => 'required',
            'errors' => array(
                'required' => 'la %s es requerida',
            )
        ],
        [
            'field' => 'etapaproyecto',
            'label' => 'etapa proyecto',
            'rules' => 'required',
            'errors' => array(
                'required' => 'la  %s es requerida',
            )
        ],
        [
            'field' => 'tipofalta',
            'label' => 'tipo falta',
            'rules' => 'required',
            'errors' => array(
                'required' => 'el  %s es requerida',
            )
        ],
        [
            'field' => 'justificacion',
            'label' => 'justificacion',
            'rules' => 'required',
            'errors' => array(
                'required' => 'la  %s es requerida',
            )
        ],
        [
            'field' => 'tipocalificacion',
            'label' => 'tipo de calificacion',
            'rules' => 'required',
            'errors' => array(
                'required' => 'el  %s es requerida',
            )
        ],
        [
            'field' => 'sugerencia',
            'label' => 'sugerencia',
            'rules' => 'required',
            'errors' => array(
                'required' => 'la  %s es requerida',
            )
        ],
        // [
        //     'field' => 'evidencia',
        //     'label' => 'evidencia',
        //     'rules' => 'required',
        //     'errors' => array(
        //         'required' => 'la  %s es requerida',
        //     )
        // ],
        [
            'field' => 'normasReglamentarias',
            'label' => 'normas Reglamentarias',
            'rules' => 'required',
            'errors' => array(
                'required' => 'las  %s son requeridas',
            )
        ],

        
    ];
    return $config;
}