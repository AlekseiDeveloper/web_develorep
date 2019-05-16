## О том как запустить

Настройка окружения

1)Нужно зайти в git bash и указать путь для той папки где у вас лежат проэкты, после копируем вот этот
код: <strong>    git clone https://github.com/AlekseiDeveloper/site-developer.git </strong> или скачать архив, после установки будет создаться папка <b>site-developer</b>.

2)После как проэкт склонировался вам понадобяться следующие команда
котрая установить все сависимости проэкта: <b>php composer.phar install</b>

3)Необходимо зайти в корень проекта и
 задать <strong> .env </strong> file и настроить его для связи с базой данных которую вы хотите использовать (настройки должны содержать подключение к вашей базе данных использующую squel). база должна быть создана в кодировке utf8_geniral_ci .
 
4)Затем создаем все миграции для нашей базы, команда для создания таблиц: <b> php artisan migrate </b> 

5)Чтобы заполнить таблицы данными нужно воспользоваться этой командой: <b> php artisan db:seed </b>

6)B используем эту команду для создания сервера: <b>php artisan serve</b>

После можите зайти на сайт и посмотреть результат выполненых команд или посмотреть их выполнение в базах данных.

7)Заходим на сайт что бы зайти с правами admin вам понадобится, login: <b> admin@mail.ru </b> , password: <b> 123123123 </b>.

 или можете зарегистрировать нового пользователя и попасть в личный кабинет.
 

