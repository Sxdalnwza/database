<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require "cn.php";
    $sql = "SELECT * FROM student";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?>

    <table width="800" border="1">
        <tr>
            <th width="90">
                <div align="center">รหัสนักศึกษา</div>
            </th>
            <th width="140">
                <div align="center">ชื่อจริง</div>
            </th>
            <th width="120">
                <div align="center">นามสกุล </div>
            </th>
            <th width="100">
                <div align="center">รหัสวิชา </div>
            </th>
            <th width="50">
                <div align="center">ชื่อวิชา </div>
            </th>
            <th width="70">
                <div align="center">หน่วยกิต</div>
            </th>
            <th width="70">
                <div align="center">เกรด</div>
        </tr>

        <?php
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <td>

                    <a href="detail.php?studentID=<?php echo $result['studentID']; ?>">

                        <?php echo $result["studentID"]; ?>

                </td>

                <td>
                    <?php echo $result["Name"]; ?>
                </td>

                <td><?php echo  $result["Birthdate"]; ?></div>
                </td>
                <td><?php echo $result["Email"]; ?></td>
                <td><?php echo $result["CountryCode"]; ?></div>
                </td>
                <td><?php echo $result["OutstandingDebt"]; ?></td>

            </tr>

        <?php
        }
        ?>

    </table>
</body>

</html>