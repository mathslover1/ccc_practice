<?php
include("sql/connection.php");
$connection=mysqlConnection();
function insert(string $table_name, array $data)
{
    $columns = $values = [];
    foreach ($data as $col => $val) {
        $columns[] = "`$col`";
        $values[] = "'" . addslashes($val) . "'";
    }
    $columns = implode(", ", $columns);
    $values = implode(", ", $values);
    $query = "INSERT INTO {$table_name} ({$columns}) VALUES ({$values})";
    return $query;
}
function update(string $tablename,array $data,array $where)
{
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
    return $query;
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
};

?>