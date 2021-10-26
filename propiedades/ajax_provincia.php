<?php 
    include '../conexion/conexion.php';
    $departamento = htmlentities($_POST['departamento']);
?>
    <select id="provincia" name="provincia" required="">
                <option value="" disabled selected>SELECCIONA UNA PROVINCIA</option>
                <?php $sel_pro =$con->prepare("SELECT * FROM provincias WHERE iddepartamentos = ? ");
                $sel_pro->bind_param('i',$departamento);
                $sel_pro->execute();

                $res_pro = $sel_pro->get_result();
                while($f_pro=$res_pro->fetch_assoc()) { ?>
                <option value="<?php echo $f_pro['provincia'] ?>"><?php echo $f_pro['provincia'] ?></option>
                <?php }
                $sel_pro->close();
                 ?>
    </select>
    
    <script>
            $(document).ready(function(){
            $('select').formSelect();
            });
    </script>