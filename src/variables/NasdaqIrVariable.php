<?php
/**
 * Nasdaq IR plugin for Craft CMS 3.x
 *
 * Pull Nasdaq Stock & News from specific endpoints
 *
 * @link      https://leaplogic.net
 * @copyright Copyright (c) 2019 Leap Logic
 */

namespace leaplogic\nasdaqir\variables;

use leaplogic\nasdaqir\NasdaqIr;

use Craft;

/**
 * Nasdaq IR Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.nasdaqIr }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Leap Logic
 * @package   NasdaqIr
 * @since     1.0.0
 */
class NasdaqIrVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Fetch is legacy use news for more descprtive variable.
     */
    public function fetch()
	{
        return $this->news();
	}

    /**
     * Return NASDAQ news object
     * 
     * @return Array
     */
    public function news()
	{
		$json_endpoint = craft::$app->plugins->getPlugin('NasdaqIr')->getSettings()->newsEndpoint;

        $curl = curl_init();
        curl_setopt ($curl, CURLOPT_URL, $json_endpoint);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,2);

        $result = curl_exec($curl);
        curl_close($curl);

        $object = json_decode($result, TRUE);

        return $object;
    }
    
    /**
     * Return NASDAQ stock object. 
     * 
     * @return Array
     */
    public function stock()
    {
        $json_endpoint = craft::$app->plugins->getPlugin('NasdaqIr')->getSettings()->stockEndpoint;

        $curl = curl_init();
        curl_setopt ($curl, CURLOPT_URL, $json_endpoint);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,2);

        $result = curl_exec($curl);
        curl_close($curl);

        $object = json_decode($result, TRUE);

        return $object;
    }
}
