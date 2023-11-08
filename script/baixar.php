<?php
$nome_arquivo = 'velocidadeFastVelocidade.exe'; // Substitua pelo nome do arquivo no seu diretório
$caminho_arquivo = './' . $nome_arquivo; // Substitua pelo caminho para o seu diretório

if (file_exists($caminho_arquivo)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $nome_arquivo . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($caminho_arquivo));
    readfile($caminho_arquivo);
    exit;
} else {
    echo "Arquivo não encontrado.";
}
?>
