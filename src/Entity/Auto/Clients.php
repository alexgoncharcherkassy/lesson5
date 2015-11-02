<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 01.11.15
 * Time: 10:17
 */
namespace Entity\Auto;

class Clients implements getVarsInterface
{
    protected $firstName;
    protected $lastName;
    protected $contacts;

    public function __construct($firstName, $lastName, $contacts)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->contacts = $contacts;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getContacts()
    {
        return $this->contacts;
    }

    public function getVars()
    {
        $arr = array(
            'class' => 'Clients',
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'contacts' => $this->getContacts()
        );

        return $arr;
    }
}
