<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        * {
            box-sizing: border-box;
        }
        .column {
            float: left;
            width: 50%;
            padding: 10px;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }
        }
    </style>
    <meta charset="UTF-8">
    <title>Aplicacion Grupo 12</title>
</head>

<body>
<div class="row">
    <div class="column" style="background-color:#aaa;">
        <h2>Column 1</h2>
        <p>
        <ul>
            <li>
                Consulta n°1: <br><br>
                <form action="q1.php" method="post">
                    Parametro 1:
                    <input type="text" name="Parametro_1"><br><br>
                    parametro 2:
                    <input type="text" name="Parametro_2"><br><br>
                    <input type="submit"><br><br>
                </form>
            </li>
            <li>
                Consulta n°1: <br><br>
                <form action="q1.php" method="post">
                    Parametro 1:
                    <input type="text" name="Parametro_1"><br><br>
                    parametro 2:
                    <input type="text" name="Parametro_2"><br><br>
                    <input type="submit"><br><br>
                </form>
            </li>
        </ul></p>

    </div>
    <div class="column" style="background-color:#bbb;">
        <h2>Column 2</h2>
        <p>
        <ul>
            <li>
                Consulta n°1: <br><br>
                <form action="q1.php" method="post">
                    Parametro 1:
                    <input type="text" name="Parametro_1"><br><br>
                    parametro 2:
                    <input type="text" name="Parametro_2"><br><br>
                    <input type="submit"><br><br>
                </form>
            </li>
            <li>
                Consulta n°1: <br><br>
                <form action="q1.php" method="post">
                    Parametro 1:
                    <input type="text" name="Parametro_1"><br><br>
                    parametro 2:
                    <input type="text" name="Parametro_2"><br><br>
                    <input type="submit"><br><br>
                </form>
            </li>
        </ul>
        </p>
    </div>
</div>

</body>
</html>

