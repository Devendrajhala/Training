<?php

namespace TrainingDevendra\DailyDeal\Block\Product;

class View extends \Magento\Catalog\Block\Product\View
{
    
    public function isCountdownEnabled()
    {
        return $this->getProduct()->getData('dailydeal');
    }
    

    public function getCountdownStartDate(){
        return $this->getProduct()->getSpecialFromDate();
    }

    public function getCountdownEndDate(){
        return  $this->getProduct()->getData('dealdate');
    }

    public function getPriceCountDown(){
        if($this->getProduct()->getData('dailydeal'))
        {
            $currentDate =  date('d-m-Y');
            $todate      =  $this->getProduct()->getSpecialToDate();
            $fromdate    =  $this->getProduct()->getSpecialFromDate();
            if($this->getProduct()->getSpecialPrice() != 0 || $this->getProduct()->getSpecialPrice()) {
                if($this->getProduct()->getSpecialToDate() != null) {
                    if(strtotime($todate) >= strtotime($currentDate) && strtotime($fromdate) <= strtotime($currentDate)){
                        return true;
                    }   
                }
            }
        }
        return false;
    }
}