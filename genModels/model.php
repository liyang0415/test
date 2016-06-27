<?php
function getInput($msg = '', $default = '')
{
    if (PHP_OS == 'WINNT') {
        echo $msg.':  ';
        $line = stream_get_line(STDIN, 1024, PHP_EOL);
    } else {
        $line = readline($msg.':  ');
    }
    return $line?$line:$default;
}
function convertUnderline($str, $ucfirst = true)
{
    $str = ucwords(str_replace('_', ' ', $str));
    $str = str_replace(' ', '', lcfirst($str));
    return $ucfirst ? ucfirst($str) : $str;
}
function getTableFields($table, $db, $link)
{
    $sql = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '{$table}' AND TABLE_SCHEMA ='{$db}' ORDER BY ORDINAL_POSITION ASC";
    $result = $link->query($sql);
    $fields = array();
    while ($field = $result->fetch_assoc()) {
        $fields[$field['COLUMN_NAME']] = array(
        'COLUMN_NAME' => $field['COLUMN_NAME'],
        'COLUMN_DEFAULT' => $field['COLUMN_DEFAULT'],
        'IS_NULLABLE' => $field['IS_NULLABLE'],
        'DATA_TYPE' => $field['DATA_TYPE'],
        'CHARACTER_MAXIMUM_LENGTH' => $field['CHARACTER_MAXIMUM_LENGTH'],
        'NUMERIC_PRECISION' => $field['NUMERIC_PRECISION'],
        'NUMERIC_SCALE' => $field['NUMERIC_SCALE'],
        'COLUMN_TYPE' => $field['COLUMN_TYPE'],
        'EXTRA' => $field['EXTRA'],
        'COLUMN_COMMENT' => $field['COLUMN_COMMENT'],
        );
    }
    return $fields;
}

$db['host'] = getInput('DataBase Host[127.0.0.1]', '127.0.0.1');
$db['user'] = getInput('DataBase User[root]', 'root');
$db['pass'] = getInput('DataBase Pass[root]', 'root');
$db['db'] = getInput('DataBase Name[wispiritdb]', 'wispiritdb');

if (!is_dir("gen\\BaseModel")) {
    mkdir("gen\\BaseModel",777,true);
}

$mysqli = new mysqli($db['host'], $db['user'], $db['pass'], $db['db']);
if ($mysqli->connect_errno) {
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}

$mysqli->query("set names utf8");
$sql = "SHOW TABLES";
$result = $mysqli->query($sql);
while ($table = $result->fetch_assoc()) {
    $tableName = array_shift($table);
    $spaceName = convertUnderline($tableName);
    $modelName = $spaceName.'Model';
    $getTableFields = "return ".var_export(getTableFields($tableName, $db['db'], $mysqli), true);


    $search=array('{tableName}', '{modelName}', '{spaceName}', '{getTableFields}','{dbname}');
    $replace=array($tableName, $modelName, $spaceName, $getTableFields,$db['db']);
    //生成基础模型文件
    $str = str_replace($search, $replace, file_get_contents('skeletonbase.php'));
    $file="gen\\BaseModel".DIRECTORY_SEPARATOR.$modelName.'.php';
    file_put_contents($file, $str);
    $cmd="php fmt.phar --psr2 $file ";
    exec($cmd);

    //生成默认扩展模型文件

    $str = str_replace($search, $replace, file_get_contents('skeleton.php'));
    $file="gen\\".$modelName.'.php';
    file_put_contents($file, $str);
    $cmd="php fmt.phar --psr2 $file ";
    exec($cmd);
}
