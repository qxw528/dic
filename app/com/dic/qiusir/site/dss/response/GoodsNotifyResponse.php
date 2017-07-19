<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 7/17/17
 * Time: 3:24 PM
 */

namespace com\dic\qiusir\site\dss\response;


use com\dic\qiusir\site\Response;

class GoodsAddNotifyResponse extends NotifyResponse implements Response
{
    public $goodsId;

    /**
     * @return mixed
     */
    public function getGoodsId()
    {
        return $this->goodsId;
    }

    /**
     * @param mixed $goodsId
     */
    public function setGoodsId($goodsId)
    {
        $this->goodsId = $goodsId;
    }
    
}