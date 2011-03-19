<?php
/**
 * Orchestra.io interacts with many services. This is the Tito App
 * library to interact with http://titoapp.com
 *
 * @copyright     Copyright 2011 — Orchestra Platform Ltd. <info@orchestra.io>
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */
namespace orchestra\services;

/**
 * This requires http://pecl.php.net/pecl_http
 *
 * @link http://pecl.php.net/pecl_http
 * @link http://php.net/http
 */
use \HttpRequest;
use \ArrayObject;
/**
 * Interact with the Titoapp.com API
 *
 * This package uses the PECL http extension and connects
 * to the titoapp.com api. The API also has HTTP Basic Auth
 * support but for simplicity we only use the token in this wrapper.
 *
 * <code>
 *  $obj = new \orchestra\services\Tito;
 *  $obj->getEvent('funconf');
 * </code>
 *
 */

class Tito
{
    /**
     * Api Token
     *
     * The API token to interact with your protected resources
     * on the titoapp.com api.
     *
     * @var string $token  The API token.
     */
    protected $token = 'FOOBAR';

    /**
     * The Titotogo API endpoint.
     *
     * @var string $endpoint The API endpoint.
     */
    protected $endpoint = 'http://titoapp.com';

    /**
     * Constructor where we set the token to use the
     * system with.
     *
     * @param  string $token      The token to authenticate against the webservice.
     * @param  bool   $production Whether to use the staging of production endpoints.
     * @return void
     */
    public function __construct($token, $production = true)
    {
        $this->token = $token;

        if ($production === false) {
            $this->endpoint = 'http://tito-staging.heroku.com';
        }
    }

    /**
     * Get all events for the account.
     *
     * This method is used to retrieve all the events
     * for the authenticated account.
     *
     * @throws \RuntimeException
     *
     * @param  double $method  The HTTP method to invoke. Default GET
     * @return object A json-decoded object of the events.
     */
    public function getEvents($method = HTTP_METH_GET)
    {
        $url = '/events.json';
        return $this->send($url, $method);
    }


    /**
     * Get one event for the authenticated account.
     *
     * This method is used to retrieve a single event
     * for the authenticated account.
     *
     * @throws \RuntimeException
     *
     * @param  double $method  The HTTP method to invoke. Default GET
     * @return object A json-decoded object of the event.
     */
    public function getEvent($name, $method = HTTP_METH_GET)
    {
        $url = '/events/' . $name . '.json';
        return $this->send($url, $method);
    }

    /**
     * Get one purchase for the authenticated account.
     *
     * This method is used to retrieve a single purchase
     * for the authenticated account.
     *
     * @throws \RuntimeException
     *
     * @param  double $method  The HTTP method to invoke. Default GET
     * @return object A json-decoded object of the event.
     */
    public function getPurchase($id, $method = HTTP_METH_GET)
    {
        $url = '/purchases/' . $id . '.json';
        return $this->send($url, $method);
    }


    /**
     * Make a new user purchase a ticket.
     *
     * This method is used to add a new purchase on the behalf of a user. The
     * resultset response will essentially be a paypal-redirect link for now.
     *
     * @throws \RuntimeException
     *
     * @param  string        $eventName  The event name.
     * @param  array         $data       The information relative to the purchase.
     * @param  double        $method     The HTTP method to invoke. Default POST.
     *
     * @return object A json-decoded object of the purchase
     */
    public function addPurchase($eventName, array $data = array(), $method = HTTP_METH_POST)
    {
        $url = '/purchase/' . $eventName . '.json';

        return $this->send(
            $url, $method,
            new ArrayObject(array('purchase' => $data))
        );
    }

    /**
     * Send the request to the webservice.
     *
     * This method is used internally to make the requests
     * to the webservice.
     *
     * @throws \RuntimeException
     *
     * @param  string        $url    The URL to request.
     * @param  string        $method The method of the HTTP request.
     * @param  ArrayObject   $data   The data to pass to the webservice.
     *
     * @return object json-decoded object
     */
    protected function send($url, $method, ArrayObject $data = null)
    {
        //echo json_encode($data); die();
        $http = new HttpRequest(
            $this->endpoint . $url . '?token=' . $this->token,
            $method
        );

        $http->addHeaders(array(
            'Content-Type' => 'application/json'
        ));

        if (!is_null($data) && $method == HTTP_METH_POST) {
            $http->setBody(json_encode($data));
        } elseif (!is_null($data)) {
            $http->addQueryData($data);
        }

        $http->send();
        if ($http->getResponseCode() == 200) {
            return json_decode($http->getResponseBody());
        }

        throw new \RuntimeException(
            sprintf(
                "The request failed with HTTP response code %s",
                (string)$http->getResponseCode()
            )
        );
    }
}
