<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <table>
        {days}
        <tr>
            <th>
                {dayofweek}
            </th>
        </tr>
        <tr>
            {daybooking}
            <td>
                {time}
            </td>
            {/daybooking}
        </tr>
        {/days}
    </table>
</body>
</html>
