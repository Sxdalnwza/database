<?php
require 'connect.php';

$sql_select = "select * from country order by CountryCode";
$stmt_s = $conn->prepare($sql_select);
$stmt_s->execute();

if (isset($_POST['submit'])) {

    if (!empty($_POST['customerID']) && !empty($_POST['name'])) {
        //echo "<br>".$_POST['customerID'];

        //ฝึกสลับตำแหน่งการ insert ในภาษา SQL
        $sql = "insert into customer (CustomerID, Name, CountryCode, OutstandingDebt, Email, Birthdate)
                values (:customerID, :Name, :countrycode, :outstandingDebt, :email, :birthdate)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':customerID',     $_POST['customerID']);
        $stmt->bindParam(':Name',           $_POST['name']);
        $stmt->bindParam(':countrycode',    $_POST['countrycode']);
        $stmt->bindParam(':outstandingDebt',$_POST['outstandingDebt']);
        $stmt->bindParam(':email',          $_POST['email']);
        $stmt->bindParam(':birthdate',      $_POST['birthdate']);
        $stmt->execute();

        echo "<br>Insert successful!";
    } else {
        echo "<br>Please fill in Customer ID and Name.";
    }
}
?>

    <html>

    <head>
        <title>User Registration</title>
    </head>

    <body>
        <h1>Add customer but not in order of columns</h1>
        <form action="addcustomer_dropdownfull_swapinsert.php" method="POST">

            <input type="text" placeholder="Enter Customer ID" name="customerID">
            <br> <br>
            <input type="text" placeholder="Name" name="name">
            <br> <br>
            <input type="number" placeholder="OutStanding debt" name="outstandingDebt">
            <br> <br>
            <input type="email" placeholder="Email" name="email">
            <br> <br>
            <input type="date" placeholder="Birthdate" name="birthdate">
            <br> <br>

            <label>Select a country code</label>
            <select name="countrycode">
                <?php
                require 'connect.php';

                //https://www.w3schools.com/tags/tag_select.asp
                while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) :;
                ?>
                    <option value="<?php echo $cc["CountryCode"]; ?>">
                        <?php echo $cc["CountryName"]; ?>
                    </option>
                <?php
                endwhile;
                ?>
            </select>
            <br> <br>

            <input type="submit" value="Submit" name="submit" />
        </form>
    </body>

    </html>