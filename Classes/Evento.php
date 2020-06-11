<?php

namespace Classes;

class Evento
{
  // atributos privados do evento
  private $cd_evento;
  private $nm_evento;
  private $cd_criador_evento;
  private $dt_evento;
  private $ds_evento;
  private $hr_evento;
  private $cd_endereco_evento;
  private $cd_img_evento;
  private $cd_requisitos;

  // conexao com o banco
  private $conexao;
  public function __construct(Database $conexao)
  {
    $this->conexao = $conexao;
  }

  // declaracao e recuperacao dos atributos
  public function __get($attr)
  {
    return $this->$attr;
  }

  public function __set($attr, $value)
  {
    $this->$attr = $value;
    return $this;
  }

  public function recuperarEvento()
  {
    return $this->conexao->select("SELECT * FROM tb_eventos WHERE cd_evento = :id", [
      'id' => $this->cd_evento
    ]);
  }

  public function todosEventos()
  {
    return $this->conexao->select('SELECT * FROM tb_eventos');
  }
}
