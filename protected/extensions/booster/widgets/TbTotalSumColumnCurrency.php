<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TbTotalSumColumnCurrency
 *
 * @author sani
 */
Yii::import('booster.widgets.TbTotalSumColumn');

class TbTotalSumColumnCurrency extends TbTotalSumColumn
{
    protected function renderFooterCellContent()
    {
        if(is_null($this->total))
            return parent::renderFooterCellContent();

        echo $this->totalValue? $this->evaluateExpression($this->totalValue, array('total'=>number_format($this->total), 2)) : $this->grid->getFormatter()->format(number_format($this->total, 2), $this->type);
    }
}

?>
