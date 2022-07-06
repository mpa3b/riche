<?

use Bitrix\Main\Page\Asset;

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
Asset::getInstance()->addJs("https://code.jquery.com/jquery-3.6.0.min.js");
?>
    <script>
        $.post("/api/riche/main/banner/get/", {
            select: [
                'ID',
                'NAME',
                'PREVIEW_TEXT',
                'DETAIL_TEXT',
            ]
        }, function (response) {
            console.log(response);
        });
    </script>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>