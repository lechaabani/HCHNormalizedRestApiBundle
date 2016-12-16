HCHNormalizedRestApiBundle
=========================

A bundle to normalize the return of Rest API

## Installation

Run `composer require hch/normalizedrestapi-bundle=dev-master`

Create erros_code.ini file: `php app/console app:create-error-code`

## Basic Usage
The bundle can be used as simply as this

```
<?php

use HCH\NormalizedRestApiBundle\ApiException\ApiException;
use HCH\NormalizedRestApiBundle\ApiResponse\ApiResponse;

public function getProductAction(Product $product) {
        
    if(!$product){
        throw new ApiException(404);
    }
    return new ApiResponse(array('Product' => $product));
}
```
