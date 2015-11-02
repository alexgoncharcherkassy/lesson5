<?php
/**
 * Created by PhpStorm.
 * User: device
 * Date: 01.11.15
 * Time: 10:17
 */
namespace Entity\Auto;

/**
 * Class Clients
 * @package Entity\Auto
 */
class Clients implements getVarsInterface
{
    protected $firstName;
    protected $lastName;
    protected $contacts;

    /**
     * @param $firstName
     * @param $lastName
     * @param $contacts
     */
    public function __construct($firstName, $lastName, $contacts)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->contacts = $contacts;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @return array
     */
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
