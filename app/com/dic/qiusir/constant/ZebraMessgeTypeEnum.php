<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 3/15/17
 * Time: 1:42 PM
 */

namespace com\dic\qiusir\constant;


class ZebraMessgeTypeEnum extends Enumeration
{
    const LOGISTICS_TRADE_PAID = "zebra.logistics.event.wms.create";
    const WMS_CHECK_ORDER = "zebra.logistics.event.wms.checkorder";
    const WMS_GOODS_SIGN_INFO = "zebra.logistics.event.wms.sign";
    const WMS_STOCKIN_INFO = "zebra.logistics.event.wms.stockin";
    const WMS_PACKAGE_STOCKIN_INFO = "zebra.logistics.event.wms.package.stockin";
    const WMS_GOODS_WEIGHT = "zebra.logistics.event.wms.weight";
    const WMS_INNER_EXCEPTION = "zebra.logistics.event.wms.exception";
    const LOGISTICS_SEND_GOODS = "zebra.logistics.event.wms.send";
    const LOGISTICS_CANCEL = "zebra.logistics.event.wms.cancel";
    const LOGISTICS_BUYER_REFUND = "zebra.logistics.event.wms.refund";
    const LOGISTICS_WMS_DISSENT_INFO = "zebra.logistics.event.wms.dissent";
    const WMS_STOCKOUT_INFO = "zebra.logistics.event.wms.stockout";
    const WMS_STOCKOUT_FREIGHT = "zebra.logistics.event.wms.freight";
    const TMS_CLEAR_IDENTITY_INFO = "zebra.logistics.event.tms.clearidentity";
    const OGISTICS_WMS_VALUEADD = "zebra.logistics.event.wms.valueadd";
    const WMS_VALUEADD_INFO = "zebra.logistics.event.wms.valueadd";
    const TMS_CLEAR_CUSTOMS_INFO = "zebra.logistics.event.tms.clearcustoms";
    const TMS_CUSTOMS_DUTYS_INFO = "zebra.logistics.event.tms.dutys";
    const LOGISTICS_TMS_CONFIRM_DUTYS  = "zebra.logistics.event.tms.confirm";
    const TMS_DISPATCH_INFO = "zebra.logistics.event.tms.dispatch";
    const TMS_USER_SIGN_INFO = "zebra.logistics.event.tms.sign";
    const WMS_GOODS_CREATE = "zebra.logistics.event.wms.goods.create";
    const WMS_GOODS_CUSTOMS_BAK = "zebra.logistics.event.wms.goods.customs.bak";
}