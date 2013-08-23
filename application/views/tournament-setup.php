<!DOCTYPE html>

<?php
    $con = mysqli_connect("localhost", "root@localhost", "carbon nitrogen oxygen", "scorekeeper");

    //Will display relevant MySQL error upon connection attempt
    if (msqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $filters = array(
        "tournament-name" => array (
            "filter" => FILTER_SANITIZE_STRING
            ),
        "city" => array (
            "filter" => FILTER_SANITIZE_STRING
            ),
        "state" => array (
            "filter" => FILTER_SANITIZE_STRING
            ),
        "country" => array (
            "filter" => FILTER_SANITIZE_STRING
            ),
        "date" => array (
            "filter" => FILTER_SANITIZE_SPECIAL_CHARS
            ),
        "packet-id" => array (
            "filter" => FILTER_SANITIZE_STRING
            ),
        "power-value" => array (
            "filter" => FILTER_VALIDATE_INT,
            "options" => array (
                "min-range" => 1,
                "max-range" => 100
                )
            ),
        "neg-value" => array (
            "filter" => FILTER_VALIDATE_INT,
            "options" => array (
                "min-range" => -100,
                "max-range" => -1
                )
            ),
        "tossup-value" => array (
            "filter" => FILTER_VALIDATE_INT,
            "options" => array (
                "min-range" => 1,
                "max-range" => 100
                )
            )
        );

    $filter_results = filter_input_array(INPUT_POST, $filters);
    $clean = true;

    if (!$results["power-value"]) {
        echo ("Power Value must be a number between 1 and 100.<br>");
        $clean = false;
    }
    if (!$results["neg-value"]) {
        echo ("Neg Value must be a number between -1 and -100.<br>");
        $clean = false;
    }
    if(!$results["tossup-value"]) {
        echo ("Tossup Value must be a number between 1 and 100.<br>");
        $clean = false;
    }

    /*
    $tourn_name = $_POST['tournament-name'];
    $city_name = $_POST['city'];
    $state_name = $_POST['state'];
    $country_name = $_POST['country'];
    $date_time = $_POST['date'];
    $packet_id = $_POST['packet'];

    //Ensuring a positive "power value" and positive "tossup value"
    $positive_power = abs($_POST['power-value']);
    $positive_tossup = abs($_POST['tossup-value']);

    //Ensuring a negative "neg value"
    $negative_value = -1 * abs($_POST['neg-value']);
    */

    //NEED TO DO: change the database columns to correctly reflect what we want to track
    if (!$clean) {
        $sql = "INSERT INTO scorekeeper (name, city, state, country, date_info, packet_id, power_value, neg_value, tossup_value, prelim_rounds)
            VALUES ('$_POST[tournament-name]', '$_POST[city]', '$_POST[state]', '$_POST[country]', '$_POST[date]',
                '$_POST[packet]', '$_POST[power-value]', '$_POST[neg-value]', '$_POST[tossup-value]', 1)";

        if (!mysql_query($con, $sql)) {
            die ('Error' . mysqli_error($con));
        }
    }

    //Close connection
    mysql_close($con);
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="tournament-setup.css">
        <meta name="description" content="Quizbowl tornament setup">
    </head>
    <body>
        <div id="tournament-setup-title">
            Tournament Setup
        </div>
        <!--NEED TO DO: change action to correct url-->
        <!--NEED TO DO: are we using post method?-->
        <!--NEED TO DO: how specific of a location?-->
        <form action="tournament-setup.php" method="post">
            <table id="form-table">
                <tr>
                    <td>
                        <label for="tournament-name">Tournament</label>
                    </td>
                    <td>
                        <input type="text" name="tournament-name" placeholder="Name">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="location">Location</label>
                    </td>
                    <td>
                        <input type="text" name="city" placeholder="City">
                    </td>
                </tr>

                <tr>
                    <td>
                    </td>
                    <td>
                        <input type="text" name="state" placeholder="State">
                    </td>
                </tr>

                <tr>
                    <td>
                    </td>
                    <td>
                        <input type="text" name="country" placeholder="Country">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="date">Date</label>
                    </td>
                    <td>
                        <input type="date" name="date" placeholder="mm/dd/yyyy">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="packet">Packet</label>
                    </td>
                    <td>
                        <input type="text" name="packet" placeholder="Packet ID">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="power-value">Power Value</label>
                    </td>
                    <td>
                        <input type="number" name="power-value" value="15">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="neg-value">Neg Value</label>
                    </td>
                    <td>
                        <input type="number" name="neg-value" value="-5">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="tossup-value">Tossup Value</label>
                    </td>
                    <td>
                        <input type="number" name="tossup-value" value="10">
                    </td>
                </tr>

            </table>
            <div id="finished-submit">
                <input type="submit" value="Finished" name="finished">
            </div>
        </form>
    </body>
</html>

<!--https://kuler.adobe.com/create/color-wheel/?base=2&rule=Custom&selected=0&name=My%20Kuler%20Theme&mode=rgb&rgbvalues=0.83,0.7300977732949541,0.5157866807104772,0.4309371034652502,0.66,0.5894879430767677,1,1,1,0.91,0.5337148942521613,0.49899780169979596,0.36047265238927295,0.54,0.315110989819059-->
<!--https://kuler.adobe.com/create/color-wheel/?base=2&rule=Custom&selected=4&name=My%20Kuler%20Theme&mode=rgb&rgbvalues=0.0824338293472303,0.2170932435069375,0.34,0.546031746031746,0.8281481481482392,0.86,1,1,1,0.9,0.5384252287641574,0.46268087757530896,0.34,0.08011631335144798,0.09207780701856683-->
