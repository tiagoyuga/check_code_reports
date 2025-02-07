# Usa uma imagem base do PHP com o Composer instalado
FROM composer:2 AS composer

# Instala o PHP_CodeSniffer, PHPCompatibility e Phan via Composer
RUN composer global config --no-plugins allow-plugins.dealerdirect/phpcodesniffer-composer-installer true
RUN composer global require squizlabs/php_codesniffer dealerdirect/phpcodesniffer-composer-installer phpcompatibility/php-compatibility phan/phan

# Usa uma imagem base do PHP para o ambiente final
FROM php:8.3-cli-alpine

# Instala dependências necessárias para compilar extensões PHP
RUN apk add --no-cache \
    libzip-dev \
    libxml2-dev \
    git \
    unzip \
    gcc \
    g++ \
    make \
    autoconf \
    libc-dev

# Instala a extensão php-ast via PECL
RUN pecl install ast && echo "extension=ast.so" > /usr/local/etc/php/conf.d/ast.ini

# Define o limite de memória do PHP
RUN echo "memory_limit=-1" > /usr/local/etc/php/conf.d/memory-limit.ini

# Copia o PHP_CodeSniffer, PHPCompatibility e Phan instalados no estágio anterior
COPY --from=composer /tmp/vendor /usr/local/lib/php/vendor

# Adiciona o diretório de binários do Composer ao PATH
ENV PATH="/usr/local/lib/php/vendor/bin:${PATH}"

# Configura o PHP_CodeSniffer para reconhecer o PHPCompatibility
RUN phpcs --config-set installed_paths /usr/local/lib/php/vendor/phpcompatibility/php-compatibility

# Define o diretório de trabalho
WORKDIR /app

# Comando padrão: exibe a versão do PHP_CodeSniffer, PHPCompatibility e Phan
CMD ["bash", "-c", "phpcs --version && phan --version"]
