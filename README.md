# 📌 Instruções para Gerar o Relatório do PHPCompatibility

## 🛠 Passo 1: Configurar a Pasta de Relatórios
Baixe ou copie a pasta `check_code_reports` para a raiz do projeto.

## 🚀 Passo 2: Executar os Comandos
No terminal, execute os seguintes comandos na raiz do projeto:

### 1️⃣ Construir a imagem Docker
```bash
docker build -t php-check-code check_code_reports/
```

### 2️⃣ Executar o PHP_CodeSniffer e gerar o relatório CSV
```bash
docker run --rm -v $(pwd):/app php-check-code phpcs -p --standard=check_code_reports/phpcs_conf.xml
```

### 3️⃣ Executar o Phan e gerar o relatório CSV
```bash
docker run --rm -v $(pwd):/app php-check-code phan --config-file /app/check_code_reports/phan/phan-config.php --output-mode csv --output /app/check_code_reports/phan/csv/phan-report.csv
```

### 📄 Passo 3: Localização do Relatório
```bash
check_code_reports/phpcompatibility/csv
check_code_reports/phan/csv
```

### 📤 Passo 4: Envio do Relatório
Encaminhe o arquivo gerado no Passo 3 para o responsável pelo código.
