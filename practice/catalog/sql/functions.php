<?php
require("connection.php");
$connection=mysqlConnection();
function getParams(string $key)
{
    if (isset($_POST[$key])) {
        return $_POST[$key];
    } elseif (isset($_GET[$key])) {
        return $_GET[$key];
    }
}
function getKeysFromPostRequest()
{
    $keys = [];
    foreach ($_POST as $key => $val) {
        if (is_array($val)) {
            $keys[] = $key;
        }
    }
    return $keys;
}
function insert(string $table_name, array $data)
{
    global $connection;
    $columns = $values = [];
    foreach ($data as $col => $val) {
        $columns[] = "`$col`";
        $values[] = "'" . addslashes($val) . "'";
    }
    $columns = implode(", ", $columns);
    $values = implode(", ", $values);
    $query = "INSERT INTO {$table_name} ({$columns}) VALUES ({$values})";
    $res=mysqli_query($connection,$query);
    return $res;
}
function update(string $tablename,array $data,array $where)
{
    global $connection;
    $c = $w = [];
    foreach ($data as $col => $val) {
        $c[] = "`$col` = '$val'";
    }
    foreach ($where as $col => $val) {
        $w[] = "`$col` = '$val'";
    }

    $c = implode(", ", $c);
    $w = implode(" AND ", $w);

    $query="UPDATE {$tablename} SET {$c} WHERE {$w}";
    $res=mysqli_query($connection,$query);
    return $res;
}
function delete(string $tablename,array $where){
    $c = $w = [];
    foreach ($where as $col => $val) {
        $w[] = "`$col`='$val'";
    }

    $c = implode(", ", $c);
    $w = implode(" AND ", $w);
    $query="DELETE FROM {$tablename} WHERE {$w}";
    return $query;
}
function select(string $table_name, string $primary_key, array $columns)
{
    global $connection;
    $columns = join(", ", $columns);
    $query = "SELECT {$columns} FROM `{$table_name}` ORDER BY `{$primary_key}` DESC";
    $res=mysqli_query($connection,$query);
    return $res;
}
function whereBaseSelect(string $table_name, array $where)
{
    global $connection;
    $where_cond = [];
    foreach ($where as $col => $val) {
        $where_cond[] = "$col = $val";
    }
    $where_cond = implode(" AND ", $where_cond);
    $query = "SELECT * FROM `{$table_name}` WHERE {$where_cond}";
    $res=mysqli_query($connection,$query);
    return $res;
}
?>