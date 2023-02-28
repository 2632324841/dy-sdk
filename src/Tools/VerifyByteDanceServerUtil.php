<?php

namespace Douyin\Tools;

/**
 * Copyright (C) 2019 ByteDance, Inc. All Rights Reserved.
 * PHP 验证消息签名
 */
class VerifyByteDanceServerUtil
{
    //your tpToken
    private $tpToken;

    /**
     * VerifyByteDanceServerUtil constructor.
     * @param $tpToken
     */
    public function __construct($tpToken)
    {
        $this->tpToken = $tpToken;
    }

    /**
     * 验证消息签名
     * @param $timestamp, $nonce, $encrypt, $msgSignature
     */
    public function verify($timestamp, $nonce, $encrypt, $msgSignature)
    {
        $values = array($this->tpToken, $timestamp, $nonce, $encrypt);
        sort($values, SORT_STRING);
        $newMsgSignature = sha1(join("", $values));

        if ($newMsgSignature == $msgSignature) {
            return true;
        } else {
            return false;
        }
    }
}
