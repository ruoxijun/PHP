<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>多维复杂数组</title>
</head>
<body>
    <?php
        echo "<h3>一维索引数组</h3>";
        $arr = array("张龙生",19,true,"软件技术一班");
        $arr = ["张龙生",19,true,"软件技术一班"];
        var_dump($arr);
        echo "<hr/>";
        print_r($arr);
        echo "<hr/>";
        echo $arr[0];

        echo "<h3>一维关联数组</h3>";
        $arr = array("name"=>"张龙生","age"=>19,"xb"=>true,"bj"=>"软件技术一班");
        $arr = ["name"=>"张龙生","age"=>19,"xb"=>true,"bj"=>"软件技术一班"];
        var_dump($arr);
        echo "<hr/>";
        print_r($arr);
        echo "<hr/>";
        echo $arr["name"];

        echo "<h1>二维索引数组</h1>";
        echo "<h3>二维索引数组</h3>";
        $stu = [["张龙生",19,true,"软件技术一班"],
                ["何芳芳",19,false,"软件技术三班"]];
        var_dump($stu);
        echo "<hr/>";
        echo $stu[1][0];
        echo "<h3>二维关联数组</h3>";
        $stu = ["201801"=>["name"=>"张龙生","age"=>19,"xb"=>true,"bj"=>"软件技术一班"],
                "201803"=>["name"=>"何芳芳","age"=>19,"xb"=>false,"bj"=>"软件技术三班"]];
        var_dump($stu);
        echo "<hr/>";
        echo $stu["201801"]["name"];

        echo "<h1>多维索引数组</h1>";
        echo "<h3>多维索引数组</h3>";
        $stu = [
                [
                    ["张龙生",19,true,"软件技术一班"],
                    ["张高高",19,true,"软件技术一班"]
                ],
                [
                    ["何芳芳",19,false,"软件技术三班"],
                    ["何哈哈",19,false,"软件技术三班"]
                ]
            ];
        var_dump($stu);
        echo "<hr/>";
        echo $stu[0][0][0];

        echo "<h3>多维关联数组</h3>";
        $stu = [
            "软件技术一班"=>[
                "201801"=>["name"=>"张龙生","age"=>19,"xb"=>true,"bj"=>"软件技术一班"],
                "201802"=>["name"=>"张高高","age"=>19,"xb"=>true,"bj"=>"软件技术一班"]
                ],
                "软件技术三班"=>[
                    "201803"=>["name"=>"何芳芳","age"=>19,"xb"=>false,"bj"=>"软件技术三班"],
                    "201804"=>["name"=>"何哈哈","age"=>19,"xb"=>false,"bj"=>"软件技术三班"]
                ]
            ];
        var_dump($stu);
        echo "<hr/>";
        echo $stu["软件技术三班"]["201803"]["name"];
    ?>

    <h1>学生基本信息数组</h1>
    <?php
        $stu = [
                "软件技术"=>[
                    "软件技术一班"=>[
                    "201801"=>["name"=>"张龙生","age"=>19,"xb"=>true,"bj"=>"软件技术一班"],
                    "201802"=>["name"=>"张高高","age"=>19,"xb"=>true,"bj"=>"软件技术一班"]
                    ],
                    "软件技术三班"=>[
                        "201803"=>["name"=>"何芳芳","age"=>19,"xb"=>false,"bj"=>"软件技术三班"],
                        "201804"=>["name"=>"何哈哈","age"=>19,"xb"=>false,"bj"=>"软件技术三班"]
                    ]
                ],

                "计应用"=>[
                    "计应用一班"=>[
                    "201801"=>["name"=>"龙生","age"=>19,"xb"=>true,"bj"=>"计应用一班"],
                    "201802"=>["name"=>"高高","age"=>19,"xb"=>true,"bj"=>"计应用一班"]
                    ],
                    "计应用三班"=>[
                        "201803"=>["name"=>"芳芳","age"=>19,"xb"=>false,"bj"=>"计应用三班"],
                        "201804"=>["name"=>"哈哈","age"=>19,"xb"=>false,"bj"=>"计应用三班"]
                    ]
                ]
        ];
        var_dump($stu);

    ?>

</body>
</html>