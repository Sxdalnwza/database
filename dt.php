<html>

<head>
    <title> Display Selected student Information 65</title>
</head>

<body>

    <?php
    if (isset($_GET["studentID"])) {
        $strstudentID = $_GET["studentID"];
    }
    echo $strstudentID;

    require "cn.php";
    $sql = "SELECT * FROM student WHERE studentID = ?";
    $params = array($strstudentID);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <table width="300" border="1">
        <tr>
            <th width="325">รหัสนักศึกษา</th>
            <td width="240"><?php echo $result["studentID"]; ?></td>
        </tr>

        <tr>
            <th width="130">ชื่อจริง</th>
            <td><?php echo $result["firstname"]; ?></td>
        </tr>
        <tr>
            <th width="130">นามสกุล</th>
            <td><?php echo $result["lastname"]; ?></td>
        </tr>

        <tr>
            <th width="130">รหัสวิชา</th>
            <td><?php echo $result["counseID"]; ?></td>
        </tr>

        <tr>
            <th width="130">ชื่อวิชา</th>
            <td><?php echo $result["counsename"]; ?></td>
        </tr>

        <tr>
            <th width="130">หน่วยกิต</th>
            <td><?php echo $result["counsecredit"]; ?></td>
        </tr>
        <th width="130">เกรด</th>
        <td><?php echo $result["grade"]; ?></td>
        </tr>
    </table>
    <?php
    $conn = null;
    ?>
</body>

</html>