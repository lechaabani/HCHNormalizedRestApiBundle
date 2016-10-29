<?php
/**
 * This file defines the Api Response return for REST API
 * 
 * @package ApiResponse
 * @author Hamadi CHAABANI  
 */
namespace HCH\NormalizedRestApiBundle\ApiResponse;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializerBuilder;

/**
 * Class ApiResponse for API services
 *
 * @category Response
 * @package ApiResponse
 * @author Hamadi CHAABANI  
 *
 */
class  ApiResponse extends Response
{
    const STATUS_SUCCESS = 'success';
    const STATUS_WARNING = 'warning';

    public function __construct($data = null, $code = 200,$message = null, $status = 'success')
    {
        $content = array();
        $content['message'] = $message;
        $content['status'] = $status;
        $content['code'] = $code;
        $content['data'] = $data;
        $context = new SerializationContext();
        $context->setSerializeNull(true);
        $serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()))
            ->build();
        $jsonContent = $serializer->serialize($content, 'json', $context);
        parent::__construct($jsonContent);
        $this->setStatusCode(intval(substr($code, 0, 3)));

    }
}
