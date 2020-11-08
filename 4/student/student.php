<?php
    $student = [
        "bj" => "软件技术1班",
        "students" => [
            ["xh"=>"201801","name"=>"张龙生","age"=>19,
            "sex"=>true,"sfz"=>"511324200006230851"],

            ["xh"=>"201802","name"=>"张高高","age"=>19,
            "sex"=>true,"sfz"=>"511324200006230852"],

            ["xh"=>"201803","name"=>"何芳芳","age"=>19,
            "sex"=>false,"sfz"=>"511324200006230853"],

            ["xh"=>"201804","name"=>"何哈哈","age"=>19,
            "sex"=>false,"sfz"=>"511324200006230854"]
        ]
    ];
    // var_dump($student);
    echo json_encode($student);
?>