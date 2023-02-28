<?php

namespace Douyin\Contracts;

use Douyin\Douyin;
use Douyin\Model\GuaranteedPayment\Payment as GuaranteedPayment;
use Douyin\Model\GuaranteedPayment\Refund;
use Douyin\Model\GuaranteedPayment\CashWithdrawal;
use Douyin\Model\GuaranteedPayment\OrderPush;
use Douyin\Model\GuaranteedPayment\AccountStatement;

class Payment extends Basic{

    /**
     * 预下单接口
     *
     * @param array $data
     * @return void
     */
    public function payment(array $option)
    {
        $GuaranteedPayment = GuaranteedPayment::instance($this->config->get());
        return $GuaranteedPayment->payment($option);
    }

    /**
     * 查询订单
     *
     * @param string $out_order_no
     * @param string|null $thirdparty_id
     * @return void
     */
    public function queryOrder(string $out_order_no, string $thirdparty_id = null)
    {
        $GuaranteedPayment = GuaranteedPayment::instance($this->config->get());
        return $GuaranteedPayment->queryOrder($out_order_no, $thirdparty_id);
    }

    /**
     * 支付回调响应处理返回结果集
     *
     * @param array $data
     * @return void
     */
    public function payNotify(array $data)
    {
        $GuaranteedPayment = GuaranteedPayment::instance($this->config->get());
        return $GuaranteedPayment->notify($data);
    }

    /**
     * 支付回调成功响应
     *
     * @param boolean $isEcho
     * @return void
     */
    public function paySuccessNotify(bool $isEcho)
    {
        $GuaranteedPayment = GuaranteedPayment::instance($this->config->get());
        return $GuaranteedPayment->successNotify($isEcho);
    }

    /**
     * 支付回调失败响应
     *
     * @param integer $err_no
     * @param string $err_tips
     * @param boolean $isEcho
     * @return void
     */
    public function payErrorNotify(int $err_no = 500, string $err_tips = 'business fail', bool $isEcho = false)
    {
        $GuaranteedPayment = GuaranteedPayment::instance($this->config->get());
        return $GuaranteedPayment->errorNotify($err_no, $err_tips, $isEcho);
    }

    /**
     * 创建订单退款
     *
     * @param array $option
     * @return void
     */
    public function createOrderRefund(array $option){
        $Refund = Refund::instance($this->config->get());
        return $Refund->createRefund($option);
    }

    /**
     * 查询订单退款
     *
     * @param array $option
     * @return void
     */
    public function queryOrderRefund(string $out_refund_no, ?string $thirdparty_id = null){
        $Refund = Refund::instance($this->config->get());
        return $Refund->queryRefund($out_refund_no, $thirdparty_id);
    }

    /**
     * 订单退款回调成功响应
     *
     * @param boolean $isEcho
     * @return void
     */
    public function orderRefundSuccessNotify(bool $isEcho)
    {
        $Refund = Refund::instance($this->config->get());
        return $Refund->successNotify($isEcho);
    }

    /**
     * 订单退款回调失败响应
     *
     * @param integer $err_no
     * @param string $err_tips
     * @param boolean $isEcho
     * @return void
     */
    public function orderRefundErrorNotify(int $err_no = 500, string $err_tips = 'business fail', bool $isEcho = false)
    {
        $Refund = Refund::instance($this->config->get());
        return $Refund->errorNotify($err_no, $err_tips, $isEcho);
    }

    /**
     * 查询商户余额
     *
     * @param array $option
     * @return void
     */
    public function queryMerchantBalance(array $option)
    {
        $CashWithdrawal = CashWithdrawal::instance($this->config->get());
        return $CashWithdrawal->queryMerchantBalance($option);
    }

    /**
     * 商户提现
     *
     * @param array $option
     * @return void
     */
    public function merchantWithdraw(array $option)
    {
        $CashWithdrawal = CashWithdrawal::instance($this->config->get());
        return $CashWithdrawal->merchantWithdraw($option);
    }

    /**
     * 提现成功回调响应
     *
     * @param array $option
     * @return void
     */
    public function merchantWithdrawSuccessNotify(string $out_refund_no, ?string $thirdparty_id = null){
        $CashWithdrawal = CashWithdrawal::instance($this->config->get());
        return $CashWithdrawal->successNotify($out_refund_no, $thirdparty_id);
    }

    /**
     * 提现失败回调成功响应
     *
     * @param boolean $isEcho
     * @return void
     */
    public function merchantWithdrawErrorNotify(bool $isEcho)
    {
        $CashWithdrawal = CashWithdrawal::instance($this->config->get());
        return $CashWithdrawal->errorNotify($isEcho);
    }

    /**
     * 订单同步
     *
     * @param array $option
     * @return void
     */
    public function orderSync(array $option)
    {
        $OrderPush = OrderPush::instance($this->config->get());
        return $OrderPush->orderSync($option);
    }

    /**
     * 获取交易账单
     *
     * @param array $option
     * @return void
     */
    public function getBills(array $option)
    {
        $AccountStatement = AccountStatement::instance($this->config->get());
        return $AccountStatement->getBills($option);
    }

    /**
     * 获取资金账单
     *
     * @param array $option
     * @return void
     */
    public function getFundBills(array $option)
    {
        $AccountStatement = AccountStatement::instance($this->config->get());
        return $AccountStatement->getFundBills($option);
    }
}
