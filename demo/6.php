<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文件上传</title>
</head>
<body>
<?php
#文件上传预定义变量
/**$_FILES存储form中input type="file"上传的文件
 * 它是一个数组它的元素也是一个数组元素数组中存储了
 * 文件信息，有5个对应信息的元素：
 * name:文件在客户端时的名字
 * tmp_name:文件上传后在服务端临时保存的路径
 * type：MIME类型，客户端识别出的此文件类型
 * error:文件上传代号，告知客户端上传时出现了什么问题
 * size:文件大小
 */
//专存储用户上传文件的PHP变量
$file=$_FILES['file'];//取得文件的关键信息数组，file脚标为input中的name
$socketFile=is_uploaded_file($file['tmp_name']);//是否是上传的文件
if($socketFile){
    //参1为文件路径当前，参2文件需要移动到哪并在路径中给出文件最后的名字
    $move=move_uploaded_file($file['tmp_name'],'./'.$file['name']);//移动文件,成功返回true
    if($move){
        echo '上传文件成功';
    }
}else{
    echo '文件误请检查，',$files;
}

/**多文件上传事项：
 * 当表单同时进行多文件件上传时，input可采取name[]方式取名
 * 文件信息(5个元素)，都管理着索引数组存储着对应信息
 */

?>
</body>
</html>