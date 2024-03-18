<?php
session_start();

require_once "../src/BolCom/Client.php";
require_once "../src/BolCom/Request.php";

use BolCom\Client;

$token = 'eyJraWQiOiJyc2EzIiwiYWxnIjoiUlMyNTYifQ.eyJzdWIiOiIwOTIyMDgwNi1hYTc0LTQ3YzctYWI5Zi0zZmFhODYwNGRhOGIiLCIyZmEtZW5hYmxlZCI6ZmFsc2UsIm9yZyI6IkFQTTo5MjE4IiwiaXNzIjoiaHR0cHM6XC9cL2xvZ2luLmJvbC5jb20iLCIyZmEiOmZhbHNlLCJhenAiOiIwOTIyMDgwNi1hYTc0LTQ3YzctYWI5Zi0zZmFhODYwNGRhOGIiLCJjbGllbnRuYW1lIjoid2lsZ3JhYWdoZWJiZW4tZGV2Iiwic2NvcGVzIjoiYWZmaWxpYXRlIiwiZXhwIjoxNzEwNzYwMzEzLCJpYXQiOjE3MTA3NTk3MTMsImFpZCI6IkFQTTo5MjE4IiwianRpIjoiYmExM2E3YjUtZmNkNC00YTNkLWJiMmEtYzA4MzllMDVmYjIwIn0.VOhgej4yYS1jFIdOna8Nz5bCe3rb9jwMngvYNdDXMB0A-VJzqBMP5NRVw6kaBdtnpJXzUF-ebbFaFnIHZR4XiINDXjTVfmflHarf1FmNpwfdRfex0p_UE-6demZQXwRMRbdA47rzzNgIzrulj6298DuuXE3e4ARi0mIc9oXxT6SdRAwBrBYI7lVLAws6N369JUo-N615igzGHnhgh62KE6SjejgOhIeNP3IsqYpwoctbg6xGjQdYsxYLcRGdF33S9fUPz0GHEqGIJS4elUMnwiMJGpdLmIFBEcDB-Je-YL599utIC4gUPiIlKjA8_lXGFt6ucBS3ijXbAwlLdi7lUw';

$client = new Client($token, 'json', false);

//$response = $client->getProduct('9200000015051259');
//var_dump($response);

$response = $client->getSearch('LEGO', [], [], 0, 10, 'RELEVANCE', false, true, true, true);
var_dump($response);