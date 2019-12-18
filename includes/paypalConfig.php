<?php
    require_once("PayPal-PHP-SDK/autoload.php");

    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'Ac2okk575IsHul8Lq08kHYl-glBayRsVTbJhvKEFqXBSRA3l3NYXeVe3uOt-08dwFT0fz41GfnGwkI_C',     // ClientID
            'EJQNoE4AEvfY62fNX807C5amEi-zQBBkoobFU6sPgASvc2uZwYu_iSNFcyc_5sEEbi8egBvrTiguXoCU'      // ClientSecret
        )
    );
?>