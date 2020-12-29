<h1>Contacts and Companies</h1>
<button class="btn btn-primary"><a href="index" style="color: white;">View Contacts</a></button>
<table>
    <tr>
        <th>Contact Id</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Company ID</th>
        <th>Company Name</th>
        <th>Company Address</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->
    <?php foreach ($rows as $row): ?>
    <tr>
        <td>
            <?= $row['Contacts__id'] ?>
        </td>
        <td>
            <?= $row['Contacts__first_name']." ".$row['Contacts__last_name'] ?>
        </td>
        <td>
            <?= $row['Contacts__phone_number'] ?>
        </td>
        <td>
            <?= $row['Companies__id'] ?>
        </td>
        <td>
            <?= $row['Companies__company_name'] ?>
        </td>
        <td>
            <?= $row['Companies__address'] ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
