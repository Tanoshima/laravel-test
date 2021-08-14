# laravel-test

## 1. 環境について

### バージョン

```
PHP 8.0.8
Laravel 8.49.2
Mysql 8.0
```

## 2. 環境構築

### laravel のインストール(初回のみ)

```
# Composerでのインストール
composer create-project laravel/laravel example-app
```


### phpパッケージのインストール(laravelインストール後に環境構築する場合)

```
$ cd docker
$ docker-compose run --rm backend composer install
```

## 3. 開発環境の立ち上げ

### Dockerの起動

laravelとMysqlを起動する

```
$ cd docker
$ docker-compose up backend
$ docker-compose up database
```
