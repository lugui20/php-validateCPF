<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPF validation</title>
    <style>
        body {
            background-color: #F0F0F0;
            padding-top: 15px;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.5;
        }

        input[type=text]  {
            border: 1px solid #777777;
            padding: 8px 8px;
            background: #F0F0F0;
            font-size: 16px;
        }

        input[type=submit] {
            cursor: pointer;
            width: 120px;
            padding: 6px 6px;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0px 0px 5px #777777;
            background-color: cornflowerblue;
            border: 1px solid #777777;
        }
    </style>
</head>

<body>
    <?php
        include_once("function.validateCPF.php");

        if (!isset($_POST["cpf"])) {
            $msg = "CPF is empty";
        } else {
            if (!is_string($_POST["cpf"])) {
                $msg = "Invalid input";
            } else {
                $strCPF = preg_replace("/[^0-9]/", "", $_POST["cpf"]);

                if (!validateCPF($strCPF)) $msg = "CPF " . $strCPF . " is not valid";
                else $msg = "CPF " . $strCPF . " is valid";
            }
        }
    ?>
    <div style="text-align: center;">
        <div>
            <b><?= $msg ?></b>
        </div>
        <form action="./index.php" method="post">
            <div>
                <b>Please, enter CPF to validate (only numbers):</b>
            </div>
            <div>
                <input type="text" size="11" name="cpf" placeholder="Enter CPF" id="cpf" required>
                <input type="submit" name="submit" value="Submit" class="button-submit">
            </div>
        </form>
    </div>
</body>

</html>