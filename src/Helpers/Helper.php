<?php

function rzq_api_site_url($storeId = null)
{
    return 'https://rzq-api.saasforest.com/api/v1/request/store-' . ($storeId ? $storeId : my_store_id());
}

function my_store_id()
{
    return auth()->user()->shop_id;
}