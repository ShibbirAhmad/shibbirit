<?php


function getCommentStatusList(){
    $list=[
        'approved' => 'approved',
        'unapproved' => 'unapproved',
        'pending'   => 'pendig',
    ];

    return $list;
}

function getCategoryImagePath($var = null){
  
    if ($var != null) {
        return public_path('storage/category/'. $var. ''); 

    }else{

        return public_path('storage/category');
    }

}

?>