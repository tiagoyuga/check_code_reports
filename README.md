####Instruções para gerar o Relatório do PHPCompatibility
#1 - colar/baixar a pasta check_code_reports na raiz do projeto
#2 - executar os seguintes comandos:
	- docker build -t phpcompatibility check_code_reports/
	- docker run --rm -v $(pwd):/app phpcompatibility phpcs -p --standard=check_code_reports/phpcs_conf.xml

#3 - Será gerado um relatório csv dentro da pasta phpcompatibility/logs/logs.csv
#4 - o relatório gerado na étapa 3 deverá ser encaminhado para o responsável.
------------------------------------------------------------------------------
