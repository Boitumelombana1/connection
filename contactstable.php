 <?php
try {

    $con = new PDO(
        'mysql:host=localhost;
        dbname=pdo;
        username',
        'root',
        ''
    );

   
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $query = "SELECT * FROM contacts";
    $data = $con->query($query);


    $rows = $data->fetchAll(PDO::FETCH_ASSOC);


    echo "<table border='1' cellpadding='8' cellspacing='0'>";


    if (!empty($rows)) {
        echo "<tr>";

        foreach (array_keys($rows[0]) as $field) {
            echo "<th>" . htmlspecialchars($field) . "</th>";
        }

        echo "</tr>";

      
        foreach ($rows as $row) {
            echo "<tr>";

            foreach ($row as $value) {
                echo "<td>" .
                    htmlspecialchars((string) $value) .
                    "</td>";
            }

            echo "</tr>";
        }
    } else {
        echo "<tr><td>No contacts found.</td></tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "ERROR: " . htmlspecialchars($e->getMessage());
}
?>