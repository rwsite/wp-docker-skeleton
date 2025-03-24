# WordPress + Composer + Docker

Skeleton

## Install

1. Установить через docker `docker-compose up -d `
2. Поменять конфиг в корне из `wp-config.example.php` в `wp-config.php`
3. Войти в контейнер: `docker-compose exec php bash`
4. Запустить установку WordPress в php контейнере`composer install`
5. Ввести Github token для установки приватных пакетов

Домен по-умолчанию забинден домен `site.local` для доступа по нему, нужно добавить домен в файл hosts вашей ОС.

### Для разработки плагинов с использованием submodules

Для разработки нескольких плагинов одновременно удобно использовать git submodules.

#### Install git submodules

Установка уже добавленных субмодулей:   
`git submodule sync --recursive`    
`git submodule update --init --recursive`   
`git submodule update --remote --rebase`    
Restart IDE !!!

#### Добавить субмодуль:

`git submodule add https://github.com/rwsite/wp-term-thumbnail-plugin.git wp-content/plugins/wp-term-thumbnail-plugin`

#### Удаление субмодуля

`git submodule deinit -f wp-content/plugins/wp-term-thumbnail-plugin`
`git rm -f wp-content/plugins/wp-term-thumbnail-plugin`
`rm -rf .git/modules/wp-content/plugins/wp-term-thumbnail-plugin`

#### Remove submodules system

`rm -rf dir` - удаление директории субмодуля    
`git rm -r codestar-framework` - удаление директории из индекса

### Для разработки тем

Для тем на базе [underscore](https://github.com/automattic/_s)

_**Как работать с gulp**_   
Убедиться что установлен nodejs.    
Открываем папку темы в консоле: `cd wp-content/themes/theme`    
Установим gulp глобально: `npm install --global gulp-cli`   
Установим зависимости проекта: `npm install`    
Запускаем команду по дефолту (watch + browser sync): `gulp`

### Примечания:

Создание ssl:   
` openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout ./docker/nginx/ssl/selfsigned.key -out ./docker/nginx/ssl/selfsigned.crt`   