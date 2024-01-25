<?php
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
function update($tablename, $data, $where)
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
function delete($tablename,$where){
    $c = $w = [];
    foreach ($where as $col => $val) {
        $w[] = "`$col`='$val'";
    }

    $c = implode(", ", $c);
    $w = implode(" AND ", $w);
    $query="DELETE FROM {$tablename} WHERE {$w}";
    return $query;
}
?>