<html>

</head>
<title>User Registration11</title>
</head>

<body>
    <h1>Addr Customer</h1>
    <form action="addcustomer_droup.php" method="POST">

        <input type="text" placeholder="Enter Customer ID" name="customerID">
        <br> <br>
        <input type="text" placeholder="Name" name="Name">
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
            require 'conext.php';

            while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) :;
            ?>
                <option value="<?php echo $cc["COuntryCode"]; ?>">
                    <?php echo $cc["CountryName"]; ?>
                </option>
            <?php
            endwhile;
            ?>
        </select>
        <br><br>

        <input type="submit" value="submit" name="submit" />
    </form>
</body>

</html>