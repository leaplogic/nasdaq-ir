<?php
/**
 * Nasdaq IR plugin for Craft CMS 3.x
 *
 * Pull Nasdaq Stock & News from specific endpoints
 *
 * @link      https://leaplogic.net
 * @copyright Copyright (c) 2019 Leap Logic
 */

namespace leaplogic\nasdaqir\models;

use leaplogic\nasdaqir\NasdaqIr;

use Craft;
use craft\base\Model;

/**
 * NasdaqIr Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Leap Logic
 * @package   NasdaqIr
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * News Endpoint
     *
     * @var string
     */
    public $newsEndpoint = '';

    /**
     * Stock Endpoint
     *
     * @var string
     */
    public $stockEndpoint = '';

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['newsEndpoint', 'string'],
            ['stockEndpoint', 'string'],
        ];
    }
}
