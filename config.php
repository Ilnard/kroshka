<?php
    function query($sql) {
        $db = new mysqli('localhost', 'root', '', 'kroshka');
        $result = mysqli_query($db, $sql);
        mysqli_close($db);
        return $result;
    }
?>
<?php
    // function query($sql) {
    //     $db = new mysqli('localhost', 'u2123114_default', 'SE53y2R5IgfOiJlv', 'u2123114_default');
    //     $db->query("SET NAMES 'utf8'");
    //     $db->query("SET CHARACTER SET 'utf8'");
    //     $db->query("SET SESSION collation_connection = 'utf8_general_ci'");
    //     $result = mysqli_query($db, $sql);
    //     mysqli_close($db);
    //     return $result;
    // }
?>