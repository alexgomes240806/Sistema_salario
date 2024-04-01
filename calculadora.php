!DOCTYPE html>
<html>
<head>
<title>Calculadora de Salário</title>
</head>
<body>
<h2>Calculadora de Salário</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<label for="nome">Nome do Vendedor:</label>
<input type="text" id="nome" name="nome"><br><br>
<label for="meta_semanal">Meta Semanal (R$):</label>
<input type="number" id="meta_semanal" name="meta_semanal"><br><br>
<label for="meta_mensal">Meta Mensal (R$):</label>
<input type="number" id="meta_mensal" name="meta_mensal"><br><br>
<input type="submit" value="Calcular Salário">
</form>
 
    <?php
    // Verifica se os dados foram enviados pelo formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os valores enviados
        $nome = $_POST['nome'];
        $metaSemanal = $_POST['meta_semanal'];
        $metaMensal = $_POST['meta_mensal'];
 
        // Define o salário base do vendedor
        $salarioBase = 2000; // Exemplo de salário base (pode ser ajustado conforme necessário)
 
        // Verifica se o vendedor atingiu a meta semanal
        if ($metaSemanal >= 20000) {
            $bonusSemanal = 0.01 * $metaSemanal; // 1% da meta semanal atingida como bônus
        } else {
            $bonusSemanal = 0; // Sem bônus se a meta semanal não for atingida
        }
 
        // Verifica se o vendedor atingiu a meta mensal
        if ($metaMensal >= 80000 && $metaSemanal >= 20000) {
            $bonusMensal = 0.1 * ($metaMensal - 80000); // 10% do excesso da meta mensal como bônus
        } else {
            $bonusMensal = 0; // Sem bônus se a meta mensal não for atingida ou se a meta semanal não foi atingida
        }
 
        // Calcula o salário final
        $salarioFinal = $salarioBase + $bonusSemanal + $bonusMensal;
 
        // Exibe o resultado para o usuário
        echo "<h3>Resultado:</h3>";
        echo "<p>Nome do Vendedor: $nome</p>";
        echo "<p>Salário Base: R$ $salarioBase</p>";
        echo "<p>Bônus Semanal: R$ $bonusSemanal</p>";
        echo "<p>Bônus Mensal: R$ $bonusMensal</p>";
        echo "<p>Salário Final: R$ $salarioFinal</p>";
    }
    ?>
</body>
</html>