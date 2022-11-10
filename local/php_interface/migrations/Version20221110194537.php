<?php

namespace Sprint\Migration;


class Version20221110194537 extends Version
{
    protected $description = "";

    protected $moduleVersion = "4.1.2";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Event()->saveEventType('NEW_USER', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Зарегистрировался новый пользователь',
  'DESCRIPTION' => '

#USER_ID# - ID пользователя
#LOGIN# - Логин
#EMAIL# - EMail
#NAME# - Имя
#LAST_NAME# - Фамилия
#USER_IP# - IP пользователя
#USER_HOST# - Хост пользователя
',
  'SORT' => '1',
));
            $helper->Event()->saveEventType('NEW_USER', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'New user was registered',
  'DESCRIPTION' => '

#USER_ID# - User ID
#LOGIN# - Login
#EMAIL# - EMail
#NAME# - Name
#LAST_NAME# - Last Name
#USER_IP# - User IP
#USER_HOST# - User Host
',
  'SORT' => '1',
));
            $helper->Event()->saveEventMessage('NEW_USER', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#DEFAULT_EMAIL_FROM#',
  'SUBJECT' => '#SITE_NAME#: Зарегистрировался новый пользователь',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------

На сайте #SERVER_NAME# успешно зарегистрирован новый пользователь.

Данные пользователя:
ID пользователя: #USER_ID#

Имя: #NAME#
Фамилия: #LAST_NAME#
E-Mail: #EMAIL#

Login: #LOGIN#

Письмо сгенерировано автоматически.',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => 'ru',
  'EVENT_TYPE' => '[ NEW_USER ] Зарегистрировался новый пользователь',
));
            $helper->Event()->saveEventType('USER_INFO', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Информация о пользователе',
  'DESCRIPTION' => '

#USER_ID# - ID пользователя
#STATUS# - Статус логина
#MESSAGE# - Сообщение пользователю
#LOGIN# - Логин
#URL_LOGIN# - Логин, закодированный для использования в URL
#CHECKWORD# - Контрольная строка для смены пароля
#NAME# - Имя
#LAST_NAME# - Фамилия
#EMAIL# - E-Mail пользователя
',
  'SORT' => '2',
));
            $helper->Event()->saveEventType('USER_INFO', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Account Information',
  'DESCRIPTION' => '

#USER_ID# - User ID
#STATUS# - Account status
#MESSAGE# - Message for user
#LOGIN# - Login
#URL_LOGIN# - Encoded login for use in URL
#CHECKWORD# - Check string for password change
#NAME# - Name
#LAST_NAME# - Last Name
#EMAIL# - User E-Mail
',
  'SORT' => '2',
));
            $helper->Event()->saveEventMessage('USER_INFO', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Регистрационная информация',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------
#NAME# #LAST_NAME#,

#MESSAGE#

Ваша регистрационная информация:

ID пользователя: #USER_ID#
Статус профиля: #STATUS#
Login: #LOGIN#

Вы можете изменить пароль, перейдя по следующей ссылке:
http://#SERVER_NAME#/auth/index.php?change_password=yes&lang=ru&USER_CHECKWORD=#CHECKWORD#&USER_LOGIN=#URL_LOGIN#

Сообщение сгенерировано автоматически.',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => 'ru',
  'EVENT_TYPE' => '[ USER_INFO ] Информация о пользователе',
));
            $helper->Event()->saveEventType('NEW_USER_CONFIRM', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Подтверждение регистрации нового пользователя',
  'DESCRIPTION' => '


#USER_ID# - ID пользователя
#LOGIN# - Логин
#EMAIL# - EMail
#NAME# - Имя
#LAST_NAME# - Фамилия
#USER_IP# - IP пользователя
#USER_HOST# - Хост пользователя
#CONFIRM_CODE# - Код подтверждения
',
  'SORT' => '3',
));
            $helper->Event()->saveEventType('NEW_USER_CONFIRM', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'New user registration confirmation',
  'DESCRIPTION' => '

#USER_ID# - User ID
#LOGIN# - Login
#EMAIL# - E-mail
#NAME# - First name
#LAST_NAME# - Last name
#USER_IP# - User IP
#USER_HOST# - User host
#CONFIRM_CODE# - Confirmation code
',
  'SORT' => '3',
));
            $helper->Event()->saveEventMessage('NEW_USER_CONFIRM', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Подтверждение регистрации нового пользователя',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------

Здравствуйте,

Вы получили это сообщение, так как ваш адрес был использован при регистрации нового пользователя на сервере #SERVER_NAME#.

Ваш код для подтверждения регистрации: #CONFIRM_CODE#

Для подтверждения регистрации перейдите по следующей ссылке:
http://#SERVER_NAME#/auth/index.php?confirm_registration=yes&confirm_user_id=#USER_ID#&confirm_code=#CONFIRM_CODE#

Вы также можете ввести код для подтверждения регистрации на странице:
http://#SERVER_NAME#/auth/index.php?confirm_registration=yes&confirm_user_id=#USER_ID#

Внимание! Ваш профиль не будет активным, пока вы не подтвердите свою регистрацию.

---------------------------------------------------------------------

Сообщение сгенерировано автоматически.',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => 'ru',
  'EVENT_TYPE' => '[ NEW_USER_CONFIRM ] Подтверждение регистрации нового пользователя',
));
            $helper->Event()->saveEventType('USER_PASS_REQUEST', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Запрос на смену пароля',
  'DESCRIPTION' => '

#USER_ID# - ID пользователя
#STATUS# - Статус логина
#MESSAGE# - Сообщение пользователю
#LOGIN# - Логин
#URL_LOGIN# - Логин, закодированный для использования в URL
#CHECKWORD# - Контрольная строка для смены пароля
#NAME# - Имя
#LAST_NAME# - Фамилия
#EMAIL# - E-Mail пользователя
',
  'SORT' => '4',
));
            $helper->Event()->saveEventType('USER_PASS_REQUEST', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Password Change Request',
  'DESCRIPTION' => '

#USER_ID# - User ID
#STATUS# - Account status
#MESSAGE# - Message for user
#LOGIN# - Login
#URL_LOGIN# - Encoded login for use in URL
#CHECKWORD# - Check string for password change
#NAME# - Name
#LAST_NAME# - Last Name
#EMAIL# - User E-Mail
',
  'SORT' => '4',
));
            $helper->Event()->saveEventMessage('USER_PASS_REQUEST', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Запрос на смену пароля',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------
#NAME# #LAST_NAME#,

#MESSAGE#

Для смены пароля перейдите по следующей ссылке:
http://#SERVER_NAME#/auth/index.php?change_password=yes&lang=ru&USER_CHECKWORD=#CHECKWORD#&USER_LOGIN=#URL_LOGIN#

Ваша регистрационная информация:

ID пользователя: #USER_ID#
Статус профиля: #STATUS#
Login: #LOGIN#

Сообщение сгенерировано автоматически.',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => 'ru',
  'EVENT_TYPE' => '[ USER_PASS_REQUEST ] Запрос на смену пароля',
));
            $helper->Event()->saveEventType('USER_PASS_CHANGED', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Подтверждение смены пароля',
  'DESCRIPTION' => '

#USER_ID# - ID пользователя
#STATUS# - Статус логина
#MESSAGE# - Сообщение пользователю
#LOGIN# - Логин
#URL_LOGIN# - Логин, закодированный для использования в URL
#CHECKWORD# - Контрольная строка для смены пароля
#NAME# - Имя
#LAST_NAME# - Фамилия
#EMAIL# - E-Mail пользователя
',
  'SORT' => '5',
));
            $helper->Event()->saveEventType('USER_PASS_CHANGED', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Password Change Confirmation',
  'DESCRIPTION' => '

#USER_ID# - User ID
#STATUS# - Account status
#MESSAGE# - Message for user
#LOGIN# - Login
#URL_LOGIN# - Encoded login for use in URL
#CHECKWORD# - Check string for password change
#NAME# - Name
#LAST_NAME# - Last Name
#EMAIL# - User E-Mail
',
  'SORT' => '5',
));
            $helper->Event()->saveEventMessage('USER_PASS_CHANGED', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Подтверждение смены пароля',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------
#NAME# #LAST_NAME#,

#MESSAGE#

Ваша регистрационная информация:

ID пользователя: #USER_ID#
Статус профиля: #STATUS#
Login: #LOGIN#

Сообщение сгенерировано автоматически.',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => 'ru',
  'EVENT_TYPE' => '[ USER_PASS_CHANGED ] Подтверждение смены пароля',
));
            $helper->Event()->saveEventType('USER_INVITE', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Приглашение на сайт нового пользователя',
  'DESCRIPTION' => '#ID# - ID пользователя
#LOGIN# - Логин
#URL_LOGIN# - Логин, закодированный для использования в URL
#EMAIL# - EMail
#NAME# - Имя
#LAST_NAME# - Фамилия
#PASSWORD# - пароль пользователя 
#CHECKWORD# - Контрольная строка для смены пароля
#XML_ID# - ID пользователя для связи с внешними источниками
',
  'SORT' => '6',
));
            $helper->Event()->saveEventType('USER_INVITE', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Invitation of a new site user',
  'DESCRIPTION' => '#ID# - User ID
#LOGIN# - Login
#URL_LOGIN# - Encoded login for use in URL
#EMAIL# - EMail
#NAME# - Name
#LAST_NAME# - Last Name
#PASSWORD# - User password 
#CHECKWORD# - Password check string
#XML_ID# - User ID to link with external data sources

',
  'SORT' => '6',
));
            $helper->Event()->saveEventMessage('USER_INVITE', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Приглашение на сайт',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------
Здравствуйте, #NAME# #LAST_NAME#!

Администратором сайта вы добавлены в число зарегистрированных пользователей.

Приглашаем Вас на наш сайт.

Ваша регистрационная информация:

ID пользователя: #ID#
Login: #LOGIN#

Рекомендуем вам сменить установленный автоматически пароль.

Для смены пароля перейдите по следующей ссылке:
http://#SERVER_NAME#/auth.php?change_password=yes&USER_LOGIN=#URL_LOGIN#&USER_CHECKWORD=#CHECKWORD#
',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => 'ru',
  'EVENT_TYPE' => '[ USER_INVITE ] Приглашение на сайт нового пользователя',
));
            $helper->Event()->saveEventType('FEEDBACK_FORM', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Отправка сообщения через форму обратной связи',
  'DESCRIPTION' => '#AUTHOR# - Автор сообщения
#AUTHOR_EMAIL# - Email автора сообщения
#TEXT# - Текст сообщения
#EMAIL_FROM# - Email отправителя письма
#EMAIL_TO# - Email получателя письма',
  'SORT' => '7',
));
            $helper->Event()->saveEventType('FEEDBACK_FORM', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Sending a message using a feedback form',
  'DESCRIPTION' => '#AUTHOR# - Message author
#AUTHOR_EMAIL# - Author\'s e-mail address
#TEXT# - Message text
#EMAIL_FROM# - Sender\'s e-mail address
#EMAIL_TO# - Recipient\'s e-mail address',
  'SORT' => '7',
));
            $helper->Event()->saveEventMessage('FEEDBACK_FORM', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL_TO#',
  'SUBJECT' => '#SITE_NAME#: Сообщение из формы обратной связи',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------

Вам было отправлено сообщение через форму обратной связи

Автор: #AUTHOR#
E-mail автора: #AUTHOR_EMAIL#

Текст сообщения:
#TEXT#

Сообщение сгенерировано автоматически.',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => 'ru',
  'EVENT_TYPE' => '[ FEEDBACK_FORM ] Отправка сообщения через форму обратной связи',
));
            $helper->Event()->saveEventType('MAIN_MAIL_CONFIRM_CODE', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Подтверждение email-адреса отправителя',
  'DESCRIPTION' => '

#EMAIL_TO# - Email-адрес для подтверждения
#MESSAGE_SUBJECT# - Тема сообщения
#CONFIRM_CODE# - Код подтверждения',
  'SORT' => '8',
));
            $helper->Event()->saveEventType('MAIN_MAIL_CONFIRM_CODE', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Confirm sender\'s email address',
  'DESCRIPTION' => '

#EMAIL_TO# - confirmation email address
#MESSAGE_SUBJECT# - Message subject
#CONFIRM_CODE# - Confirmation code',
  'SORT' => '8',
));
            $helper->Event()->saveEventMessage('MAIN_MAIL_CONFIRM_CODE', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL_TO#',
  'SUBJECT' => '#MESSAGE_SUBJECT#',
  'MESSAGE' => '<? EventMessageThemeCompiler::includeComponent(\'bitrix:main.mail.confirm\', \'\', $arParams); ?>',
  'BODY_TYPE' => 'html',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => 'mail_join',
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ MAIN_MAIL_CONFIRM_CODE ] Подтверждение email-адреса отправителя',
));
            $helper->Event()->saveEventType('EVENT_LOG_NOTIFICATION', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Оповещение журнала событий',
  'DESCRIPTION' => '#EMAIL# - Email получателя
#ADDITIONAL_TEXT# - Дополнительный текст действия
#NAME# - Название оповещения
#AUDIT_TYPE_ID# - Тип события
#ITEM_ID# - Объект
#USER_ID# - Пользователь
#REMOTE_ADDR# - IP-адрес
#USER_AGENT# - Браузер
#REQUEST_URI# - Страница
#EVENT_COUNT# - Количество записей',
  'SORT' => '9',
));
            $helper->Event()->saveEventType('EVENT_LOG_NOTIFICATION', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Event log notification',
  'DESCRIPTION' => '#EMAIL# - Recipient email
#ADDITIONAL_TEXT# - Action additional text
#NAME# - Notification name
#AUDIT_TYPE_ID# - Event type
#ITEM_ID# - Object
#USER_ID# - User
#REMOTE_ADDR# - IP address
#USER_AGENT# - Browser
#REQUEST_URI# - Page URL
#EVENT_COUNT# - Number of events',
  'SORT' => '9',
));
            $helper->Event()->saveEventMessage('EVENT_LOG_NOTIFICATION', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => 'Оповещение журнала событий: #NAME#',
  'MESSAGE' => 'Зафиксированы события в журнале, соответствующие параметрам оповещения:

Тип события: #AUDIT_TYPE_ID#
Объект: #ITEM_ID#
Пользователь: #USER_ID# 
IP-адрес: #REMOTE_ADDR#
Браузер: #USER_AGENT#
Страница: #REQUEST_URI# 

Количество записей: #EVENT_COUNT# 

#ADDITIONAL_TEXT#

Перейти в журнал событий:
http://#SERVER_NAME#/bitrix/admin/event_log.php?set_filter=Y&find_audit_type_id=#AUDIT_TYPE_ID#',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => 'ru',
  'EVENT_TYPE' => '[ EVENT_LOG_NOTIFICATION ] Оповещение журнала событий',
));
            $helper->Event()->saveEventType('USER_CODE_REQUEST', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Запрос кода авторизации',
  'DESCRIPTION' => '#USER_ID# - ID пользователя
#STATUS# - Статус логина
#LOGIN# - Логин
#CHECKWORD# - Код для авторизации
#NAME# - Имя
#LAST_NAME# - Фамилия
#EMAIL# - Email пользователя
',
  'SORT' => '10',
));
            $helper->Event()->saveEventType('USER_CODE_REQUEST', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Request for verification code',
  'DESCRIPTION' => '#USER_ID# - user ID
#STATUS# - Login status
#LOGIN# - Login
#CHECKWORD# - Verification code
#NAME# - First name
#LAST_NAME# - Last name
#EMAIL# - User email
',
  'SORT' => '10',
));
            $helper->Event()->saveEventMessage('USER_CODE_REQUEST', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Запрос кода авторизации',
  'MESSAGE' => 'Используйте для авторизации код:

#CHECKWORD#

После авторизации вы сможете изменить свой пароль в редактировании профиля.

Ваша регистрационная информация:

ID пользователя: #USER_ID#
Статус профиля: #STATUS#
Логин: #LOGIN#

Сообщение создано автоматически.',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => 'ru',
  'EVENT_TYPE' => '[ USER_CODE_REQUEST ] Запрос кода авторизации',
));
            $helper->Event()->saveEventType('SMS_USER_CONFIRM_NUMBER', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'sms',
  'NAME' => 'Подтверждение номера телефона по СМС',
  'DESCRIPTION' => '#USER_PHONE# - номер телефона
#CODE# - код подтверждения
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SMS_USER_CONFIRM_NUMBER', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'sms',
  'NAME' => 'Verify phone number using SMS',
  'DESCRIPTION' => '#USER_PHONE# - phone number
#CODE# - confirmation code',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SMS_USER_RESTORE_PASSWORD', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'sms',
  'NAME' => 'Восстановление пароля через СМС',
  'DESCRIPTION' => '#USER_PHONE# - номер телефона
#CODE# - код для восстановления
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SMS_USER_RESTORE_PASSWORD', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'sms',
  'NAME' => 'Recover password using SMS',
  'DESCRIPTION' => '#USER_PHONE# - phone number
#CODE# - recovery confirmation code',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SMS_EVENT_LOG_NOTIFICATION', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'sms',
  'NAME' => 'Оповещение журнала событий',
  'DESCRIPTION' => '#PHONE_NUMBER# - Номер телефона получателя
#ADDITIONAL_TEXT# - Дополнительный текст действия
#NAME# - Название оповещения
#AUDIT_TYPE_ID# - Тип события
#ITEM_ID# - Объект
#USER_ID# - Пользователь
#REMOTE_ADDR# - IP-адрес
#USER_AGENT# - Браузер
#REQUEST_URI# - Страница
#EVENT_COUNT# - Количество записей',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SMS_EVENT_LOG_NOTIFICATION', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'sms',
  'NAME' => 'Event log notification',
  'DESCRIPTION' => '#PHONE_NUMBER# - Recipient phone number
#ADDITIONAL_TEXT# - Action additional text
#NAME# - Notification name
#AUDIT_TYPE_ID# - Event type
#ITEM_ID# - Object
#USER_ID# - User
#REMOTE_ADDR# - IP address
#USER_AGENT# - Browser
#REQUEST_URI# - Page URL
#EVENT_COUNT# - Number of events',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('CATALOG_PRODUCT_SUBSCRIBE_LIST_CONFIRM', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Код подтверждения',
  'DESCRIPTION' => '
#TOKEN# - Код подтверждения
#TOKEN_URL# - Ссылка с кодом подтверждения
#LIST_SUBSCRIBES# - Список подписок
#URL_PARAMETERS# - Параметры ссылки для подтверждения кода доступа
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('CATALOG_PRODUCT_SUBSCRIBE_LIST_CONFIRM', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Код подтверждения',
  'DESCRIPTION' => '
#TOKEN# - Код подтверждения
#TOKEN_URL# - Ссылка с кодом подтверждения
#LIST_SUBSCRIBES# - Список подписок
#URL_PARAMETERS# - Параметры ссылки для подтверждения кода доступа
',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('CATALOG_PRODUCT_SUBSCRIBE_LIST_CONFIRM', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL_TO#',
  'SUBJECT' => '#SITE_NAME#: Код подтверждения',
  'MESSAGE' => '
			<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<style>
					body
					{
						font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
						font-size: 14px;
						color: #000;
					}
				</style>
			</head>
			<body>
			<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; 
				border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
				<tr>
					<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; 
						padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
						<table cellpadding="0" cellspacing="0" border="0" width="100%">
							<tr>
								<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: 
								center; font-size: 26px; color: #0b3961;">Информационное сообщение сайта #SITE_NAME#</td>
							</tr>
							<tr>
								<td bgcolor="#bad3df" height="11"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; 
						padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
						<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;">Уважаемый, #USER_NAME#!</p>
						<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;">
Вы получили это сообщение, так как на ваш адрес был запрошен код подтверждения для доступа к подпискам сайта #SERVER_NAME#. <br><br> 
Ваш код для подтверждения подписки: #TOKEN# <br><br> 
Для получения доступа к подпискам перейдите по следующей ссылке: #TOKEN_URL# <br><br>
Вы также можете ввести код на странице: #LIST_SUBSCRIBES# <br><br>
Письмо содержит информацию для авторизации.<br>
Используя код подтверждения, вы cможете получить доступ к списку подписок.<br>
Не отвечайте на письмо, оно сформировано автоматически.<br><br>
Спасибо, что вы с нами!<br>
</p>
					</td>
				</tr>
				<tr>
					<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; 
						padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
						<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; 
							line-height:21px;">С уважением, администрация 
							<a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
							E-mail: <a href="mailto:#DEFAULT_EMAIL_FROM#" style="color:#2e6eb6;">#DEFAULT_EMAIL_FROM#</a>
							
						</p>
					</td>
				</tr>
			</table>
			</body>
			</html>
		',
  'BODY_TYPE' => 'html',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ CATALOG_PRODUCT_SUBSCRIBE_LIST_CONFIRM ] Код подтверждения',
));
            $helper->Event()->saveEventType('CATALOG_PRODUCT_SUBSCRIBE_NOTIFY', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Уведомление о поступлении товара',
  'DESCRIPTION' => '#USER_NAME# - имя пользователя
#EMAIL_TO# - email пользователя
#NAME# - название товара
#PAGE_URL# - детальная страница товара
#CHECKOUT_URL# - добавление товара в корзину
#CHECKOUT_URL_PARAMETERS# - параметры ссылки добавления товара в корзину
#PRODUCT_ID# - id товара для формирования ссылок
#UNSUBSCRIBE_URL# - ссылка отписки от товара
#UNSUBSCRIBE_URL_PARAMETERS# - параметры ссылки отписки от товара
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('CATALOG_PRODUCT_SUBSCRIBE_NOTIFY', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Уведомление о поступлении товара',
  'DESCRIPTION' => '#USER_NAME# - имя пользователя
#EMAIL_TO# - email пользователя
#NAME# - название товара
#PAGE_URL# - детальная страница товара
#CHECKOUT_URL# - добавление товара в корзину
#CHECKOUT_URL_PARAMETERS# - параметры ссылки добавления товара в корзину
#PRODUCT_ID# - id товара для формирования ссылок
#UNSUBSCRIBE_URL# - ссылка отписки от товара
#UNSUBSCRIBE_URL_PARAMETERS# - параметры ссылки отписки от товара
',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('CATALOG_PRODUCT_SUBSCRIBE_NOTIFY', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL_TO#',
  'SUBJECT' => '#SITE_NAME#: Уведомление о поступлении товара',
  'MESSAGE' => '
			<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<style>
					body
					{
						font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
						font-size: 14px;
						color: #000;
					}
				</style>
			</head>
			<body>
			<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; 
				border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
				<tr>
					<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; 
						padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
						<table cellpadding="0" cellspacing="0" border="0" width="100%">
							<tr>
								<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: 
								center; font-size: 26px; color: #0b3961;">Уведомление о поступлении товара в магазин #SITE_NAME#</td>
							</tr>
							<tr>
								<td bgcolor="#bad3df" height="11"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; 
						padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
						<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;">Уважаемый, #USER_NAME#!</p>
						<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;">
Товар "#NAME#" (#PAGE_URL#) поступил на склад.<br><br>
Вы просили оповестить вас о поступлении товара.<br><br>
Товар поступил к нам в магазин, вы можете оформить заказ прямо сейчас: (#CHECKOUT_URL#)<br><br>
Не отвечайте на письмо, оно сформировано автоматически.<br><br>
Спасибо, что вы с нами!<br>
</p>
					</td>
				</tr>
				<tr>
					<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; 
						padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
						<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; 
							line-height:21px;">С уважением, администрация 
							<a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
							E-mail: <a href="mailto:#DEFAULT_EMAIL_FROM#" style="color:#2e6eb6;">#DEFAULT_EMAIL_FROM#</a>
							<br><a href="#UNSUBSCRIBE_URL#">Отписаться</a>
						</p>
					</td>
				</tr>
			</table>
			</body>
			</html>
		',
  'BODY_TYPE' => 'html',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ CATALOG_PRODUCT_SUBSCRIBE_NOTIFY ] Уведомление о поступлении товара',
));
            $helper->Event()->saveEventType('CATALOG_PRODUCT_SUBSCRIBE_NOTIFY_REPEATED', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Уведомление о товаре в магазине',
  'DESCRIPTION' => '#USER_NAME# - имя пользователя
#EMAIL_TO# - email пользователя
#NAME# - название товара
#PAGE_URL# - детальная страница товара
#PRODUCT_ID# - id товара для формирования ссылок
#UNSUBSCRIBE_URL# - ссылка отписки от товара
#UNSUBSCRIBE_URL_PARAMETERS# - параметры ссылки отписки от товара
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('CATALOG_PRODUCT_SUBSCRIBE_NOTIFY_REPEATED', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Уведомление о товаре в магазине',
  'DESCRIPTION' => '#USER_NAME# - имя пользователя
#EMAIL_TO# - email пользователя
#NAME# - название товара
#PAGE_URL# - детальная страница товара
#PRODUCT_ID# - id товара для формирования ссылок
#UNSUBSCRIBE_URL# - ссылка отписки от товара
#UNSUBSCRIBE_URL_PARAMETERS# - параметры ссылки отписки от товара
',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('CATALOG_PRODUCT_SUBSCRIBE_NOTIFY_REPEATED', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL_TO#',
  'SUBJECT' => 'Уведомление о товаре в магазине #SITE_NAME#',
  'MESSAGE' => '
			<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<style>
					body
					{
						font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
						font-size: 14px;
						color: #000;
					}
				</style>
			</head>
			<body>
			<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; 
				border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
				<tr>
					<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; 
						padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
						<table cellpadding="0" cellspacing="0" border="0" width="100%">
							<tr>
								<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: 
								center; font-size: 26px; color: #0b3961;">Уведомление о товаре в магазине #SITE_NAME#</td>
							</tr>
							<tr>
								<td bgcolor="#bad3df" height="11"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; 
						padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
						<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;">Уважаемый, #USER_NAME#!</p>
						<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;">
Товар "#NAME#" (#PAGE_URL#) к сожалению снова закончился.<br><br>
Мы обязательно сообщим вам о поступлении товара.<br><br>
Не отвечайте на письмо, оно сформировано автоматически.<br><br>
Спасибо, что вы с нами!<br>
</p>
					</td>
				</tr>
				<tr>
					<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; 
						padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
						<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; 
							line-height:21px;">С уважением, администрация 
							<a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
							E-mail: <a href="mailto:#DEFAULT_EMAIL_FROM#" style="color:#2e6eb6;">#DEFAULT_EMAIL_FROM#</a>
							<br><a href="#UNSUBSCRIBE_URL#">Отписаться</a>
						</p>
					</td>
				</tr>
			</table>
			</body>
			</html>
		',
  'BODY_TYPE' => 'html',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ CATALOG_PRODUCT_SUBSCRIBE_NOTIFY_REPEATED ] Уведомление о товаре в магазине',
));
            $helper->Event()->saveEventType('FORUM_NEW_MESSAGE_MAIL', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Новое сообщение на форуме в режиме общения по E-Mail',
  'DESCRIPTION' => '#FORUM_NAME# - Название форума
#AUTHOR# - Автор сообщения
#FROM_EMAIL# - E-Mail для поля From письма
#RECIPIENT# - Получатель сообщения
#TOPIC_TITLE# - Тема сообщения
#MESSAGE_TEXT# - Текст сообщения
#PATH2FORUM# - Адрес сообщения
#MESSAGE_DATE# - Дата сообщения
#FORUM_EMAIL# - Е-Mail адрес для добавления сообщений на форум
#FORUM_ID# - ID форума
#TOPIC_ID# - ID темы 
#MESSAGE_ID# - ID сообщения
#TAPPROVED# - Тема опубликована
#MAPPROVED# - Сообщение опубликовано
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('FORUM_NEW_MESSAGE_MAIL', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'New message at the forum (e-mail messaging mode)',
  'DESCRIPTION' => '#FORUM_NAME# - Forum name
#AUTHOR# - Message author
#FROM_EMAIL# - E-Mail in the &amp;From&amp; field
#RECIPIENT# - Message recipient
#TOPIC_TITLE# - Message subject
#MESSAGE_TEXT# - Message text
#PATH2FORUM# - Message URL
#MESSAGE_DATE# - Message date
#FORUM_EMAIL# - E-Mail to add messages to the forum 
#FORUM_ID# - Forum ID
#TOPIC_ID# - Topic ID 
#MESSAGE_ID# - Message ID
#TAPPROVED# - Topic approved and published
#MAPPROVED# - Message approved and published
',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('FORUM_NEW_MESSAGE_MAIL', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#FROM_EMAIL#',
  'EMAIL_TO' => '#RECIPIENT#',
  'SUBJECT' => '#TOPIC_TITLE#',
  'MESSAGE' => '#MESSAGE_TEXT#

------------------------------------------  
Вы получили это сообщение, так как выподписаны на форум #FORUM_NAME#.

Ответить на сообщение можно по электронной почте или через форму на сайте:
http://#SERVER_NAME##PATH2FORUM#

Написать новое сообщение: #FORUM_EMAIL#

Автор сообщения: #AUTHOR#

Сообщение сгенерировано автоматически на сайте #SITE_NAME#.
',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ FORUM_NEW_MESSAGE_MAIL ] Новое сообщение на форуме в режиме общения по E-Mail',
));
            $helper->Event()->saveEventType('ADD_IDEA_COMMENT', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Добавлен новый комментарий к идее',
  'DESCRIPTION' => '#FULL_PATH# - Путь к комментарию к идее
#IDEA_TITLE# - Заголовок идеи
#AUTHOR# - Имя автора комментария к идее
#IDEA_COMMENT_TEXT# - Текст комментария к идее
#DATE_CREATE# - Дата и время создания комментария к идее
#EMAIL_TO# - Email подписчика',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('ADD_IDEA_COMMENT', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'A new comment added to idea',
  'DESCRIPTION' => '#FULL_PATH# - Comment path
#IDEA_TITLE# - Idea title
#AUTHOR# - Comment author
#IDEA_COMMENT_TEXT# - Comment text
#DATE_CREATE# - Comment added on
#EMAIL_TO# - Subscriber e-mail',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('ADD_IDEA_COMMENT', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL_TO#',
  'SUBJECT' => '#SITE_NAME#: Добавлен новый комментарий к идее: #IDEA_TITLE#',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------

Добавлен новый комментарий к идее на сайте #SERVER_NAME#.

Тема идеи: #IDEA_TITLE#

Автор комментария: #AUTHOR#

Дата комментария: #DATE_CREATE#

Текст комментария:
#IDEA_COMMENT_TEXT#

Адрес сообщения:
#FULL_PATH#

Сообщение сгенерировано автоматически.
',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ ADD_IDEA_COMMENT ] Добавлен новый комментарий к идее',
));
            $helper->Event()->saveEventType('ADD_IDEA', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Добавлена новая идея',
  'DESCRIPTION' => '#FULL_PATH# - Путь к идее
#TITLE# - Заголовок идеи
#AUTHOR# - Имя автора идеи
#IDEA_TEXT# - Текст идеи
#DATE_PUBLISH# - Дата и время создания идеи
#EMAIL_TO# - Email подписчика
#CATEGORY# - Категория',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('ADD_IDEA', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'New idea added',
  'DESCRIPTION' => '#FULL_PATH# - Idea full path
#TITLE# - Idea title
#AUTHOR# - Idea author
#IDEA_TEXT# - Idea text
#DATE_PUBLISH# - Date and time idea was created
#EMAIL_TO# - Subscriber e-mail
#CATEGORY# - Category',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('ADD_IDEA', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL_TO#',
  'SUBJECT' => '#SITE_NAME#: Добавлена новая идея: #IDEA_TITLE#',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------

Добавлена новая идея в категории #CATEGORY# на сайте #SERVER_NAME#.

Тема: #TITLE#

Автор: #AUTHOR#

Добавлена: #DATE_PUBLISH#

Описание:
#IDEA_TEXT#

Адрес идеи:
#FULL_PATH#

Сообщение сгенерировано автоматически.
',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ ADD_IDEA ] Добавлена новая идея',
));
            $helper->Event()->saveEventType('SALE_NEW_ORDER', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Новый заказ',
  'DESCRIPTION' => '#ORDER_ID# - код заказа
#ORDER_ACCOUNT_NUMBER_ENCODE# - код заказа(для ссылок)
#ORDER_REAL_ID# - реальный ID заказа
#ORDER_DATE# - дата заказа
#ORDER_USER# - заказчик
#PRICE# - сумма заказа
#EMAIL# - E-Mail заказчика
#BCC# - E-Mail скрытой копии
#ORDER_LIST# - состав заказа
#ORDER_PUBLIC_URL# - ссылка для просмотра заказа без авторизации (требуется настройка в модуле интернет-магазина)
#SALE_EMAIL# - E-Mail отдела продаж',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SALE_NEW_ORDER', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'New order',
  'DESCRIPTION' => '#ORDER_ID# - order ID
#ORDER_ACCOUNT_NUMBER_ENCODE# - order ID (for URL\'s)
#ORDER_REAL_ID# - real order ID
#ORDER_DATE# - order date
#ORDER_USER# - customer
#PRICE# - order amount
#EMAIL# - customer e-mail
#BCC# - BCC e-mail
#ORDER_LIST# - order contents
#ORDER_PUBLIC_URL# - order view link for unauthorized users (requires configuration in the e-Store module settings)
#SALE_EMAIL# - sales dept. e-mail',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SALE_NEW_ORDER', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#SALE_EMAIL#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Новый заказ N#ORDER_ID#',
  'MESSAGE' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<style>
		body
		{
			font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
		}
	</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
	<tr>
		<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: center; font-size: 26px; color: #0b3961;">Вами оформлен заказ в магазине #SITE_NAME#</td>
				</tr>
				<tr>
					<td bgcolor="#bad3df" height="11"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
			<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;">Уважаемый #ORDER_USER#,</p>
			<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;">Ваш заказ номер #ORDER_ID# от #ORDER_DATE# принят.<br />
<br />
Стоимость заказа: #PRICE#.<br />
<br />
Состав заказа:<br />
#ORDER_LIST#<br />
<br />
Вы можете следить за выполнением своего заказа (на какой стадии выполнения он находится), войдя в Ваш персональный раздел сайта #SITE_NAME#.<br />
<br />
Обратите внимание, что для входа в этот раздел Вам необходимо будет ввести логин и пароль пользователя сайта #SITE_NAME#.<br />
<br />
Для того, чтобы аннулировать заказ, воспользуйтесь функцией отмены заказа, которая доступна в Вашем персональном разделе сайта #SITE_NAME#.<br />
<br />
Пожалуйста, при обращении к администрации сайта #SITE_NAME# ОБЯЗАТЕЛЬНО указывайте номер Вашего заказа - #ORDER_ID#.<br />
<br />
Спасибо за покупку!<br />
</p>
		</td>
	</tr>
	<tr>
		<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
			<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; line-height:21px;">С уважением,<br />администрация <a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
				E-mail: <a href="mailto:#SALE_EMAIL#" style="color:#2e6eb6;">#SALE_EMAIL#</a>
			</p>
		</td>
	</tr>
</table>
</body>
</html>',
  'BODY_TYPE' => 'html',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SALE_NEW_ORDER ] Новый заказ',
));
            $helper->Event()->saveEventType('SALE_NEW_ORDER_RECURRING', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Новый заказ на продление подписки',
  'DESCRIPTION' => '#ORDER_ID# - код заказа
#ORDER_ACCOUNT_NUMBER_ENCODE# - код заказа(для ссылок)
#ORDER_REAL_ID# - реальный ID заказа
#ORDER_DATE# - дата заказа
#ORDER_USER# - заказчик
#PRICE# - сумма заказа
#EMAIL# - E-Mail заказчика
#BCC# - E-Mail скрытой копии
#ORDER_LIST# - состав заказа
#SALE_EMAIL# - E-Mail отдела продаж',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SALE_NEW_ORDER_RECURRING', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'New Order for Subscription Renewal',
  'DESCRIPTION' => '#ORDER_ID# - order ID
#ORDER_ACCOUNT_NUMBER_ENCODE# - order ID (for URL\'s)
#ORDER_REAL_ID# - real order ID
#ORDER_DATE# - order date
#ORDER_USER# - customer
#PRICE# - order amount
#EMAIL# - customer e-mail
#BCC# - BCC e-mail
#ORDER_LIST# - order contents
#SALE_EMAIL# - sales dept. e-mail',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SALE_NEW_ORDER_RECURRING', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#SALE_EMAIL#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Новый заказ N#ORDER_ID# на продление подписки',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------

Уважаемый #ORDER_USER#,

Ваш заказ номер #ORDER_ID# от #ORDER_DATE# на продление подписки принят.

Стоимость заказа: #PRICE#.

Состав заказа:
#ORDER_LIST#

Вы можете следить за выполнением своего заказа (на какой
стадии выполнения он находится), войдя в Ваш персональный
раздел сайта #SITE_NAME#. Обратите внимание, что для входа
в этот раздел Вам необходимо будет ввести логин и пароль
пользователя сайта #SITE_NAME#.

Для того, чтобы аннулировать заказ, воспользуйтесь функцией
отмены заказа, которая доступна в Вашем персональном
разделе сайта #SITE_NAME#.

Пожалуйста, при обращении к администрации сайта #SITE_NAME#
ОБЯЗАТЕЛЬНО указывайте номер Вашего заказа - #ORDER_ID#.

Спасибо за покупку!
',
  'BODY_TYPE' => 'text',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SALE_NEW_ORDER_RECURRING ] Новый заказ на продление подписки',
));
            $helper->Event()->saveEventType('SALE_ORDER_REMIND_PAYMENT', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Напоминание об оплате заказа',
  'DESCRIPTION' => '#ORDER_ID# - код заказа
#ORDER_ACCOUNT_NUMBER_ENCODE# - код заказа(для ссылок)
#ORDER_REAL_ID# - реальный ID заказа
#ORDER_DATE# - дата заказа
#ORDER_USER# - заказчик
#PRICE# - сумма заказа
#EMAIL# - E-Mail заказчика
#BCC# - E-Mail скрытой копии
#ORDER_LIST# - состав заказа
#ORDER_PUBLIC_URL# - ссылка для просмотра заказа без авторизации (требуется настройка в модуле интернет-магазина)
#SALE_EMAIL# - E-Mail отдела продаж',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SALE_ORDER_REMIND_PAYMENT', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Order Payment Reminder',
  'DESCRIPTION' => '#ORDER_ID# - order ID
#ORDER_ACCOUNT_NUMBER_ENCODE# - order ID (for URL\'s)
#ORDER_REAL_ID# - real order ID
#ORDER_DATE# - order date
#ORDER_USER# - customer
#PRICE# - order amount
#EMAIL# - customer e-mail
#BCC# - BCC e-mail
#ORDER_LIST# - order contents
#ORDER_PUBLIC_URL# - order view link for unauthorized users (requires configuration in the e-Store module settings)
#SALE_EMAIL# - sales dept. e-mail',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SALE_ORDER_REMIND_PAYMENT', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#SALE_EMAIL#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Напоминание об оплате заказа N#ORDER_ID# ',
  'MESSAGE' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<style>
		body
		{
			font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
		}
	</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
	<tr>
		<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: center; font-size: 26px; color: #0b3961;">Напоминаем вам об оплате заказа на сайте #SITE_NAME#</td>
				</tr>
				<tr>
					<td bgcolor="#bad3df" height="11"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
			<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;">Уважаемый #ORDER_USER#,</p>
			<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;">Вами был оформлен заказ N #ORDER_ID# от #ORDER_DATE# на сумму #PRICE#.<br />
<br />
К сожалению, на сегодняшний день средства по этому заказу не поступили к нам.<br />
<br />
Вы можете следить за выполнением своего заказа (на какой стадии выполнения он находится), войдя в Ваш персональный раздел сайта #SITE_NAME#.<br />
<br />
Обратите внимание, что для входа в этот раздел Вам необходимо будет ввести логин и пароль пользователя сайта #SITE_NAME#.<br />
<br />
Для того, чтобы аннулировать заказ, воспользуйтесь функцией отмены заказа, которая доступна в Вашем персональном разделе сайта #SITE_NAME#.<br />
<br />
Пожалуйста, при обращении к администрации сайта #SITE_NAME# ОБЯЗАТЕЛЬНО указывайте номер Вашего заказа - #ORDER_ID#.<br />
<br />
Спасибо за покупку!<br />
</p>
		</td>
	</tr>
	<tr>
		<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
			<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; line-height:21px;">С уважением,<br />администрация <a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
				E-mail: <a href="mailto:#SALE_EMAIL#" style="color:#2e6eb6;">#SALE_EMAIL#</a>
			</p>
		</td>
	</tr>
</table>
</body>
</html>',
  'BODY_TYPE' => 'html',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SALE_ORDER_REMIND_PAYMENT ] Напоминание об оплате заказа',
));
            $helper->Event()->saveEventType('SALE_ORDER_CANCEL', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Отмена заказа',
  'DESCRIPTION' => '#ORDER_ID# - код заказа
#ORDER_ACCOUNT_NUMBER_ENCODE# - код заказа(для ссылок)
#ORDER_REAL_ID# - реальный ID заказа
#ORDER_DATE# - дата заказа
#EMAIL# - E-Mail пользователя
#ORDER_CANCEL_DESCRIPTION# - причина отмены
#ORDER_PUBLIC_URL# - ссылка для просмотра заказа без авторизации (требуется настройка в модуле интернет-магазина)
#SALE_EMAIL# - E-Mail отдела продаж',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SALE_ORDER_CANCEL', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Cancel order',
  'DESCRIPTION' => '#ORDER_ID# - order ID
#ORDER_ACCOUNT_NUMBER_ENCODE# - order ID (for URL\'s)
#ORDER_REAL_ID# - real order ID
#ORDER_DATE# - order date
#EMAIL# - customer e-mail
#ORDER_LIST# - order contents
#ORDER_CANCEL_DESCRIPTION# - reason for cancellation
#ORDER_PUBLIC_URL# - order view link for unauthorized users (requires configuration in the e-Store module settings)
#SALE_EMAIL# - sales dept. e-mail
',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SALE_ORDER_CANCEL', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#SALE_EMAIL#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Отмена заказа N#ORDER_ID#',
  'MESSAGE' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<style>
		body
		{
			font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
		}
	</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
	<tr>
		<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: center; font-size: 26px; color: #0b3961;">#SITE_NAME#: Отмена заказа N#ORDER_ID#</td>
				</tr>
				<tr>
					<td bgcolor="#bad3df" height="11"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
			<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;">Заказ номер #ORDER_ID# от #ORDER_DATE# отменен.</p>
			<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;">#ORDER_CANCEL_DESCRIPTION#<br />
<br />
Для получения подробной информации по заказу пройдите на сайт http://#SERVER_NAME#/personal/order/#ORDER_ACCOUNT_NUMBER_ENCODE#/<br />
</p>
		</td>
	</tr>
	<tr>
		<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
			<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; line-height:21px;">С уважением,<br />администрация <a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
				E-mail: <a href="mailto:#SALE_EMAIL#" style="color:#2e6eb6;">#SALE_EMAIL#</a>
			</p>
		</td>
	</tr>
</table>
</body>
</html>',
  'BODY_TYPE' => 'html',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SALE_ORDER_CANCEL ] Отмена заказа',
));
            $helper->Event()->saveEventType('SALE_ORDER_PAID', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Заказ оплачен',
  'DESCRIPTION' => '#ORDER_ID# - код заказа
#ORDER_ACCOUNT_NUMBER_ENCODE# - код заказа(для ссылок)
#ORDER_REAL_ID# - реальный ID заказа
#ORDER_DATE# - дата заказа
#EMAIL# - E-Mail пользователя
#ORDER_PUBLIC_URL# - ссылка для просмотра заказа без авторизации (требуется настройка в модуле интернет-магазина)
#SALE_EMAIL# - E-Mail отдела продаж',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SALE_ORDER_PAID', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Paid order',
  'DESCRIPTION' => '#ORDER_ID# - order ID
#ORDER_ACCOUNT_NUMBER_ENCODE# - order ID (for URL\'s)
#ORDER_REAL_ID# - real order ID
#ORDER_DATE# - order date
#EMAIL# - customer e-mail
#ORDER_PUBLIC_URL# - order view link for unauthorized users (requires configuration in the e-Store module settings)
#SALE_EMAIL# - sales dept. e-mail',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SALE_ORDER_PAID', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#SALE_EMAIL#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Заказ N#ORDER_ID# оплачен',
  'MESSAGE' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<style>
		body
		{
			font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
		}
	</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
	<tr>
		<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: center; font-size: 26px; color: #0b3961;">Вы оплатили заказ на сайте #SITE_NAME#</td>
				</tr>
				<tr>
					<td bgcolor="#bad3df" height="11"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
			<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;">Заказ номер #ORDER_ID# от #ORDER_DATE# оплачен.</p>
			<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;">Для получения подробной информации по заказу пройдите на сайт http://#SERVER_NAME#/personal/order/#ORDER_ACCOUNT_NUMBER_ENCODE#/</p>
		</td>
	</tr>
	<tr>
		<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
			<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; line-height:21px;">С уважением,<br />администрация <a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
				E-mail: <a href="mailto:#SALE_EMAIL#" style="color:#2e6eb6;">#SALE_EMAIL#</a>
			</p>
		</td>
	</tr>
</table>
</body>
</html>',
  'BODY_TYPE' => 'html',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SALE_ORDER_PAID ] Заказ оплачен',
));
            $helper->Event()->saveEventType('SALE_ORDER_DELIVERY', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Доставка заказа разрешена',
  'DESCRIPTION' => '#ORDER_ID# - код заказа
#ORDER_ACCOUNT_NUMBER_ENCODE# - код заказа(для ссылок)
#ORDER_REAL_ID# - реальный ID заказа
#ORDER_DATE# - дата заказа
#EMAIL# - E-Mail пользователя
#ORDER_PUBLIC_URL# - ссылка для просмотра заказа без авторизации (требуется настройка в модуле интернет-магазина)
#SALE_EMAIL# - E-Mail отдела продаж',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SALE_ORDER_DELIVERY', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Order delivery allowed',
  'DESCRIPTION' => '#ORDER_ID# - order ID
#ORDER_ACCOUNT_NUMBER_ENCODE# - order ID (for URL\'s)
#ORDER_REAL_ID# - real order ID
#ORDER_DATE# - order date
#EMAIL# - customer e-mail
#ORDER_PUBLIC_URL# - order view link for unauthorized users (requires configuration in the e-Store module settings)
#SALE_EMAIL# - sales dept. e-mail',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SALE_ORDER_DELIVERY', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#SALE_EMAIL#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Доставка заказа N#ORDER_ID# разрешена',
  'MESSAGE' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<style>
		body
		{
			font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
		}
	</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
	<tr>
		<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: center; font-size: 26px; color: #0b3961;">Доставка вашего заказа с сайта #SITE_NAME# разрешена</td>
				</tr>
				<tr>
					<td bgcolor="#bad3df" height="11"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
			<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;">Доставка заказа номер #ORDER_ID# от #ORDER_DATE# разрешена.</p>
			<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;">Для получения подробной информации по заказу пройдите на сайт http://#SERVER_NAME#/personal/order/#ORDER_ACCOUNT_NUMBER_ENCODE#/<br />
</p>
		</td>
	</tr>
	<tr>
		<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
			<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; line-height:21px;">С уважением,<br />администрация <a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
				E-mail: <a href="mailto:#SALE_EMAIL#" style="color:#2e6eb6;">#SALE_EMAIL#</a>
			</p>
		</td>
	</tr>
</table>
</body>
</html>',
  'BODY_TYPE' => 'html',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SALE_ORDER_DELIVERY ] Доставка заказа разрешена',
));
            $helper->Event()->saveEventType('SALE_RECURRING_CANCEL', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Подписка отменена',
  'DESCRIPTION' => '#ORDER_ID# - код заказа
#ORDER_ACCOUNT_NUMBER_ENCODE# - код заказа(для ссылок)
#ORDER_REAL_ID# - реальный ID заказа
#ORDER_DATE# - дата заказа
#EMAIL# - E-Mail пользователя
#CANCELED_REASON# - причина отмены
#SALE_EMAIL# - E-Mail отдела продаж',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SALE_RECURRING_CANCEL', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Recurring payment canceled',
  'DESCRIPTION' => '#ORDER_ID# - order ID
#ORDER_ACCOUNT_NUMBER_ENCODE# - order ID (for URL\'s)
#ORDER_REAL_ID# - real order ID
#ORDER_DATE# - order date
#EMAIL# - customer e-mail
#CANCELED_REASON# - reason for cancellation
#SALE_EMAIL# - sales dept. e-mail',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SALE_RECURRING_CANCEL', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#SALE_EMAIL#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Подписка отменена',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------

Подписка отменена

#CANCELED_REASON#
#SITE_NAME#
',
  'BODY_TYPE' => 'text',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SALE_RECURRING_CANCEL ] Подписка отменена',
));
            $helper->Event()->saveEventType('SALE_SUBSCRIBE_PRODUCT', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Уведомление о поступлении товара',
  'DESCRIPTION' => '#USER_NAME# - имя пользователя
#EMAIL# - email пользователя
#NAME# - название товара
#PAGE_URL# - детальная страница товара',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SALE_SUBSCRIBE_PRODUCT', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Back in stock notification',
  'DESCRIPTION' => '#USER_NAME# - user name
#EMAIL# - user e-mail 
#NAME# - product name
#PAGE_URL# - product details page',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SALE_SUBSCRIBE_PRODUCT', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#SALE_EMAIL#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Уведомление о поступлении товара',
  'MESSAGE' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<style>
		body
		{
			font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
		}
	</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
	<tr>
		<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: center; font-size: 26px; color: #0b3961;">Уведомление о поступлении товара в магазин #SITE_NAME#</td>
				</tr>
				<tr>
					<td bgcolor="#bad3df" height="11"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
			<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;">Уважаемый, #USER_NAME#!</p>
			<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;">Товар "#NAME#" (#PAGE_URL#) поступил на склад.<br />
<br />
Вы можете Оформить заказ (http://#SERVER_NAME#/personal/cart/).<br />
<br />
Не забудьте авторизоваться!<br />
<br />
Вы получили это сообщение по Вашей просьбе оповестить при появлении товара.<br />
Не отвечайте на него - письмо сформировано автоматически.<br />
<br />
Спасибо за покупку!<br />
</p>
		</td>
	</tr>
	<tr>
		<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
			<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; line-height:21px;">С уважением,<br />администрация <a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
				E-mail: <a href="mailto:#SALE_EMAIL#" style="color:#2e6eb6;">#SALE_EMAIL#</a>
			</p>
		</td>
	</tr>
</table>
</body>
</html>',
  'BODY_TYPE' => 'html',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SALE_SUBSCRIBE_PRODUCT ] Уведомление о поступлении товара',
));
            $helper->Event()->saveEventType('SALE_ORDER_TRACKING_NUMBER', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Уведомление об изменении идентификатора почтового отправления',
  'DESCRIPTION' => '#ORDER_ID# - код заказа
#ORDER_ACCOUNT_NUMBER_ENCODE# - код заказа(для ссылок)
#ORDER_REAL_ID# - реальный ID заказа
#ORDER_DATE# - дата заказа
#ORDER_USER# - заказчик
#ORDER_TRACKING_NUMBER# - идентификатор почтового отправления
#ORDER_PUBLIC_URL# - ссылка для просмотра заказа без авторизации (требуется настройка в модуле интернет-магазина)
#EMAIL# - E-Mail заказчика
#BCC# - E-Mail скрытой копии
#SALE_EMAIL# - E-Mail отдела продаж',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SALE_ORDER_TRACKING_NUMBER', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Notification of change in tracking number ',
  'DESCRIPTION' => '#ORDER_ID# - order ID
#ORDER_ACCOUNT_NUMBER_ENCODE# - order ID (for URL\'s)
#ORDER_REAL_ID# - real order ID
#ORDER_DATE# - order date
#ORDER_USER# - customer
#ORDER_TRACKING_NUMBER# - tracking number
#ORDER_PUBLIC_URL# - order view link for unauthorized users (requires configuration in the e-Store module settings)
#EMAIL# - customer e-mail
#BCC# - BCC e-mail
#SALE_EMAIL# - sales dept. e-mail',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SALE_ORDER_TRACKING_NUMBER', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#SALE_EMAIL#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => 'Номер идентификатора отправления вашего заказа на сайте #SITE_NAME#',
  'MESSAGE' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<style>
		body
		{
			font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
		}
	</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
	<tr>
		<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: center; font-size: 26px; color: #0b3961;">Номер идентификатора отправления вашего заказа на сайте #SITE_NAME#</td>
				</tr>
				<tr>
					<td bgcolor="#bad3df" height="11"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
			<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;">Уважаемый #ORDER_USER#,</p>
			<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;">Произошла почтовая отправка заказа N #ORDER_ID# от #ORDER_DATE#.<br />
<br />
Номер идентификатора отправления: #ORDER_TRACKING_NUMBER#.<br />
<br />
Для получения подробной информации по заказу пройдите на сайт http://#SERVER_NAME#/personal/order/detail/#ORDER_ACCOUNT_NUMBER_ENCODE#/<br />
<br />
E-mail: #SALE_EMAIL#<br />
</p>
		</td>
	</tr>
	<tr>
		<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
			<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; line-height:21px;">С уважением,<br />администрация <a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
				E-mail: <a href="mailto:#SALE_EMAIL#" style="color:#2e6eb6;">#SALE_EMAIL#</a>
			</p>
		</td>
	</tr>
</table>
</body>
</html>',
  'BODY_TYPE' => 'html',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SALE_ORDER_TRACKING_NUMBER ] Уведомление об изменении идентификатора почтового отправления',
));
            $helper->Event()->saveEventType('SALE_CHECK_PRINT', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Уведомление о печати чека',
  'DESCRIPTION' => '#ORDER_ID# - код заказа
#ORDER_DATE# - дата заказа
#ORDER_USER# - заказчик
#ORDER_ACCOUNT_NUMBER_ENCODE# - код заказа(для ссылок)
#ORDER_PUBLIC_URL# - ссылка для просмотра заказа без авторизации (требуется настройка в модуле интернет-магазина)
#CHECK_LINK# - ссылка на чек',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SALE_CHECK_PRINT', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Receipt printout notification',
  'DESCRIPTION' => '#ORDER_ID# - order ID
#ORDER_DATE# - order date
#ORDER_USER# - customer
#ORDER_ACCOUNT_NUMBER_ENCODE# - order Id for use in links
#ORDER_PUBLIC_URL# - order view link for unauthorized users (requires configuration in the e-Store module settings)
#CHECK_LINK# - receipt link',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SALE_CHECK_PRINT', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#SALE_EMAIL#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => 'Ссылка на чек',
  'MESSAGE' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<style>
		body
		{
			font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
		}
	</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
	<tr>
		<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: center; font-size: 26px; color: #0b3961;">Вы оплатили заказ на сайте #SITE_NAME#</td>
				</tr>
				<tr>
					<td bgcolor="#bad3df" height="11"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
			<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;">Уважаемый #ORDER_USER#,</p>
			<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;"><br />
Согласно требованиям закона ФЗ-54 о фискальных чеках по вашему заказу произведена оплата и сформирован фискальный кассовый чек, который вы можете посмотреть по ссылке:<br />
<br />
#CHECK_LINK#<br />
<br />
Для получения подробной информации по заказу №#ORDER_ID# от #ORDER_DATE# пройдите на сайт #LINK_URL#<br />
</p>
		</td>
	</tr>
	<tr>
		<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
			<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; line-height:21px;">С уважением,<br />администрация <a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
				E-mail: <a href="mailto:#SALE_EMAIL#" style="color:#2e6eb6;">#SALE_EMAIL#</a>
			</p>
		</td>
	</tr>
</table>
</body>
</html>',
  'BODY_TYPE' => 'html',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SALE_CHECK_PRINT ] Уведомление о печати чека',
));
            $helper->Event()->saveEventType('SALE_CHECK_PRINT_ERROR', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Уведомление об ошибке при печати чека',
  'DESCRIPTION' => '#ORDER_ACCOUNT_NUMBER# - код заказа
#ORDER_DATE# - дата заказа
#ORDER_ID# - ID заказа
#CHECK_ID# - номер чека',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SALE_CHECK_PRINT_ERROR', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Receipt printout error notification',
  'DESCRIPTION' => '#ORDER_ACCOUNT_NUMBER# - order id
#ORDER_DATE# - order date
#ORDER_ID# - order id
#CHECK_ID# - receipt id',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SALE_CHECK_PRINT_ERROR', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#SALE_EMAIL#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => 'Ошибка при печати чека',
  'MESSAGE' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<style>
		body
		{
			font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
		}
	</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
	<tr>
		<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: center; font-size: 26px; color: #0b3961;">Ошибка при печати чека</td>
				</tr>
				<tr>
					<td bgcolor="#bad3df" height="11"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
			<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;">Здравствуйте!</p>
			<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;"><br />
По какой-то причине чек №#CHECK_ID# по заказу №#ORDER_ACCOUNT_NUMBER# от #ORDER_DATE# не удалось распечатать!<br />
<br />
Перейдите по ссылке, чтобы устранить причину возникшей ситуации:<br />
#LINK_URL#<br />
</p>
		</td>
	</tr>
	<tr>
		<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
			<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; line-height:21px;">С уважением,<br />администрация <a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
				E-mail: <a href="mailto:#SALE_EMAIL#" style="color:#2e6eb6;">#SALE_EMAIL#</a>
			</p>
		</td>
	</tr>
</table>
</body>
</html>',
  'BODY_TYPE' => 'html',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SALE_CHECK_PRINT_ERROR ] Уведомление об ошибке при печати чека',
));
            $helper->Event()->saveEventType('SALE_ORDER_SHIPMENT_STATUS_CHANGED', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Уведомление об изменении статуса почтового отправления',
  'DESCRIPTION' => '#SHIPMENT_NO# - номер отгрузки
#SHIPMENT_DATE# - дата отгрузки
#ORDER_NO# - номер заказа
#ORDER_DATE# - дата заказа
#STATUS_NAME# - название статуса
#STATUS_DESCRIPTION# - описание статуса
#TRACKING_NUMBER# - идентификатор почтового отправления
#EMAIL# - кому будет отправлено письмо
#BCC# - кому будет отправлена копия письма
#ORDER_USER# - заказчик
#DELIVERY_NAME# - наименование службы доставки
#DELIVERY_TRACKING_URL# - ссылка на сайте службы доставке, где можно подробнее узнать о статусе отправления
#ORDER_ACCOUNT_NUMBER_ENCODE# - код заказа(для ссылок)
#ORDER_PUBLIC_URL# - ссылка для просмотра заказа без авторизации (требуется настройка в модуле интернет-магазина)
#ORDER_DETAIL_URL# - ссылка для просмотра подробной информации о заказе',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SALE_ORDER_SHIPMENT_STATUS_CHANGED', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Package status update',
  'DESCRIPTION' => '#SHIPMENT_NO# - shipment ID
#SHIPMENT_DATE# - shipped on
#ORDER_NO# - order #
#ORDER_DATE# - order date
#STATUS_NAME# - status name
#STATUS_DESCRIPTION# - status description
#TRACKING_NUMBER# - tracking number
#EMAIL# - notify e-mail address
#BCC# - send copy to address
#ORDER_USER# - customer
#DELIVERY_NAME# - delivery service name
#DELIVERY_TRACKING_URL# - delivery service website for more tracking details
#ORDER_ACCOUNT_NUMBER_ENCODE# - order ID (for links)
#ORDER_PUBLIC_URL# - order view link for unauthorized users (requires configuration in the e-Store module settings)
#ORDER_DETAIL_URL# - order details URL',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SALE_ORDER_SHIPMENT_STATUS_CHANGED', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#SALE_EMAIL#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => 'Статус почтового отправления вашего заказа на сайте #SITE_NAME# изменился',
  'MESSAGE' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<style>
		body
		{
			font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
		}
	</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
	<tr>
		<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: center; font-size: 26px; color: #0b3961;">Изменился статус почтового отправления заказа на сайте #SITE_NAME#</td>
				</tr>
				<tr>
					<td bgcolor="#bad3df" height="11"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
			<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;">Уважаемый #ORDER_USER#,</p>
			<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;">Статус почтового отправления по заказу № #ORDER_NO# от #ORDER_DATE#<br />
<br />
изменил значение на "#STATUS_NAME#" (#STATUS_DESCRIPTION#).<br />
<br />
Идентификатор отправления: #TRACKING_NUMBER#.<br />
<br />
Наименование службы доставки: #DELIVERY_NAME#.<br />
<br />
#DELIVERY_TRACKING_URL##ORDER_DETAIL_URL#<br />
</p>
		</td>
	</tr>
	<tr>
		<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
			<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; line-height:21px;">С уважением,<br />администрация <a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
				E-mail: <a href="mailto:#SALE_EMAIL#" style="color:#2e6eb6;">#SALE_EMAIL#</a>
			</p>
		</td>
	</tr>
</table>
</body>
</html>',
  'BODY_TYPE' => 'html',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SALE_ORDER_SHIPMENT_STATUS_CHANGED ] Уведомление об изменении статуса почтового отправления',
));
            $helper->Event()->saveEventType('SALE_CHECK_VALIDATION_ERROR', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Уведомление об ошибке при формировании чека',
  'DESCRIPTION' => '#ORDER_ACCOUNT_NUMBER# - код заказа
#ORDER_DATE# - дата заказа
#ORDER_ID# - ID заказа',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SALE_CHECK_VALIDATION_ERROR', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Receipt create error notification',
  'DESCRIPTION' => '#ORDER_ACCOUNT_NUMBER# - order #
#ORDER_DATE# - order date
#ORDER_ID# - order ID',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SALE_CHECK_VALIDATION_ERROR', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#SALE_EMAIL#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => 'Ошибка при формировании чека',
  'MESSAGE' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<style>
		body
		{
			font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
		}
	</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
	<tr>
		<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: center; font-size: 26px; color: #0b3961;">Ошибка при формировании чека</td>
				</tr>
				<tr>
					<td bgcolor="#bad3df" height="11"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
			<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;">Здравствуйте!</p>
			<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;"><br />
По какой-то причине чек по заказу №#ORDER_ACCOUNT_NUMBER# от #ORDER_DATE# не был сформирован!<br />
<br />
Перейдите по ссылке, чтобы устранить причину возникшей ситуации:<br />
#LINK_URL#<br />
</p>
		</td>
	</tr>
	<tr>
		<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
			<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; line-height:21px;">С уважением,<br />администрация <a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
				E-mail: <a href="mailto:#SALE_EMAIL#" style="color:#2e6eb6;">#SALE_EMAIL#</a>
			</p>
		</td>
	</tr>
</table>
</body>
</html>',
  'BODY_TYPE' => 'html',
  'BCC' => '#BCC#',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SALE_CHECK_VALIDATION_ERROR ] Уведомление об ошибке при формировании чека',
));
            $helper->Event()->saveEventType('SALE_STATUS_CHANGED_F', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Изменение статуса заказа на  "Выполнен"',
  'DESCRIPTION' => '#ORDER_ID# - код заказа
#ORDER_DATE# - дата заказа
#ORDER_STATUS# - статус заказа
#EMAIL# - E-Mail пользователя
#ORDER_DESCRIPTION# - описание статуса заказа
#TEXT# - текст
#SALE_EMAIL# - E-Mail отдела продаж
#ORDER_PUBLIC_URL# - ссылка для просмотра заказа без авторизации (требуется настройка в модуле интернет-магазина)
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SALE_STATUS_CHANGED_F', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Changing order status to ""',
  'DESCRIPTION' => '#ORDER_ID# - order ID
#ORDER_DATE# - order date
#ORDER_STATUS# - order status
#EMAIL# - customer e-mail
#ORDER_DESCRIPTION# - order status description
#TEXT# - text
#SALE_EMAIL# - Sales department e-mail
#ORDER_PUBLIC_URL# - order view link for unauthorized users (requires configuration in the e-Store module settings)
',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SALE_STATUS_CHANGED_F', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#SALE_EMAIL#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SERVER_NAME#: Изменение статуса заказа N#ORDER_ID#',
  'MESSAGE' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<style>
		body
		{
			font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
		}
	</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
	<tr>
		<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: center; font-size: 26px; color: #0b3961;">Изменение статуса заказа в магазине #SITE_NAME#</td>
				</tr>
				<tr>
					<td bgcolor="#bad3df" height="11"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
			<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;"></p>
			<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;">Информационное сообщение сайта #SITE_NAME#<br />
------------------------------------------<br />
<br />
Статус заказа номер #ORDER_ID# от #ORDER_DATE# изменен.<br />
<br />
Новый статус заказа:<br />
#ORDER_STATUS#<br />
#ORDER_DESCRIPTION#<br />
#TEXT#<br />
<br />
Для получения подробной информации по заказу пройдите на сайт #SERVER_NAME#/personal/order/#ORDER_ID#/<br />
<br />
Спасибо за ваш выбор!<br />
#SITE_NAME#<br />
</p>
		</td>
	</tr>
	<tr>
		<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
			<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; line-height:21px;">С уважением,<br />администрация <a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
				E-mail: <a href="mailto:#SALE_EMAIL#" style="color:#2e6eb6;">#SALE_EMAIL#</a>
			</p>
		</td>
	</tr>
</table>
</body>
</html>',
  'BODY_TYPE' => 'html',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SALE_STATUS_CHANGED_F ] Изменение статуса заказа на  "Выполнен"',
));
            $helper->Event()->saveEventType('SALE_STATUS_CHANGED_N', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Изменение статуса заказа на  "Принят, ожидается оплата"',
  'DESCRIPTION' => '#ORDER_ID# - код заказа
#ORDER_DATE# - дата заказа
#ORDER_STATUS# - статус заказа
#EMAIL# - E-Mail пользователя
#ORDER_DESCRIPTION# - описание статуса заказа
#TEXT# - текст
#SALE_EMAIL# - E-Mail отдела продаж
#ORDER_PUBLIC_URL# - ссылка для просмотра заказа без авторизации (требуется настройка в модуле интернет-магазина)
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SALE_STATUS_CHANGED_N', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Changing order status to ""',
  'DESCRIPTION' => '#ORDER_ID# - order ID
#ORDER_DATE# - order date
#ORDER_STATUS# - order status
#EMAIL# - customer e-mail
#ORDER_DESCRIPTION# - order status description
#TEXT# - text
#SALE_EMAIL# - Sales department e-mail
#ORDER_PUBLIC_URL# - order view link for unauthorized users (requires configuration in the e-Store module settings)
',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SALE_STATUS_CHANGED_N', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#SALE_EMAIL#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SERVER_NAME#: Изменение статуса заказа N#ORDER_ID#',
  'MESSAGE' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<style>
		body
		{
			font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
		}
	</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
	<tr>
		<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: center; font-size: 26px; color: #0b3961;">Изменение статуса заказа в магазине #SITE_NAME#</td>
				</tr>
				<tr>
					<td bgcolor="#bad3df" height="11"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
			<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;"></p>
			<p style="margin-top: 0; margin-bottom: 20px; line-height: 20px;">Информационное сообщение сайта #SITE_NAME#<br />
------------------------------------------<br />
<br />
Статус заказа номер #ORDER_ID# от #ORDER_DATE# изменен.<br />
<br />
Новый статус заказа:<br />
#ORDER_STATUS#<br />
#ORDER_DESCRIPTION#<br />
#TEXT#<br />
<br />
Для получения подробной информации по заказу пройдите на сайт #SERVER_NAME#/personal/order/#ORDER_ID#/<br />
<br />
Спасибо за ваш выбор!<br />
#SITE_NAME#<br />
</p>
		</td>
	</tr>
	<tr>
		<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
			<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; line-height:21px;">С уважением,<br />администрация <a href="http://#SERVER_NAME#" style="color:#2e6eb6;">Интернет-магазина</a><br />
				E-mail: <a href="mailto:#SALE_EMAIL#" style="color:#2e6eb6;">#SALE_EMAIL#</a>
			</p>
		</td>
	</tr>
</table>
</body>
</html>',
  'BODY_TYPE' => 'html',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SALE_STATUS_CHANGED_N ] Изменение статуса заказа на  "Принят, ожидается оплата"',
));
            $helper->Event()->saveEventType('SENDER_SUBSCRIBE_CONFIRM', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Подтверждение подписки',
  'DESCRIPTION' => '#EMAIL# - адрес подписки
#DATE# - дата добавления/изменения адреса
#CONFIRM_URL# - адрес подтверждения
#MAILING_LIST# - список подписок
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SENDER_SUBSCRIBE_CONFIRM', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Confirm subscription',
  'DESCRIPTION' => '#EMAIL# - subscription URL
#DATE# - the date the address was added or updated
#CONFIRM_URL# - confirmation URL
#MAILING_LIST# - subscriptions
',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SENDER_SUBSCRIBE_CONFIRM', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Подтверждение подписки',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------

Здравствуйте,

Вы получили это сообщение, так как ваш адрес был подписан
на список рассылки сервера #SERVER_NAME#.

Дополнительная информация о подписке:

Адрес подписки (email) ............ #EMAIL#
Дата добавления/редактирования .... #DATE#
Список рассылок:
#MAILING_LIST#


Для подтверждения подписки перейдите по следующей ссылке:
http://#SERVER_NAME##CONFIRM_URL#


Внимание! Вы не будете получать сообщения рассылки, пока не подтвердите
свою подписку.
Если вы не подписывались на рассылку и получили это письмо по ошибке,
проигнорируйте его.

Сообщение сгенерировано автоматически.
',
  'BODY_TYPE' => 'text',
  'BCC' => '',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SENDER_SUBSCRIBE_CONFIRM ] Подтверждение подписки',
));
            $helper->Event()->saveEventType('SUBSCRIBE_CONFIRM', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Подтверждение подписки',
  'DESCRIPTION' => '#ID# - идентификатор подписки
#EMAIL# - адрес подписки
#CONFIRM_CODE# - код подтверждения
#SUBSCR_SECTION# - раздел, где находится страница редактирования подписки (задается в настройках)
#USER_NAME# - имя подписчика (может отсутствовать)
#DATE_SUBSCR# - дата добавления/изменения адреса
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('SUBSCRIBE_CONFIRM', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Confirmation of subscription',
  'DESCRIPTION' => '#ID# - subscription ID
#EMAIL# - subscription email
#CONFIRM_CODE# - confirmation code
#SUBSCR_SECTION# - section with subscription edit page (specifies in the settings)
#USER_NAME# - subscriber\'s name (optional)
#DATE_SUBSCR# - date of adding/change of address
',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('SUBSCRIBE_CONFIRM', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => '#SITE_NAME#: Подтверждение подписки',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------

Здравствуйте,

Вы получили это сообщение, так как ваш адрес был подписан
на список рассылки сервера #SERVER_NAME#.

Дополнительная информация о подписке:

Адрес подписки (email) ............ #EMAIL#
Дата добавления/редактирования .... #DATE_SUBSCR#

Ваш код для подтверждения подписки: #CONFIRM_CODE#

Для подтверждения подписки перейдите по следующей ссылке:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#&CONFIRM_CODE=#CONFIRM_CODE#

Вы также можете ввести код для подтверждения подписки на странице:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#

Внимание! Вы не будете получать сообщения рассылки, пока не подтвердите
свою подписку.

---------------------------------------------------------------------
Сохраните это письмо, так как оно содержит информацию для авторизации.
Используя код подтверждения подписки, вы cможете изменить параметры
подписки или отписаться от рассылки.

Изменить параметры:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#&CONFIRM_CODE=#CONFIRM_CODE#

Отписаться:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#&CONFIRM_CODE=#CONFIRM_CODE#&action=unsubscribe
---------------------------------------------------------------------

Сообщение сгенерировано автоматически.
',
  'BODY_TYPE' => 'text',
  'BCC' => '',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SUBSCRIBE_CONFIRM ] Подтверждение подписки',
));
            $helper->Event()->saveEventType('NEW_DEVICE_LOGIN', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Вход с нового устройства',
  'DESCRIPTION' => '#USER_ID# - ID пользователя
#EMAIL# - Email пользователя
#LOGIN# - Логин пользователя
#NAME# - Имя пользователя
#LAST_NAME# - Фамилия пользователя
#DEVICE# - Устройство
#BROWSER# - Браузер
#PLATFORM# - Платформа
#USER_AGENT# - User agent
#IP# - IP-адрес
#DATE# - Дата
#COUNTRY# - Страна
#REGION# - Регион
#CITY# - Город
#LOCATION# - Объединенные город, регион, страна
',
  'SORT' => '150',
));
            $helper->Event()->saveEventType('NEW_DEVICE_LOGIN', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'New device signed in',
  'DESCRIPTION' => '#USER_ID# - User ID
#EMAIL# - User email:
#LOGIN# - User login
#NAME# - User first name
#LAST_NAME# - User last name
#DEVICE# - Device
#BROWSER# - Browser
#PLATFORM# - Platform
#USER_AGENT# - User agent
#IP# - IP address
#DATE# - Date
#COUNTRY# - Country
#REGION# - Region
#CITY# - City
#LOCATION# - Full location (city, region, country)
',
  'SORT' => '150',
));
            $helper->Event()->saveEventMessage('NEW_DEVICE_LOGIN', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL#',
  'SUBJECT' => 'Вход с нового устройства',
  'MESSAGE' => 'Здравствуйте, #NAME#,

Новое устройство авторизовалось под вашим логином #LOGIN#.
 
Устройство: #DEVICE# 
Браузер: #BROWSER#
Платформа: #PLATFORM#
Местоположение: #LOCATION# (может быть неточным)
Дата: #DATE#

Если вы не знаете, кто это был, рекомендуем немедленно сменить пароль.
',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => 'ru',
  'EVENT_TYPE' => '[ NEW_DEVICE_LOGIN ] Вход с нового устройства',
));
            $helper->Event()->saveEventType('VOTE_FOR', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Новый голос',
  'DESCRIPTION' => '#ID# - ID результата голосования
#TIME# - время голосования
#VOTE_TITLE# - наименование опроса
#VOTE_DESCRIPTION# - описание опроса
#VOTE_ID# - ID опроса
#CHANNEL# - наименование группы опроса
#CHANNEL_ID# - ID группы опроса
#VOTER_ID# - ID проголосовавшего посетителя
#USER_NAME# - ФИО пользователя
#LOGIN# - логин
#USER_ID# - ID пользователя
#STAT_GUEST_ID# - ID посетителя модуля статистики
#SESSION_ID# - ID сессии модуля статистики
#IP# - IP адрес
#VOTE_STATISTIC# - Сводная статистика опроса типа ( - Вопрос - Ответ )
#URL# - Путь к опросу
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('VOTE_FOR', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'New vote',
  'DESCRIPTION' => '#ID# - Vote result ID
#TIME# - Time of vote
#VOTE_TITLE# - Poll name
#VOTE_DESCRIPTION# - Poll description
#VOTE_ID# - Poll ID
#CHANNEL# - Poll group name
#CHANNEL_ID# - Poll group ID
#VOTER_ID# - Voter\'s user ID
#USER_NAME# - User full name
#LOGIN# - login
#USER_ID# - User ID
#STAT_GUEST_ID# - Visitor ID in web analytics module
#SESSION_ID# - Session ID in web analytics module
#IP# - IP address
#VOTE_STATISTIC# - Summary statistics of this poll type ( - Question - Answer)
#URL# - Poll URL',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('VOTE_FOR', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL_TO#',
  'SUBJECT' => '#SITE_NAME#: [V] #VOTE_TITLE#',
  'MESSAGE' => '#USER_NAME# принял участие в опросе "#VOTE_TITLE#":
#VOTE_STATISTIC#

http://#SERVER_NAME##URL#
Сообщение сгенерировано автоматически.',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ VOTE_FOR ] Новый голос',
));
            $helper->Event()->saveEventType('CALENDAR_INVITATION', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Приглашение на встречу',
  'DESCRIPTION' => '

#EMAIL_TO# - EMail приглашенного
#TITLE# - Тема
#MESSAGE# - Подробное описание встречи
',
  'SORT' => '100',
));
            $helper->Event()->saveEventType('CALENDAR_INVITATION', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Invitation',
  'DESCRIPTION' => '

#EMAIL_TO# - invited person e-mail
#TITLE# - subject
#MESSAGE# - full description of the event
',
  'SORT' => '100',
));
            $helper->Event()->saveEventMessage('CALENDAR_INVITATION', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL_TO#',
  'SUBJECT' => '#TITLE#',
  'MESSAGE' => '#MESSAGE#

---------------------------------------------------------------------

Сообщение сгенерировано автоматически.',
  'BODY_TYPE' => 'text',
  'BCC' => '',
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ CALENDAR_INVITATION ] Приглашение на встречу',
));
            $helper->Event()->saveEventType('SEND_ICAL_INVENT', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Отправка приглашения участнику ',
  'DESCRIPTION' => '
#DATE_START# - время начала описание
#DATE_END# - время окончания описание
#MESSAGE# - тестовое сообщение описание
',
  'SORT' => '1',
));
            $helper->Event()->saveEventType('SEND_ICAL_INVENT', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Send invitation to user  ',
  'DESCRIPTION' => '
#DATE_START# - start time
#DATE_END# - end time
#MESSAGE# - text message
',
  'SORT' => '1',
));
            $helper->Event()->saveEventMessage('SEND_ICAL_INVENT', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL_TO#',
  'SUBJECT' => '#MESSAGE_SUBJECT#',
  'MESSAGE' => '<?EventMessageThemeCompiler::includeComponent(
								"bitrix:calendar.ical.mail",
								"",
								Array(
									"PARAMS" => $arParams,
								)
							);?>',
  'BODY_TYPE' => 'html',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => NULL,
  'EVENT_TYPE' => '[ SEND_ICAL_INVENT ] Отправка приглашения участнику ',
));
        }

    public function down()
    {
        //your code ...
    }
}
