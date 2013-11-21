<?php

/**
 * WebUser class.
 *
 * Extension of the CWebUser class that is accessed by the
 * Yii User component.
 *
 * @extends CWebUser
 */
class WebUser extends CWebUser {

    /**
     * Store model to not repeat query.
     */
    private $_model;

	public function isLoggedIn() {
		return !Yii::app()->user->isGuest;
	}

    /**
     * isSelf function.
     *
     * Check if the logged in user the same as the $id
     *
     * @access public
     * @param mixed $id
     * @return void
     */
    public function isSelf($id) {
	    if ( Yii::app()->user->id == $id )
		    return true;
		return false;
    }
}