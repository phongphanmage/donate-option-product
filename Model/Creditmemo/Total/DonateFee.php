<?php
namespace PPhong\ProductDonate\Model\Creditmemo\Total;

use Magento\Sales\Model\Order\Creditmemo;
use Magento\Sales\Model\Order\Creditmemo\Total\AbstractTotal;

/**
 * Class Fee
 * @package Prince\Extrafee\Model\Creditmemo\Total
 */
class DonateFee extends AbstractTotal
{
    /**
     * @param Creditmemo $creditmemo
     * @return $this
     */
    public function collect(Creditmemo $creditmemo)
    {
        $creditmemo->setPpDonateFee(0);

        $creditmemo->setBasePpDonateFee(0);

        $amount = $creditmemo->getOrder()->getPpDonateFee();

        $creditmemo->setPpDonateFee($amount);

        $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $amount);

        $baseAmount = $creditmemo->getOrder()->getBasePpDonateFee();

        $creditmemo->setBasePpDonateFee($baseAmount);

        $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $baseAmount);

        return $this;
    }
}
