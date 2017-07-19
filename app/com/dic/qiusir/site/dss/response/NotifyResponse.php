<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 7/17/17
 * Time: 3:23 PM
 */

namespace com\dic\qiusir\site\dss\response;


abstract class NotifyResponse
{
    public $status;
    public $notes;

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    
}