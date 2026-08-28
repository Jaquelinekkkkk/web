<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Turma</title></head>
<body>
<h1>Notas da turma</h1>
<?php
$turma = [
        ["nome" => "Ana Souza", "curso" => "ADS", "nota" => 8.5],
        ["nome" => "Bruno Lima", "curso" => "ADS", "nota" => 7.0],
        ["nome" => "Carla Nunes", "curso" => "PG", "nota" => 9.2],
        ["nome" => "Carlos Santos", "curso" => "PG", "nota" => 0.0],
        ["nome" => "Bruna Lemos", "curso" => "DM", "nota" => 2.0],
        ["nome" => "André Silva", "curso" => "MA", "nota" => 6.0],
    ];
//funcao
function situacao_nota($nota){
if ($nota <6) return "Reprovado";
if ($nota >=6) return "Aprovado";

}
function conceito($nota) {
if ($nota >= 9) return "A";
if ($nota >= 7) return "B";
return "C";
}

function media($turma) {
     $soma = 0;
    foreach ($turma as $aluno):
        $soma += $aluno["nota"];
    endforeach;
        $media = $soma/count($turma);    
    return $media;
}
function aluno_curso($curso, $turma) {
    $qtd = 0;

    foreach ($turma as $aluno):
        if($aluno["curso"] == $curso){
            $qtd +=1;
        }
    endforeach;
    return $qtd;
}

?>
<?php
$ads = 0;
$pg = 0;
$ma= 0;
$dm = 0;
?>
<h2>Alunos por curso</h2>
<ul>
    <li>Ads: <?= aluno_curso('ADS', $turma) ?> alunos</li>
    <li>PG: <?= aluno_curso('PG', $turma) ?> alunos</li>
    <li>MA: <?= aluno_curso('MA', $turma) ?> alunos</li>
    <li>DM: <?= aluno_curso('DM', $turma) ?> alunos</li>
</ul>

<table border="1" cellpadding="6">
 <tr><th>Nome</th><th>Curso</th><th>Nota</th><th>Conceito</th><th>Situacao</th></tr>
<!--ta contando os alunos de cada curso -->
<?php foreach ($turma as $aluno): ?>
    <?php 
    if ($aluno["curso"] ==  "ADS"){
        $ads +=1;
    }
    elseif ($aluno["curso"] == "PG") {
        $pg +=1;
    }
    elseif ($aluno["curso"] == "DM") {
        $dm +=1;
    }
    elseif ($aluno["curso"] == "MA") {
        $ma +=1;
    }
    endforeach; 
?>


<?php foreach ($turma as $aluno): ?>
 <tr>
 <td><?= $aluno["nome"] ?></td>
 <td><?= $aluno["curso"] ?></td>
 <td><?= $aluno["nota"] ?></td>
 <td><?= conceito($aluno["nota"]) ?></td>
  <?php if ($aluno["nota"] >= 6): ?>
        <td style="background:#cfc"><?= situacao_nota($aluno["nota"]) ?></td>
    <?php else: ?>
        <td><?= situacao_nota($aluno["nota"]) ?></td>
    <?php endif; ?>

 </tr>
<?php endforeach; ?>
<tr><th>Média da turma <?= media($turma) ?></th></tr>
</table>
<p>Total: <?= count($turma) ?> alunos</p>
</body>
</html>