<?

    include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');

    CHTTP::SetStatus("404 Not Found");

    @define("ERROR_404", "Y");

    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

    /**
     * @global $APPLICATION \CMain
     * @global $USER        \CUser
     */

    $APPLICATION->SetPageProperty('WRAP', 'Y');
    $APPLICATION->SetTitle("Не получилось :(");

?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
