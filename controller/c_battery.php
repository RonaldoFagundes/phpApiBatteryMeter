<?php


class C_Battery
{


private $id;
private $tensao;
private $condutancia;
//private $desvio;
private $obs;
//private $fk_sta;
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
 * Get the value of condutancia
 */
public function getCondutancia()
{
return $this->condutancia;
}

/**
 * Set the value of condutancia
 */
public function setCondutancia($condutancia): self
{
$this->condutancia = $condutancia;

return $this;
}


/*
  Get the value of desvio
 
public function getDesvio()
{
return $this->desvio;
}


  Set the value of desvio
 
public function setDesvio($desvio): self
{
$this->desvio = $desvio;

return $this;
}
*/






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


/*
  Get the value of fk_sta
 
public function getFkSta()
{
return $this->fk_sta;
}


  Set the value of fk_sta
 
public function setFkSta($fk_sta): self
{
$this->fk_sta = $fk_sta;

return $this;
}
*/





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