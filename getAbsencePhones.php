<?php require_once 'include/Connection.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=encoding">
            <link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
        </meta>
    </head>
    <body>
        <?php
        $_GET['MeetingId'] = 2;
        $_GET['currentMeetingId'] = 45;
        $AbsentMembers = new Connection();
        $AbsentMembers->Query("SELECT * 
                            FROM membermeeting, person 
                            WHERE  membermeeting.meetingId = {$_GET['MeetingId']} AND  
                                   person.id=memberid  AND 
                                   memberid  NOT IN (
                                                        SELECT memberid FROM meetingattendance WHERE  
                                                        meetingattendance.weeklyMeetingId = {$_GET['currentMeetingId']}
                                                    )
                            ORDER BY FirstName;
							");
        ?>

        <table class="attendanceTable" align="center" cellpadding="10px" width="400px" >
            <tr class="attendanceHeader highLight" >
                <td></td>
                <td>
                    <strong> Name </strong>
                </td>

                <td>
                    <strong>Phone</strong>
                </td>

            </tr>

            <?php
            $i = 1;
            foreach ($AbsentMembers->Results as $person) {
                if ($person["Phone"] == "")
                    continue;
                if ($person["MF"] == 1)
                    continue;
                ?>
                <tr class='attendanceCell ' >
                    <td><?php echo $i++; ?></td>
                    <td class='fn attendanceCell'>
                        <strong>
                            <?php echo $person["FirstName"] . " " . $person["LastName"]; ?>
                        </strong>
                    </td>
                    <td>
                        <?php
                        if ($person["Phone"] == "")
                            echo " ";
                        echo $person["Phone"]
                        ?>
                    </td>

                </tr>

                <?php
            }
            ?>
        </table>


        <table class="attendanceTable" align="center" cellpadding="10px" width="400px" >
            <tr class="attendanceHeader highLight" >
                <td></td>
                <td>
                    <strong> Name </strong> 
                </td>

                <td>
                    <strong>Phone</strong>
                </td>

            </tr>

            <?php
            $i = 1;
            foreach ($AbsentMembers->Results as $person) {
                if ($person["Phone"] == "")
                    continue;
                if ($person["MF"] == 0)
                    continue;
                ?>
                <tr class='attendanceCell ' >
                    <td><?php echo $i++; ?></td>
                    <td class='fn attendanceCell'>
                        <strong>
                            <?php echo $person["FirstName"] . " " . $person["LastName"]; ?>
                        </strong>
                    </td>
                    <td>
                        <?php
                        if ($person["Phone"] == "")
                            echo " ";
                        echo $person["Phone"]
                        ?>
                    </td>

                </tr>

                <?php
            }
            ?>
        </table>
    </body>
</html>
