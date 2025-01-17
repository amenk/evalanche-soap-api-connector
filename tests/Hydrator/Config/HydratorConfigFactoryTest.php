<?php

declare(strict_types=1);

namespace Scn\EvalancheSoapApiConnector\Hydrator\Config;

use Scn\EvalancheSoapApiConnector\Hydrator\Config\Account\AccountConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Account\DiscountConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Blacklist\BlackListConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Container\ContainerAttributeConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Container\ContainerAttributeGroupConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Container\ContainerAttributeOptionConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Container\ContainerAttributeRoleTypeConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\CouponList\CouponListProfileCouponConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Form\FormConfigurationConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Generic\FolderInformationConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Generic\HashMapConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Generic\JobHandleConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Generic\JobResultConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Generic\MassUpdateResultConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Generic\ResourceInformationConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Generic\ResourceTypeInformationConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Generic\ServiceStatusConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Mailing\MailingSlotConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Mailing\MailingSlotConfigurationConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Mailing\MailingSlotItemConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\MailingTemplate\MailingTemplateConfigurationConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\MailingTemplate\MailingTemplateSourcesConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Marketplace\CategoryConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Marketplace\ProductConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Profile\ProfileTrackingHistoryConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\SmartLink\SmartLinkConfigurationConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\SmartLink\SmartLinkPoolConfigurationConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\SmartLink\SmartLinkScoringConfigurationConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\TargetGroup\TargetGroupDetailConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\TargetGroup\TargetGroupMemberShipConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Mailing\MailingArticleConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Mailing\MailingClickConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Mailing\MailingConfigurationConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Mailing\MailingDetailConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Mailing\MailingImpressionConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Mailing\MailingStatusConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Mailing\MailingSubjectConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Mandator\MandatorConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Pool\PoolAttributeConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Profile\ProfileActivityScoreConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Profile\ProfileBounceStatusConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Profile\ProfileGroupScoreConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Scoring\ScoringGroupDetailConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\SmartLink\SmartLinkConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Statistic\ArticleStatisticConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Statistic\ArticleStatisticItemConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Statistic\ClientStatisticConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Statistic\FormStatisticConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Statistic\MailClientStatisticItemConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Statistic\MailingStatisticConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\User\UserConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Workflow\WorkflowConfigurationConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Workflow\WorkflowConfigVersionConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Workflow\WorkflowDetailConfig;
use Scn\EvalancheSoapApiConnector\Hydrator\Config\Workflow\WorkflowStateChangeResultConfig;
use Scn\EvalancheSoapApiConnector\TestCase;

class HydratorConfigFactoryTest extends TestCase
{
    /**
     * @var HydratorConfigFactory
     */
    private $subject;

    public function setUp(): void
    {
        $this->subject = new HydratorConfigFactory();
    }

    /**
     * @dataProvider factoryDataProvider
     */
    public function testFactoryMethods($method, $expectedClass, array $parameter = [])
    {
        $this->assertInstanceOf(
            $expectedClass,
            call_user_func_array([$this->subject, $method], $parameter)
        );
    }

    public function factoryDataProvider()
    {
        return [
            ['createWorkflowDetailConfig', WorkflowDetailConfig::class],
            ['createResourceInformationConfig', ResourceInformationConfig::class],
            ['createUserConfig', UserConfig::class],
            ['createSmartLinkConfig', SmartLinkConfig::class],
            ['createSmartLinkConfigurationConfig', SmartLinkConfigurationConfig::class],
            ['createSmartLinkPoolConfigurationConfig', SmartLinkPoolConfigurationConfig::class],
            ['createSmartLinkScoringConfigurationConfig', SmartLinkScoringConfigurationConfig::class],
            ['createScoringGroupDetailConfig', ScoringGroupDetailConfig::class],
            ['createPoolAttributeConfig', PoolAttributeConfig::class],
            ['createMandatorConfig', MandatorConfig::class],
            ['createArticleStatisticConfig', ArticleStatisticConfig::class],
            ['createArticleStatisticItemConfig', ArticleStatisticItemConfig::class],
            ['createHashMapConfig', HashMapConfig::class],
            ['createContainerAttributeConfig', ContainerAttributeConfig::class],
            ['createContainerAttributeGroupConfig', ContainerAttributeGroupConfig::class],
            ['createContainerAttributeOptionConfig', ContainerAttributeOptionConfig::class],
            ['createContainerAttributeRoleTypeConfig', ContainerAttributeRoleTypeConfig::class],
            ['createFormConfigurationConfig', FormConfigurationConfig::class],
            ['createFolderInformationConfig', FolderInformationConfig::class],
            ['createTargetGroupDetailConfig', TargetGroupDetailConfig::class],
            ['createFormStatisticConfig', FormStatisticConfig::class],
            ['createServiceStatusConfig', ServiceStatusConfig::class],
            ['createClientStatisticConfig', ClientStatisticConfig::class],
            ['createMailClientStatisticItemConfig', MailClientStatisticItemConfig::class],
            ['createProfileActivityScoreConfig', ProfileActivityScoreConfig::class],
            ['createProfileBounceStatusConfig', ProfileBounceStatusConfig::class],
            ['createJobHandleConfig', JobHandleConfig::class],
            ['createMailingStatusConfig', MailingStatusConfig::class],
            ['createJobResultConfig', JobResultConfig::class],
            ['createProfileGroupScoreConfig', ProfileGroupScoreConfig::class],
            ['createResourceTypeInformationConfig', ResourceTypeInformationConfig::class],
            ['createTargetGroupMemberShipConfig', TargetGroupMemberShipConfig::class],
            ['createMassUpdateResultConfig', MassUpdateResultConfig::class],
            ['createMailingArticleConfig', MailingArticleConfig::class],
            ['createMailingDetailConfig', MailingDetailConfig::class],
            ['createMailingClickConfig', MailingClickConfig::class],
            ['createMailingConfigurationConfig', MailingConfigurationConfig::class],
            ['createMailingImpressionConfig', MailingImpressionConfig::class],
            ['createMailingStatisticConfig', MailingStatisticConfig::class],
            ['createMailingSubjectConfig', MailingSubjectConfig::class],
            ['createBlackListConfig', BlackListConfig::class],
            ['createAccountConfig', AccountConfig::class],
            ['createDiscountConfig', DiscountConfig::class],
            ['createProfileTrackingHistoryConfig', ProfileTrackingHistoryConfig::class],
            ['createMarketplaceCategoryConfig', CategoryConfig::class],
            ['createMarketplaceProductConfig', ProductConfig::class],
            ['createMailingTemplateConfigurationConfig', MailingTemplateConfigurationConfig::class],
            ['createMailingTemplateSourcesConfig', MailingTemplateSourcesConfig::class],
            ['createMailingSlotConfigurationConfig', MailingSlotConfigurationConfig::class],
            ['createMailingSlotConfig', MailingSlotConfig::class],
            ['createMailingSlotItemConfig', MailingSlotItemConfig::class],
            ['createCouponListProfileCouponConfig', CouponListProfileCouponConfig::class],
            ['createWorkflowConfigurationConfig', WorkflowConfigurationConfig::class],
            ['createWorkflowConfigVersionConfig', WorkflowConfigVersionConfig::class],
            ['createWorkflowStateChangeResultConfig', WorkflowStateChangeResultConfig::class],
        ];
    }
}
