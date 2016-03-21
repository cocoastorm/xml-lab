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
    <table width="100%" border="1">
        {days}
        <tr>
            <th colspan="4" bgcolor="#9acd32">

                {dayofweek}
            </th>
        </tr>
        <tr>
            <th width="25%">Time</th>
            <th width="25%">Course</th>
            <th width="25%">Room</th>
            <th width="25%">Instructor</th>

        </tr>
        {daybooking}

        <tr>
            <td>
                {time}
            </td>
            <td>
                {courseName}
            </td>
            <td>
                {room}
            </td>
            <td>
                {instructor}
            </td>
        </tr>
        {/daybooking}

        {/days}
    </table>

<br><br>

    <table width="100%" border="1">
        {courses}
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
        {coursebooking}

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
        {/coursebooking}

        {/courses}
    </table>

<br><br>

    <table width="100%" border="1">
        {periods}
        <tr>
            <th colspan="4" bgcolor="#add8e6">

                {time}
            </th>
        </tr>
        <tr>
            <th width="25%">Week Day</th>
            <th width="25%">Course Name</th>
            <th width="25%">Room</th>
            <th width="25%">Instructor</th>

        </tr>
        {periodbooking}

        <tr>
            <td>
                {weekday}
            </td>
            <td>
                {courseName}
            </td>
            <td>
                {room}
            </td>
            <td>
                {instructor}
            </td>
        </tr>
        {/periodbooking}

        {/periods}
    </table>


</body>
</html>
