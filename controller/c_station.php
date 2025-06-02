<?php


class C_Station
{


private $id;
private $street;
private $ref;
private $region;
private $list = [];
private $msg;




/**
 * Get the value of id
 */
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 */
public function setId($id): self
{
$this->id = $id;

return $this;
}




/**
 * Get the value of street
 */
public function getStreet()
{
return $this->street;
}

/**
 * Set the value of street
 */
public function setStreet($street): self
{
$this->street = $street;

return $this;
}




/**
 * Get the value of ref
 */
public function getRef()
{
return $this->ref;
}

/**
 * Set the value of ref
 */
public function setRef($ref): self
{
$this->ref = $ref;

return $this;
}




/**
 * Get the value of region
 */
public function getRegion()
{
return $this->region;
}

/**
 * Set the value of region
 */
public function setRegion($region): self
{
$this->region = $region;

return $this;
}





/**
 * Get the value of list
 */
public function getList()
{
return $this->list;
}

/**
 * Set the value of list
 */
public function setList($list): self
{
$this->list = $list;

return $this;
}

/**
 * Get the value of msg
 */
public function getMsg()
{
return $this->msg;
}

/**
 * Set the value of msg
 */
public function setMsg($msg): self
{
$this->msg = $msg;

return $this;
}
}