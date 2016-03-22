<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
</head>
<body>




        <table width="100%" border="1">
            <tr>
                <th colspan="4" bgcolor="#f08080">

                    {code}
                </th>
            </tr>
            <tr>
                <th width="25%">Week Day</th>
                <th width="25%">Time</th>
                <th width="25%">Room</th>
                <th width="25%">Instructor</th>

            </tr>

            <tr>
                <td>
                    {weekday}
                </td>
                <td>
                    {time}
                </td>
                <td>
                    {room}
                </td>
                <td>
                    {instructor}
                </td>
            </tr>

        </table>
        <br>
        <br>

        <a href="/">Back</a>
</body>
</html>
