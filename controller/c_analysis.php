<?php


class C_Analysis
{


private $id;
private $tensao;
private $corrente;
private $temperatura;
private $obs;
private $date;
private $time;
private $fk_bty;
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
 * Get the value of tensao
 */
public function getTensao()
{
return $this->tensao;
}

/**
 * Set the value of tensao
 */
public function setTensao($tensao): self
{
$this->tensao = $tensao;

return $this;
}

/**
 * Get the value of corrente
 */
public function getCorrente()
{
return $this->corrente;
}

/**
 * Set the value of corrente
 */
public function setCorrente($corrente): self
{
$this->corrente = $corrente;

return $this;
}


/**
 * Get the value of temperatura
 */
public function getTemperatura()
{
return $this->temperatura;
}

/**
 * Set the value of temperatura
 */
public function setTemperatura($temperatura): self
{
$this->temperatura = $temperatura;

return $this;
}


/**
 * Get the value of obs
 */
public function getObs()
{
return $this->obs;
}

/**
 * Set the value of obs
 */
public function setObs($obs): self
{
$this->obs = $obs;

return $this;
}

/**
 * Get the value of date
 */
public function getDate()
{
return $this->date;
}

/**
 * Set the value of date
 */
public function setDate($date): self
{
$this->date = $date;

return $this;
}


/**
 * Get the value of time
 */
public function getTime()
{
return $this->time;
}

/**
 * Set the value of time
 */
public function setTime($time): self
{
$this->time = $time;

return $this;
}

/**
 * Get the value of fk_bty
 */
public function getFkBty()
{
return $this->fk_bty;
}

/**
 * Set the value of fk_bty
 */
public function setFkBty($fk_bty): self
{
$this->fk_bty = $fk_bty;

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