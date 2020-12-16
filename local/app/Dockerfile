FROM amazonlinux:2.0.20200722.0
MAINTAINER hirokikojima

# PHPとPHP-FPMのインストール
RUN amazon-linux-extras install php7.3

# 依存ライブラリのインストール
RUN yum update -y && yum install -y \
        git \ 
        zlib-devel \
        gmp-devel \
        libmcrypt \
        libpng-devel \
        libxml2-devel \
        libmcrypt-devel

# extensionのインストール
RUN yum install -y \
        php-bcmath \
        php-mbstring \
        php-pdo \
        php-pdo_mysql \
        php-tokenizer \
        php-xml

#Composerのインストール
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

WORKDIR /var/www