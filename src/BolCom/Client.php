<?php

namespace BolCom;

class Client
{
    private $requestHelper;
    private $fullResponse;

    public function __construct($accessKeyId = NULL, $responseFormat = NULL, $debugMode = NULL)
    {
        $this->requestHelper = new Request($accessKeyId, $responseFormat, $debugMode);
    }

    public function getSearch($q, $ids, $pids, $offset, $limit, $sortingMethod, $sortingAscending, $includeProducts, $includeCategories, $includeAttributes, $offers = '', $searchfield = '')
    {
        $queryParams = '';
        $separator = '?';

        if (!empty($q)) {
            $queryParams .= $separator . 'search-term=' . urlencode($q);
            $separator = '&';
        }
        
        // TODO: implement https://api.bol.com/marketing/docs/api-reference/catalog-api-v1.html#tag/Products/operation/getProductCategories
        
//        if (!empty($ids)) {
//            $queryParams .= $separator . 'ids=' . urlencode($ids);
//            $separator = '&';
//        }
//        if (!empty($includeAttributes)) {
//            $queryParams .= $separator . 'includeattributes=' . urlencode($includeAttributes);
//            $separator = '&';
//        }
//        if (!empty($offset)) {
//            $queryParams .= $separator . 'offset=' . urlencode($offset);
//            $separator = '&';
//        }
//        if (!empty($limit)) {
//            $queryParams .= $separator . 'limit=' . urlencode($limit);
//            $separator = '&';
//        }
        
        // "RELEVANCE" "POPULARITY" "PRICE_ASC" "PRICE_DESC" "RELEASE_DATE" "RATING"
        if (!empty($sortingMethod)) {
            $queryParams .= $separator . 'sort=' . urlencode($sortingMethod);
        }
        
//        if (!empty($offers)) {
//            $queryParams .= $separator . 'offers=' . urlencode($offers);
//        }
//        if (!empty($searchfield)) {
//            $queryParams .= $separator . 'searchfield=' . urlencode($searchfield);
//        }
//        if (!empty($pids)) {
//            $queryParams .= $separator . 'pids=' . urlencode($pids);
//        }
//        $queryParams .= $separator . 'dataoutput=';
//        if (!empty($includeProducts)) {
//            $queryParams .= 'products';
//            $separator = ',';
//        }
//        if (!empty($includeCategories)) {
//            $queryParams .= $separator . 'categories';
//            $separator = ',';
//        }
//        if (!empty($includeRefinements)) {
//            $queryParams .= $separator . 'refinements';
//            $separator = ',';
//        }
        
         // hardcode to yes
        $queryParams .= '&include-offer=true';
        
        // hardcode to yes
        $queryParams .= '&include-image=true';
        
        // hardcode to NL for now
        $queryParams .= '&country-code=NL';
        
        print($queryParams);

        $httpResponse = $this->requestHelper->fetch('GET', '/marketing/catalog/v1/products/search', $queryParams);

        if (!$httpResponse) $httpResponse = $this->requestHelper->getFullHeader();

        return $httpResponse;
    }
}
