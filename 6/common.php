<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php
    function getNewDate($sfz, $formart = 'c')
    {
        $year = substr($sfz, 6, 4);
        $mon = substr($sfz, 10, 2);
        $day = substr($sfz, 12, 2);
        $csrq = '';
        if ($formart == 'c') {
            $csrq = $year . '年' . $mon . '月' . $day . '日';
        } else {
            $csrq = $year . $formart . $mon . $formart . $day;
        }
        return $csrq;
    }

    function getSex($sfz, $formart = 'c')
    {
        $num = substr($sfz, 16, 1);
        $res = $num % 2 ? 1 : 0;
        switch ($formart) {
            case 'c':
                $reValue = $res ? '男' : '女';
                break;
            case 'bool':
                $reValue = $res ? true : false;
                break;
            case 'int':
                $reValue = $res;
                break;
        }
        return $reValue;
    }

    function getSfz($sfz, $formart = "*", $length = 8)
    {
        $font = substr($sfz, 0, 4);
        $back = substr($sfz, 13, 4);
        $star = '';
        $temp = str_pad($star, $length, $formart);
        return $font . $temp . $back;
    }
    ?>
</body>

</html>