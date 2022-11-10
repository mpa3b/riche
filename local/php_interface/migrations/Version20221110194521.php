<?php

namespace Sprint\Migration;


class Version20221110194521 extends Version
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
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'calendar',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'Bitrix\\Calendar\\Sync\\Office365\\SectionManager::updateSectionsAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '10.11.2022 20:35:16',
  'AGENT_INTERVAL' => '3600',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'calendar',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\Calendar\\Sync\\Managers\\DataSyncManager::dataSyncAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '10.11.2022 19:46:04',
  'AGENT_INTERVAL' => '60',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'calendar',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\Calendar\\Sync\\Util\\CleanConnectionAgent::cleanAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 19:32:50',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'calendar',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\Calendar\\Sync\\Managers\\DataExchangeManager::importAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '10.11.2022 19:45:18',
  'AGENT_INTERVAL' => '180',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'catalog',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\Catalog\\CatalogViewedProductTable::clearAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '14.11.2022 10:57:15',
  'AGENT_INTERVAL' => '432000',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'clouds',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CCloudStorage::CleanUp();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 19:33:48',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'currency',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\Currency\\CurrencyManager::currencyBaseRateAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 00:01:00',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'Y',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'iblock',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\CIBlock::checkActivityDatesAgent(1, 1668076400);',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 13:33:20',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'iblock',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\CIBlock::checkActivityDatesAgent(2, 1668076400);',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 13:33:20',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'iblock',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\CIBlock::checkActivityDatesAgent(6, 1668076400);',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 13:33:20',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'landing',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'Bitrix\\Landing\\Agent::clearRecycle();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '10.11.2022 21:30:35',
  'AGENT_INTERVAL' => '7200',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'landing',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'Bitrix\\Landing\\Agent::clearFiles(30);',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '10.11.2022 20:30:35',
  'AGENT_INTERVAL' => '3600',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'landing',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'Bitrix\\Landing\\Agent::sendRestStatistic();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 13:29:24',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'landing',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'Bitrix\\Landing\\Agent::clearTempFiles();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 13:29:24',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'main',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\Main\\Analytics\\CounterDataTable::submitData();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '10.11.2022 19:46:04',
  'AGENT_INTERVAL' => '60',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'main',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CCaptchaAgent::DeleteOldCaptcha(3600);',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '10.11.2022 20:30:35',
  'AGENT_INTERVAL' => '3600',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'main',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CSiteCheckerTest::CommonTest();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 08:43:44',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'main',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CEvent::CleanUpAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 08:43:45',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'main',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CUser::CleanUpHitAuthAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 08:43:45',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'main',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CUndo::CleanUpOld();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 08:43:45',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'main',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CUserCounter::DeleteOld();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 08:43:45',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'main',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\Main\\UI\\Viewer\\FilePreviewTable::deleteOldAgent(22, 20);',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 08:43:46',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'main',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CUser::AuthActionsCleanUpAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 08:43:46',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'main',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CUser::CleanUpAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 08:43:46',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'main',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CUser::DeactivateAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 08:43:46',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'main',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CEventLog::CleanUpAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 08:43:46',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'messageservice',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\MessageService\\Queue::cleanUpAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 00:00:00',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'Y',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'messageservice',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\MessageService\\IncomingMessage::cleanUpAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 00:00:00',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'Y',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'pull',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CPullChannel::CheckOnlineChannel();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '10.11.2022 19:48:46',
  'AGENT_INTERVAL' => '240',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'pull',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CPullChannel::CheckExpireAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '10.11.2022 20:43:56',
  'AGENT_INTERVAL' => '43200',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'pull',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CPullWatch::CheckExpireAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '10.11.2022 20:04:23',
  'AGENT_INTERVAL' => '600',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'sale',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CSaleRecurring::AgentCheckRecurring();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '10.11.2022 21:30:35',
  'AGENT_INTERVAL' => '7200',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'sale',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CSaleViewedProduct::ClearViewed();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 12:24:15',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'sale',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CSaleOrder::ClearProductReservedQuantity();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 12:24:16',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'sale',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\Sale\\Internals\\Analytics\\Storage::cleanUpAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 00:00:00',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'Y',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'sale',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\Sale\\Internals\\Analytics\\Agent::send();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 12:24:17',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'Y',
  'RETRY_COUNT' => NULL,
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'sale',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\Sale\\Product2ProductTable::addProductsByAgent(100);',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 19:40:23',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'sale',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CSaleOrder::RemindPayment();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 19:39:09',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'sale',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\Sale\\Product2ProductTable::deleteOldProducts(10);',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '20.11.2022 19:39:09',
  'AGENT_INTERVAL' => '864000',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'sale',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\Sale\\Archive\\Manager::archiveOnAgent(10,5);',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 19:39:09',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'sale',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\Sale\\OrderHistory::deleteOldAgent("30", "10000");',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 19:40:23',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'search',
  'USER_ID' => NULL,
  'SORT' => '10',
  'NAME' => 'CSearchSuggest::CleanUpAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 12:24:19',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'search',
  'USER_ID' => NULL,
  'SORT' => '10',
  'NAME' => 'CSearchStatistic::CleanUpAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 12:24:19',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'seo',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'Bitrix\\Seo\\Engine\\YandexDirect::updateAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '10.11.2022 20:30:35',
  'AGENT_INTERVAL' => '3600',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'seo',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'Bitrix\\Seo\\Adv\\LogTable::clean();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 12:24:16',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'seo',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'Bitrix\\Seo\\Adv\\Auto::checkQuantityAgent();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '10.11.2022 20:30:35',
  'AGENT_INTERVAL' => '3600',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'storeassist',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CStoreAssist::AgentCountDayOrders();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 08:43:50',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'subscribe',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => 'CSubscription::CleanUp();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '11.11.2022 03:00:00',
  'AGENT_INTERVAL' => '86400',
  'IS_PERIOD' => 'Y',
  'RETRY_COUNT' => '0',
));
        $helper->Agent()->saveAgent(array (
  'MODULE_ID' => 'ui',
  'USER_ID' => NULL,
  'SORT' => '100',
  'NAME' => '\\Bitrix\\UI\\FileUploader\\TempFileAgent::clearOldRecords();',
  'ACTIVE' => 'Y',
  'NEXT_EXEC' => '10.11.2022 20:02:41',
  'AGENT_INTERVAL' => '1800',
  'IS_PERIOD' => 'N',
  'RETRY_COUNT' => '0',
));
    }

    public function down()
    {
        //your code ...
    }
}
