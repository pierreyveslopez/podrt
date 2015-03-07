<?php 

    //public $belongsTo = array('Category');
    //public $hasMany
    //public $hasAndBelongsToMany

    class Tattoo extends AppModel{
        public $validate = array(
        'image_file' => array(
            'rule' => array('fileExtension', array('jpg','jpeg','png','gif')),
            'message' => 'Le format de votre image n\'est pas pris en charge.'
        ),
        'name'=> array(
            'message' => 'Veuillez remplir ce champs.'
        )
        );

    }