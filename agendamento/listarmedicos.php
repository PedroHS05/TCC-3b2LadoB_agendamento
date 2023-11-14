<?php
$stmt = "select * from tbmedicos;";
$resultado = mysqli_query($conn,$stmt);
if(mysqli_num_rows($resultado)>0){
    while($linha=mysqli_fetch_assoc($resultado)){
        echo "<option value='".$linha['cpf']."'>".$linha['nome'].' - '. $linha['especialidade']."</option>";
    }
}else{
    echo "<option value=''>Não há médicos cadastrados</option>";
}
?>