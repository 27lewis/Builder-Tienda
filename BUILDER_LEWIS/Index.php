<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seleccionar Portátil</title>
    <style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #0d1117;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #e6edf3;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}


.header {
    background-color: #161b22;
    color: #58a6ff;
    padding: 30px;
    text-align: center;
    font-size: 32px;
    font-weight: bold;
    border-bottom: 1px solid #30363d;
    box-shadow: 0 2px 8px rgba(0,0,0,0.6);
}


.content {
    flex-grow: 1;
    margin: 40px auto;
    width: 95%;
    max-width: 600px;
    background-color: #1c2128;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
    transition: all 0.3s ease-in-out;
}


.box {
    background-color: #21262d;
    padding: 25px;
    border-radius: 12px;
    text-align: center;
    border: 1px solid #30363d;
}


label {
    font-size: 18px;
    display: block;
    margin-bottom: 15px;
    color: #c9d1d9;
}


select, input[type="submit"] {
    padding: 12px 20px;
    font-size: 16px;
    border-radius: 8px;
    border: none;
    outline: none;
    margin-top: 10px;
    width: 80%;
    max-width: 300px;
    transition: 0.3s ease;
}

select {
    background-color: #2d333b;
    color: #e6edf3;
    border: 1px solid #444c56;
}

input[type="submit"] {
    background-color: #238636;
    color: white;
    font-weight: bold;
    cursor: pointer;
    margin-top: 20px;
}

input[type="submit"]:hover {
    background-color: #2ea043;
}


.resultado {
    margin-top: 30px;
    background-color: #21262d;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    font-size: 18px;
    border: 1px solid #30363d;
    box-shadow: inset 0 0 10px rgba(0,0,0,0.3);
    color: #adbac7;
    }

    </style>
</head>
<body>

    <div class="header">
        Nombre del sistema: Selección de Portátiles
    </div>

    <div class="content">
        <div class="box">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="tipo">Seleccione portátil:</label>
                <select name="tipo" id="tipo">
                    <option value="Envy">Envy</option>
                    <option value="Pavilion">Pavilion</option>
                </select><br>
                <input type="submit" value="BUSCAR">
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tipo = $_POST['tipo'];
            require "Clases.php";

            $PCdir = new PCDirector();

            if ($tipo == "Envy") {
                $PCdir->PCBuilder = new EnvyBuilder();
            } else {
                $PCdir->PCBuilder = new PavilionBuilder();
            }

            $PCdir->constructPC();
            $PC = $PCdir->getPC();

            echo "<div style='margin-top:20px; text-align:center;'><strong>Resultado:</strong><br>$PC</div>";
        }
        ?>
    </div>

</body>
</html>
