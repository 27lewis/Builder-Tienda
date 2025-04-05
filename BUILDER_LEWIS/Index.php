<!DOCTYPE html>
<html lang="es">
    <body>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
           <center> seleccione portatil: <select name="tipo">
                <option>Envy</option>
                <option>Pavilion</option>
            </select>
            <input type="submit" value="BUSCAR">
        </form>
    </body>
</html>


<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $tipo = $_POST['tipo'];
        require "Clases.php";


        if($tipo == "Envy"){

            $PCdir= new PCDirector();

            $PCdir->PCBuilder= new EnvyBuilder();

            $PCdir->constructPC();

            $PC= $PCdir->getPC();

            echo $PC;
        }

        else{
            
            $PCdir= new PCDirector();

            $PCdir->PCBuilder= new PavilionBuilder();

            $PCdir->constructPC();

            $PC= $PCdir->getPC();

            echo $PC;
        }
    }

?>


