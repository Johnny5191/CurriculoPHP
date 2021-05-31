
<?php
     ini_set('default_charset', 'utf-8');
     if($_POST){
     $nome = $_POST['nome'];
     $rg = $_POST['rg'];
     $cpf = $_POST['cpf'];
     $email = $_POST['email'];
     $profissao = $_POST['profissao'];
     $date = $_POST['idade']; 
     $endereco = $_POST['endereco'];
     $tell = $_POST['tell']; 
     $cidade = $_POST['cidade'];
     $estado = $_POST['estado'];
     $estadocivil = $_POST['estadocivil'];
     $filho = $_POST['filho'];
     $experiencias = $_POST['experiencias'];
     $objetivos = $_POST['objetivos'];
     $referencias = $_POST['referencias'];
     $escolaridade = $_POST['escolaridade'];
     $arquivo = $_FILES['foto']['name'];

      // calcular idade da pessoa

function calcularIdade($date){
    $date = date('Y-m-d', strtotime(str_replace("/", "-", $idade)));
            $time = strtotime($date);

            if($time === false){
                return '';
            }
            $year_diff = '';
            $date = date('Y-m-d', $time);

            list ($year, $month, $day) = explode('-', $date);

            $year_diff = date('Y') - $year;
            $month_diff = date('m') - $month;
            $day_diff = date('d') -$day;

            if ($day_diff < 0 && $month_diff < 0 || $month_diff < 0){
                $year_diff--;
            }
            return $year_diff;

            echo "Seu nome é $nome, você tem ".calcularIdade($date)." anos.";
        }

            // capturar imagem
            if(isset($_FILES['foto']))
                {
                    $ext = strtolower(substr($_FILES['foto']['name'],-4));
                    $new_name = $_POST['nome'].$ext;
                    $dir = 'img/';

                    move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$new_name);
                }

                //nome do arquivo
                $a = "$nome.html";
            $arquivo = fopen($a, 'a+');

                $html = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="php.css">
                    <script src="https://kit.fontawesome.com/24cb2eafe1.js" crossorigin="anonymous"></script>
                    <title>Document</title>
                </head>
                <body>
                       <div class="container">
                            <menu><h1>Curriculo</h1></menu>    
                        </div>
                        <div class="div">
                            <br>
                            <lh>
                                <!--<img src="img/'.$dir.$new_name.'" class="image">-->
                                <img src="img/gg.jpg" class="image">
                            </lh>
                            
                            
                            <rh>
                                <h3>Nome: '.$nome.'</h3>
                                <h3>RG: '.$rg.'</h3>
                                <h3>CPF: '.$cpf.'</h3>
                                <h3>Idade: '.calcularIdade($date).'</h3>
                                <h3>Email: '.$email.'</h3>
                                <h3>Telefone: '.$tell.'</h3>
                                <h3>Endereço: '.$endereco.'</h3>
                                <h3>Cidade: '.$cidade.'</h3>
                                <h3>Estado: '.$estado.'</h3>
                                <h3>Profissão:'.$profissao.'</h3>       
                            </rh>       
                        </div></div>
                        <div class="cc">
                                <h4>Experiências Profisionais:<br>'.$experiencias.'</h4><br><br>
                                <h4>Experiências Referências:<br>'.$referencias.'</h4><br><br>
                                <h4>Experiências Objetivos:<br>'.$objetivos.'</h4><br><br>

                        </div>
                        
                    
                </body>
                </html>';
            fwrite($arquivo,$html);

                //fechar o arquivo
                fclose($arquivo);

                echo $html;
    }
?>
