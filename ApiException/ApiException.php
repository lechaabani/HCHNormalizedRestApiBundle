<?php
/**
 * This file defines the Api Exception for REST API
 *
 * @package ApiException
 * @author Hamadi CHAABANI  
 */
namespace HCH\NormalizedRestApiBundle\ApiException;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class ApiException for API services
 *
 * @category Exception
 * @package ApiException
 * @author Hamadi CHAABANI  
 *
 */
class  ApiException extends HttpException
{

    const STATUS_ERROR = 'error';
    const STATUS_WARNING = 'warning';
    public $status;
    public $code;
    public $message;
    public $data;


    public function __construct($code, $data = null, $params = array(), $status = 'error')
    {
        $statusCode = intval(substr($code, 0, 3)); 
        $errors = parse_ini_file(__DIR__ . '../../../../../app/config/errors_code.ini');
        $message = $errors[$code];
        if (count($params)) {
            foreach ($params as $key => $value) {
                $message = str_replace("#$key#", $value, $message);
            }
        }

        parent::__construct($statusCode, $message, null, array(), $code);
        $this->code = $code;
        $this->message = $message;
        $this->status = $status;
        $this->data = $data;
    }

    public function getErrorCode()
    {
        return $this->code;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
