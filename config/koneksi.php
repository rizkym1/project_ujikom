<?php
$con = mysqli_connect("localhost", "root", "", "db_hotel");

function tampilData($query)
{
    global $con;
    $data = [];
    $dataQuery = mysqli_query($con, $query);
    while ($result = mysqli_fetch_assoc($dataQuery)) {
        $data[] = $result;
    }
    return $data;
}

function delete($nTabel, $nId, $id)
{
    global $con;
    $delete = mysqli_query($con, "DELETE FROM $nTabel WHERE $nId = '$id'");
    return $delete;
}

function dd($v)
{
    var_dump($v);
    die;
}

// fungsi buat cek username
function cekUsername($pIndex, $pTabel, $pStatement, $username)
{
    global $con;
    $query = mysqli_query($con, "SELECT $pIndex FROM $pTabel WHERE $pStatement = '$username'");
    $cek = mysqli_fetch_assoc($query);
    return $cek;
}

function e($v)
{
    htmlspecialchars($v);
}