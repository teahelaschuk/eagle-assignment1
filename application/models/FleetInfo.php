<?php
/**
 * Created by PhpStorm.
 * User: Getry
 * Date: 2017-10-05
 * Time: 3:41 PM
 */
class FleetInfo extends CSV_Model
{
    /*
     * shows all fleet data
     */


        // Constructor
    public function __construct()
    {
        parent::__construct(APPPATH . '../data/airplanes.csv', 'id');

    }


    // retrieve a single plane, null if not found



}