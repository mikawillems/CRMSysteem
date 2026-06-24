<?php

// TODO security!!

// TODO should come from DB!

$price = 50;
$customerName = "";
// Get the assignment ID from the URL
$opdrachtId = $_GET['opdrachtid'];

if (!$opdrachtId) {
    echo "Need opdrachtId";
    exit();
}

// Connection to DB
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$Servername = $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'];
$Username = $_ENV['DB_USERNAME'];
$Password = $_ENV['DB_PASSWORD'];
$Dbname = $_ENV['DB_NAME'];

$conn = new mysqli($Servername, $Username, $Password, $Dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the opdracht with werkzaamheden and hours for the opdracht
// TODO security  https://www.w3schools.com/php/php_mysql_prepared_statements.asp
$sql = "SELECT a.id, a.Titel as title, a.Aplication_date as assignmentDate, w.Worked_hours, c.First_name as customerFirstname, c.Name_prefix as customerNameprefix, c.Last_name as customerLastname, c.Address as customerAddress, c.Postal_code as customerPostal, c.Land as customerCountry, wk.Last_name as workerLastname FROM `assignments` as a
join `work` as w ON w.Opdracht_ID = a.ID
join `customers` as c on a.Customer_ID = c.ID
join `workers` as wk on wk.id = w.Worker_ID
where a.ID =" . $opdrachtId;

$result = $conn->query($sql);

if (!$result) {
    die("SQL-fout: " . $conn->error);
}

// echo '<PRE>';
// print_r($result);
// echo '</PRE>';
// Create factuur
// Process the result set
if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    $customerFirstname = $row["customerFirstname"];
    $customerNameprefix = $row["customerNameprefix"];
    $customerLastname = $row["customerLastname"];
    if(!!$customerNameprefix) {
        $customerFirstname = $customerFirstname . " " . $customerNameprefix;
    }
    $customerName = $customerFirstname . " " . $customerLastname;
    $customerAddress = $row["customerAddress"];
    $customerPostal = $row["customerPostal"];
    $customerCountry = $row["customerCountry"];
    $assignmentDate = new DateTime($row["assignmentDate"]);
    $expireDate = clone $assignmentDate;
    $expireDate->add(new DateInterval('P14D'));
    $title = $row["title"];
    $assignmentPrice = $price;
    $assignmentAmount = 1;
    $assignmentTotal = $price * $assignmentAmount;
    $subTotal = $assignmentTotal;
    $btw = $assignmentTotal * 0.21;
    $total = $assignmentTotal + $btw;
    //echo "id: " . $row["id"]. " - titel: " . $row["Titel"]. " " . $row["Worked_hours"]. "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Factuur</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        background: #f4f4f4;
        padding: 40px;
    }

    .invoice {
        max-width: 900px;
        margin: auto;
        background: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 40px;
    }

    .company h1 {
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .company p,
    .customer p {
        line-height: 1.6;
        color: #555;
    }

    .invoice-info {
        text-align: right;
    }

    .invoice-info h2 {
        color: #3498db;
        margin-bottom: 10px;
    }

    .details {
        display: flex;
        justify-content: space-between;
        margin-bottom: 40px;
    }

    .details h3 {
        margin-bottom: 10px;
        color: #2c3e50;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }

    table th {
        background: #3498db;
        color: white;
        padding: 12px;
        text-align: left;
    }

    table td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }

    .totals {
        width: 300px;
        margin-left: auto;
    }

    .totals table {
        margin-bottom: 0;
    }

    .totals td {
        border: none;
        padding: 8px;
    }

    .grand-total {
        font-size: 20px;
        font-weight: bold;
        color: #2c3e50;
    }

    .footer {
        margin-top: 40px;
        text-align: center;
        color: #777;
        font-size: 14px;
    }

    @media print {
        body {
            background: white;
            padding: 0;
        }

        .invoice {
            box-shadow: none;
            border-radius: 0;
        }
    }
</style>
</head>
<body>

<div class="invoice">

    <div class="header">
        <div class="company">
            <h1>bedrijfnaam</h1>
            <p>
                Straatnaam 123<br>
                1234 AB Amsterdam<br>
                Nederland<br>
                info@mijnbedrijf.nl
            </p>
        </div>

        <div class="invoice-info">
            <h2>FACTUUR</h2>
            <p><strong>Factuurnummer:</strong> <?php echo $opdrachtId; ?></p>
            <p><strong>Factuurdatum:</strong> <?php echo $assignmentDate->format('d-m-Y');?></p>
            <p><strong>Vervaldatum:</strong> <?php echo $expireDate->format('d-m-Y');?></p>
        </div>
    </div>

    <div class="details">
        <div class="customer">
            <h3>Factuur aan</h3>
            <p>
                <?php echo $customerName; ?><br>
                <?php echo $customerAddress; ?><br>
                <?php echo $customerPostal; ?><br>
                <?php echo $customerCountry; ?>
            </p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Omschrijving</th>
                <th>Aantal</th>
                <th>Prijs</th>
                <th>Totaal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $title; ?></td>
                <td>€ <?php echo $assignmentAmount; ?></td>
                <td>€ <?php echo $assignmentPrice; ?></td>
                <td>€ <?php echo $assignmentTotal; ?></td>
            </tr>
        </tbody>
    </table>

    <div class="totals">
        <table>
            <tr>
                <td>Subtotaal:</td>
                <td>€ <?php echo $subTotal; ?></td>
            </tr>
            <tr>
                <td>BTW (21%):</td>
                <td>€ <?php echo $btw; ?></td>
            </tr>
            <tr class="grand-total">
                <td>Totaal:</td>
                <td>€ <?php echo $total; ?></td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>
            Bedankt voor uw opdracht.<br>
            Gelieve het factuurbedrag binnen 14 dagen over te maken.
        </p>
    </div>

</div>

</body>
</html>