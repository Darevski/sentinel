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

use Cartalyst\Sentinel\Users\UserInterface;

interface ActivationRepositoryInterface
{
    /**
     * Create a new activation record and code.
     *
     * @param  \Cartalyst\Sentinel\Users\UserInterface  $user
     * @param  string  $group
     * @return \Cartalyst\Sentinel\Activations\ActivationInterface
     */
    public function create(UserInterface $user, $group='general');

    /**
     * Checks if a valid activation for the given user exists.
     *
     * @param  \Cartalyst\Sentinel\Users\UserInterface  $user
     * @param  string  $code
     * @param  string  $group
     * @return \Cartalyst\Sentinel\Activations\ActivationInterface|bool
     */
    public function exists(UserInterface $user, $code = null, $group = 'general');

    /**
     * Completes the activation for the given user.
     *
     * @param  \Cartalyst\Sentinel\Users\UserInterface  $user
     * @param  string  $code
     * @param  string  $group
     * @return bool
     */
    public function complete(UserInterface $user, $code, $group = 'general');

    /**
     * Checks if a valid activation has been completed.
     *
     * @param  \Cartalyst\Sentinel\Users\UserInterface  $user
     * @param  string $group
     * @return \Cartalyst\Sentinel\Activations\ActivationInterface|bool
     */
    public function completed(UserInterface $user, $group = 'general');

    /**
     * Remove an existing activation (deactivate).
     *
     * @param  \Cartalyst\Sentinel\Users\UserInterface  $user
     * @param  string  $group
     * @return bool|null
     */
    public function remove(UserInterface $user, $group = 'general');

    /**
     * Remove expired activation codes.
     *
     * @return int
     */
    public function removeExpired();
}
