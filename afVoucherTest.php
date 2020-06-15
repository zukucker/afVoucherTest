<?php

namespace afVoucherTest;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Shopware-Plugin afVoucherTest.
 */
class afVoucherTest extends Plugin
{

    /**
    * @param ContainerBuilder $container
    */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('af_voucher_test.plugin_dir', $this->getPath());
        parent::build($container);
		}

		public static function getSubscribedEvents()
		{
			return [
					'Enlight_Controller_Action_PostDispatchSecure_Frontend_Checkout' => 'onCheckout',
			];
		}

		public function onCheckout(\Enlight_Event_EventArgs $args)
		{
				$connection = $this->container->get('dbal_connection');
				$controller = $args->getSubject();
				$view = $controller->View();
				$getVouchers = "SELECT * FROM s_emarketing_vouchers";
				$vouchers = $connection->fetchAll($getVouchers);

				$view->addTemplateDir($this->getPath() . '/Resources/views/');

				//dump($this->getPath() . '/Resources/views');
				$view->assign('afVouchers', $vouchers);
		}

}
