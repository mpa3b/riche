<?php

namespace Local;

use Bitrix\Main\Context;
use Bitrix\Main\Web\Cookie;

/**
 * Класс должен брать get-параметры UTM-меток визита и записывать их в куки.
 * Время жизни куки -- 1 день.
 * Если есть гет-переметр с префиксом *utm_* то все куки с именами utm_ стираются и пишутся новые по списку
 * get-параметров.
 *
 * @todo перенести хранение в сессию
 */
class SaveUTMTagsToCookies
{

    /**
     * Список имён UTM-меток для сохранения в куки
     *
     * @var array
     */
    const cookieList
        = [
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'utm_content',
            'utm_term'
        ];

    /**
     * Время жизни куки
     *
     * @var int
     */
    const cookieTTL = 60 * 60 * 24 * 1; // TTL куки 1 день

    /**
     * Тут контекст запроса
     *
     * @var \Bitrix\Main\HttpRequest|\Bitrix\Main\Request
     */
    private static $request;

    /**
     * Тут контекст ответа сервера
     *
     * @var \Bitrix\Main\HttpResponse|\Bitrix\Main\Response
     */
    private static $response;

    /**
     * Тут у нас все гет-параметры запроса
     *
     * @var array
     */
    private static array $getParameters;

    /**
     * Сохраняет UTM-метки в куки после проверки, пробегая по списку
     *
     * @return void
     */
    public static function saveToCookies(): void
    {

        self ::$request       = Context ::getCurrent() -> getRequest();
        self ::$response      = Context ::getCurrent() -> getResponse();
        self ::$getParameters = self ::$request -> getQueryList() -> toArray();

        /**
         * @todo удалять utm-куки при наличии хотя бы одной utm-метки.
         * тут стоит дописать таким образом, что если есть хотя бы один гет-параметр с именем, начинающимся на utm_, то все куки с именами на utm_ -- нужно будет удалить
         */

        if (!empty(self ::$getParameters)) {

            foreach (self::cookieList as $cookieName) {

                if (!empty(self ::$getParameters[$cookieName])) {

                    $value = self ::$request -> getQuery($cookieName);

                    self ::writeCookie($cookieName, $value);

                }

            }

        }

    }

    /**
     * Обёртка над штатным методом записи куки, пишет без префикса
     *
     * @param      $name  string имя куки
     * @param      $value string значение
     * @param bool $ttl
     *
     * @return void
     */
    private static function writeCookie(string $name, string $value): void
    {

        $cookie = new Cookie($name, strtolower($value), time() + self::cookieTTL, false);

        //$cookie->setSpread(Cookie::SPREAD_DOMAIN);
        //$cookie->setSecure(false);
        //$cookie->setHttpOnly(false);

        $cookie -> setPath('/');

        self ::$response -> addCookie($cookie, true, false);

    }

}
