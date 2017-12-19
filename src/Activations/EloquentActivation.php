<?php

/**
 * Part of the Sentinel package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Sentinel
 * @version    2.0.17
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2017, Cartalyst LLC
 * @link       http://cartalyst.com
 */

namespace Cartalyst\Sentinel\Activations;

use Illuminate\Database\Eloquent\Model;

class EloquentActivation extends Model implements ActivationInterface
{
    /**
     * {@inheritDoc}
     */
    protected $table = 'activations';

    protected static $userModel = 'Cartalyst\Sentinel\Users\EloquentUser';

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'code',
        'group',
        'completed',
        'completed_at',
    ];

    /**
     * Get mutator for the "completed" attribute.
     *
     * @param  mixed  $completed
     * @return bool
     */
    public function getCompletedAttribute($completed)
    {
        return (bool) $completed;
    }

    /**
     * Set mutator for the "completed" attribute.
     *
     * @param  mixed  $completed
     * @return void
     */
    public function setCompletedAttribute($completed)
    {
        $this->attributes['completed'] = (bool) $completed;
    }

    /**
     * Returns the User Relationships
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function user(){
        return $this->hasOne(static::$userModel,$user_id);
    } 


    /**
     * {@inheritDoc}
     */
    public function getCode()
    {
        return $this->attributes['code'];
    }
}
