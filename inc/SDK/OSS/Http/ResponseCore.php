<?php

namespace OSS\Http;

/* 囤主题 www.tzhuti.com*
 * Container for all response-related methods.
 */
class ResponseCore
{
    /* 囤主题 www.tzhuti.com*
     * Stores the HTTP header information.
     */
    public $header;

    /* 囤主题 www.tzhuti.com*
     * Stores the SimpleXML response.
     */
    public $body;

    /* 囤主题 www.tzhuti.com*
     * Stores the HTTP response code.
     */
    public $status;

    /* 囤主题 www.tzhuti.com*
     * Constructs a new instance of this class.
     *
     * @param array $header (Required) Associative array of HTTP headers (typically returned by <RequestCore::get_response_header()>).
     * @param string $body (Required) XML-formatted response from AWS.
     * @param integer $status (Optional) HTTP response status code from the request.
     * @return Mixed Contains an <php:array> `header` property (HTTP headers as an associative array), a <php:SimpleXMLElement> or <php:string> `body` property, and an <php:integer> `status` code.
     */
    public function __construct($header, $body, $status = null)
    {
        $this->header = $header;
        $this->body = $body;
        $this->status = $status;

        return $this;
    }

    /* 囤主题 www.tzhuti.com*
     * Did we receive the status code we expected?
     *
     * @param integer|array $codes (Optional) The status code(s) to expect. Pass an <php:integer> for a single acceptable value, or an <php:array> of integers for multiple acceptable values.
     * @return boolean Whether we received the expected status code or not.
     */
    public function isOK($codes = array(200, 201, 204, 206))
    {
        if (is_array($codes)) {
            return in_array($this->status, $codes);
        }

        return $this->status === $codes;
    }
}