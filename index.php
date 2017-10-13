<?php
    require_once('database.php');

    // Get customerID
    if(!isset($customer_id)) {
        $customer_id= $_GET['customer_id'];
        if (!isset($customer_id)) {
            $customer_id = 1002;
        }
    }
    // Get last name for current customer
    $query = "SELECT lastName FROM customers
              WHERE customerID = $customer_id";
    $customer = $db->query($query);
    $customer = $customer->fetch();
    $customer_name = $customer['lastName'];

	    // Get all customers
    $query = 'SELECT * FROM customers
              ORDER BY customerID';
    $customers = $db->query($query);
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Technical Support</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">

    <div id="header">
        <h1>Tech Support</h1>
    </div>

    <div id="main">

        <h1>Customer List</h1>

        <div id="sidebar">
            <!-- display a list of customer IDs -->
            <h2>Customer IDs</h2>
            <ul class="nav">
            <?php foreach ($customers as $customer) : ?>
                <li>
                <a href="?customer_id=<?php echo $customer['customerID']; ?>">
                    <?php echo $customer['customerID']; ?>
                </a>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>

        <div id="content">
            <!-- display a table of customers -->
            <h2><?php echo $customer_id; ?></h2>
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>city</th>
                    <th>State</th>
                </tr>
                <?php foreach ($customers as $customer) : ?>
                <tr>
                    <td><?php echo $customer['firstName']; ?></td>
                    <td><?php echo $customer_name['lastName']; ?></td>
                    <td><?php echo $customer['city']; ?></td>
					<td><?php echo $customer['state']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> Technical Support.</p>
    </div>

    </div><!-- end page -->
</body>
</html>