<?php

/**
 * BeginRequest class.
 *
 * @extends CBehavior
 */
/**
 * BeginRequest class.
 * Extended class description
 *
 * @version 0.1
 * @package application.components
 */
class BeginRequest extends CBehavior {

    /**
     * attach function.
     *
     * The attachEventHandler() method attaches an event handler to an event.
     * onBeginRequest, the handleBeginRequest() method will be called.
     *
     * @param mixed $owner
     * @return void
     */
    public function attach($owner) {
        $owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
    }

    /**
     * handleBeginRequest function.
     *
     * @param mixed $event
     * @return void
     */
    public function handleBeginRequest($event) {
    //  Register jQuery
    	Yii::app()->clientScript->registerCoreScript('jquery');
    //  Register jQuery UI
    	Yii::app()->clientScript->registerCoreScript('jquery.ui');
    	//Yii::app()->bootstrap->register();
	}
}