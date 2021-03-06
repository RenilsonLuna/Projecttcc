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
    $evento = $this->conexao->select("SELECT * FROM tb_eventos WHERE cd_evento = :id", [
      'id' => $this->cd_evento
    ]);
    return $evento;
  }

  public function recuperarEventoPassado()
  {
    $evento = $this->conexao->select("SELECT * FROM tb_eventos WHERE cd_evento = :id AND dt_evento > DATE_FORMAT(CURRENT_TIMESTAMP, '%M, %D, %dY')", [
      'id' => $this->cd_evento
    ]);
    return $evento;
  }

  public function recuperarEventoByAttr($valor, $atributo)
  {
    $evento = $this->conexao->select(sprintf("SELECT * FROM tb_eventos WHERE %s = :cd", $atributo), [
      'cd' => $valor
    ], \PDO::FETCH_ASSOC);
    return $evento;
  }

  public function todosEventosAtuais()
  {
    return $this->conexao->select("SELECT * FROM tb_eventos WHERE dt_evento > CURRENT_TIMESTAMP ORDER BY dt_evento;");
  }

  public function todosEventosPassados()
  {
    return $this->conexao->select("SELECT * FROM tb_eventos WHERE dt_evento < CURRENT_TIMESTAMP ORDER BY dt_evento;");
  }

  public function recDadoEvento($evento, $dado)
  {
    $dt = $this->conexao->select(sprintf("SELECT %s FROM tb_eventos WHERE cd_evento = :cd", $dado), [
      'cd' => $evento
    ]);
    return $dt[0]->$dado;
  }

  public function criarEvento($nome, $criador, $dt, $ds, $hr, $endereco, $img, $requisitos)
  {
    $this->conexao->insert('tb_eventos', [

      'cd_criador_evento' => $criador,
      'nm_evento' => $nome,
      'dt_evento' => $dt,
      'ds_evento' => $ds,
      'hr_evento' => $hr,
      'cd_endereco_evento' => $endereco,
      'cd_img_evento' => $img,
      'cd_requisitos' => $requisitos
    ]);
  }

  public function participarEvento($usuario, $evento)
  {
    $this->conexao->insert('tb_usuarios_eventos', [
      'cd_usuario' => $usuario,
      'cd_evento' => $evento
    ]);
  }

  public function isParticipante($usuario, $evento)
  {
    $participantes = $this->conexao->select('SELECT * FROM tb_usuarios_eventos WHERE cd_usuario = :usuario AND cd_evento = :evento', [
      'usuario' => $usuario,
      'evento' => $evento
    ]);
    return $participantes;
  }

  public function cancelarPart($usuario, $evento)
  {
    $this->conexao->delete('tb_usuarios_eventos', sprintf('cd_usuario = %s', $usuario), sprintf('cd_evento = %s', $evento));
  }

  public function cancelarTodos($evento)
  {
    $this->conexao->delete('tb_usuarios_eventos', sprintf('cd_evento = %s', $evento));
  }

  public function seusEventos($usuario)
  {
    $eventos = $this->conexao->select("SELECT * FROM tb_eventos WHERE cd_criador_evento = :criador AND dt_evento > CURRENT_TIMESTAMP", [
      'criador' => $usuario
    ], \PDO::FETCH_ASSOC);;
    return $eventos;
  }

  public function seusEventosPassados($usuario)
  {
    $eventos = $this->conexao->select("SELECT * FROM tb_eventos WHERE cd_criador_evento = :criador AND dt_evento < CURRENT_TIMESTAMP", [
      'criador' => $usuario
    ], \PDO::FETCH_ASSOC);
    return $eventos;
  }

  public function eventosParticipando($usuario)
  {
    $eventos = $this->conexao->select("SELECT * FROM tb_eventos LEFT JOIN tb_usuarios_eventos ON (tb_usuarios_eventos.cd_evento = tb_eventos.cd_evento) WHERE dt_evento > CURRENT_TIMESTAMP AND tb_usuarios_eventos.cd_usuario = :cd", [
      'cd' => $usuario
    ], \PDO::FETCH_ASSOC);
    return $eventos;
  }

  public function eventosParticipados($usuario)
  {
    $eventos = $this->conexao->select("SELECT * FROM tb_eventos LEFT JOIN tb_usuarios_eventos ON (tb_usuarios_eventos.cd_evento = tb_eventos.cd_evento) WHERE dt_evento < CURRENT_TIMESTAMP AND tb_usuarios_eventos.cd_usuario = :cd", [
      'cd' => $usuario
    ], \PDO::FETCH_ASSOC);
    return $eventos;
  }

  public function numParticipantes($evento)
  {
    $participantes = $this->conexao->select("SELECT * FROM tb_usuarios_eventos WHERE cd_evento = :cd", [
      "cd" => $evento
    ], \PDO::FETCH_ASSOC);

    $num = count($participantes);
    return $num;
  }

  public function participantes($evento)
  {
    $participantes = $this->conexao->select("SELECT cd_usuario FROM tb_usuarios_eventos WHERE cd_evento = :cd", [
      'cd' => $evento
    ], \PDO::FETCH_ASSOC);
    return $participantes;
  }

  public function excluirEvento($evento)
  {
    $this->conexao->delete('tb_eventos', sprintf('cd_evento = %s', $evento));
    return;
  }

  public function eventoPassado($e)
  {
    $e = $this->conexao->select("SELECT dt_evento FROM tb_eventos WHERE cd_evento = :cd AND dt_evento < CURRENT_TIMESTAMP", [
      'cd' => $e
    ]);

    if (count($e) != 1) {
      return true;
    }else{
      return false;
    }
  }

}
